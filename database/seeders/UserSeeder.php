<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nom' => 'Admin',
            'prenom' => 'Admin',
            'password' => Hash::make('Admin2023!'),
            'email' => 'admin@admin.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 2,
        ]);

        User::create([
            'nom' => 'User',
            'prenom' => 'User',
            'password' => Hash::make('User2023!'),
            'email' => 'user@user.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 1,
        ]);

        User::factory(28)->create();
    }
}
