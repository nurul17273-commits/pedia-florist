<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@pediaflorist.com',
            'password' => Hash::make('password123'),
            'role' => 'admin' // pastikan kolom ini ada di tabel
        ]);

        // User biasa
        User::create([
            'name' => 'User',
            'email' => 'user@pediaflorist.com',
            'password' => Hash::make('password123'),
            'role' => 'user'
        ]);
    }
}
