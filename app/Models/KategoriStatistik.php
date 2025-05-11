<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriStatistik extends Model
{
    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'kategori_statistik';

    /**
     * Atribut yang dapat diisi.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'urutan',
    ];

    /**
     * Mendapatkan statistik yang terkait dengan kategori ini.
     */
    public function statistik()
    {
        return $this->hasMany(Statistik::class, 'kategori_statistik_id');
    }
}
