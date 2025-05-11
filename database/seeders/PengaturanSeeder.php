<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pengaturan Umum
        Pengaturan::set('nama_situs', 'Kelurahan Jelupang', 'umum', 'Nama Situs', 'text');
        Pengaturan::set('deskripsi_situs', 'Website Resmi Kelurahan Jelupang, Kecamatan Serpong Utara, Kota Tangerang Selatan', 'umum', 'Deskripsi Situs', 'textarea');
        Pengaturan::set('alamat_kelurahan', 'Jl. Raya Jelupang No. 123, Serpong Utara, Tangerang Selatan, Banten 15310', 'umum', 'Alamat Kelurahan', 'textarea');
        Pengaturan::set('telepon', '(021) 1234-5678', 'umum', 'Telepon', 'text');
        Pengaturan::set('email', 'info@kelurahanjelupang.go.id', 'umum', 'Email', 'text');
        Pengaturan::set('jam_operasional', 'Senin - Jumat: 08.00 - 16.00 WIB', 'umum', 'Jam Operasional', 'text');

        // Pengaturan Tampilan
        Pengaturan::set('logo', 'images/logo.png', 'tampilan', 'Logo', 'image');
        Pengaturan::set('favicon', 'images/favicon.ico', 'tampilan', 'Favicon', 'image');
        Pengaturan::set('warna_utama', '#198754', 'tampilan', 'Warna Utama', 'color');
        Pengaturan::set('warna_sekunder', '#343a40', 'tampilan', 'Warna Sekunder', 'color');
        Pengaturan::set('footer_text', '© ' . date('Y') . ' Kelurahan Jelupang. Hak Cipta Dilindungi.', 'tampilan', 'Teks Footer', 'text');

        // Pengaturan Media Sosial
        Pengaturan::set('facebook', 'https://facebook.com/kelurahanjelupang', 'media_sosial', 'Facebook', 'text');
        Pengaturan::set('twitter', 'https://twitter.com/kelurahanjelupang', 'media_sosial', 'Twitter', 'text');
        Pengaturan::set('instagram', 'https://instagram.com/kelurahanjelupang', 'media_sosial', 'Instagram', 'text');
        Pengaturan::set('youtube', 'https://youtube.com/kelurahanjelupang', 'media_sosial', 'YouTube', 'text');

        // Pengaturan SEO
        Pengaturan::set('meta_keywords', 'kelurahan jelupang, serpong utara, tangerang selatan, banten, pelayanan publik', 'seo', 'Meta Keywords', 'textarea');
        Pengaturan::set('meta_description', 'Website Resmi Kelurahan Jelupang, Kecamatan Serpong Utara, Kota Tangerang Selatan. Melayani berbagai kebutuhan administrasi dan informasi warga.', 'seo', 'Meta Description', 'textarea');
        Pengaturan::set('google_analytics', '', 'seo', 'Google Analytics ID', 'text');

        // Pengaturan Menu
        $menuUtama = [
            [
                'nama' => 'Beranda',
                'url' => '/',
                'icon' => 'bi-house-door',
                'urutan' => 1,
                'parent_id' => null,
                'aktif' => true
            ],
            [
                'nama' => 'Profil',
                'url' => '/profil',
                'icon' => 'bi-info-circle',
                'urutan' => 2,
                'parent_id' => null,
                'aktif' => true
            ],
            [
                'nama' => 'Berita',
                'url' => '/berita',
                'icon' => 'bi-newspaper',
                'urutan' => 3,
                'parent_id' => null,
                'aktif' => true
            ],
            [
                'nama' => 'UMKM',
                'url' => '/umkm',
                'icon' => 'bi-shop',
                'urutan' => 4,
                'parent_id' => null,
                'aktif' => true
            ],
            [
                'nama' => 'Layanan',
                'url' => '/layanan',
                'icon' => 'bi-file-earmark-text',
                'urutan' => 5,
                'parent_id' => null,
                'aktif' => true
            ],
            [
                'nama' => 'Statistik',
                'url' => '/statistik',
                'icon' => 'bi-bar-chart',
                'urutan' => 6,
                'parent_id' => null,
                'aktif' => true
            ],
            [
                'nama' => 'Kontak',
                'url' => '/kontak',
                'icon' => 'bi-envelope',
                'urutan' => 7,
                'parent_id' => null,
                'aktif' => true
            ]
        ];

        Pengaturan::set('menu_utama', json_encode($menuUtama), 'menu', 'Menu Utama', 'json');

        // Menu Footer
        $menuFooter = [
            [
                'nama' => 'Beranda',
                'url' => '/',
                'urutan' => 1,
                'aktif' => true
            ],
            [
                'nama' => 'Profil',
                'url' => '/profil',
                'urutan' => 2,
                'aktif' => true
            ],
            [
                'nama' => 'Berita',
                'url' => '/berita',
                'urutan' => 3,
                'aktif' => true
            ],
            [
                'nama' => 'Kontak',
                'url' => '/kontak',
                'urutan' => 4,
                'aktif' => true
            ],
            [
                'nama' => 'Kebijakan Privasi',
                'url' => '/kebijakan-privasi',
                'urutan' => 5,
                'aktif' => true
            ]
        ];

        Pengaturan::set('menu_footer', json_encode($menuFooter), 'menu', 'Menu Footer', 'json');

        // Menu Mobile
        $menuMobile = [
            [
                'nama' => 'Beranda',
                'url' => '/',
                'icon' => 'bi-house-door',
                'urutan' => 1,
                'aktif' => true
            ],
            [
                'nama' => 'Berita',
                'url' => '/berita',
                'icon' => 'bi-newspaper',
                'urutan' => 2,
                'aktif' => true
            ],
            [
                'nama' => 'UMKM',
                'url' => '/umkm',
                'icon' => 'bi-shop',
                'urutan' => 3,
                'aktif' => true
            ],
            [
                'nama' => 'Layanan',
                'url' => '/layanan',
                'icon' => 'bi-file-earmark-text',
                'urutan' => 4,
                'aktif' => true
            ],
            [
                'nama' => 'Profil',
                'url' => '/profil',
                'icon' => 'bi-info-circle',
                'urutan' => 5,
                'aktif' => true
            ]
        ];

        Pengaturan::set('menu_mobile', json_encode($menuMobile), 'menu', 'Menu Mobile', 'json');
    }
}
