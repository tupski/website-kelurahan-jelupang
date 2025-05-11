<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'layanan';

    /**
     * Atribut yang dapat diisi.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'ikon',
        'kategori_layanan_id',
        'persyaratan',
        'jam_layanan',
        'lokasi',
        'aktif',
    ];

    /**
     * Atribut yang harus dikonversi.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'aktif' => 'boolean',
    ];

    /**
     * Mendapatkan kategori layanan.
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriLayanan::class, 'kategori_layanan_id');
    }
}
