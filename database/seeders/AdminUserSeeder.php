<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'bhoang1910@gmail.com'],
            [
                'name' => 'Hoang',
                'email' => 'bhoang1910@gmail.com',
                'password' => Hash::make('hoang123'), // Mật khẩu: hoang123
                'role' => 'admin'
            ]
        );
    }
}
