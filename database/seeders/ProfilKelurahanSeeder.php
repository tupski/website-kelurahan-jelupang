<?php

namespace Database\Seeders;

use App\Models\ProfilKelurahan;
use Illuminate\Database\Seeder;

class ProfilKelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfilKelurahan::create([
            'nama_kelurahan' => 'Jelupang',
            'kecamatan' => 'Serpong Utara',
            'kabupaten_kota' => 'Kota Tangerang Selatan',
            'provinsi' => 'Banten',
            'kode_pos' => '15310',
            'sejarah' => '<p>Kelurahan Jelupang merupakan salah satu kelurahan yang berada di Kecamatan Serpong Utara, Kota Tangerang Selatan, Provinsi Banten. Kelurahan ini terbentuk pada tahun 2008 seiring dengan pembentukan Kota Tangerang Selatan sebagai pemekaran dari Kabupaten Tangerang.</p>
            <p>Nama "Jelupang" berasal dari bahasa Sunda yang berarti "tempat berkumpul" atau "tempat pertemuan". Konon, pada zaman dahulu, daerah ini merupakan tempat berkumpulnya para pedagang dan petani dari berbagai daerah untuk melakukan transaksi jual beli hasil pertanian dan kerajinan.</p>
            <p>Sebelum menjadi kelurahan, Jelupang merupakan sebuah desa yang mayoritas penduduknya bermata pencaharian sebagai petani dan pengrajin. Seiring dengan perkembangan zaman dan pembangunan yang pesat di wilayah Tangerang Selatan, Jelupang kini telah bertransformasi menjadi kawasan pemukiman modern dengan berbagai fasilitas publik yang memadai.</p>
            <p>Meskipun telah mengalami modernisasi, Kelurahan Jelupang tetap menjaga nilai-nilai budaya dan kearifan lokal yang telah diwariskan secara turun-temurun. Berbagai tradisi dan kesenian tradisional masih dilestarikan oleh masyarakat setempat, seperti upacara adat, kesenian pencak silat, dan kesenian tradisional lainnya.</p>
            <p>Saat ini, Kelurahan Jelupang terus berkembang menjadi salah satu kelurahan yang maju dan mandiri di Kota Tangerang Selatan. Dengan dukungan dari pemerintah dan partisipasi aktif dari masyarakat, Kelurahan Jelupang terus berupaya meningkatkan kualitas hidup warganya melalui berbagai program pembangunan dan pemberdayaan masyarakat.</p>',
            'visi' => 'Terwujudnya Kelurahan Jelupang yang maju, mandiri, dan sejahtera berbasis partisipasi masyarakat.',
            'misi' => '<ol>
                <li>Meningkatkan kualitas pelayanan publik yang profesional, transparan, dan akuntabel.</li>
                <li>Meningkatkan pembangunan infrastruktur yang merata dan berkelanjutan.</li>
                <li>Meningkatkan kualitas sumber daya manusia melalui pendidikan dan kesehatan.</li>
                <li>Mengembangkan ekonomi lokal berbasis potensi daerah dan pemberdayaan masyarakat.</li>
                <li>Memperkuat kelembagaan masyarakat dan partisipasi warga dalam pembangunan.</li>
                <li>Melestarikan nilai-nilai budaya dan kearifan lokal.</li>
            </ol>',
            'telepon' => '(021) 1234-5678',
            'email' => 'info@kelurahanjelupang.go.id',
            'website' => 'www.kelurahanjelupang.go.id',
            'alamat' => 'Jl. Raya Jelupang No. 123, Serpong Utara, Tangerang Selatan, Banten 15310',
            'logo' => 'images/logo.png',
            'galeri' => json_encode([
                'images/galeri/kantor-kelurahan.jpg',
                'images/galeri/kegiatan-posyandu.jpg',
                'images/galeri/gotong-royong.jpg',
                'images/galeri/pelatihan-umkm.jpg',
                'images/galeri/upacara-bendera.jpg',
            ]),
            'struktur_organisasi' => json_encode([
                [
                    'nama' => 'Ahmad Suparman',
                    'jabatan' => 'Lurah',
                    'foto' => 'images/struktur/lurah.jpg',
                ],
                [
                    'nama' => 'Siti Aminah',
                    'jabatan' => 'Sekretaris Lurah',
                    'foto' => 'images/struktur/sekretaris.jpg',
                ],
                [
                    'nama' => 'Budi Santoso',
                    'jabatan' => 'Kasi Pemerintahan',
                    'foto' => 'images/struktur/kasi-pemerintahan.jpg',
                ],
                [
                    'nama' => 'Dewi Kartika',
                    'jabatan' => 'Kasi Kesejahteraan Rakyat',
                    'foto' => 'images/struktur/kasi-kesra.jpg',
                ],
                [
                    'nama' => 'Hendra Wijaya',
                    'jabatan' => 'Kasi Ekonomi dan Pembangunan',
                    'foto' => 'images/struktur/kasi-ekbang.jpg',
                ],
                [
                    'nama' => 'Rina Mardiana',
                    'jabatan' => 'Kasi Ketentraman dan Ketertiban',
                    'foto' => 'images/struktur/kasi-trantib.jpg',
                ],
            ]),
        ]);
    }
}
