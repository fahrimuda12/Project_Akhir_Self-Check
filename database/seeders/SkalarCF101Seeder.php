<?php

namespace Database\Seeders;

use App\Models\SkalarCF;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkalarCF101Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'kode_skalar' => 'KS01',
                'tipe' => 'pilgan',
                'skalar' => "Tidak",
                'bobot_nilai' => -1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_skalar' => 'KS02',
                'tipe' => 'pilgan',
                'skalar' => "Mungkin",
                'bobot_nilai' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_skalar' => 'KS03',
                'tipe' => 'pilgan',
                'skalar' => "Yakin",
                'bobot_nilai' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_skalar' => 'AB01',
                'tipe' => 'inputan',
                'skalar' => -1,
                'bobot_nilai' => -1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        foreach ($datas as $key => $data) {
            $skalarCF  = SkalarCF::find($data['kode_skalar']) ? SkalarCF::find($data['kode_skalar']) : new SkalarCF();
            $skalarCF->kode_skalar = $data['kode_skalar'];
            $skalarCF->tipe = $data['tipe'];
            $skalarCF->skalar = $data['skalar'];
            $skalarCF->bobot_nilai = $data['bobot_nilai'];
            $skalarCF->created_at = $data['created_at'];
            $skalarCF->updated_at = $data['updated_at'];
            $skalarCF->save();
            // $skalarCF->fill($data);
        }
    }
}
