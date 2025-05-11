<?php

namespace Database\Seeders;

use App\Models\Pengguna;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Pengguna::factory(10)->create();

        // Pengguna::factory()->create([
        //     'nama' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminSeeder::class,
            PengaturanSeeder::class,
            PenggunaSeeder::class,
            KategoriStatistikSeeder::class,
            StatistikSeeder::class,
            KategoriLayananSeeder::class,
            LayananSeeder::class,
            KategoriUmkmSeeder::class,
            BeritaSeeder::class,
            ProfilKelurahanSeeder::class,
        ]);
    }
}
