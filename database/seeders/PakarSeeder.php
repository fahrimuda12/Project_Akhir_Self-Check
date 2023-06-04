<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Pakar;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PakarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pakar::insert([
            'nip_dokter' => 197107081999032001,
            'nama_dokter' => 'Pakar1',
            'alamat' => '',
            'no_hp' => '000000000',
            'email' => 'pakar@pakar.com',
            'password' => bcrypt('pakar123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
