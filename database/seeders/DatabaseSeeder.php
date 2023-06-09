<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\SkalarCF;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            PakarSeeder::class,
            // SkalarCFSeeder::class,
            SkalarCF101Seeder::class,
            // GejalaSeeder::class,
            Gejala101Seeder::class,
            // PenyakitSeeder::class,
            // PenyakitBaruSeeder::class,
            // ini yang benar
            // PenyakitBaru2Seeder::class,
            // PenyakitAllSeeder::class,
            // PenyakitAll2Seeder::class,
            // PenyakitBukanSeeder::class,
            // Penyakit246Seeder::class,
            Penyakit468Seeder::class,
            // Penyakit035Seeder::class,

            // TabelKeputusanSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
