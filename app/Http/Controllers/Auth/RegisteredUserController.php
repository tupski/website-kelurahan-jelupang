<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:pengguna,email'],
            'nik' => ['required', 'string', 'size:16', 'unique:pengguna,nik'],
            'no_hp' => ['required', 'string', 'max:15'],
            'domisili_ktp' => ['required', 'boolean'],
            'kota_domisili' => ['required_if:domisili_ktp,0', 'nullable', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $pengguna = Pengguna::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'domisili_ktp' => $request->domisili_ktp,
            'kota_domisili' => $request->domisili_ktp ? null : $request->kota_domisili,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($pengguna));

        Auth::login($pengguna);

        return redirect(route('beranda', absolute: false))->with('success', 'Pendaftaran berhasil! Selamat datang di website Kelurahan Jelupang.');
    }
}
