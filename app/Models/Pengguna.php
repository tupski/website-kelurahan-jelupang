<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use Notifiable;

    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'pengguna';

    /**
     * Atribut yang dapat diisi.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'nik',
        'no_hp',
        'domisili_ktp',
        'kota_domisili',
        'alamat',
        'foto',
    ];

    /**
     * Atribut yang harus disembunyikan.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atribut yang harus dikonversi.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'domisili_ktp' => 'boolean',
    ];

    /**
     * Mendapatkan berita yang ditulis oleh pengguna.
     */
    public function berita()
    {
        return $this->hasMany(Berita::class, 'pengguna_id');
    }
}
