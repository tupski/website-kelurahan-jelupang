<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Menampilkan halaman profil utama
     */
    public function index()
    {
        $profil = \App\Models\ProfilKelurahan::first();
        return view('profil.index', compact('profil'));
    }

    /**
     * Menampilkan halaman sejarah
     */
    public function sejarah()
    {
        $profil = \App\Models\ProfilKelurahan::first();
        return view('profil.sejarah', compact('profil'));
    }

    /**
     * Menampilkan halaman visi misi
     */
    public function visiMisi()
    {
        $profil = \App\Models\ProfilKelurahan::first();
        return view('profil.visi-misi', compact('profil'));
    }

    /**
     * Menampilkan halaman struktur organisasi
     */
    public function strukturOrganisasi()
    {
        $profil = \App\Models\ProfilKelurahan::first();
        return view('profil.struktur-organisasi', compact('profil'));
    }

    /**
     * Menampilkan halaman kontak
     */
    public function kontak()
    {
        $profil = \App\Models\ProfilKelurahan::first();
        return view('profil.kontak', compact('profil'));
    }
}
