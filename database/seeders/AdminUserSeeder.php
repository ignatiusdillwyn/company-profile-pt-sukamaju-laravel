<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ===== ADMIN =====
        User::updateOrCreate(
            ['email' => 'admin@dummycorp.com'], // Kondisi pencarian
            [
                'name' => 'Admin Utama',
                'email' => 'admin@dummycorp.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}