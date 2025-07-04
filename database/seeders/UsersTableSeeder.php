<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin Team 404',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin404'),
                'role' => 'admin',
                'pfp' => 'admin.jpg',
            ],
            [
                'name' => 'Pakar Yeni',
                'email' => 'yeniaryanti@gmail.com',
                'password' => Hash::make('pakaryeni'),
                'role' => 'pakar',
                'pfp' => 'yeni.png',
            ],
            [
                'name' => 'Test User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user404'),
                'role' => 'user',
                'pfp' => 'user.jpg',
            ],
        ];

        foreach ($users as $user) {
            $photoPath = 'database/seeders/photos/' . $user['pfp'];
            $storagePath = 'uploads/' . basename($photoPath);

            // Simulate file upload
            if (file_exists(base_path($photoPath))) {
                Storage::disk('public')->put($storagePath, file_get_contents(base_path($photoPath)));
            }

            // Insert user data with profile photo path
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'role' => $user['role'],
                'pfp' => $storagePath,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
