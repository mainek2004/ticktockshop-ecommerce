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


    public function index(Request $request)
    {
        $brands = Brand::all();
        $categories = Category::all(); // ✅ Thêm dòng này

        $products = Product::with('brand');

        if ($request->has('brand')) {
            $products->where('brand_id', $request->brand);
        }

        return view('admin.products_index', [
            'products' => $products->get(),
            'brands' => $brands,
            'categories' => $categories, // ✅ Truyền xuống view
        ]);
    }


//------------------------THÊM--------------------------
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($request->category_id);
        $slug = Str::slug($category->name);

        $folder = match($slug) {
            'nam' => 'Watch/Watch_nam',
            'nu' => 'Watch/Watch_nu',
            'cap-doi' => 'Watch/Watch_cap',
            default => 'Watch/Watch_nu',
        };

        $originalName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $imageName = Str::slug($originalName) . '.' . $extension;
        $request->file('image')->storeAs('public/' . $folder, $imageName);

        $productName = $request->name;
        $slug = Str::slug($productName);
        if (empty($slug)) {
            $slug = 'dong-ho-' . time(); // fallback nếu tên không tạo được slug
        }

        Product::create([
            'name' => $productName,
            'price' => $request->price,
            'quantity' => 100,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $imageName,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.products_index')->with('success', 'Thêm đồng hồ thành công!');
    }

//-------------SỬA----------------
    public function update(Request $request, $id)
    {
        $product = \App\Models\Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->slug = \Illuminate\Support\Str::slug($request->name);

        // Nếu có upload ảnh mới
        if ($request->hasFile('image')) {
            $category = \App\Models\Category::findOrFail($request->category_id);
            $slug = \Illuminate\Support\Str::slug($category->name);

            $folder = match ($slug) {
                'nam' => 'Watch/Watch_nam',
                'cap-doi' => 'Watch/Watch_cap',
                default => 'Watch/Watch_nu',
            };

            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $folder, $imageName);

            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('admin.products_index')->with('success', 'Cập nhật sản phẩm thành công!');
    }


//-------------XÓA--------------------------
    public function destroy($id)
    {
        $product = \App\Models\Product::findOrFail($id);

        // Xoá ảnh khỏi thư mục lưu trữ (tuỳ thuộc folder)
        $categorySlug = \Illuminate\Support\Str::slug($product->category->name ?? '');
        $folder = match ($categorySlug) {
            'nam' => 'Watch/Watch_nam',
            'cap-doi' => 'Watch/Watch_cap',
            default => 'Watch/Watch_nu',
        };

        // Xoá file ảnh nếu có
        $imagePath = 'public/' . $folder . '/' . $product->image;
        if (\Storage::exists($imagePath)) {
            \Storage::delete($imagePath);
        }

        // Xoá sản phẩm
        $product->delete();

        return redirect()->route('admin.products_index')->with('success', 'Đã xoá sản phẩm thành công!');
    }







}