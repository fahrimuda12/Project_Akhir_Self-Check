<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kode = 'G01';
        $datas = [
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Batuk Berdahak',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Demam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Hidung tersumbat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Nyeri Pada Wajah Seperti Susah Membuka Mulut',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Radang pada tenggorokan selama 2 minggu',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Batuk Kering',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Batuk Berdahak',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Batuk berlangsung selama 5 hari atau lebih',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Batuk kering dikarenakan lapisan pada paru-paru mengalami iritasi dan lendir yang muncul',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Berkeringat Secara Terus-Menerus',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Merasa sesak saat bersuara',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Kesulitan bernafas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Nyeri Dada Saat Menarik Nafas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Dada terasa sakit atau nyeri saat batuk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Ruam pada kulit atau perubahan warna',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Mual dan Muntah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Nyeri Otot dan Sendi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Tubuh terasa Lemas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Kesulitan Bicara Ataupun Bergerak',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Diare',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Bau Mulut',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Merasa Kelelahan Terus Menerus',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Tidak selera makan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Kehilangan Rasa Atau Bau',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Munculnya lendir berwarna putih atau kuning dari hidung',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Mata merah dan iritasi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Suara yang serak',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Nyeri tenggorokan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Gangguan menelan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        foreach ($datas as  $key => $data) {
            Gejala::insert($data);
        }
    }
}
