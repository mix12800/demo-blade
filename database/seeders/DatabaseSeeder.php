<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $users = [
            [
                'fio' => 'Admin',
                'role' => 'admin',
                'email' => 'admin@admin.com',
                'phone' => '8(999)999-99-99',
                'login' => 'Conf2027',
                'password' => 'Demo77',
            ],
            [
                'fio' => 'Иванов Иван Иванович',
                'email' => 'Ivan1234@Ivan1234.com',
                'phone' => '8(999)999-99-99',
                'login' => 'Ivan1234',
                'password' => 'Ivan1234',
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
