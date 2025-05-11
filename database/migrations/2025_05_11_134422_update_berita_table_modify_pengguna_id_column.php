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
        Schema::table('berita', function (Blueprint $table) {
            $table->dropForeign(['pengguna_id']);
            $table->foreignId('pengguna_id')->nullable()->change();
            $table->foreign('pengguna_id')->references('id')->on('pengguna')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->dropForeign(['pengguna_id']);
            $table->foreignId('pengguna_id')->nullable(false)->change();
            $table->foreign('pengguna_id')->references('id')->on('pengguna');
        });
    }
};
