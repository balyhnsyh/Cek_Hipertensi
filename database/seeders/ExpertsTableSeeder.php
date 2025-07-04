<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data contoh untuk dimasukkan ke dalam tabel experts
        $experts = [
            [
                'nama' => 'Yeni Aryanti',
                'alamat' => 'Jalan Jenderal Sudirman No. 123',
                'ttl' => 'Jakarta, 24 Desember 1984',
                'umur' => '39',
                'profesi' => 'Perawat',
                'tmp_krj' => 'RS Cipto Mangunkusumo',
                'no_telp' => '081234567890',
                'email' => 'yeniaryanti@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        DB::table('experts')->insert($experts);
    }
}
