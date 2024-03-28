<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'name' => "SF User 1",
                'email' => 'sf1@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "SF User 2",
                'email' => 'sf2@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "SF User 3",
                'email' => 'sf3@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "SF User 4",
                'email' => 'sf4@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "SF User 5",
                'email' => 'sf5@gmail.com',
                'password' => Hash::make('12345678'),
            ],
        ];
        try {
            foreach ($users as $user) {
                User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                ]);
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
