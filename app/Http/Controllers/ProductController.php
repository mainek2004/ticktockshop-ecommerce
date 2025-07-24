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

        // ✅ Tìm category theo slug
        $currentCategory = null;
        if ($categorySlug) {
            $currentCategory = $categories->first(function ($cat) use ($categorySlug) {
                return Str::slug($cat->name) === $categorySlug;
            });

            // Nếu không tìm thấy category → return trang trắng không sản phẩm
            if (!$currentCategory) {
                return view('client.products', [
                    'products' => collect(), // Trống
                    'categories' => $categories,
                    'brands' => $brands,
                    'currentCategory' => null,
                    'currentBrand' => null,
                    'selectedSort' => $sort,
                    'selectedPriceRange' => $priceRange,
                    'errorMessage' => 'Không tìm thấy danh mục sản phẩm.'
                ]);
            }

            $query->where('category_id', $currentCategory->id);
        }

        // ✅ Tìm brand theo slug
        $currentBrand = null;
        if ($brandSlug) {
            $currentBrand = $brands->first(function ($br) use ($brandSlug) {
                return Str::slug($br->name) === $brandSlug;
            });

            if (!$currentBrand) {
                return view('client.products', [
                    'products' => collect(), // Trống
                    'categories' => $categories,
                    'brands' => $brands,
                    'currentCategory' => $currentCategory,
                    'currentBrand' => null,
                    'selectedSort' => $sort,
                    'selectedPriceRange' => $priceRange,
                    'errorMessage' => 'Không tìm thấy thương hiệu.'
                ]);
            }

            $query->where('brand_id', $currentBrand->id);
        }

        // Lọc theo khoảng giá
        if ($priceRange) {
            [$min, $max] = explode('-', $priceRange);
            $query->whereBetween('price', [(int) $min, (int) $max]);
        }

        // Sắp xếp theo giá
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
            'errorMessage' => null
        ]);
    }

    public function quickView($slug)
    {
        $product = Product::where('slug', $slug)->with('category', 'brand')->firstOrFail();
        return view('client.products.quick_view', compact('product'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('client.product_detail', compact('product'));
    }

}