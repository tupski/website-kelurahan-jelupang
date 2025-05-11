<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profil_kelurahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten_kota');
            $table->string('provinsi');
            $table->string('kode_pos')->nullable();
            $table->text('sejarah')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('alamat')->nullable();
            $table->string('logo')->nullable();
            $table->json('galeri')->nullable();
            $table->json('struktur_organisasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_kelurahan');
    }
};
