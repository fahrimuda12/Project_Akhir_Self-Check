<?php

namespace Database\Seeders;

use App\Models\Rule;
use App\Models\TabelKeputusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TabelKeputusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rule::insert(
            [
                [
                    'kode_penyakit' => 'P01',
                    'kode_gejala' => 'G01',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P01',
                    'kode_gejala' => 'G02',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P01',
                    'kode_gejala' => 'G03',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P01',
                    'kode_gejala' => 'G28',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P01',
                    'kode_gejala' => 'G29',
                    'nilai_cf'  => 0.8
                ],
            ]
        );
        Rule::insert(
            [
                [
                    'kode_penyakit' => 'P02',
                    'kode_gejala' => 'G01',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P02',
                    'kode_gejala' => 'G02',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P02',
                    'kode_gejala' => 'G03',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P02',
                    'kode_gejala' => 'G04',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P02',
                    'kode_gejala' => 'G25',
                    'nilai_cf'  => 0.8
                ],
            ]
        );
        Rule::insert(
            [
                [
                    'kode_penyakit' => 'P03',
                    'kode_gejala' => 'G01',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P03',
                    'kode_gejala' => 'G02',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P03',
                    'kode_gejala' => 'G05',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P03',
                    'kode_gejala' => 'G06',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P03',
                    'kode_gejala' => 'G07',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P03',
                    'kode_gejala' => 'G08',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P03',
                    'kode_gejala' => 'G11',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P03',
                    'kode_gejala' => 'G27',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P03',
                    'kode_gejala' => 'G28',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P03',
                    'kode_gejala' => 'G29',
                    'nilai_cf'  => 0.8
                ],
            ]
        );
        Rule::insert(
            [
                [
                    'kode_penyakit' => 'P04',
                    'kode_gejala' => 'G01',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P04',
                    'kode_gejala' => 'G02',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P04',
                    'kode_gejala' => 'G06',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P04',
                    'kode_gejala' => 'G07',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P04',
                    'kode_gejala' => 'G27',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P04',
                    'kode_gejala' => 'G29',
                    'nilai_cf'  => 0.8
                ],
            ]
        );
        Rule::insert(
            [
                [
                    'kode_penyakit' => 'P05',
                    'kode_gejala' => 'G01',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P05',
                    'kode_gejala' => 'G02',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P05',
                    'kode_gejala' => 'G09',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P05',
                    'kode_gejala' => 'G10',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P05',
                    'kode_gejala' => 'G12',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P05',
                    'kode_gejala' => 'G13',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P05',
                    'kode_gejala' => 'G14',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P05',
                    'kode_gejala' => 'G16',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P05',
                    'kode_gejala' => 'G17',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P05',
                    'kode_gejala' => 'G18',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P05',
                    'kode_gejala' => 'G20',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P05',
                    'kode_gejala' => 'G23',
                    'nilai_cf'  => 0.8
                ],
            ]
        );
        Rule::insert(
            [
                [
                    'kode_penyakit' => 'P06',
                    'kode_gejala' => 'G01',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P06',
                    'kode_gejala' => 'G02',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P06',
                    'kode_gejala' => 'G06',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P06',
                    'kode_gejala' => 'G07',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P06',
                    'kode_gejala' => 'G12',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P06',
                    'kode_gejala' => 'G13',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P06',
                    'kode_gejala' => 'G14',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P06',
                    'kode_gejala' => 'G15',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P06',
                    'kode_gejala' => 'G19',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P06',
                    'kode_gejala' => 'G21',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P06',
                    'kode_gejala' => 'G22',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P06',
                    'kode_gejala' => 'G24',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P06',
                    'kode_gejala' => 'G26',
                    'nilai_cf'  => 0.8
                ],
                [
                    'kode_penyakit' => 'P06',
                    'kode_gejala' => 'G28',
                    'nilai_cf'  => 0.8
                ],
            ]
        );
    }
}
