<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin Kelurahan',
            'email' => 'admin@kelurahanjelupang.go.id',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);
    }
}
