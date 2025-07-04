<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experts;
use App\Models\User;
use App\Models\DataPenyakit;
use App\Models\DataGejala;
use App\Models\Kesimpulan;

class AdminController extends Controller
{
    public function index()
    {
        $penyakitCount = DataPenyakit::count();
        $gejalaCount = DataGejala::count();
        $expertCount = Experts::count();
        return view('admin.dashboard', [
            'title' => 'Admin Dashboard',
            'penyakitCount'=> $penyakitCount,
            'gejalaCount'=> $gejalaCount,
            'expertCount'=> $expertCount
        ]);
    }

    public function pakar()
    {
        return view('admin.pakar', [
            'title' => 'Data Pakar',
            'pakar' => Experts::latest()->get(),
        ]);
    }
    public function pengguna()
    {
        return view('admin.pengguna', [
            'title' => 'Data Pengguna',
            'pengguna' => User::latest()->get(),
        ]);
    }
    public function penyakit()
    {
        return view('admin.penyakit', [
            'title' => 'Data Penyakit',
            'penyakit' => DataPenyakit::latest()->get(),
        ]);
    }
    public function gejala()
    {
        return view('admin.gejala', [
            'title' => 'Data Gejala',
            'gejala' => DataGejala::latest()->get(),
        ]);
    }

    public function riwayat()
    {
        return view('admin.riwayat', [
            'title' => 'Data Riwayat',
            'riwayat' => Kesimpulan::latest()->get(),
        ]);
    }



    public function create()
    {
        return view('admin.pakars.create',[
            'title' => 'Data Pakar',
        ]);
    }
}
