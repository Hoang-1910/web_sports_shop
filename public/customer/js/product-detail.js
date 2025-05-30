document.addEventListener('DOMContentLoaded', function() {
    // Thumbnail Image Click
    const thumbnails = document.querySelectorAll('.thumbnail');
    const mainImage = document.getElementById('mainProductImage');
    
    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            const imageUrl = this.dataset.image;
            mainImage.src = imageUrl;
            
            // Update active state
            thumbnails.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Quantity Controls
    const quantityInput = document.getElementById('quantity');
    const decreaseBtn = document.getElementById('decreaseQuantity');
    const increaseBtn = document.getElementById('increaseQuantity');
    
    decreaseBtn.addEventListener('click', () => {
        const currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });
    
    increaseBtn.addEventListener('click', () => {
        const currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    });
    
    // Size and Color Selection
    const sizeButtons = document.querySelectorAll('.size-btn');
    const colorButtons = document.querySelectorAll('.color-btn');
    
    sizeButtons.forEach(button => {
        button.addEventListener('click', function() {
            sizeButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    colorButtons.forEach(button => {
        button.addEventListener('click', function() {
            colorButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Add to Cart
    const addToCartBtn = document.getElementById('addToCart');
    addToCartBtn.addEventListener('click', function() {
        // TODO: Implement add to cart functionality
        alert('Đã thêm vào giỏ hàng!');
    });
    
    // Add to Wishlist
    const addToWishlistBtn = document.getElementById('addToWishlist');
    addToWishlistBtn.addEventListener('click', function() {
        // TODO: Implement add to wishlist functionality
        alert('Đã thêm vào danh sách yêu thích!');
    });
});