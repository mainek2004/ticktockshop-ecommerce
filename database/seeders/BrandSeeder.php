<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('brands')->insert([
            ['name' => 'Rolex'],
            ['name' => 'Casio'],
            ['name' => 'Tissot'],
            ['name' => 'Apple'],
        ]);
    }
}
