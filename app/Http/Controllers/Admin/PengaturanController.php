<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\Request;


class PengaturanController extends Controller
{
    /**
     * Menampilkan halaman pengaturan.
     *
     * @param string $grup
     * @return \Illuminate\View\View
     */
    public function index($grup = 'umum')
    {
        $grupPengaturan = Pengaturan::getAllGrup();
        $pengaturan = Pengaturan::getByGrup($grup);

        return view('admin.pengaturan.index', compact('grupPengaturan', 'pengaturan', 'grup'));
    }

    /**
     * Menyimpan pengaturan.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $grup = $request->input('grup', 'umum');
        $pengaturan = Pengaturan::getByGrup($grup);

        foreach ($pengaturan as $item) {
            $kunci = $item->kunci;

            if ($item->tipe == 'image' || $item->tipe == 'file') {
                if ($request->hasFile($kunci)) {
                    $file = $request->file($kunci);

                    // Validasi tipe file
                    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml', 'image/x-icon'];
                    if (!in_array($file->getMimeType(), $allowedTypes)) {
                        return redirect()->back()->with('error', 'File ' . $item->label . ' harus berupa gambar (JPG, PNG, GIF, SVG, ICO).');
                    }

                    $fileName = $kunci . '_' . time() . '.' . $file->getClientOriginalExtension();

                    // Hapus file lama jika ada
                    if ($item->nilai && file_exists(public_path($item->nilai))) {
                        @unlink(public_path($item->nilai));
                    }

                    // Simpan file baru
                    $file->move(public_path('images'), $fileName);
                    $nilai = 'images/' . $fileName;

                    Pengaturan::set($kunci, $nilai, $grup);
                }
            } elseif ($item->tipe == 'boolean') {
                $nilai = $request->has($kunci) ? '1' : '0';
                Pengaturan::set($kunci, $nilai, $grup);
            } else {
                $nilai = $request->input($kunci, '');
                Pengaturan::set($kunci, $nilai, $grup);
            }
        }

        return redirect()->route('admin.pengaturan.index', ['grup' => $grup])
            ->with('success', 'Pengaturan berhasil disimpan.');
    }

    /**
     * Menampilkan halaman pengaturan menu.
     *
     * @param string $tipe
     * @return \Illuminate\View\View
     */
    public function menu($tipe = 'utama')
    {
        $menuKey = 'menu_' . $tipe;
        $menuData = json_decode(Pengaturan::get($menuKey, '[]'), true);

        return view('admin.pengaturan.menu', compact('menuData', 'tipe'));
    }

    /**
     * Menyimpan pengaturan menu.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $tipe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateMenu(Request $request, $tipe = 'utama')
    {
        $menuKey = 'menu_' . $tipe;
        $menuData = $request->input('menu', []);

        Pengaturan::set($menuKey, json_encode($menuData), 'menu');

        return redirect()->route('admin.pengaturan.menu', ['tipe' => $tipe])
            ->with('success', 'Menu berhasil disimpan.');
    }

    /**
     * Menambahkan item menu baru.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $tipe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addMenuItem(Request $request, $tipe = 'utama')
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ]);

        $menuKey = 'menu_' . $tipe;
        $menuData = json_decode(Pengaturan::get($menuKey, '[]'), true);

        // Tentukan urutan berikutnya
        $maxUrutan = 0;
        foreach ($menuData as $item) {
            if ($item['urutan'] > $maxUrutan) {
                $maxUrutan = $item['urutan'];
            }
        }

        $newItem = [
            'nama' => $request->input('nama'),
            'url' => $request->input('url'),
            'icon' => $request->input('icon', ''),
            'urutan' => $maxUrutan + 1,
            'parent_id' => $request->input('parent_id'),
            'aktif' => true
        ];

        $menuData[] = $newItem;

        Pengaturan::set($menuKey, json_encode($menuData), 'menu');

        return redirect()->route('admin.pengaturan.menu', ['tipe' => $tipe])
            ->with('success', 'Item menu berhasil ditambahkan.');
    }

    /**
     * Menghapus item menu.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $tipe
     * @param int $index
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMenuItem($tipe = 'utama', $index = 0)
    {
        $menuKey = 'menu_' . $tipe;
        $menuData = json_decode(Pengaturan::get($menuKey, '[]'), true);

        if (isset($menuData[$index])) {
            unset($menuData[$index]);
            $menuData = array_values($menuData); // Reindex array

            Pengaturan::set($menuKey, json_encode($menuData), 'menu');

            return redirect()->route('admin.pengaturan.menu', ['tipe' => $tipe])
                ->with('success', 'Item menu berhasil dihapus.');
        }

        return redirect()->route('admin.pengaturan.menu', ['tipe' => $tipe])
            ->with('error', 'Item menu tidak ditemukan.');
    }
}
