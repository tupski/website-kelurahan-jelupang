<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'statistik';

    /**
     * Atribut yang dapat diisi.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'nilai',
        'satuan',
        'deskripsi',
        'tahun',
        'kategori_statistik_id',
    ];

    /**
     * Mendapatkan kategori statistik.
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriStatistik::class, 'kategori_statistik_id');
    }
}
