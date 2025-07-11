@extends('layouts/client')


@section('title', 'Trang tìm kiếm')

@section('content')
<div class="container mt-4">
    <h5>
        Tìm thấy <strong>{{ $products->count() }}</strong> kết quả cho từ khóa: <strong>{{ $keyword }}</strong>
    </h5>

    <div class="btn-group mb-3">
        <button class="btn btn-outline-secondary">Liên quan nhất</button>
        <button class="btn btn-outline-secondary">Bán chạy nhất</button>
        <button class="btn btn-outline-secondary">Xem nhiều nhất</button>
        <button class="btn btn-outline-danger">% SALE LỚN</button>
        <button class="btn btn-outline-secondary">Đánh giá nhiều</button>
    </div>

    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ $product->imageUrl }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <p class="card-text text-danger">{{ number_format($product->price, 0, ',', '.') }}₫</p>
                    </div>
                </div>
            </div>
        @empty
            <p>Không tìm thấy sản phẩm nào.</p>
        @endforelse
    </div>
</div>
@endsection
