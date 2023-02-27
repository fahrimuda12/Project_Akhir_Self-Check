<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kode = 'P01';
        $datas = [
            [
                'kode_penyakit' => $kode++,
                'nip_dokter' => 197107081999032001,
                'nama_penyakit' => 'Batuk Pilek',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_penyakit' => $kode++,
                'nip_dokter' => 197107081999032001,
                'nama_penyakit' => 'Sinusitis',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_penyakit' => $kode++,
                'nip_dokter' => 197107081999032001,
                'nama_penyakit' => 'Radang tenggorokan akut',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_penyakit' => $kode++,
                'nip_dokter' => 197107081999032001,
                'nama_penyakit' => 'Laringitis akut',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_penyakit' => $kode++,
                'nip_dokter' => 197107081999032001,
                'nama_penyakit' => 'Pneumonia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_penyakit' => $kode++,
                'nip_dokter' => 197107081999032001,
                'nama_penyakit' => 'COVID-19',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        foreach ($datas as $data) {
            Penyakit::insert($data);
        }
    }
}
