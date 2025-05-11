# Website Kelurahan Jelupang

Website resmi Kelurahan Jelupang yang dibangun menggunakan Laravel 12. Website ini menyediakan informasi tentang Kelurahan Jelupang, berita terkini, layanan, UMKM, dan statistik.

## Fitur

- **Beranda**: Halaman utama dengan informasi terkini dan penting
- **Profil**: Informasi tentang Kelurahan Jelupang, visi misi, struktur organisasi, dan kontak
- **Berita**: Berita dan pengumuman terkini dari Kelurahan Jelupang
- **UMKM**: Daftar dan informasi UMKM yang ada di Kelurahan Jelupang
- **Layanan**: Informasi tentang layanan yang disediakan oleh Kelurahan Jelupang
- **Statistik**: Data statistik Kelurahan Jelupang

## Teknologi

- **Framework**: Laravel 12
- **Database**: MySQL
- **Frontend**: Bootstrap 5
- **Autentikasi**: Laravel Breeze (dimodifikasi)

## Persyaratan Sistem

- PHP >= 8.2
- MySQL >= 5.7
- Composer
- Web Server (Apache/Nginx)

## Instalasi

1. Clone repository
   ```bash
   git clone https://github.com/tupski/website-kelurahan-jelupang.git
   cd website-kelurahan-jelupang
   ```

2. Install dependensi
   ```bash
   composer install
   ```

3. Salin file .env.example menjadi .env
   ```bash
   cp .env.example .env
   ```

4. Generate application key
   ```bash
   php artisan key:generate
   ```

5. Konfigurasi database di file .env
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=kelurahandb
   DB_USERNAME=root
   DB_PASSWORD=mysql
   ```

6. Jalankan migrasi dan seeder
   ```bash
   php artisan migrate:fresh --seed
   ```

7. Buat symbolic link untuk storage
   ```bash
   php artisan storage:link
   ```

8. Jalankan server development
   ```bash
   php artisan serve
   ```

9. Akses website melalui browser
   ```
   http://localhost:8000
   ```

## Akses Admin

Untuk mengakses panel admin, gunakan kredensial berikut:

- URL: `http://localhost:8000/admin/login`
- Email: `admin@kelurahanjelupang.go.id`
- Password: `admin123`

## Struktur Folder

- `app/` - Berisi kode aplikasi
- `app/Http/Controllers/` - Controller untuk menangani request
- `app/Models/` - Model database
- `config/` - File konfigurasi
- `database/` - Migrasi dan seeder database
- `public/` - File publik (CSS, JS, gambar)
- `resources/` - View, file bahasa, dan aset yang belum dikompilasi
- `routes/` - Definisi route
- `storage/` - File yang diupload, cache, dan log

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan ikuti langkah-langkah berikut:

1. Fork repository
2. Buat branch fitur baru (`git checkout -b fitur-baru`)
3. Commit perubahan Anda (`git commit -m 'Menambahkan fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request

## Lisensi

Hak Cipta © 2025 Kelurahan Jelupang. Seluruh hak dilindungi undang-undang.
