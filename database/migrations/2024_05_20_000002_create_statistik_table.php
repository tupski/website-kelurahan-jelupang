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
        // Hapus tabel lama jika ada
        Schema::dropIfExists('statistik');

        // Buat tabel baru
        Schema::create('statistik', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->decimal('nilai', 15, 2);
            $table->string('satuan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('tahun');
            $table->foreignId('kategori_statistik_id')->constrained('kategori_statistik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik');
    }
};
