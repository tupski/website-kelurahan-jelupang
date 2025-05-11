<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'umkm';

    /**
     * Atribut yang dapat diisi.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'nama_pemilik',
        'alamat',
        'telepon',
        'email',
        'gambar',
        'kategori_umkm_id',
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
     * Mendapatkan kategori UMKM.
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriUmkm::class, 'kategori_umkm_id');
    }
}
