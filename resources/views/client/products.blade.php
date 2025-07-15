@extends('client.layouts.app')

@section('title')
    @if(isset($currentBrand) && isset($currentCategory))
        {{ $currentBrand->name . ' ' . $currentCategory->name }} - TickTock Shop
    @else
        Sản phẩm - TickTock Shop
    @endif
@endsection

@section('content')
<section class="product-page">
    <div class="container">
        <div class="product-page-top row">
            <p><a href="{{ route('home') }}">Trang chủ</a></p> <span>&#10230;</span>
            @if(isset($currentCategory))
                <p><a href="{{ route('products.category', ['category' => Str::slug($currentCategory->name)]) }}">{{ $currentCategory->name }}</a></p> <span>&#10230;</span>
            @endif
            <p>
                @if(isset($currentBrand) && isset($currentCategory))
                    {{ $currentBrand->name }} {{ strtolower($currentCategory->name) }}
                @else
                    Tất cả sản phẩm
                @endif
            </p>
        </div>

        <div class="row">
            <div class="product-page-left">
                <ul>
                    @foreach($categories as $cat)
                        <li class="product-page-left-li"><a href="#">{{ strtoupper($cat->name) }}</a>
                            <ul>
                                @foreach($brands as $br)
                                    <li>
                                        <a href="{{ route('products.filter', ['category' => Str::slug($cat->name), 'brand' => Str::slug($br->name)]) }}">
                                            {{ $br->name }} {{ strtolower($cat->name) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="product-page-right row">
                <div class="product-page-right-top-item">
                    <p>
                        @if(isset($currentBrand) && isset($currentCategory))
                            {{ strtoupper($currentBrand->name) }} {{ strtolower($currentCategory->name) }}
                        @else
                            TẤT CẢ SẢN PHẨM
                        @endif
                    </p>
                </div>

            <div class="filter-group">
                {{-- Dropdown: Khoảng giá --}}
                <select name="price_range" class="filter-select select-box" onchange="handlePriceFilter(this)">

                    <option value="">-- Khoảng giá --</option>
                    <option value="0-1000000">Dưới 1 triệu</option>
                    <option value="1000000-3000000">1 - 3 triệu</option>
                    <option value="3000000-5000000">3 - 5 triệu</option>
                    <option value="5000000-10000000">5 - 10 triệu</option>
                    <option value="10000000-999999999">Trên 10 triệu</option>
                </select>
            </div>


                <div class="product-page-right-top-item">
                    <select onchange="location = this.value;" class="select-box">
                        <option value="{{ request()->url() }}" {{ request('sort') == null ? 'selected' : '' }}>Sắp xếp</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'desc']) }}"
                            {{ request('sort') == 'desc' ? 'selected' : '' }}>
                            Giá cao đến thấp
                        </option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'asc']) }}"
                            {{ request('sort') == 'asc' ? 'selected' : '' }}>
                            Giá thấp đến cao
                        </option>
                    </select>
                </div>

                <div class="product-page-right-content row">
                    @forelse($products as $product)
                        <div class="product-page-right-content-item">
                            <img src="{{ asset('storage/Watch/' . $product->image) }}" alt="{{ $product->name }}">
                            <h1>{{ $product->name }}</h1>
                            <p>{{ number_format($product->price, 0, ',', '.') }}<sup>đ</sup></p>
                        </div>
                    @empty
                        <p>Không có sản phẩm nào.</p>
                    @endforelse
                </div>

                <div class="product-page-right-bottom row">
                    <div class="product-page-right-bottom-items">
                        <p>Hiển thị {{ $products->count() }} sản phẩm</p>
                    </div>
                    <div class="product-page-right-bottom-items pagination-wrapper">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
