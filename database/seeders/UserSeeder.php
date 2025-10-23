<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // cek berdasarkan email
            [
                'name' => 'Admin',
                'phone' => '081234567890',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'profile_photo' => null,
            ]
        );
    }

}
