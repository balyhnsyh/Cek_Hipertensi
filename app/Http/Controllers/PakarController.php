<?php

namespace App\Http\Controllers;

use App\Models\Experts;
use Illuminate\Http\Request;

class PakarController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakar = Experts::all();
        return view('admin.pakar', [
            'title' => 'Data Pakar',
            'pakar' => Experts::get(),
        ], compact('pakar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pakar = Experts::all();
        return view('admin.pakars.create', compact('pakar'),[
            'title' => 'Data Pakar',
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
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'ttl' => 'required|string|max:255',
        'umur' => 'required|integer',
        'profesi' => 'required|string|max:255',
        'tmp_krj' => 'required|string|max:255',
        'no_telp' => 'required|string|max:15',
        'email' => 'required|string|email|max:255|unique:experts',
    ]);

    $expert = new Experts; // Use singular 'Expert' if your model follows Laravel conventions
    $expert->nama = $request->nama;
    $expert->alamat = $request->alamat;
    $expert->ttl = $request->ttl;
    $expert->umur = $request->umur;
    $expert->profesi = $request->profesi;
    $expert->tmp_krj = $request->tmp_krj;
    $expert->no_telp = $request->no_telp;
    $expert->email = $request->email;
    $expert->save();

    return redirect('/pakar')->with('status', 'Data Berhasil Disimpan!');
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
        $pakar = Experts::find($id);
        return view('admin.pakars.edit', compact('pakar'),[
            'title' => 'Data Pakar',
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
        $expert = Experts::find($id);
        if($request->input('password')) {
            $expert->nama = $request->nama;
            $expert->alamat = $request->alamat;
            $expert->ttl = $request->ttl;
            $expert->umur = $request->umur;
            $expert->profesi = $request->profesi;
            $expert->tmp_krj = $request->tmp_krj;
            $expert->no_telp = $request->no_telp;
            $expert->email = $request->email;
        }
        else{
            $expert->nama = $request->nama;
            $expert->alamat = $request->alamat;
            $expert->ttl = $request->ttl;
            $expert->umur = $request->umur;
            $expert->profesi = $request->profesi;
            $expert->tmp_krj = $request->tmp_krj;
            $expert->no_telp = $request->no_telp;
            $expert->email = $request->email;
        }
        $expert->update();
        return redirect('/pakar')->with('status', 'Data Berhasil Diubah!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expert = Experts::find($id);
        $expert->delete();
        return redirect('/pakar')->with('status', 'Data Dihapus');
    }
}
