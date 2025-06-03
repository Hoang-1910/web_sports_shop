document.addEventListener('DOMContentLoaded', function() {
    // Add to Cart
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            // TODO: Implement add to cart functionality
            alert('Đã thêm vào giỏ hàng!');
        });
    });

    // Remove from Wishlist
    const removeButtons = document.querySelectorAll('.remove-from-wishlist');
    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const wishlistItem = this.closest('.wishlist-item');
            
            // TODO: Implement remove from wishlist functionality
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi danh sách yêu thích?')) {
                wishlistItem.remove();
                // Update wishlist count
                const countElement = document.querySelector('.wishlist-header .text-danger');
                const currentCount = parseInt(countElement.textContent);
                countElement.textContent = currentCount - 1;
                
                // Show empty state if no items left
                if (currentCount - 1 === 0) {
                    const wishlistItems = document.querySelector('.wishlist-items');
                    wishlistItems.innerHTML = `
                        <div class="empty-wishlist bg-white rounded-4 shadow-sm p-5 text-center">
                            <div class="empty-icon mb-4">
                                <i class="far fa-heart fa-4x text-muted"></i>
                            </div>
                            <h3 class="h4 fw-bold mb-3">Danh sách yêu thích trống</h3>
                            <p class="text-muted mb-4">Bạn chưa thêm sản phẩm nào vào danh sách yêu thích.</p>
                            <a href="{{ route('products.index') }}" class="btn btn-danger">
                                <i class="fas fa-shopping-bag me-2"></i>Tiếp tục mua sắm
                            </a>
                        </div>
                    `;
                }
            }
        });
    });
});