document.addEventListener('DOMContentLoaded', function () {
    // Nút tăng/giảm số lượng
    document.querySelectorAll('.quantity-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const input = this.closest('.quantity-control').querySelector('input');
            let currentValue = parseInt(input.value) || 1;
            const action = this.dataset.action;
            const max = parseInt(input.dataset.max) || 100;
            if (action === 'increase' && currentValue < max) {
                input.value = currentValue + 1;
            } else if (action === 'decrease' && currentValue > 1) {
                input.value = currentValue - 1;
            }
            input.dispatchEvent(new Event('change'));
        });
    });

    // Khi số lượng thay đổi thì update thành tiền và tổng tiền (JS only)
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function () {
            const row = input.closest('.cart-item');
            const price = parseInt(row.querySelector('.item-price').dataset.price) || 0;
            const quantity = parseInt(input.value) || 1;
            // Update thành tiền từng dòng
            const itemTotal = row.querySelector('.item-total');
            itemTotal.textContent = (price * quantity).toLocaleString() + 'đ';

            // Update tổng tiền các sản phẩm
            let subtotal = 0;
            document.querySelectorAll('.cart-item').forEach(row => {
                const q = parseInt(row.querySelector('.quantity-input').value) || 1;
                const p = parseInt(row.querySelector('.item-price').dataset.price) || 0;
                subtotal += q * p;
            });
            // Update phần tổng tạm tính
            const subtotalEl = document.getElementById('cartSubtotal');
            if (subtotalEl) subtotalEl.textContent = subtotal.toLocaleString() + 'đ';

            // Update tổng cộng (có phí ship)
            const totalEl = document.getElementById('cartTotal');
            if (totalEl) {
                const shipping = 30000;
                totalEl.textContent = (subtotal + shipping).toLocaleString() + 'đ';
            }
        });
    });

    // Khi vào trang, tính toán lại tổng ban đầu (nếu cần)
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.dispatchEvent(new Event('change'));
    });
});
