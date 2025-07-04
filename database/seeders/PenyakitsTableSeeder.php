<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyakitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data contoh untuk dimasukkan ke dalam tabel data_penyakits
        $penyakits = [
            [
                'id_penyakit' => 'P01',
                'nama_penyakit' => 'Pre-Hipertensi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_penyakit' => 'P02',
                'nama_penyakit' => 'Hipertensi Ringan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_penyakit' => 'P03',
                'nama_penyakit' => 'Hipertensi Berat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_penyakit' => 'P04',
                'nama_penyakit' => 'Hipertensi Maligna/Darurat',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        DB::table('data_penyakits')->insert($penyakits);
    }
}
