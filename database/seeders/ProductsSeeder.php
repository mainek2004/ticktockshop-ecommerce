<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
        'name' => 'Đồng hồ Rolex Nam',
        'description' => 'Sang trọng, đẳng cấp Thụy Sĩ.',
        'price' => 150000000,
        'image' => 'logo2.png',
        'category_id' => 1, // giả định đã có
        'brand_id' => 2,
        'warranty_months' => 24,
    ]);

    Product::create([
        'name' => 'Đồng hồ Casio Nữ',
        'description' => 'Nhỏ gọn, bền bỉ, giá rẻ.',
        'price' => 1200000,
        'image' => 'appstore.png',
        'category_id' => 2,
        'brand_id' => 1,
        'warranty_months' => 12,
    ]);
    }
}
