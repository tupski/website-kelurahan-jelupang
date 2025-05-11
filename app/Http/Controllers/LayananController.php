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
    public function index(Request $request)
    {
        $query = Layanan::where('aktif', true);

        // Filter berdasarkan pencarian
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $layanan = $query->orderBy('created_at', 'desc')->paginate(12);
        $kategori = KategoriLayanan::where('aktif', true)->get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('layanan.partials.layanan-list', compact('layanan'))->render(),
                'pagination' => view('layanan.partials.pagination', compact('layanan'))->render(),
            ]);
        }

        return view('layanan.index', compact('layanan', 'kategori'));
    }

    /**
     * Menampilkan layanan berdasarkan kategori
     */
    public function kategori(Request $request, $slug)
    {
        $kategori = KategoriLayanan::where('slug', $slug)->where('aktif', true)->firstOrFail();

        $query = Layanan::where('aktif', true)
            ->where('kategori_layanan_id', $kategori->id);

        // Filter berdasarkan pencarian
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $layanan = $query->orderBy('created_at', 'desc')->paginate(12);
        $semua_kategori = KategoriLayanan::where('aktif', true)->get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('layanan.partials.layanan-list', compact('layanan'))->render(),
                'pagination' => view('layanan.partials.pagination', compact('layanan'))->render(),
            ]);
        }

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
