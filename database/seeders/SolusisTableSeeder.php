<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolusisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $solusis = [
            [
                'id_solusi' => 'S01',
                'nama_solusi' => 'Perubahan gaya hidup, cek tekanan darah secara teratur, konsultasi dengan dokter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_solusi' => 'S02',
                'nama_solusi' => 'Perubahan gaya hidup, cek tekanan darah secara teratur, Hindari stres, konsumsi makanan atau herbal penurun hipertensi dan konsultasi dengan dokter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_solusi' => 'S03',
                'nama_solusi' => 'Perubahan gaya hidup, cek tekanan darah secara teratur, Hindari stres, konsumsi makanan atau herbal penurun hipertensi, pengobatan yang tepat dan konsultasi dengan spesialis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_solusi' => 'S04',
                'nama_solusi' => 'Segera Hubungi RS terdekat, dan lakukan tindakan lebih lanjut sesuai dengan arahan yang ada',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        DB::table('data_solusis')->insert($solusis);
    }
}
