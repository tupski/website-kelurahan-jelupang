<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'berita';

    /**
     * Atribut yang dapat diisi.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'admin_id',
        'dipublikasikan',
    ];

    /**
     * Atribut yang harus dikonversi.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dipublikasikan' => 'boolean',
    ];

    /**
     * Mendapatkan admin yang menulis berita.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
