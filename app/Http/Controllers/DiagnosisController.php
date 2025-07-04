<?php

namespace App\Http\Controllers;

use App\Models\DataPenyakit;
use App\Models\DataSolusi;
use Illuminate\Http\Request;
use App\Models\DataGejala;
use App\Models\Diagnosis;
use App\Models\Rules;
use App\Models\Kesimpulan;

class DiagnosisController extends Controller
{
    public function form(Request $request)
    {
        $gejala = DataGejala::all();
        $pasien_id = $request->session()->get('pasien_id');

        return view('diagnosis.form', [
            'title' => 'Diagnosis',
            'gejala' => $gejala,
            'pasien_id' => $pasien_id,
        ]);
    }


    public function store(Request $request)
    {
        // Generate unique id_diagnosa
        $id_diagnosa = 'DGN_' . uniqid();

        // Validasi data
        $validatedData = $request->validate([
            'id_pasien' => 'required|exists:pasiens,id',
            'gejala_id' => 'required|array',
            'gejala_id.*' => 'required|string',
            'gejala_id_g01_g04' => 'nullable|string|in:G01,G02,G03,G04', // Opsional, jika dipilih harus ada di dalam opsi dropdown
        ]);

        // Tambahkan data diagnosa untuk gejala yang dipilih
        foreach ($validatedData['gejala_id'] as $gejala) {
            Diagnosis::create([
                'id_diagnosa' => $id_diagnosa,
                'id_pasien' => $validatedData['id_pasien'],
                'gejala_id' => $gejala,
            ]);
        }

        // Jika ada gejala dari dropdown yang dipilih, tambahkan ke diagnosa
        if (!empty($validatedData['gejala_id_g01_g04'])) {
            Diagnosis::create([
                'id_diagnosa' => $id_diagnosa,
                'id_pasien' => $validatedData['id_pasien'],
                'gejala_id' => $validatedData['gejala_id_g01_g04'],
            ]);
        }

        return $this->processDiagnosis($validatedData['id_pasien']);
    }

    // DiagnosisController.php
    public function processDiagnosis($id_pasien)
    {
        // Ambil semua gejala yang didiagnosis untuk pasien ini
        $diagnoses = Diagnosis::where('id_pasien', $id_pasien)->pluck('gejala_id')->toArray();

        // Ambil semua aturan yang cocok dengan gejala yang didiagnosis
        $matchingRules = Rules::whereIn('gejala_id', $diagnoses)->get();

        // Deklarasikan array untuk menyimpan jumlah gejala yang cocok untuk setiap penyakit
        $penyakitMatchCount = [];
        $penyakitIds = [];

        // Hitung jumlah gejala yang cocok untuk setiap penyakit
        foreach ($matchingRules as $rule) {
            $penyakitId = $rule->penyakit_id;
            if (!isset($penyakitMatchCount[$penyakitId])) {
                $penyakitMatchCount[$penyakitId] = 0;
                $penyakitIds[$penyakitId] = $rule->solusi_id;
            }
            $penyakitMatchCount[$penyakitId]++;
        }

        // Cari penyakit dengan jumlah gejala yang cocok terbanyak
        $bestMatchPenyakitId = null;
        $maxMatchCount = 0;
        foreach ($penyakitMatchCount as $penyakitId => $matchCount) {
            if ($matchCount > $maxMatchCount) {
                $bestMatchPenyakitId = $penyakitId;
                $maxMatchCount = $matchCount;
            }
        }

        // Deklarasikan variabel $penyakit dan $solusi
        $penyakit = null;
        $solusi = null;

        // Jika ada penyakit yang cocok, ambil penyakit dan solusi yang sesuai
        if ($bestMatchPenyakitId) {
            $penyakit = DataPenyakit::find($bestMatchPenyakitId);
            $solusi = DataSolusi::find($penyakitIds[$bestMatchPenyakitId]);
        }

        // Simpan data ke tabel kesimpulan
        Kesimpulan::create([
            'id_pasien' => $id_pasien,
            'nama_penyakit' => $penyakit ? $penyakit->nama_penyakit : 'Tidak ditemukan',
            'nama_gejala' => json_encode($diagnoses),
            'nama_solusi' => $solusi ? $solusi->nama_solusi : 'Tidak ditemukan',
        ]);

        // Kirim data penyakit dan solusi ke view hasil diagnosis
        return view('diagnosis.result', [
            'title' => 'Result',
            'diagnoses' => $diagnoses,
            'penyakit' => $penyakit,
            'solusi' => $solusi,
        ]);
    }

    public function result($id_pasien)
    {
        $diagnoses = Diagnosis::where('id_pasien', $id_pasien)->get();

        return view('diagnosis.result', [
            'title' => 'Result',
            'diagnoses' => $diagnoses,
        ]);
    }
}
