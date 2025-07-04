<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data contoh untuk dimasukkan ke dalam tabel data_gejalas
        $gejalas = [
            [
                'id_gejala' => 'G01',
                'nama_gejala' => 'Tekanan darah > 130/80 mmHg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G02',
                'nama_gejala' => 'Tekanan darah > 140/90 mmHg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G03',
                'nama_gejala' => 'Tekanan darah > 160/100 mmHg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G04',
                'nama_gejala' => 'Tekanan darah > 180/110 mmHg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G05',
                'nama_gejala' => 'Sakit kepala parah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G06',
                'nama_gejala' => 'Pusing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G07',
                'nama_gejala' => 'Penglihatan Buram',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G08',
                'nama_gejala' => 'Mual dan muntah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G09',
                'nama_gejala' => 'Telinga berdenging',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G10',
                'nama_gejala' => 'Tampak kebingungan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G11',
                'nama_gejala' => 'Detah jantung tak teratur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G12',
                'nama_gejala' => 'Merasa Kelelahan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G13',
                'nama_gejala' => 'Nyeri dada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G14',
                'nama_gejala' => 'Sulit bernapas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G15',
                'nama_gejala' => 'Terdapat darah dalam urin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G16',
                'nama_gejala' => 'Mimisan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G17',
                'nama_gejala' => 'Sensasi berdebar bagian dada, leher atau telinga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G18',
                'nama_gejala' => 'Kembung dan sulit buang air kecil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G19',
                'nama_gejala' => 'Hilang kesadaran',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G20',
                'nama_gejala' => 'Mempunyai penyakit ginjal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G21',
                'nama_gejala' => 'Mati rasa pada lengan, kaki dan wajah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G22',
                'nama_gejala' => 'Mempunyai riwayat diabetes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G23',
                'nama_gejala' => 'Mempunyai riwayat asam urat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G24',
                'nama_gejala' => 'Obesitas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G25',
                'nama_gejala' => 'Kolestrol tinggi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G26',
                'nama_gejala' => 'Mempunyai riwayat keturunan dalam keluarga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G27',
                'nama_gejala' => 'Titik darah pada mata',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_gejala' => 'G28',
                'nama_gejala' => 'Mempunyai riwayat penyakit jantung',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        DB::table('data_gejalas')->insert($gejalas);
    
    }
}
