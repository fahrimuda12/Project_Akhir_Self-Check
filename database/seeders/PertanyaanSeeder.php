<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $opsi1 = [
            'opsi_1' => "KS01",
            'opsi_2' => "KS02",
            'opsi_3' => "KS03",
            'opsi_4' => "KS04",
            'opsi_5' => "KS05",
            'opsi_6' => "KS06",
        ];
        $opsi2 = [
            'opsi_1' => "KS01",
            'opsi_2' => "KS06",
        ];
        Pertanyaan::insert([
            [
                'pertanyaan' => 'Apakah anda merasa batuk yang keluar dahak ?',
                // implode(",", $opsi1),
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G01',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Apakah kamu merasa panas badan ?',
                // implode(",", $opsi1),
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G02',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Apakah hidung anda tersumbat ?',
                // implode(",", $opsi1),
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G03',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Terasa kaku saat membuka mulut ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G04',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Merasa nyeri tenggorokan selama 2 minggu terakhir ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS06",
                'opsi_3' => null,
                'opsi_4' => null,
                'opsi_5' => null,
                'opsi_6' => null,
                'kode_gejala' => 'G05',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Ketika batuk keluar dahak ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G07',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Apakah batuknya sudah lebih 5 hari ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS06",
                'opsi_3' => null,
                'opsi_4' => null,
                'opsi_5' => null,
                'opsi_6' => null,
                'kode_gejala' => 'G08',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Apakah anda sering berkeringat secara terus-menerus ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G10',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Merasa sesak saat bersuara ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G11',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Mengalami kesulitas bernapas ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G12',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Mengalami nyeri dada saat menarik nafas ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G13',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Mengalami nyeri dada saat batuk ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G14',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Memiliki ruam pada kulit atau perubahan warna ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G15',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Merasa mual atau muntah ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G16',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Mengalami nyeri otot dan sendi ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G17',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Tubuh terasa lemas ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G18',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Kesulitan bicara ataupun bergerak ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G19',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Mengalami Diare ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G20',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pertanyaan' => 'Mulut terasa bau ?',
                'opsi_1' => "KS01",
                'opsi_2' => "KS02",
                'opsi_3' => "KS03",
                'opsi_4' => "KS04",
                'opsi_5' => "KS05",
                'opsi_6' => "KS06",
                'kode_gejala' => 'G21',
                'nip_dokter' => 197107081999032001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
