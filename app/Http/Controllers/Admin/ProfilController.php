<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Menampilkan form edit profil
     */
    public function edit()
    {
        $profil = \App\Models\ProfilKelurahan::first();

        if (!$profil) {
            $profil = new \App\Models\ProfilKelurahan();
            $profil->nama_kelurahan = 'Kelurahan Jelupang';
            $profil->kecamatan = 'Serpong Utara';
            $profil->kabupaten_kota = 'Tangerang Selatan';
            $profil->provinsi = 'Banten';
            $profil->save();
        }

        return view('admin.profil.edit', compact('profil'));
    }

    /**
     * Update profil
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten_kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'nullable|string|max:20',
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profil = \App\Models\ProfilKelurahan::first();

        if (!$profil) {
            $profil = new \App\Models\ProfilKelurahan();
        }

        $profil->nama_kelurahan = $request->nama_kelurahan;
        $profil->kecamatan = $request->kecamatan;
        $profil->kabupaten_kota = $request->kabupaten_kota;
        $profil->provinsi = $request->provinsi;
        $profil->kode_pos = $request->kode_pos;
        $profil->sejarah = $request->sejarah;
        $profil->visi = $request->visi;
        $profil->misi = $request->misi;
        $profil->telepon = $request->telepon;
        $profil->email = $request->email;
        $profil->website = $request->website;
        $profil->alamat = $request->alamat;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/logo');
            $profil->logo = str_replace('public/', 'storage/', $logoPath);
        }

        $profil->save();

        return redirect()->route('admin.profil.edit')->with('success', 'Profil kelurahan berhasil diperbarui.');
    }
}
