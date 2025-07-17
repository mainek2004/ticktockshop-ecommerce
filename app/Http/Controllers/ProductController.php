<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $sort = request('sort');

        $query = Product::query();

        if ($sort === 'asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'desc') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->paginate(8);

        return view('client.products', compact('products', 'categories', 'brands'));
    }

    public function filterByCategory($category)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $sort = request('sort');

        $query = Product::whereHas('category', function ($query) use ($category) {
            $query->where('name', $category);
        });

        if ($sort === 'asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'desc') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->paginate(8);

        return view('client.products', compact('products', 'categories', 'brands'));
    }

    public function filter($categoryParam, $brandParam)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $sort = request('sort');
        $priceRange = request('price_range'); 

        $categoryParam = strtolower(trim($categoryParam));
        $brandParam = strtolower(trim($brandParam));

        $category = $categories->first(function ($cat) use ($categoryParam) {
            return Str::slug($cat->name) === $categoryParam;
        });

        $brand = $brands->first(function ($br) use ($brandParam) {
            return Str::slug($br->name) === $brandParam;
        });

        if (!$category || !$brand) {
            abort(404, 'Không tìm thấy danh mục hoặc thương hiệu');
        }

        $query = Product::where('category_id', $category->id)
                    ->where('brand_id', $brand->id);

        if ($priceRange) {
            [$min, $max] = explode('-', $priceRange);
            $query->whereBetween('price', [(int) $min, (int) $max]);
        }

        if ($sort === 'asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'desc') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->paginate(8);

        return view('client.products', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'currentCategory' => $category,
            'currentBrand' => $brand,
            'selectedSort' => $sort,               
            'selectedPriceRange' => $priceRange,   
        ]);
    }
}
