<?php

namespace App\Http\Controllers;

use App\Models\DataSolusi;
use Illuminate\Http\Request;

class SolusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solusi = DataSolusi::all();
        return view('admin.solusi', [
            'title' => 'Data Solusi',
            'solusi' =>DataSolusi::get(),
        ], compact('solusi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $solusi = DataSolusi::all();
        return view('admin.solusis.create', compact('solusi'),[
            'title' => 'Data Solusi',
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
            'id_solusi' => 'required|string|max:255|unique:data_solusis',
            'nama_solusi' => 'required|string|max:255',
        ]);
    
        $solusi = new DataSolusi; // Use singular 'solusi' if your model follows Laravel conventions
        $solusi->id_solusi = $request->id_solusi;
        $solusi->nama_solusi = $request->nama_solusi;
        
        $solusi->save();
    
        return redirect('/solusi')->with('status', 'Data Berhasil Disimpan!');
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
        $solusi = DataSolusi::findOrFail($id);
        return view('admin.solusis.edit', compact('solusi'),[
            'title' => 'Data Solusi',
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
            'id_solusi' => 'required|string|max:255|unique:data_solusis,id_solusi,' . $id,
            'nama_solusi' => 'required|string|max:255',
        ]);

        $solusi = DataSolusi::findOrFail($id);
        if($request->input('id_solusi')) {
            $solusi->id_solusi = $request->id_solusi;
            $solusi->nama_solusi = $request->nama_solusi;
        }
        else{
            $solusi->id_solusi = $request->id_solusi;
            $solusi->nama_solusi = $request->nama_solusi;
        }
        $solusi->update();
        return redirect('/solusi')->with('status', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solusi = DataSolusi::findOrFail($id);
        $solusi->delete();
        return redirect('/solusi')->with('status', 'Data Dihapus');
    }
}
