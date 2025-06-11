document.addEventListener('DOMContentLoaded', function () {
    updateCartTotals();

    // Nút tăng/giảm số lượng
    document.querySelectorAll('.quantity-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const input = this.closest('.quantity-control').querySelector('input');
            let currentValue = parseInt(input.value) || 1;
            const action = this.dataset.action;
            const max = parseInt(input.dataset.max) || 10;

            if (action === 'increase' && currentValue < max) {
                input.value = currentValue + 1;
            } else if (action === 'decrease' && currentValue > 1) {
                input.value = currentValue - 1;
            }

            input.dispatchEvent(new Event('change'));
        });
    });

    // Khi người dùng thay đổi số lượng thủ công
    document.querySelectorAll('.quantity-control input').forEach(input => {
        input.addEventListener('change', function () {
            let value = parseInt(this.value);
            const max = parseInt(this.dataset.max) || 10;

            if (isNaN(value) || value < 1) value = 1;
            if (value > max) value = max;

            this.value = value;

            // Không gửi request lên server, chỉ cập nhật giao diện
            updateCartTotals();
        });
    });

    // Hàm cập nhật tổng tiền
    function updateCartTotals() {
        let subtotal = 0;

        document.querySelectorAll('.cart-item').forEach(item => {
            const priceEl = item.querySelector('.item-price');
            if (!priceEl) return;

            const rawPrice = priceEl.dataset.price || '0';
            const price = parseFloat(rawPrice);  // dạng 200000.00

            const quantityInput = item.querySelector('.quantity-control input');
            const quantity = parseInt(quantityInput?.value) || 1;

            const itemTotal = price * quantity;

            const itemTotalEl = item.querySelector('.item-total');
            if (itemTotalEl) {
                itemTotalEl.innerText = itemTotal.toLocaleString('vi-VN') + 'đ';
            }

            subtotal += itemTotal;
        });

        // Cập nhật tạm tính và tổng cộng
        document.querySelector('.summary-details .fw-semibold').innerText = subtotal.toLocaleString('vi-VN') + 'đ';
        const total = subtotal + 30000;
        document.querySelector('.summary-details .fs-5').innerText = total.toLocaleString('vi-VN') + 'đ';
    }
});
