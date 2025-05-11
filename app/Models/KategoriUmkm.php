<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriUmkm extends Model
{
    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'kategori_umkm';

    /**
     * Atribut yang dapat diisi.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'slug',
        'ikon',
        'deskripsi',
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
     * Mendapatkan UMKM yang termasuk dalam kategori ini.
     */
    public function umkm()
    {
        return $this->hasMany(Umkm::class, 'kategori_umkm_id');
    }
}
