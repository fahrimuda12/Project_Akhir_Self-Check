<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use App\Models\Rule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyakitAllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private function randomCF($rand)
    {
        if ($rand === 0.9) {
            return 0;
        } elseif ($rand === 2) {
            return 0.5;
        } else {
            return 0.9;
        }
    }

    public function run()
    {
        $kode = 'P01';
        $datas = [
            [
                'kode_penyakit' => $kode++,
                'nip_dokter' => 197107081999032001,
                'nama_penyakit' => 'Influenza',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => [
                    [
                        'kode_gejala' => 'G01',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G02',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G03',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G04',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G05',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G06',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G07',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G08',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G09',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G10',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G11',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G12',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G13',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G14',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G15',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G16',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G17',
                        'nilai_cf' =>  0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G18',
                        'nilai_cf' =>  0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G19',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G20',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G21',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G22',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G23',
                        'nilai_cf' =>  0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G24',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G25',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G26',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G27',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G28',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G29',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G30',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ]
            ],
            [
                'kode_penyakit' => $kode++,
                'nip_dokter' => 197107081999032001,
                'nama_penyakit' => 'Sinusitis',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => [
                    [
                        'kode_gejala' => 'G01',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G02',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G03',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G04',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G05',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G06',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G07',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G08',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G09',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G10',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G11',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G12',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G13',
                        'nilai_cf' => 0.9,
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G14',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G15',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G16',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G17',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G18',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G19',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G20',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G21',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G22',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G23',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G24',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G25',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G26',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G27',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G28',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G29',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G30',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ]
            ],
            [
                'kode_penyakit' => $kode++,
                'nip_dokter' => 197107081999032001,
                'nama_penyakit' => 'Tonsilitis Akut',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => [
                    [
                        'kode_gejala' => 'G01',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G02',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G03',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G04',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G05',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G06',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G07',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G08',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G09',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G10',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G11',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G12',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G13',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G14',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G15',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G16',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G17',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G18',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G19',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G20',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G21',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G22',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G23',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G24',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G25',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G26',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G27',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G28',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G29',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G30',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ]
            ],
            [
                'kode_penyakit' => $kode++,
                'nip_dokter' => 197107081999032001,
                'nama_penyakit' => 'Faringitis akut',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => [
                    [
                        'kode_gejala' => 'G01',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G02',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G03',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G04',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G05',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G06',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G07',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G08',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G09',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G10',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G11',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G12',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G13',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G14',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G15',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G16',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G17',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G18',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G19',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G20',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G21',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G22',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G23',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G24',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G25',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G26',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G27',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G28',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G29',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G30',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ]
            ],
            [
                'kode_penyakit' => $kode++,
                'nip_dokter' => 197107081999032001,
                'nama_penyakit' => 'Rinitis Akut',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gejala' => [
                    [
                        'kode_gejala' => 'G01',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G02',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G03',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G04',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G05',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G06',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G07',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G08',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G09',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G10',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G11',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G12',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G13',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G14',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G15',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G16',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G17',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G18',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G19',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G20',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G21',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G22',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G23',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G24',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G25',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G26',
                        'nilai_cf' => 0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G27',
                        'nilai_cf' => -0.9,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G28',
                        'nilai_cf' => 0.5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G29',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'kode_gejala' => 'G30',
                        'nilai_cf' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ]
            ],
            // [
            //     'kode_penyakit' => $kode++,
            //     'nip_dokter' => 0.997107081999032001,
            //     'nama_penyakit' => 'COVID-0.99',
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now()
            // ],
        ];
        foreach ($datas as $data) {
            Penyakit::insert([
                'kode_penyakit' => $data['kode_penyakit'],
                'nip_dokter' => $data['nip_dokter'],
                'nama_penyakit' => $data['nama_penyakit'],
                'created_at' => $data['created_at'],
                'updated_at' => $data['updated_at']
            ]);

            foreach ($data['gejala'] as $gejala) {
                Rule::insert([
                    'kode_penyakit' => $data['kode_penyakit'],
                    'kode_gejala' => $gejala['kode_gejala'],
                    'nilai_cf' => $gejala['nilai_cf'],
                    'created_at' => $data['created_at'],
                    'updated_at' => $data['updated_at']
                ]);
            }
        }
    }
}
