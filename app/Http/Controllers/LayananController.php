<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\KategoriLayanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Menampilkan daftar layanan
     */
    public function index()
    {
        $layanan = Layanan::where('aktif', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $kategori = KategoriLayanan::where('aktif', true)->get();

        return view('layanan.index', compact('layanan', 'kategori'));
    }

    /**
     * Menampilkan layanan berdasarkan kategori
     */
    public function kategori($slug)
    {
        $kategori = KategoriLayanan::where('slug', $slug)->where('aktif', true)->firstOrFail();

        $layanan = Layanan::where('aktif', true)
            ->where('kategori_layanan_id', $kategori->id)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $semua_kategori = KategoriLayanan::where('aktif', true)->get();

        return view('layanan.kategori', compact('layanan', 'kategori', 'semua_kategori'));
    }

    /**
     * Menampilkan detail layanan
     */
    public function show($slug)
    {
        $layanan = Layanan::where('slug', $slug)
            ->where('aktif', true)
            ->firstOrFail();

        $layanan_terkait = Layanan::where('aktif', true)
            ->where('kategori_layanan_id', $layanan->kategori_layanan_id)
            ->where('id', '!=', $layanan->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('layanan.show', compact('layanan', 'layanan_terkait'));
    }
}
