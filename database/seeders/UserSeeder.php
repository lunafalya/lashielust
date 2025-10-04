<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'nama' => 'Admin',
            'no_telp' => '081234567890',
            'alamat' => 'Example Address',
            'role' => 'admin',
        ]);
    }
}
