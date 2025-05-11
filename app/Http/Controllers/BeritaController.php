<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Menampilkan daftar berita
     */
    public function index()
    {
        $berita = \App\Models\Berita::where('dipublikasikan', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('berita.index', compact('berita'));
    }

    /**
     * Menampilkan detail berita
     */
    public function show($slug)
    {
        $berita = \App\Models\Berita::where('slug', $slug)
            ->where('dipublikasikan', true)
            ->firstOrFail();

        $beritaTerkait = \App\Models\Berita::where('id', '!=', $berita->id)
            ->where('dipublikasikan', true)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('berita.show', compact('berita', 'beritaTerkait'));
    }
}
