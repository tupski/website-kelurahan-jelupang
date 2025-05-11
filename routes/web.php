<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\UMKMController as AdminUMKMController;
use App\Http\Controllers\Admin\LayananController as AdminLayananController;
use App\Http\Controllers\Admin\StatistikController as AdminStatistikController;
use App\Http\Controllers\Admin\ProfilController as AdminProfilController;
use Illuminate\Support\Facades\Route;

// Rute Publik
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// Rute Profil
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/profil/sejarah', [ProfilController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/profil/visi-misi', [ProfilController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('/profil/struktur-organisasi', [ProfilController::class, 'strukturOrganisasi'])->name('profil.struktur-organisasi');
Route::get('/profil/kontak', [ProfilController::class, 'kontak'])->name('profil.kontak');

// Rute Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.detail');

// Rute UMKM
Route::get('/umkm', [UMKMController::class, 'index'])->name('umkm');
Route::get('/umkm/kategori/{slug}', [UMKMController::class, 'kategori'])->name('umkm.kategori');
Route::get('/umkm/{slug}', [UMKMController::class, 'show'])->name('umkm.detail');

// Rute Layanan
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/layanan/kategori/{slug}', [LayananController::class, 'kategori'])->name('layanan.kategori');
Route::get('/layanan/{slug}', [LayananController::class, 'show'])->name('layanan.detail');

// Rute Statistik
Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik');
Route::get('/statistik/kategori/{kategori}', [StatistikController::class, 'kategori'])->name('statistik.kategori');

// Rute Dashboard Admin
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Rute Admin Berita
    Route::resource('berita', AdminBeritaController::class);

    // Rute Admin UMKM
    Route::resource('umkm', AdminUMKMController::class);
    Route::resource('umkm-kategori', AdminUMKMController::class);

    // Rute Admin Layanan
    Route::resource('layanan', AdminLayananController::class);
    Route::resource('layanan-kategori', AdminLayananController::class);

    // Rute Admin Statistik
    Route::resource('statistik', AdminStatistikController::class);

    // Rute Admin Profil
    Route::get('/profil', [AdminProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [AdminProfilController::class, 'update'])->name('profil.update');

    // Rute Admin Pengaturan
    Route::get('/pengaturan/{grup?}', [PengaturanController::class, 'index'])->name('pengaturan.index');
    Route::post('/pengaturan', [PengaturanController::class, 'update'])->name('pengaturan.update');

    // Rute Admin Pengaturan Menu
    Route::get('/pengaturan/menu/{tipe?}', [PengaturanController::class, 'menu'])->name('pengaturan.menu');
    Route::post('/pengaturan/menu/{tipe?}', [PengaturanController::class, 'updateMenu'])->name('pengaturan.menu.update');
    Route::post('/pengaturan/menu/{tipe?}/add', [PengaturanController::class, 'addMenuItem'])->name('pengaturan.menu.add');
    Route::delete('/pengaturan/menu/{tipe?}/{index}', [PengaturanController::class, 'deleteMenuItem'])->name('pengaturan.menu.delete');
});

// Rute Profil Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profil-pengguna', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil-pengguna', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profil-pengguna', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
