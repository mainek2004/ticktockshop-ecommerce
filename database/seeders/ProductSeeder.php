<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Rolex Submariner',
                'description' => 'Đồng hồ nam cao cấp chống nước tuyệt vời',
                'price' => 250000000,
                'imageUrl' => 'rolex_submariner.jpg',
                'category_id' => 1,
                'brand_id' => 1,
                'warranty_months' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Casio G-Shock',
                'description' => 'Đồng hồ thể thao bền bỉ dành cho nam',
                'price' => 3500000,
                'imageUrl' => 'casio_gshock.jpg',
                'category_id' => 1,
                'brand_id' => 2,
                'warranty_months' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tissot Bella Ora',
                'description' => 'Đồng hồ thời trang dành cho nữ',
                'price' => 9800000,
                'imageUrl' => 'tissot_bella_ora.jpg',
                'category_id' => 2,
                'brand_id' => 3,
                'warranty_months' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Apple Watch Series 9',
                'description' => 'Đồng hồ thông minh với nhiều tính năng sức khỏe',
                'price' => 11900000,
                'imageUrl' => 'apple_watch_9.jpg',
                'category_id' => 4,
                'brand_id' => 4,
                'warranty_months' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
