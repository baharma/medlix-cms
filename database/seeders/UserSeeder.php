<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('123123'),
                'access' => json_encode(['app_id' => [1,2,3]]),
                'is_admin'=>true
            ],
            [
                'name' => 'aditya',
                'email' => 'aditya@gmail.com',
                'password' => Hash::make('aditya123'),
                'access' => json_encode(['app_id' => [1,2,3]]),
                'is_admin'=>false
            ],
            [
                'name' => 'wahyu',
                'email' => 'wahyu@mail.com',
                'password' => Hash::make('123123'),
                'access' => json_encode(['app_id' => [1,2,3]]),
                'is_admin'=>false
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
