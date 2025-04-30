<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@controltruck.com'],
            [
                'name' => 'Administrador',
                'email' => 'admin@controltruck.com',
                'password' => 'admin123', // será automaticamente criptografada pelo mutator no model
                'tipo' => 'admin',
            ]
        );
    }
}
