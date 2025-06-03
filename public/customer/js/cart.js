document.addEventListener('DOMContentLoaded', function() {
    // Quantity Controls
    const quantityBtns = document.querySelectorAll('.quantity-btn');
    quantityBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.parentElement.querySelector('input');
            const currentValue = parseInt(input.value);
            const action = this.dataset.action;
            
            if (action === 'increase' && currentValue < 10) {
                input.value = currentValue + 1;
            } else if (action === 'decrease' && currentValue > 1) {
                input.value = currentValue - 1;
            }
            
            // Trigger change event to update totals
            input.dispatchEvent(new Event('change'));
        });
    });
    
    // Remove Item
    const removeButtons = document.querySelectorAll('.remove-item');
    removeButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const cartItem = this.closest('.cart-item');
            cartItem.style.opacity = '0';
            setTimeout(() => {
                cartItem.remove();
                updateCartTotals();
            }, 300);
        });
    });
    
    // Clear Cart
    const clearCartBtn = document.getElementById('clearCart');
    if (clearCartBtn) {
        clearCartBtn.addEventListener('click', function() {
            if (confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm trong giỏ hàng?')) {
                const cartItems = document.querySelectorAll('.cart-item');
                cartItems.forEach(item => {
                    item.style.opacity = '0';
                    setTimeout(() => item.remove(), 300);
                });
                updateCartTotals();
            }
        });
    }
    
    // Update Cart Totals
    function updateCartTotals() {
        // Implement cart total calculation logic here
        console.log('Updating cart totals...');
    }
    
    // Quantity Input Change
    const quantityInputs = document.querySelectorAll('.quantity-control input');
    quantityInputs.forEach(input => {
        input.addEventListener('change', function() {
            const value = parseInt(this.value);
            if (value < 1) this.value = 1;
            if (value > 10) this.value = 10;
            updateCartTotals();
        });
    });
});