<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriLayanan;
use Illuminate\Support\Str;

class KategoriLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            [
                'nama' => 'Administrasi Kependudukan',
                'deskripsi' => 'Layanan terkait administrasi kependudukan',
                'ikon' => 'bi-person-vcard',
                'aktif' => true,
            ],
            [
                'nama' => 'Perizinan',
                'deskripsi' => 'Layanan terkait perizinan',
                'ikon' => 'bi-file-earmark-check',
                'aktif' => true,
            ],
            [
                'nama' => 'Kesehatan',
                'deskripsi' => 'Layanan terkait kesehatan',
                'ikon' => 'bi-heart-pulse',
                'aktif' => true,
            ],
            [
                'nama' => 'Pendidikan',
                'deskripsi' => 'Layanan terkait pendidikan',
                'ikon' => 'bi-book',
                'aktif' => true,
            ],
            [
                'nama' => 'Sosial',
                'deskripsi' => 'Layanan terkait sosial',
                'ikon' => 'bi-people',
                'aktif' => true,
            ],
        ];

        foreach ($kategori as $item) {
            KategoriLayanan::create([
                'nama' => $item['nama'],
                'slug' => Str::slug($item['nama']),
                'deskripsi' => $item['deskripsi'],
                'ikon' => $item['ikon'],
                'aktif' => $item['aktif'],
            ]);
        }
    }
}
