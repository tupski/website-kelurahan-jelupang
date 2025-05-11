<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriLayanan extends Model
{
    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'kategori_layanan';

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
     * Mendapatkan layanan yang termasuk dalam kategori ini.
     */
    public function layanan()
    {
        return $this->hasMany(Layanan::class, 'kategori_layanan_id');
    }
}
