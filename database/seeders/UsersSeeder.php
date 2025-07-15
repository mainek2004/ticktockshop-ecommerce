<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('123456'),
        'phone' => '0901234567',
        'address' => 'Hà Nội',
        'role' => 'admin',
    ]);

    User::create([
        'name' => 'customer1',
        'email' => 'customer1@gmail.com',
        'password' => Hash::make('123456'),
        'phone' => '0901234512',
        'address' => 'Hà Nội',
        'role' => 'user',
    ]);




    }
}
