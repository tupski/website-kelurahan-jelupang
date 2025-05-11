<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin::create([
            'nama' => 'Administrator',
            'email' => 'admin@kelurahanjelupang.go.id',
            'password' => bcrypt('admin123'),
            'jabatan' => 'Administrator Sistem',
            'aktif' => true,
        ]);
    }
}
