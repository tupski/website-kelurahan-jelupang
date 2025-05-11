<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Menampilkan daftar berita
     */
    public function index()
    {
        $berita = \App\Models\Berita::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Menampilkan form untuk membuat berita baru
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Menyimpan berita baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dipublikasikan' => 'nullable|boolean',
        ]);

        $berita = new \App\Models\Berita();
        $berita->judul = $request->judul;
        $berita->slug = \Illuminate\Support\Str::slug($request->judul);
        $berita->konten = $request->konten;
        $berita->admin_id = auth()->guard('admin')->id();
        $berita->dipublikasikan = $request->has('dipublikasikan');

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('public/berita');
            $berita->gambar = str_replace('public/', 'storage/', $imagePath);
        }

        $berita->save();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail berita
     */
    public function show($id)
    {
        $berita = \App\Models\Berita::findOrFail($id);
        return view('admin.berita.show', compact('berita'));
    }

    /**
     * Menampilkan form untuk mengedit berita
     */
    public function edit($id)
    {
        $berita = \App\Models\Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Mengupdate berita
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dipublikasikan' => 'nullable|boolean',
        ]);

        $berita = \App\Models\Berita::findOrFail($id);
        $berita->judul = $request->judul;

        // Hanya update slug jika judul berubah
        if ($berita->judul != $request->judul) {
            $berita->slug = \Illuminate\Support\Str::slug($request->judul);
        }

        $berita->konten = $request->konten;
        $berita->dipublikasikan = $request->has('dipublikasikan');

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar && file_exists(public_path(str_replace('storage/', 'public/', $berita->gambar)))) {
                unlink(public_path(str_replace('storage/', 'public/', $berita->gambar)));
            }

            $imagePath = $request->file('gambar')->store('public/berita');
            $berita->gambar = str_replace('public/', 'storage/', $imagePath);
        }

        $berita->save();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Menghapus berita
     */
    public function destroy($id)
    {
        $berita = \App\Models\Berita::findOrFail($id);

        // Hapus gambar jika ada
        if ($berita->gambar && file_exists(public_path(str_replace('storage/', 'public/', $berita->gambar)))) {
            unlink(public_path(str_replace('storage/', 'public/', $berita->gambar)));
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
