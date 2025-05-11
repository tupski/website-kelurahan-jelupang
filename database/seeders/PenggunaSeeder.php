<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengguna = [
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'password' => Hash::make('password'),
                'nik' => '3674012345678901',
                'no_hp' => '081234567890',
                'domisili_ktp' => true,
                'kota_domisili' => 'Tangerang Selatan',
                'alamat' => 'Jl. Raya Jelupang No. 123, RT 01/RW 02',
                'foto' => 'pengguna/budi.jpg',
            ],
            [
                'nama' => 'Siti Rahayu',
                'email' => 'siti@example.com',
                'password' => Hash::make('password'),
                'nik' => '3674012345678902',
                'no_hp' => '081234567891',
                'domisili_ktp' => true,
                'kota_domisili' => 'Tangerang Selatan',
                'alamat' => 'Jl. Raya Jelupang No. 456, RT 02/RW 03',
                'foto' => 'pengguna/siti.jpg',
            ],
            [
                'nama' => 'Agus Wijaya',
                'email' => 'agus@example.com',
                'password' => Hash::make('password'),
                'nik' => '3674012345678903',
                'no_hp' => '081234567892',
                'domisili_ktp' => true,
                'kota_domisili' => 'Tangerang Selatan',
                'alamat' => 'Jl. Raya Jelupang No. 789, RT 03/RW 04',
                'foto' => 'pengguna/agus.jpg',
            ],
        ];

        foreach ($pengguna as $item) {
            Pengguna::create($item);
        }
    }
}
