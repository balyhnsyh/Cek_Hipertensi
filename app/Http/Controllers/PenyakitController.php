<?php

namespace App\Http\Controllers;

use App\Models\DataPenyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyakit = DataPenyakit::all();
        return view('admin.penyakit', [
            'title' => 'Data Penyakit',
            'penyakit' =>DataPenyakit::get(),
        ], compact('penyakit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penyakit = DataPenyakit::all();
        return view('admin.penyakits.create', compact('penyakit'),[
            'title' => 'Data Penyakit',
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
            'id_penyakit' => 'required|string|max:255|unique:data_penyakits',
            'nama_penyakit' => 'required|string|max:255',
        ]);
    
        $penyakit = new DataPenyakit; // Use singular 'penyakit' if your model follows Laravel conventions
        $penyakit->id_penyakit = $request->id_penyakit;
        $penyakit->nama_penyakit = $request->nama_penyakit;
        
        $penyakit->save();
    
        return redirect('/penyakit')->with('status', 'Data Berhasil Disimpan!');
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
        $penyakit = DataPenyakit::findOrFail($id);
        return view('admin.penyakits.edit', compact('penyakit'),[
            'title' => 'Data Penyakit',
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
            'id_penyakit' => 'required|string|max:255|unique:data_penyakits,id_penyakit,' . $id,
            'nama_penyakit' => 'required|string|max:255',
        ]);

        $penyakit = DataPenyakit::findOrFail($id);
        if($request->input('id_penyakit')) {
            $penyakit->id_penyakit = $request->id_penyakit;
            $penyakit->nama_penyakit = $request->nama_penyakit;
        }
        else{
            $penyakit->id_penyakit = $request->id_penyakit;
            $penyakit->nama_penyakit = $request->nama_penyakit;
        }
        $penyakit->update();
        return redirect('/penyakit')->with('status', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penyakit = DataPenyakit::findOrFail($id);
        $penyakit->delete();
        return redirect('/penyakit')->with('status', 'Data Dihapus');
    }
}
