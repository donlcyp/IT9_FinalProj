<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1234'), // Use a secure password
            'role' => 'admin', // Assign the admin role
            'contact_no' => null,
            'address' => null,
            'profile_picture' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
