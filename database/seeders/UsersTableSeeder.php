<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Seed Admin
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'),
            'role' => 'admin',
        ]);

        // Seed Sub-Admin
        DB::table('users')->insert([
            'name' => 'Sub-Admin User',
            'email' => 'subadmin@example.com',
            'password' => Hash::make('subadminpassword'),
            'role' => 'sub-admin',
        ]);

        // Seed Regular User
        DB::table('users')->insert([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('userpassword'),
            'role' => 'user',
        ]);
    }
}