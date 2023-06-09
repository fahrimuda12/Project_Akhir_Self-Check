<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            'nip' => 1,
            'nama_pegawai' => 'Admin',
            'alamat' => '',
            'no_hp' => '000000000',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'nrp' => '3120500046',
            'nama' => 'Zulqhi Fahri Muda',
            'email' => 'profesorrob01@gmail.com',
            'jenkel' => 'pria',
            'umur' => 21,
            'alamat' => 'Surabaya',
            'no_hp' => '081234567890',
            'password' => bcrypt('Robotic123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
