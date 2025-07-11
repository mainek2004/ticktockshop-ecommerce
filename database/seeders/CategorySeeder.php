<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Đồng hồ nam'],
            ['name' => 'Đồng hồ nữ'],
            ['name' => 'Đồng hồ đôi'],
            ['name' => 'Đồng hồ thông minh'],
        ]);
    }
}
