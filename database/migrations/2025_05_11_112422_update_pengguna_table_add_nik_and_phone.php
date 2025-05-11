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
        Schema::table('pengguna', function (Blueprint $table) {
            $table->string('nik', 16)->nullable()->after('email');
            $table->string('no_hp', 15)->nullable()->after('nik');
            $table->boolean('domisili_ktp')->default(true)->after('no_hp');
            $table->string('kota_domisili')->nullable()->after('domisili_ktp');
            $table->string('alamat')->nullable()->after('kota_domisili');
            $table->string('foto')->nullable()->after('alamat');
            $table->dropColumn('is_admin'); // Hapus kolom is_admin karena sudah dipisahkan ke tabel admin
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false)->after('password');
            $table->dropColumn([
                'nik',
                'no_hp',
                'domisili_ktp',
                'kota_domisili',
                'alamat',
                'foto'
            ]);
        });
    }
};
