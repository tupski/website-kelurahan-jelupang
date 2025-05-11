<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Pengaturan extends Model
{
    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'pengaturan';

    /**
     * Atribut yang dapat diisi.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kunci',
        'nilai',
        'grup',
        'label',
        'tipe',
        'opsi',
    ];

    /**
     * Mendapatkan nilai pengaturan berdasarkan kunci.
     *
     * @param string $kunci
     * @param mixed $default
     * @return mixed
     */
    public static function get($kunci, $default = null)
    {
        return Cache::rememberForever('pengaturan.' . $kunci, function () use ($kunci, $default) {
            $pengaturan = self::where('kunci', $kunci)->first();
            return $pengaturan ? $pengaturan->nilai : $default;
        });
    }

    /**
     * Menyimpan nilai pengaturan.
     *
     * @param string $kunci
     * @param mixed $nilai
     * @param string|null $grup
     * @param string|null $label
     * @param string $tipe
     * @param string|null $opsi
     * @return Pengaturan
     */
    public static function set($kunci, $nilai, $grup = 'umum', $label = null, $tipe = 'text', $opsi = null)
    {
        $pengaturan = self::updateOrCreate(
            ['kunci' => $kunci],
            [
                'nilai' => $nilai,
                'grup' => $grup,
                'label' => $label ?? $kunci,
                'tipe' => $tipe,
                'opsi' => $opsi,
            ]
        );

        // Hapus cache
        Cache::forget('pengaturan.' . $kunci);

        return $pengaturan;
    }

    /**
     * Mendapatkan semua pengaturan berdasarkan grup.
     *
     * @param string $grup
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getByGrup($grup)
    {
        return self::where('grup', $grup)->get();
    }

    /**
     * Mendapatkan semua grup pengaturan.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getAllGrup()
    {
        return self::select('grup')->distinct()->pluck('grup');
    }
}
