<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umkm;
use App\Models\KategoriUmkm;
use Illuminate\Support\Str;

class UMKMController extends Controller
{
    /**
     * Menampilkan daftar UMKM.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $umkm = Umkm::with('kategori')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.umkm.index', compact('umkm'));
    }

    /**
     * Menampilkan form untuk membuat UMKM baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $kategori = KategoriUmkm::all();
        return view('admin.umkm.create', compact('kategori'));
    }

    /**
     * Menyimpan UMKM baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'nama_pemilik' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'kategori_umkm_id' => 'required|exists:kategori_umkm,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'aktif' => 'boolean',
        ]);

        $umkm = new Umkm($request->except('gambar'));
        $umkm->slug = Str::slug($request->nama);
        $umkm->aktif = $request->has('aktif');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = 'umkm_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/umkm'), $fileName);
            $umkm->gambar = 'images/umkm/' . $fileName;
        }

        $umkm->save();

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail UMKM.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $umkm = Umkm::with('kategori')->findOrFail($id);
        return view('admin.umkm.show', compact('umkm'));
    }

    /**
     * Menampilkan form untuk mengedit UMKM.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $umkm = Umkm::findOrFail($id);
        $kategori = KategoriUmkm::all();

        return view('admin.umkm.edit', compact('umkm', 'kategori'));
    }

    /**
     * Mengupdate UMKM.
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
            'nama_pemilik' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'kategori_umkm_id' => 'required|exists:kategori_umkm,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'aktif' => 'boolean',
        ]);

        $umkm = Umkm::findOrFail($id);

        // Update slug jika nama berubah
        if ($umkm->nama != $request->nama) {
            $umkm->slug = Str::slug($request->nama);
        }

        $umkm->nama = $request->nama;
        $umkm->deskripsi = $request->deskripsi;
        $umkm->nama_pemilik = $request->nama_pemilik;
        $umkm->alamat = $request->alamat;
        $umkm->telepon = $request->telepon;
        $umkm->email = $request->email;
        $umkm->kategori_umkm_id = $request->kategori_umkm_id;
        $umkm->aktif = $request->has('aktif');

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($umkm->gambar && file_exists(public_path($umkm->gambar))) {
                @unlink(public_path($umkm->gambar));
            }

            $file = $request->file('gambar');
            $fileName = 'umkm_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/umkm'), $fileName);
            $umkm->gambar = 'images/umkm/' . $fileName;
        }

        $umkm->save();

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil diperbarui.');
    }

    /**
     * Menghapus UMKM.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $umkm = Umkm::findOrFail($id);

        // Hapus gambar jika ada
        if ($umkm->gambar && file_exists(public_path($umkm->gambar))) {
            @unlink(public_path($umkm->gambar));
        }

        $umkm->delete();

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil dihapus.');
    }
}
