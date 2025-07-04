<?php

namespace App\Http\Controllers;

use App\Models\DataGejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gejala = DataGejala::all();
        return view('admin.gejala', [
            'title' => 'Data Gejala',
            'gejala' =>DataGejala::get(),
        ], compact('gejala'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gejala = DataGejala::all();
        return view('admin.gejalas.create', compact('gejala'),[
            'title' => 'Data Gejala',
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
        $request->validate([
            'id_gejala' => 'required|string|max:255|unique:data_gejalas',
            'nama_gejala' => 'required|string|max:255',
        ]);
    
        $gejala = new DataGejala; // Use singular 'gejala' if your model follows Laravel conventions
        $gejala->id_gejala = $request->id_gejala;
        $gejala->nama_gejala = $request->nama_gejala;
        
        $gejala->save();
    
        return redirect('/gejala')->with('status', 'Data Berhasil Disimpan!');
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
        $gejala = DataGejala::findOrFail($id);
        return view('admin.gejalas.edit', compact('gejala'),[
            'title' => 'Data Gejala',
        ]);
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
        $request->validate([
            'id_gejala' => 'required|string|max:255|unique:data_gejalas,id_gejala,' . $id,
            'nama_gejala' => 'required|string|max:255',
        ]);

        $gejala = DataGejala::findOrFail($id);
        $gejala->id_gejala = $request->id_gejala;
        $gejala->nama_gejala = $request->nama_gejala;

        $gejala->update();
        return redirect('/gejala')->with('status', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gejala = DataGejala::findOrFail($id);
        $gejala->delete();
        return redirect('/gejala')->with('status', 'Data Dihapus');
    }
}
