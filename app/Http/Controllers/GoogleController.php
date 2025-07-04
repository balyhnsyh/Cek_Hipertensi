<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Client;

class GoogleController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            // dd($user);
            $finduser = User::where('google_id', $user->getId())->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('/');
            }$finduser = User::where('google_id', $user->getId())->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('/');
            } else {
                // Download and save the avatar
                $client = new Client();
                $avatarUrl = $user->avatar;
                $avatarContents = $client->get($avatarUrl)->getBody()->getContents();
                $avatarName = 'uploads/' . uniqid() . '.jpg';

                Storage::put($avatarName, $avatarContents);

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => bcrypt('12345678')
                ]);

                // Override the default pfp with the uploaded avatar path
                $newUser->pfp = $avatarName;
                $newUser->save();

                Auth::login($newUser);
                return redirect()->intended('/');
            }
        } catch (\Throwable $th) {
            // Uncomment this line to see any thrown exceptions
            throw $th;
        }
    }
}