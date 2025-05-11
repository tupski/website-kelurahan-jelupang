<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriStatistik;
use Illuminate\Support\Str;

class KategoriStatistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            [
                'nama' => 'Kependudukan',
                'deskripsi' => 'Statistik terkait data kependudukan',
                'urutan' => 1,
            ],
            [
                'nama' => 'Pendidikan',
                'deskripsi' => 'Statistik terkait data pendidikan',
                'urutan' => 2,
            ],
            [
                'nama' => 'Kesehatan',
                'deskripsi' => 'Statistik terkait data kesehatan',
                'urutan' => 3,
            ],
            [
                'nama' => 'Ekonomi',
                'deskripsi' => 'Statistik terkait data ekonomi',
                'urutan' => 4,
            ],
            [
                'nama' => 'Sosial',
                'deskripsi' => 'Statistik terkait data sosial',
                'urutan' => 5,
            ],
        ];

        foreach ($kategori as $item) {
            KategoriStatistik::create([
                'nama' => $item['nama'],
                'slug' => Str::slug($item['nama']),
                'deskripsi' => $item['deskripsi'],
                'urutan' => $item['urutan'],
            ]);
        }
    }
}
