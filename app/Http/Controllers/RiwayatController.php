<?php

namespace App\Http\Controllers;

use App\Models\Kesimpulan;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayats = Kesimpulan::all();
        return view('admin.riwayat', [
            'title' => 'Data Riwayat',
            'riwayats' => Kesimpulan::get()
            ], compact('riwayat'));
    }
}
