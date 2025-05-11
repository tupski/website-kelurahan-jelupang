<?php

namespace Database\Seeders;

use App\Models\KategoriStatistik;
use App\Models\Statistik;
use Illuminate\Database\Seeder;

class StatistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendapatkan ID kategori
        $kategoriKependudukan = KategoriStatistik::where('nama', 'Kependudukan')->first()->id;
        $kategoriPendidikan = KategoriStatistik::where('nama', 'Pendidikan')->first()->id;
        $kategoriKesehatan = KategoriStatistik::where('nama', 'Kesehatan')->first()->id;
        $kategoriEkonomi = KategoriStatistik::where('nama', 'Ekonomi')->first()->id;
        $kategoriSosial = KategoriStatistik::where('nama', 'Sosial')->first()->id;

        $statistik = [
            // Kependudukan
            [
                'judul' => 'Jumlah Penduduk',
                'nilai' => 12345,
                'satuan' => 'Jiwa',
                'deskripsi' => 'Total jumlah penduduk Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriKependudukan,
            ],
            [
                'judul' => 'Jumlah Penduduk Laki-laki',
                'nilai' => 6173,
                'satuan' => 'Jiwa',
                'deskripsi' => 'Jumlah penduduk laki-laki di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriKependudukan,
            ],
            [
                'judul' => 'Jumlah Penduduk Perempuan',
                'nilai' => 6172,
                'satuan' => 'Jiwa',
                'deskripsi' => 'Jumlah penduduk perempuan di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriKependudukan,
            ],
            [
                'judul' => 'Jumlah Kepala Keluarga',
                'nilai' => 3456,
                'satuan' => 'KK',
                'deskripsi' => 'Jumlah kepala keluarga di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriKependudukan,
            ],
            [
                'judul' => 'Kepadatan Penduduk',
                'nilai' => 2178,
                'satuan' => 'Jiwa/km²',
                'deskripsi' => 'Kepadatan penduduk di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriKependudukan,
            ],
            [
                'judul' => 'Laju Pertumbuhan Penduduk',
                'nilai' => 1.5,
                'satuan' => '%',
                'deskripsi' => 'Laju pertumbuhan penduduk di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriKependudukan,
            ],
            
            // Pendidikan
            [
                'judul' => 'Jumlah Sekolah Dasar',
                'nilai' => 5,
                'satuan' => 'Unit',
                'deskripsi' => 'Jumlah Sekolah Dasar di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriPendidikan,
            ],
            [
                'judul' => 'Jumlah Sekolah Menengah Pertama',
                'nilai' => 3,
                'satuan' => 'Unit',
                'deskripsi' => 'Jumlah Sekolah Menengah Pertama di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriPendidikan,
            ],
            [
                'judul' => 'Jumlah Sekolah Menengah Atas',
                'nilai' => 2,
                'satuan' => 'Unit',
                'deskripsi' => 'Jumlah Sekolah Menengah Atas di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriPendidikan,
            ],
            [
                'judul' => 'Angka Partisipasi Sekolah',
                'nilai' => 98.5,
                'satuan' => '%',
                'deskripsi' => 'Angka partisipasi sekolah di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriPendidikan,
            ],
            [
                'judul' => 'Penduduk Berpendidikan SD',
                'nilai' => 2500,
                'satuan' => 'Jiwa',
                'deskripsi' => 'Jumlah penduduk dengan pendidikan terakhir SD',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriPendidikan,
            ],
            [
                'judul' => 'Penduduk Berpendidikan SMP',
                'nilai' => 2100,
                'satuan' => 'Jiwa',
                'deskripsi' => 'Jumlah penduduk dengan pendidikan terakhir SMP',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriPendidikan,
            ],
            [
                'judul' => 'Penduduk Berpendidikan SMA',
                'nilai' => 3200,
                'satuan' => 'Jiwa',
                'deskripsi' => 'Jumlah penduduk dengan pendidikan terakhir SMA',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriPendidikan,
            ],
            [
                'judul' => 'Penduduk Berpendidikan D3',
                'nilai' => 1200,
                'satuan' => 'Jiwa',
                'deskripsi' => 'Jumlah penduduk dengan pendidikan terakhir D3',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriPendidikan,
            ],
            [
                'judul' => 'Penduduk Berpendidikan S1',
                'nilai' => 2300,
                'satuan' => 'Jiwa',
                'deskripsi' => 'Jumlah penduduk dengan pendidikan terakhir S1',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriPendidikan,
            ],
            [
                'judul' => 'Penduduk Berpendidikan S2/S3',
                'nilai' => 450,
                'satuan' => 'Jiwa',
                'deskripsi' => 'Jumlah penduduk dengan pendidikan terakhir S2/S3',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriPendidikan,
            ],
            
            // Kesehatan
            [
                'judul' => 'Jumlah Puskesmas',
                'nilai' => 1,
                'satuan' => 'Unit',
                'deskripsi' => 'Jumlah Puskesmas di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriKesehatan,
            ],
            [
                'judul' => 'Jumlah Posyandu',
                'nilai' => 8,
                'satuan' => 'Unit',
                'deskripsi' => 'Jumlah Posyandu di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriKesehatan,
            ],
            [
                'judul' => 'Jumlah Dokter',
                'nilai' => 15,
                'satuan' => 'Orang',
                'deskripsi' => 'Jumlah dokter yang bertugas di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriKesehatan,
            ],
            [
                'judul' => 'Jumlah Bidan',
                'nilai' => 12,
                'satuan' => 'Orang',
                'deskripsi' => 'Jumlah bidan yang bertugas di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriKesehatan,
            ],
            [
                'judul' => 'Jumlah Balita Gizi Baik',
                'nilai' => 780,
                'satuan' => 'Anak',
                'deskripsi' => 'Jumlah balita dengan status gizi baik di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriKesehatan,
            ],
            [
                'judul' => 'Cakupan Imunisasi Dasar',
                'nilai' => 95.8,
                'satuan' => '%',
                'deskripsi' => 'Persentase cakupan imunisasi dasar lengkap di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriKesehatan,
            ],
            
            // Ekonomi
            [
                'judul' => 'Jumlah UMKM',
                'nilai' => 245,
                'satuan' => 'Unit',
                'deskripsi' => 'Jumlah Usaha Mikro, Kecil, dan Menengah di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriEkonomi,
            ],
            [
                'judul' => 'Pendapatan Asli Desa',
                'nilai' => 1250000000,
                'satuan' => 'Rupiah',
                'deskripsi' => 'Pendapatan Asli Desa Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriEkonomi,
            ],
            [
                'judul' => 'Jumlah Penduduk Bekerja',
                'nilai' => 7890,
                'satuan' => 'Jiwa',
                'deskripsi' => 'Jumlah penduduk yang bekerja di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriEkonomi,
            ],
            [
                'judul' => 'Jumlah Pengangguran',
                'nilai' => 450,
                'satuan' => 'Jiwa',
                'deskripsi' => 'Jumlah pengangguran di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriEkonomi,
            ],
            [
                'judul' => 'Tingkat Pengangguran',
                'nilai' => 5.4,
                'satuan' => '%',
                'deskripsi' => 'Tingkat pengangguran di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriEkonomi,
            ],
            
            // Sosial
            [
                'judul' => 'Jumlah Keluarga Prasejahtera',
                'nilai' => 320,
                'satuan' => 'KK',
                'deskripsi' => 'Jumlah keluarga prasejahtera di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriSosial,
            ],
            [
                'judul' => 'Jumlah Penerima Bantuan Sosial',
                'nilai' => 450,
                'satuan' => 'KK',
                'deskripsi' => 'Jumlah keluarga penerima bantuan sosial di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriSosial,
            ],
            [
                'judul' => 'Jumlah Kelompok Sosial',
                'nilai' => 25,
                'satuan' => 'Kelompok',
                'deskripsi' => 'Jumlah kelompok sosial/organisasi masyarakat di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriSosial,
            ],
            [
                'judul' => 'Jumlah Fasilitas Ibadah',
                'nilai' => 18,
                'satuan' => 'Unit',
                'deskripsi' => 'Jumlah fasilitas ibadah di Kelurahan Jelupang',
                'tahun' => 2023,
                'kategori_statistik_id' => $kategoriSosial,
            ],
        ];

        foreach ($statistik as $item) {
            Statistik::create($item);
        }
    }
}
