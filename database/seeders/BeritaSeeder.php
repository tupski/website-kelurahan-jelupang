<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendapatkan admin pertama
        $admin = Admin::first();

        if (!$admin) {
            // Jika tidak ada admin, buat admin baru
            $admin = Admin::create([
                'nama' => 'Administrator',
                'email' => 'admin@kelurahanjelupang.go.id',
                'password' => bcrypt('password'),
                'jabatan' => 'Administrator',
                'aktif' => true,
            ]);
        }

        $berita = [
            [
                'judul' => 'Peresmian Gedung Serbaguna Kelurahan Jelupang',
                'konten' => '<p>Kelurahan Jelupang, Serpong Utara - Walikota Tangerang Selatan meresmikan gedung serbaguna Kelurahan Jelupang pada hari Senin, 15 Mei 2023. Gedung serbaguna ini dibangun dengan anggaran sebesar Rp 2,5 miliar dan memiliki kapasitas hingga 500 orang.</p>
                <p>Dalam sambutannya, Walikota menyampaikan bahwa gedung serbaguna ini diharapkan dapat menjadi pusat kegiatan masyarakat Kelurahan Jelupang, baik untuk kegiatan sosial, budaya, maupun ekonomi.</p>
                <p>"Gedung ini adalah milik masyarakat Jelupang. Manfaatkan dengan sebaik-baiknya untuk berbagai kegiatan yang positif dan bermanfaat bagi warga," ujar Walikota.</p>
                <p>Gedung serbaguna ini dilengkapi dengan berbagai fasilitas modern, seperti sistem audio visual, pendingin ruangan, dan area parkir yang luas. Selain itu, gedung ini juga ramah bagi penyandang disabilitas dengan adanya akses khusus dan toilet yang disesuaikan.</p>
                <p>Lurah Jelupang, Bapak Ahmad Suparman, menyampaikan terima kasih atas perhatian Pemerintah Kota Tangerang Selatan terhadap pembangunan di Kelurahan Jelupang. "Kami berkomitmen untuk merawat dan mengelola gedung ini dengan baik agar dapat memberikan manfaat maksimal bagi masyarakat," ujarnya.</p>
                <p>Peresmian gedung serbaguna ini dihadiri oleh berbagai pihak, termasuk anggota DPRD, camat, tokoh masyarakat, dan warga Kelurahan Jelupang. Acara peresmian dimeriahkan dengan berbagai penampilan seni dan budaya dari warga setempat.</p>',
                'gambar' => 'berita/gedung-serbaguna.jpg',
                'dipublikasikan' => true,
            ],
            [
                'judul' => 'Program Vaksinasi COVID-19 di Kelurahan Jelupang',
                'konten' => '<p>Kelurahan Jelupang, Serpong Utara - Program vaksinasi COVID-19 di Kelurahan Jelupang telah mencapai target 90% dari total penduduk yang telah menerima dosis lengkap. Pencapaian ini merupakan hasil kerja keras dari seluruh pihak terkait, termasuk petugas kesehatan, kader posyandu, dan relawan.</p>
                <p>Lurah Jelupang, Bapak Ahmad Suparman, menyampaikan apresiasi kepada seluruh warga yang telah berpartisipasi dalam program vaksinasi ini. "Kami berterima kasih kepada seluruh warga yang telah mendukung program vaksinasi. Ini adalah langkah penting dalam upaya kita melawan pandemi COVID-19," ujarnya.</p>
                <p>Program vaksinasi di Kelurahan Jelupang dilaksanakan di berbagai lokasi, termasuk Puskesmas Jelupang, balai kelurahan, dan pos-pos vaksinasi yang didirikan di setiap RW. Untuk memudahkan warga lansia dan penyandang disabilitas, petugas kesehatan juga melakukan vaksinasi door-to-door.</p>
                <p>Dr. Siti Aminah, Kepala Puskesmas Jelupang, menjelaskan bahwa meskipun telah mencapai target 90%, program vaksinasi akan terus dilanjutkan untuk mencapai cakupan yang lebih luas. "Kami juga akan fokus pada vaksinasi booster untuk meningkatkan perlindungan terhadap varian baru COVID-19," jelasnya.</p>
                <p>Warga Kelurahan Jelupang yang belum mendapatkan vaksinasi dapat mendaftar melalui aplikasi PeduliLindungi atau datang langsung ke Puskesmas Jelupang dengan membawa KTP. Layanan vaksinasi tersedia setiap hari Senin hingga Jumat, pukul 08.00-15.00 WIB.</p>',
                'gambar' => 'berita/vaksinasi-covid.jpg',
                'dipublikasikan' => true,
            ],
            [
                'judul' => 'Pelatihan UMKM Digital untuk Warga Kelurahan Jelupang',
                'konten' => '<p>Kelurahan Jelupang, Serpong Utara - Sebanyak 50 pelaku UMKM di Kelurahan Jelupang mengikuti pelatihan UMKM Digital yang diselenggarakan oleh Dinas Koperasi dan UMKM Kota Tangerang Selatan bekerjasama dengan salah satu marketplace terkemuka di Indonesia. Pelatihan ini berlangsung selama dua hari, 20-21 Juni 2023, di Gedung Serbaguna Kelurahan Jelupang.</p>
                <p>Pelatihan ini bertujuan untuk meningkatkan kapasitas pelaku UMKM dalam memanfaatkan teknologi digital untuk mengembangkan usaha mereka. Materi yang diberikan meliputi pengenalan e-commerce, strategi pemasaran digital, fotografi produk, dan manajemen keuangan digital.</p>
                <p>"Di era digital seperti sekarang, pelaku UMKM harus mampu beradaptasi dengan perkembangan teknologi. Pelatihan ini diharapkan dapat membantu mereka untuk memperluas pasar dan meningkatkan omzet," ujar Kepala Dinas Koperasi dan UMKM Kota Tangerang Selatan.</p>
                <p>Salah satu peserta, Ibu Maryam yang memiliki usaha keripik pisang, mengaku sangat terbantu dengan adanya pelatihan ini. "Selama ini saya hanya menjual produk di warung-warung sekitar rumah. Setelah mengikuti pelatihan ini, saya jadi tahu cara menjual produk secara online dan menjangkau lebih banyak pembeli," ungkapnya.</p>
                <p>Lurah Jelupang, Bapak Ahmad Suparman, menyampaikan bahwa pihaknya akan terus mendukung pengembangan UMKM di wilayahnya. "Kami akan memfasilitasi pelaku UMKM untuk mendapatkan berbagai pelatihan dan pendampingan. Kami juga akan membantu mereka dalam proses perizinan dan sertifikasi produk," jelasnya.</p>
                <p>Setelah pelatihan, para peserta akan mendapatkan pendampingan selama tiga bulan untuk memastikan mereka dapat mengimplementasikan pengetahuan yang telah diperoleh. Mereka juga akan dibantu untuk membuka toko online di marketplace dan mengoptimalkan penjualan mereka.</p>',
                'gambar' => 'berita/pelatihan-umkm.jpg',
                'dipublikasikan' => true,
            ],
            [
                'judul' => 'Kelurahan Jelupang Raih Penghargaan Kelurahan Terbersih',
                'konten' => '<p>Kelurahan Jelupang, Serpong Utara - Kelurahan Jelupang berhasil meraih penghargaan sebagai Kelurahan Terbersih dalam ajang Lomba Kebersihan Lingkungan Tingkat Kota Tangerang Selatan tahun 2023. Penghargaan ini diserahkan langsung oleh Walikota Tangerang Selatan kepada Lurah Jelupang dalam acara peringatan Hari Lingkungan Hidup Sedunia pada tanggal 5 Juni 2023.</p>
                <p>Kelurahan Jelupang dinilai berhasil menerapkan program pengelolaan sampah terpadu yang melibatkan partisipasi aktif dari seluruh warga. Program ini meliputi pemilahan sampah dari sumbernya, pengomposan sampah organik, dan daur ulang sampah anorganik.</p>
                <p>"Penghargaan ini adalah hasil kerja keras seluruh warga Kelurahan Jelupang yang telah berkomitmen untuk menjaga kebersihan lingkungan. Kami akan terus meningkatkan program pengelolaan sampah agar lingkungan kita semakin bersih dan sehat," ujar Lurah Jelupang, Bapak Ahmad Suparman.</p>
                <p>Salah satu program unggulan Kelurahan Jelupang adalah Bank Sampah yang telah beroperasi sejak tahun 2020. Bank Sampah ini telah berhasil mengumpulkan dan mendaur ulang lebih dari 10 ton sampah anorganik setiap bulannya. Selain itu, Kelurahan Jelupang juga memiliki program "Jumat Bersih" di mana seluruh warga bergotong royong membersihkan lingkungan sekitar.</p>
                <p>Ketua RT 03 RW 05, Bapak Hendra, menyampaikan bahwa kesadaran warga untuk menjaga kebersihan semakin meningkat. "Dulu banyak warga yang membuang sampah sembarangan, tapi sekarang hampir tidak ada lagi. Semua warga sudah paham pentingnya membuang sampah pada tempatnya dan memilah sampah," ungkapnya.</p>
                <p>Dengan penghargaan ini, Kelurahan Jelupang berhak mewakili Kota Tangerang Selatan dalam Lomba Kebersihan Lingkungan Tingkat Provinsi Banten yang akan diselenggarakan pada bulan Agustus 2023.</p>',
                'gambar' => 'berita/penghargaan-kebersihan.jpg',
                'dipublikasikan' => true,
            ],
            [
                'judul' => 'Pembukaan Taman Baca Masyarakat di Kelurahan Jelupang',
                'konten' => '<p>Kelurahan Jelupang, Serpong Utara - Taman Baca Masyarakat (TBM) "Cerdas Jelupang" resmi dibuka pada hari Sabtu, 8 Juli 2023. TBM yang berlokasi di Balai Kelurahan Jelupang ini merupakan hasil kerjasama antara Pemerintah Kelurahan Jelupang dengan Perpustakaan Daerah Kota Tangerang Selatan dan beberapa donatur buku.</p>
                <p>TBM "Cerdas Jelupang" memiliki koleksi lebih dari 2.000 judul buku yang terdiri dari berbagai kategori, seperti buku anak, novel, buku pengetahuan umum, buku agama, dan buku keterampilan. TBM ini juga dilengkapi dengan area membaca yang nyaman, komputer dengan akses internet, dan area bermain untuk anak-anak.</p>
                <p>"Kami berharap TBM ini dapat menjadi pusat literasi dan pembelajaran bagi warga Kelurahan Jelupang. Dengan adanya TBM ini, kami ingin meningkatkan minat baca dan pengetahuan warga, terutama anak-anak dan remaja," ujar Lurah Jelupang, Bapak Ahmad Suparman.</p>
                <p>Kepala Perpustakaan Daerah Kota Tangerang Selatan, Ibu Dewi Kartika, menyampaikan bahwa pihaknya akan terus mendukung pengembangan TBM di Kelurahan Jelupang. "Kami akan secara berkala menambah koleksi buku dan memberikan pelatihan kepada pengelola TBM agar dapat memberikan layanan yang optimal kepada masyarakat," jelasnya.</p>
                <p>TBM "Cerdas Jelupang" akan buka setiap hari Senin hingga Sabtu, pukul 09.00-17.00 WIB. Warga Kelurahan Jelupang dapat menjadi anggota TBM secara gratis dengan menunjukkan KTP atau kartu pelajar. Anggota TBM dapat meminjam buku maksimal 2 judul selama 1 minggu.</p>
                <p>Selain menyediakan layanan peminjaman buku, TBM "Cerdas Jelupang" juga akan menyelenggarakan berbagai kegiatan, seperti dongeng untuk anak-anak, diskusi buku, dan pelatihan keterampilan. Kegiatan-kegiatan ini akan diumumkan melalui papan pengumuman di TBM dan media sosial Kelurahan Jelupang.</p>',
                'gambar' => 'berita/taman-baca.jpg',
                'dipublikasikan' => true,
            ],
        ];

        foreach ($berita as $item) {
            Berita::create([
                'judul' => $item['judul'],
                'slug' => Str::slug($item['judul']),
                'konten' => $item['konten'],
                'gambar' => $item['gambar'],
                'admin_id' => $admin->id,
                'pengguna_id' => 1, // Menggunakan ID pengguna pertama
                'dipublikasikan' => $item['dipublikasikan'],
            ]);
        }
    }
}
