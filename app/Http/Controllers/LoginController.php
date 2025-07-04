<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title'=> 'Login',
        ]);
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',  
            'password' => 'required'  
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Mendapatkan user yang sedang login
            $user = Auth::user();

            // Mengarahkan berdasarkan peran user
            if ($user->role == 'admin' || $user->role == 'pakar') {
                return redirect()->route('homepage');
            }

            return redirect()->route('homepage');
        }

        return back()->with('loginError','Username or Password is Invalid!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
