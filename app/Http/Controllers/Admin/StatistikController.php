<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Statistik;
use App\Models\KategoriStatistik;

class StatistikController extends Controller
{
    /**
     * Menampilkan daftar statistik.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $statistik = Statistik::with('kategori')->orderBy('created_at', 'desc')->paginate(10);
        $kategori = KategoriStatistik::all();

        return view('admin.statistik.index', compact('statistik', 'kategori'));
    }

    /**
     * Menampilkan form untuk membuat statistik baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $kategori = KategoriStatistik::all();
        return view('admin.statistik.create', compact('kategori'));
    }

    /**
     * Menyimpan statistik baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'nilai' => 'required|numeric',
            'kategori_statistik_id' => 'required|exists:kategori_statistik,id',
            'deskripsi' => 'nullable|string',
            'satuan' => 'nullable|string|max:50',
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
        ]);

        Statistik::create($request->all());

        return redirect()->route('admin.statistik.index')
            ->with('success', 'Statistik berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit statistik.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $statistik = Statistik::findOrFail($id);
        $kategori = KategoriStatistik::all();

        return view('admin.statistik.edit', compact('statistik', 'kategori'));
    }

    /**
     * Mengupdate statistik.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'nilai' => 'required|numeric',
            'kategori_statistik_id' => 'required|exists:kategori_statistik,id',
            'deskripsi' => 'nullable|string',
            'satuan' => 'nullable|string|max:50',
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
        ]);

        $statistik = Statistik::findOrFail($id);
        $statistik->update($request->all());

        return redirect()->route('admin.statistik.index')
            ->with('success', 'Statistik berhasil diperbarui.');
    }

    /**
     * Menghapus statistik.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $statistik = Statistik::findOrFail($id);
        $statistik->delete();

        return redirect()->route('admin.statistik.index')
            ->with('success', 'Statistik berhasil dihapus.');
    }
}
