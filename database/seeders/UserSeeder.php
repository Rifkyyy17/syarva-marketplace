<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => env('SEEDER_ADMIN_EMAIL', 'admin@syarva.test')],
            [
                'name' => 'Admin SYARVA',
                'phone' => '081234567890',
                'password' => env('SEEDER_ADMIN_PASSWORD', 'password'),
                'role' => 'admin',
                'status' => 'active',
                'whatsapp' => '6281234567890',
                'bio' => 'Administrator utama SYARVA Marketplace.',
            ]
        );

        User::firstOrCreate(
            ['email' => 'user@syarva.test'],
            [
                'name' => 'User Demo',
                'phone' => '081234567891',
                'password' => env('SEEDER_USER_PASSWORD', 'password'),
                'role' => 'user',
                'status' => 'active',
                'whatsapp' => '6281234567891',
                'bio' => 'User demo untuk pengujian.',
            ]
        );
    }
}