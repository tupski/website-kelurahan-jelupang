<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilKelurahan extends Model
{
    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'profil_kelurahan';

    /**
     * Atribut yang dapat diisi.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_kelurahan',
        'kecamatan',
        'kabupaten_kota',
        'provinsi',
        'kode_pos',
        'sejarah',
        'visi',
        'misi',
        'telepon',
        'email',
        'website',
        'alamat',
        'logo',
        'galeri',
        'struktur_organisasi',
    ];

    /**
     * Atribut yang harus dikonversi.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'galeri' => 'array',
        'struktur_organisasi' => 'array',
    ];
}
