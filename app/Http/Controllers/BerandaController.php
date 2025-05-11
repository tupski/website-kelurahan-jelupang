<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Menampilkan halaman beranda
     */
    public function index()
    {
        // Ambil data untuk halaman beranda yang dinamis
        $berita = \App\Models\Berita::where('dipublikasikan', true)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $layanan = \App\Models\Layanan::where('aktif', true)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $umkm = \App\Models\Umkm::where('aktif', true)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $profil = \App\Models\ProfilKelurahan::first();

        return view('beranda.index', compact('berita', 'layanan', 'umkm', 'profil'));
    }
}
