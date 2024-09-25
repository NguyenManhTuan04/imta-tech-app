<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'avatar' => 'default.png',
                'password' => Hash::make('password'),
                'membership_type' => 'premium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Free User',
                'email' => 'free@example.com',
                'avatar' => 'default.png',
                'password' => Hash::make('password'),
                'membership_type' => 'free',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}


