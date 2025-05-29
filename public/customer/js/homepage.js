// Enhanced JavaScript functionality
document.addEventListener('DOMContentLoaded', function() {
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
            
            // Send to backend (implement your wishlist logic)
            // fetch('/wishlist/toggle', { ... })
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
            
            // Simulate API call (replace with actual implementation)
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
    
    // Newsletter form submission
    const newsletterForm = document.getElementById('newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('newsletter-submit');
            const submitText = submitBtn.querySelector('.submit-text');
            const submitLoading = submitBtn.querySelector('.submit-loading');
            const messageDiv = document.getElementById('newsletter-message');
            
            // Show loading state
            submitText.classList.add('d-none');
            submitLoading.classList.remove('d-none');
            submitBtn.disabled = true;
            
            // Simulate form submission (replace with actual implementation)
            setTimeout(() => {
                submitText.classList.remove('d-none');
                submitLoading.classList.add('d-none');
                submitBtn.disabled = false;
                
                messageDiv.classList.remove('d-none');
                messageDiv.className = 'mt-3 alert alert-success';
                messageDiv.textContent = 'Đăng ký thành công! Cảm ơn bạn đã quan tâm.';
                
                // Reset form
                this.reset();
                
                // Hide message after 5 seconds
                setTimeout(() => {
                    messageDiv.classList.add('d-none');
                }, 5000);
            }, 2000);
        });
    }
    
    // Lazy loading for images (if needed)
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        observer.unobserve(img);
                    }
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
});
