<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Администратор
        User::create([
            'login'    => 'admin',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
        ]);

        // Несколько обычных пользователей
        User::factory()->count(5)->create();
    }
}
