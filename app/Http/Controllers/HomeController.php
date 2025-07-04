<?php

namespace App\Http\Controllers;

use App\Models\Experts;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pasien;
class HomeController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $expertCount = Experts::count();
        $pasienCount = Pasien::count();
        
        return view('homepage', 
        [
            'title' => 'Home',
            'userCount' => $userCount,
            'expertCount' => $expertCount,
            'pasienCount' => $pasienCount,
            ]
        );
        
    }
    
    public function profile_home() {
        return view('profile_home',[
            'title' => 'Profile',
        ]
    );
    }
}
