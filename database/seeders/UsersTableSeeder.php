<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //
        DB::table('users')->insert([
            [
            'name' => 'Admin',
            'phone' => '0123456789',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'admin'
            ],
            [
                'name' => 'User',
                'phone' => '0123456789',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'user'
            ],
            [
                    'name' => 'Admin123',
                    'phone' => '0123456789',
                    'email' => 'admin123@gmail.com',
                    'password' => Hash::make('123456789'),
                    'role' => 'admin'
            ],
        ]);
    }
}