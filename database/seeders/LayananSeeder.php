<?php

namespace Database\Seeders;

use App\Models\KategoriLayanan;
use App\Models\Layanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendapatkan ID kategori
        $kategoriAdministrasi = KategoriLayanan::where('nama', 'Administrasi Kependudukan')->first()->id;
        $kategoriPerizinan = KategoriLayanan::where('nama', 'Perizinan')->first()->id;
        $kategoriKesehatan = KategoriLayanan::where('nama', 'Kesehatan')->first()->id;
        $kategoriPendidikan = KategoriLayanan::where('nama', 'Pendidikan')->first()->id;
        $kategoriSosial = KategoriLayanan::where('nama', 'Sosial')->first()->id;

        $layanan = [
            // Administrasi Kependudukan
            [
                'nama' => 'Surat Keterangan Pindah',
                'deskripsi' => 'Surat keterangan untuk warga yang akan pindah domisili ke daerah lain. Dokumen ini diperlukan sebagai syarat untuk mengurus administrasi di tempat tujuan.',
                'ikon' => 'bi-box-arrow-right',
                'kategori_layanan_id' => $kategoriAdministrasi,
                'persyaratan' => "<ul>
                    <li>Kartu Tanda Penduduk (KTP) asli dan fotokopi</li>
                    <li>Kartu Keluarga (KK) asli dan fotokopi</li>
                    <li>Surat Pengantar RT/RW</li>
                    <li>Pas Foto 3x4 (2 lembar)</li>
                    <li>Materai 10.000 untuk surat pernyataan</li>
                </ul>",
                'jam_layanan' => '08:00-11:00',
                'lokasi' => 'Kelurahan Jelupang',
                'aktif' => true,
            ],
            [
                'nama' => 'Surat Keterangan Tidak Mampu',
                'deskripsi' => 'Surat keterangan yang menyatakan bahwa seseorang termasuk dalam kategori keluarga tidak mampu. Dokumen ini dapat digunakan untuk berbagai keperluan seperti pengajuan bantuan sosial, keringanan biaya pendidikan, atau layanan kesehatan.',
                'ikon' => 'bi-file-earmark-text',
                'kategori_layanan_id' => $kategoriAdministrasi,
                'persyaratan' => "<ul>
                    <li>Kartu Tanda Penduduk (KTP) asli dan fotokopi</li>
                    <li>Kartu Keluarga (KK) asli dan fotokopi</li>
                    <li>Surat Pengantar RT/RW</li>
                    <li>Surat Pernyataan Tidak Mampu</li>
                </ul>",
                'jam_layanan' => '09:00-15:00',
                'lokasi' => 'Kelurahan Jelupang',
                'aktif' => true,
            ],
            [
                'nama' => 'Surat Keterangan Kematian',
                'deskripsi' => 'Surat keterangan yang menyatakan bahwa seseorang telah meninggal dunia. Dokumen ini diperlukan untuk berbagai keperluan administratif seperti pengurusan asuransi, pensiun, atau warisan.',
                'ikon' => 'bi-file-earmark-medical',
                'kategori_layanan_id' => $kategoriAdministrasi,
                'persyaratan' => "<ul>
                    <li>Kartu Tanda Penduduk (KTP) almarhum/almarhumah</li>
                    <li>Kartu Keluarga (KK) almarhum/almarhumah</li>
                    <li>Surat Pengantar RT/RW</li>
                    <li>Surat Keterangan dari Rumah Sakit/Puskesmas (jika meninggal di fasilitas kesehatan)</li>
                    <li>KTP pelapor</li>
                </ul>",
                'jam_layanan' => '08:00-16:00',
                'lokasi' => 'Kelurahan Jelupang',
                'aktif' => true,
            ],
            
            // Perizinan
            [
                'nama' => 'Surat Izin Usaha',
                'deskripsi' => 'Surat izin untuk mendirikan dan menjalankan usaha di wilayah Kelurahan Jelupang. Dokumen ini diperlukan sebagai legalitas usaha dan syarat untuk mengakses berbagai layanan perbankan atau kerjasama bisnis.',
                'ikon' => 'bi-shop',
                'kategori_layanan_id' => $kategoriPerizinan,
                'persyaratan' => "<ul>
                    <li>Kartu Tanda Penduduk (KTP) pemilik usaha</li>
                    <li>Kartu Keluarga (KK) pemilik usaha</li>
                    <li>Surat Pengantar RT/RW</li>
                    <li>Surat Pernyataan tidak keberatan dari tetangga</li>
                    <li>Pas Foto 3x4 (2 lembar)</li>
                    <li>Materai 10.000 (2 lembar)</li>
                    <li>Bukti kepemilikan/sewa tempat usaha</li>
                </ul>",
                'jam_layanan' => '08:00-15:00',
                'lokasi' => 'Kelurahan Jelupang',
                'aktif' => true,
            ],
            [
                'nama' => 'Surat Izin Keramaian',
                'deskripsi' => 'Surat izin untuk menyelenggarakan acara atau kegiatan yang melibatkan banyak orang di wilayah Kelurahan Jelupang. Dokumen ini diperlukan untuk menjaga ketertiban dan keamanan lingkungan.',
                'ikon' => 'bi-people-fill',
                'kategori_layanan_id' => $kategoriPerizinan,
                'persyaratan' => "<ul>
                    <li>Kartu Tanda Penduduk (KTP) penyelenggara</li>
                    <li>Surat Pengantar RT/RW</li>
                    <li>Proposal kegiatan</li>
                    <li>Surat pernyataan tanggung jawab</li>
                    <li>Materai 10.000</li>
                    <li>Izin dari kepolisian setempat</li>
                </ul>",
                'jam_layanan' => '08:00-15:00',
                'lokasi' => 'Kelurahan Jelupang',
                'aktif' => true,
            ],
            
            // Kesehatan
            [
                'nama' => 'Pemeriksaan Kesehatan Gratis',
                'deskripsi' => 'Layanan pemeriksaan kesehatan dasar secara gratis untuk warga Kelurahan Jelupang. Layanan ini meliputi pemeriksaan tekanan darah, gula darah, dan konsultasi kesehatan umum.',
                'ikon' => 'bi-heart-pulse',
                'kategori_layanan_id' => $kategoriKesehatan,
                'persyaratan' => "<ul>
                    <li>Kartu Tanda Penduduk (KTP) Kelurahan Jelupang</li>
                    <li>Kartu Keluarga (KK)</li>
                </ul>",
                'jam_layanan' => '08:00-12:00',
                'lokasi' => 'Puskesmas Jelupang',
                'aktif' => true,
            ],
            [
                'nama' => 'Posyandu Balita',
                'deskripsi' => 'Layanan kesehatan terpadu untuk balita yang meliputi pemantauan pertumbuhan, imunisasi, dan konsultasi gizi. Layanan ini bertujuan untuk memastikan tumbuh kembang optimal bagi balita di Kelurahan Jelupang.',
                'ikon' => 'bi-person-arms-up',
                'kategori_layanan_id' => $kategoriKesehatan,
                'persyaratan' => "<ul>
                    <li>Kartu Keluarga (KK)</li>
                    <li>Buku KIA (Kesehatan Ibu dan Anak)</li>
                </ul>",
                'jam_layanan' => '08:00-11:00',
                'lokasi' => 'Balai Kelurahan Jelupang',
                'aktif' => true,
            ],
            
            // Pendidikan
            [
                'nama' => 'Bimbingan Belajar',
                'deskripsi' => 'Layanan bimbingan belajar gratis untuk siswa SD dan SMP di Kelurahan Jelupang. Program ini bertujuan untuk membantu meningkatkan prestasi akademik siswa, terutama dari keluarga kurang mampu.',
                'ikon' => 'bi-book',
                'kategori_layanan_id' => $kategoriPendidikan,
                'persyaratan' => "<ul>
                    <li>Kartu pelajar</li>
                    <li>Kartu Keluarga (KK)</li>
                    <li>Surat keterangan dari sekolah</li>
                </ul>",
                'jam_layanan' => '15:00-17:00',
                'lokasi' => 'Balai Kelurahan Jelupang',
                'aktif' => true,
            ],
            [
                'nama' => 'Beasiswa Pendidikan',
                'deskripsi' => 'Program beasiswa untuk siswa berprestasi dari keluarga kurang mampu di Kelurahan Jelupang. Beasiswa ini mencakup bantuan biaya pendidikan dan perlengkapan sekolah.',
                'ikon' => 'bi-mortarboard',
                'kategori_layanan_id' => $kategoriPendidikan,
                'persyaratan' => "<ul>
                    <li>Kartu pelajar</li>
                    <li>Kartu Keluarga (KK)</li>
                    <li>Rapor 2 semester terakhir</li>
                    <li>Surat Keterangan Tidak Mampu</li>
                    <li>Surat rekomendasi dari sekolah</li>
                </ul>",
                'jam_layanan' => '08:00-15:00',
                'lokasi' => 'Kelurahan Jelupang',
                'aktif' => true,
            ],
            
            // Sosial
            [
                'nama' => 'Bantuan Sembako',
                'deskripsi' => 'Program bantuan sembako untuk keluarga kurang mampu di Kelurahan Jelupang. Bantuan ini berupa paket sembako yang berisi beras, minyak goreng, gula, dan kebutuhan pokok lainnya.',
                'ikon' => 'bi-basket',
                'kategori_layanan_id' => $kategoriSosial,
                'persyaratan' => "<ul>
                    <li>Kartu Tanda Penduduk (KTP)</li>
                    <li>Kartu Keluarga (KK)</li>
                    <li>Surat Keterangan Tidak Mampu</li>
                </ul>",
                'jam_layanan' => '09:00-14:00',
                'lokasi' => 'Balai Kelurahan Jelupang',
                'aktif' => true,
            ],
            [
                'nama' => 'Santunan Lansia',
                'deskripsi' => 'Program santunan untuk lansia kurang mampu di Kelurahan Jelupang. Santunan ini berupa bantuan finansial dan paket sembako yang diberikan secara berkala.',
                'ikon' => 'bi-person-standing',
                'kategori_layanan_id' => $kategoriSosial,
                'persyaratan' => "<ul>
                    <li>Kartu Tanda Penduduk (KTP)</li>
                    <li>Kartu Keluarga (KK)</li>
                    <li>Surat Keterangan Tidak Mampu</li>
                    <li>Usia minimal 60 tahun</li>
                </ul>",
                'jam_layanan' => '08:00-12:00',
                'lokasi' => 'Balai Kelurahan Jelupang',
                'aktif' => true,
            ],
        ];

        foreach ($layanan as $item) {
            Layanan::create([
                'nama' => $item['nama'],
                'slug' => Str::slug($item['nama']),
                'deskripsi' => $item['deskripsi'],
                'ikon' => $item['ikon'],
                'kategori_layanan_id' => $item['kategori_layanan_id'],
                'persyaratan' => $item['persyaratan'],
                'jam_layanan' => $item['jam_layanan'],
                'lokasi' => $item['lokasi'],
                'aktif' => $item['aktif'],
            ]);
        }
    }
}
