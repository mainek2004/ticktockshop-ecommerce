<div class="modal-content">
    <span class="close-modal">&times;</span>

    {{-- ✅ Bên trái --}}
    <div class="modal-quickview-left">
        <img src="{{ asset('storage/Watch/Watch_nu/' . $product->image) }}" alt="{{ $product->name }}">
    </div>

    {{-- ✅ Bên phải --}}
    <div class="modal-quickview-right">
        <h2>{{ $product->name }}</h2>
        <p class="price">{{ number_format($product->price, 0, ',', '.') }}<sup>đ</sup></p>
        <p><strong>Thương hiệu:</strong> {{ $product->brand->name }}</p>
        <p><strong>Danh mục:</strong> {{ $product->category->name }}</p>
        <p class="description">{{ $product->description }}</p>

        <div class="action-row">
            <div class="quantity-box">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
            </div>

            <button class="btn-add-to-cart" data-id="{{ $product->id }}">
                <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
            </button>
        </div>
    </div>
</div>