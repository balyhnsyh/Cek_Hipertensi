<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create', [
            'title'=> 'Register',
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255'],
            'pfp' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // optional profile picture
        ]);

        // Hash password
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Create user
        $user = User::create($validatedData);

        // Authenticate the user
        Auth::login($user);

        // Flash message for successful registration
        $request->session()->flash('success', 'Registration successful! Please login.');

        // Redirect to login page
        return redirect('/');
    }
}
