<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriUmkm;
use Illuminate\Support\Str;

class KategoriUmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            [
                'nama' => 'Kuliner',
                'deskripsi' => 'UMKM yang bergerak di bidang kuliner',
                'ikon' => 'bi-cup-hot',
                'aktif' => true,
            ],
            [
                'nama' => 'Fashion',
                'deskripsi' => 'UMKM yang bergerak di bidang fashion',
                'ikon' => 'bi-bag',
                'aktif' => true,
            ],
            [
                'nama' => 'Kerajinan',
                'deskripsi' => 'UMKM yang bergerak di bidang kerajinan',
                'ikon' => 'bi-palette',
                'aktif' => true,
            ],
            [
                'nama' => 'Jasa',
                'deskripsi' => 'UMKM yang bergerak di bidang jasa',
                'ikon' => 'bi-tools',
                'aktif' => true,
            ],
            [
                'nama' => 'Pertanian',
                'deskripsi' => 'UMKM yang bergerak di bidang pertanian',
                'ikon' => 'bi-flower1',
                'aktif' => true,
            ],
        ];

        foreach ($kategori as $item) {
            KategoriUmkm::create([
                'nama' => $item['nama'],
                'slug' => Str::slug($item['nama']),
                'deskripsi' => $item['deskripsi'],
                'ikon' => $item['ikon'],
                'aktif' => $item['aktif'],
            ]);
        }
    }
}
