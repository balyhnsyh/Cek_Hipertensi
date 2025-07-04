<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\DataGejala;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('konsultasi', [
            'title' => 'Konsultasi',
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();
        return view('pasiens.create', compact('pasien'),[
            'title' => 'Konsultasi',
        ]);             
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'nomor_telepon' => 'required|string|max:15',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
    ]);

    // Get the ID of the currently authenticated user
    $user_id = Auth::id();

    // Create a new Pasien instance and save it
    $pasien = Pasien::create([
        'nama' => $validatedData['nama'],
        'alamat' => $validatedData['alamat'],
        'tanggal_lahir' => $validatedData['tanggal_lahir'],
        'nomor_telepon' => $validatedData['nomor_telepon'],
        'jenis_kelamin' => $validatedData['jenis_kelamin'],
        'id_pasien' => $user_id, // Assign the user's ID as id_pasien in Pasien table
    ]);

    // Store the pasien_id in session
    $request->session()->put('pasien_id', $pasien->id);

    // Redirect to the diagnosis form
    return redirect()->route('diagnosis.form');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
