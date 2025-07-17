<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function filterProducts(Request $request)
    {
    $categories = Category::all();
    $brands = Brand::all();

    $categorySlug = $request->input('category');
    $brandSlug = $request->input('brand');
    $sort = $request->input('sort');
    $priceRange = $request->input('price_range');

    $query = Product::query();

    //  Xác định currentCategory từ slug
    $currentCategory = null;
    if ($categorySlug) {
        $currentCategory = $categories->first(function ($cat) use ($categorySlug) {
            return Str::slug($cat->name) === $categorySlug;
        });

        if ($currentCategory) {
            $query->where('category_id', $currentCategory->id);
        }
    }

    //  Xác định currentBrand từ slug
    $currentBrand = null;
    if ($brandSlug) {
        $currentBrand = $brands->first(function ($br) use ($brandSlug) {
            return Str::slug($br->name) === $brandSlug;
        });

        if ($currentBrand) {
            $query->where('brand_id', $currentBrand->id);
        }
    }

    //  Lọc theo khoảng giá
    if ($priceRange) {
        [$min, $max] = explode('-', $priceRange);
        $query->whereBetween('price', [(int) $min, (int) $max]);
    }

    //  Sắp xếp theo giá
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
        'currentCategory' => $currentCategory,
        'currentBrand' => $currentBrand,
        'selectedSort' => $sort,
        'selectedPriceRange' => $priceRange,
        ]);
    }
    public function quickView($slug)
    {
        $product = Product::where('slug', $slug)->with('category', 'brand')->firstOrFail();
        return view('client.products.quick_view', compact('product'));
    }
}