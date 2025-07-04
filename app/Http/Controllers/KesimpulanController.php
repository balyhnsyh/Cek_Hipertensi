<?php

namespace App\Http\Controllers;

use App\Models\Kesimpulan;
use Illuminate\Http\Request;

class KesimpulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat = Kesimpulan::all();
        return view('admin.riwayat', [
            'title' => 'Data Riwayat',
            'riwayat' => Kesimpulan::get()
            ], compact('riwayat'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kesimpulan  $kesimpulan
     * @return \Illuminate\Http\Response
     */
    public function show(Kesimpulan $kesimpulan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kesimpulan  $kesimpulan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kesimpulan $kesimpulan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kesimpulan  $kesimpulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kesimpulan $kesimpulan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kesimpulan  $kesimpulan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kesimpulan $kesimpulan)
    {
        //
    }
}
