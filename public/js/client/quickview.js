document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('quickViewModal');
    const modalBody = document.getElementById('quick-view-body');

    // Gán sự kiện mở modal
    document.querySelectorAll('.product-quick-view').forEach(item => {
        item.addEventListener('click', function () {
            const slug = this.dataset.slug;

            fetch(`/quick-view/${slug}`)
                .then(res => res.text())
                .then(html => {
                    modalBody.innerHTML = html;
                    modal.style.display = 'block';
                });
        });
    });

    // ✅ Gán sự kiện cho nút đóng X trong modal (nằm trong nội dung tải bằng AJAX)
    modal.addEventListener('click', function (event) {
        if (event.target.classList.contains('close-modal')) {
            modal.style.display = 'none';
            modalBody.innerHTML = '';
        }

        // ✅ Gán sự kiện cho nút thêm vào giỏ
        if (event.target.classList.contains('btn-add-to-cart')) {
            const productId = event.target.dataset.id;
            const quantityInput = modal.querySelector('#quantity');
            const quantity = quantityInput ? quantityInput.value : 1;

            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity
                })
            })
            .then(res => res.json())
            .then(data => {
                alert('Đã thêm vào giỏ hàng!');
                modal.style.display = 'none';
                modalBody.innerHTML = '';
            })
            .catch(() => {
                alert('Lỗi khi thêm vào giỏ hàng!');
            });
        }
    });

    // ✅ Click ra ngoài modal để tắt
    window.addEventListener('click', function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
            modalBody.innerHTML = '';
        }
    });
});

