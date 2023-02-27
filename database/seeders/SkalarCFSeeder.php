<?php

namespace Database\Seeders;

use App\Models\SkalarCF;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkalarCFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SkalarCF::insert([
            [
                'kode_skalar' => 'KS01',
                'skalar' => "Tidak",
                'bobot_nilai' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_skalar' => 'KS02',
                'skalar' => "Tidak Tahu",
                'bobot_nilai' => 0.2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_skalar' => 'KS03',
                'skalar' => "Sedikit Yakin",
                'bobot_nilai' => 0.4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_skalar' => 'KS04',
                'skalar' => "Cukup Yakin",
                'bobot_nilai' => 0.6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_skalar' => 'KS05',
                'skalar' => "Yakin",
                'bobot_nilai' => 0.8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_skalar' => 'KS06',
                'skalar' => "Sangat Yakin",
                'bobot_nilai' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
