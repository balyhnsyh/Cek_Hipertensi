<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Rules;
use App\Models\DataPenyakit;
use App\Models\DataGejala;
use App\Models\DataSolusi;

class RulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // Mengambil data rules dengan relasi penyakit, gejala, dan solusi
    $rules = Rules::with(['penyakit', 'gejala', 'solusi'])->get();

    // Mengelompokkan data rules berdasarkan penyakit_id dan solusi_id
    $groupedRules = $rules->groupBy(['penyakit_id', 'solusi_id']);

    // Mengubah data menjadi format yang diinginkan
    $formattedRules = [];
    foreach ($groupedRules as $group) {
        foreach ($group as $items) {
            $firstItem = $items->first();
            $formattedRules[] = [
                'penyakit' => $firstItem->penyakit,
                'solusi' => $firstItem->solusi,
                'gejala' => $items->pluck('gejala')->unique('id_gejala')->values()
            ];
        }
    }

    return view('admin.rules', [
        'title' => 'Rules',
        'rules' => $formattedRules,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penyakits = DataPenyakit::all();
        $gejalas = DataGejala::all();
        $solusis = DataSolusi::all();
        return view('admin.rules.create', compact('penyakits', 'gejalas', 'solusis'));
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
            'penyakit_id' => 'required',
            'gejala_id' => 'required',
            'solusi_id' => 'required',
        ]);

        Rules::create($request->all());

        return redirect()->route('admin.rules')->with('success', 'Rules created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $rule = Rules::with(['penyakit', 'gejala', 'solusi'])->findOrFail($id);
        // return view('rules.show', compact('rule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rules = Rules::findOrFail($id);
        $penyakits = DataPenyakit::all();
        $gejalas = DataGejala::all();
        $solusis = DataSolusi::all();
        return view('rules.edit', compact('rule', 'penyakits', 'gejalas', 'solusis'));
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
            'penyakit_id' => 'required',
            'gejala_id' => 'required',
            'solusi_id' => 'required',
        ]);

        $rules = Rules::findOrFail($id);
        $rules->update($request->all());

        return redirect()->route('rules.index')->with('success', 'Rules updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rules = Rules::findOrFail($id);
        $rules->delete();

        return redirect()->route('admin.rules')->with('success', 'Rules deleted successfully.');
    }
}
