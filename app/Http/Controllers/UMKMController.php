<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\KategoriUmkm;
use Illuminate\Http\Request;

class UMKMController extends Controller
{
    /**
     * Menampilkan daftar UMKM
     */
    public function index()
    {
        $umkm = Umkm::where('aktif', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $kategori = KategoriUmkm::where('aktif', true)->get();

        return view('umkm.index', compact('umkm', 'kategori'));
    }

    /**
     * Menampilkan UMKM berdasarkan kategori
     */
    public function kategori($slug)
    {
        $kategori = KategoriUmkm::where('slug', $slug)->where('aktif', true)->firstOrFail();

        $umkm = Umkm::where('aktif', true)
            ->where('kategori_umkm_id', $kategori->id)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $semua_kategori = KategoriUmkm::where('aktif', true)->get();

        return view('umkm.kategori', compact('umkm', 'kategori', 'semua_kategori'));
    }

    /**
     * Menampilkan detail UMKM
     */
    public function show($slug)
    {
        $umkm = Umkm::where('slug', $slug)
            ->where('aktif', true)
            ->firstOrFail();

        $umkm_terkait = Umkm::where('aktif', true)
            ->where('kategori_umkm_id', $umkm->kategori_umkm_id)
            ->where('id', '!=', $umkm->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('umkm.show', compact('umkm', 'umkm_terkait'));
    }
}
