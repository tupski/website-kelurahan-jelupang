<?php

namespace App\Http\Controllers;

use App\Models\Statistik;
use App\Models\KategoriStatistik;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    /**
     * Menampilkan halaman statistik
     */
    public function index()
    {
        $statistik = Statistik::orderBy('tahun', 'desc')
            ->orderBy('judul', 'asc')
            ->paginate(10);

        $kategori = KategoriStatistik::orderBy('urutan', 'asc')->get();

        return view('statistik.index', compact('statistik', 'kategori'));
    }

    /**
     * Menampilkan statistik berdasarkan kategori
     */
    public function kategori($kategori)
    {
        $kategori_data = KategoriStatistik::where('slug', $kategori)->firstOrFail();

        $statistik = Statistik::where('kategori_statistik_id', $kategori_data->id)
            ->orderBy('tahun', 'desc')
            ->orderBy('judul', 'asc')
            ->paginate(10);

        $semua_kategori = KategoriStatistik::orderBy('urutan', 'asc')->get();

        return view('statistik.kategori', compact('statistik', 'kategori_data', 'semua_kategori'));
    }
}
