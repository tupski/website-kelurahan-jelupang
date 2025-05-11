<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\KategoriLayanan;
use Illuminate\Support\Str;

class LayananController extends Controller
{
    /**
     * Menampilkan daftar layanan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $layanan = Layanan::with('kategori')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.layanan.index', compact('layanan'));
    }

    /**
     * Menampilkan form untuk membuat layanan baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $kategori = KategoriLayanan::all();
        return view('admin.layanan.create', compact('kategori'));
    }

    /**
     * Menyimpan layanan baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori_layanan_id' => 'required|exists:kategori_layanan,id',
            'persyaratan' => 'nullable|string',
            'jam_layanan' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'ikon' => 'nullable|string|max:50',
            'aktif' => 'boolean',
        ]);

        $layanan = new Layanan($request->all());
        $layanan->slug = Str::slug($request->nama);
        $layanan->aktif = $request->has('aktif');
        $layanan->save();

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail layanan.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $layanan = Layanan::with('kategori')->findOrFail($id);
        return view('admin.layanan.show', compact('layanan'));
    }

    /**
     * Menampilkan form untuk mengedit layanan.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        $kategori = KategoriLayanan::all();

        return view('admin.layanan.edit', compact('layanan', 'kategori'));
    }

    /**
     * Mengupdate layanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori_layanan_id' => 'required|exists:kategori_layanan,id',
            'persyaratan' => 'nullable|string',
            'jam_layanan' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'ikon' => 'nullable|string|max:50',
            'aktif' => 'boolean',
        ]);

        $layanan = Layanan::findOrFail($id);

        // Update slug jika nama berubah
        if ($layanan->nama != $request->nama) {
            $layanan->slug = Str::slug($request->nama);
        }

        $layanan->nama = $request->nama;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->kategori_layanan_id = $request->kategori_layanan_id;
        $layanan->persyaratan = $request->persyaratan;
        $layanan->jam_layanan = $request->jam_layanan;
        $layanan->lokasi = $request->lokasi;
        $layanan->ikon = $request->ikon;
        $layanan->aktif = $request->has('aktif');
        $layanan->save();

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Menghapus layanan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }
}
