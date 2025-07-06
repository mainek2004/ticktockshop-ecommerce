<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;


class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Nam', 'Nữ', ' Cặp đôi'];

        foreach ($categories as $name) {
            Categories::create(['name' => $name]);
            }
    }
}
