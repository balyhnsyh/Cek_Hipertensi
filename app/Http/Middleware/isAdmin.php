<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah login dan memiliki peran admin atau pakar
        if (Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'pakar')) {
            return $next($request);
        }

        // Jika bukan admin atau pakar, arahkan ke homepage
        return redirect('/')->withErrors(['error' => 'You are not authorized to access this page.']);
    }
}
