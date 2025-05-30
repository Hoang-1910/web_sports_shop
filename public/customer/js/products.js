document.addEventListener('DOMContentLoaded', function() {
    // View Toggle
    const viewButtons = document.querySelectorAll('[data-view]');
    const productsGrid = document.getElementById('products-grid');
    
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const view = this.dataset.view;
            
            // Update active state
            viewButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Update grid/list view
            if (view === 'list') {
                productsGrid.classList.add('list-view');
                productsGrid.querySelectorAll('.col-xl-4').forEach(col => {
                    col.classList.remove('col-xl-4');
                    col.classList.add('col-12');
                });
            } else {
                productsGrid.classList.remove('list-view');
                productsGrid.querySelectorAll('.col-12').forEach(col => {
                    col.classList.remove('col-12');
                    col.classList.add('col-xl-4');
                });
            }
        });
    });
    
    // Size Buttons
    const sizeButtons = document.querySelectorAll('.size-buttons .btn');
    sizeButtons.forEach(button => {
        button.addEventListener('click', function() {
            this.classList.toggle('active');
        });
    });
    
    // Color Buttons
    const colorButtons = document.querySelectorAll('.color-buttons .btn');
    colorButtons.forEach(button => {
        button.addEventListener('click', function() {
            colorButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Price Range
    const priceRange = document.getElementById('priceRange');
    if (priceRange) {
        priceRange.addEventListener('input', function() {
            // Update price display or filter products
            console.log('Price range:', this.value);
        });
    }
    
    // Reset Filters
    const resetButton = document.getElementById('resetFilters');
    if (resetButton) {
        resetButton.addEventListener('click', function() {
            // Reset all checkboxes
            document.querySelectorAll('.form-check-input').forEach(input => {
                input.checked = false;
            });
            
            // Reset price range
            if (priceRange) {
                priceRange.value = priceRange.max;
            }
            
            // Reset size buttons
            sizeButtons.forEach(button => {
                button.classList.remove('active');
            });
            
            // Reset color buttons
            colorButtons.forEach(button => {
                button.classList.remove('active');
            });
            
            // Reset search
            document.getElementById('searchFilter').value = '';
        });
    }
    
    // Wishlist functionality
    document.querySelectorAll('.wishlist-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const icon = this.querySelector('i');
            const productId = this.dataset.productId;
            
            // Toggle icon
            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                this.classList.add('text-danger');
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                this.classList.remove('text-danger');
            }
        });
    });
    
    // Add to cart functionality
    document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.dataset.productId;
            const originalText = this.innerHTML;
            
            // Show loading state
            this.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Đang thêm...';
            this.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-check me-2"></i>Đã thêm';
                this.classList.remove('btn-danger');
                this.classList.add('btn-success');
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('btn-success');
                    this.classList.add('btn-danger');
                    this.disabled = false;
                }, 2000);
            }, 1000);
        });
    });
});