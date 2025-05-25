document.addEventListener('DOMContentLoaded', function() {
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
            
            // Simulate form submission
            setTimeout(() => {
                submitText.classList.remove('d-none');
                submitLoading.classList.add('d-none');
                submitBtn.disabled = false;
                
                messageDiv.classList.remove('d-none');
                messageDiv.className = 'mt-2 alert alert-success small';
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
});

document.addEventListener('DOMContentLoaded', function() {
    // Auto-hide search on mobile when clicked outside
    const mobileSearch = document.getElementById('mobileSearch');
    const searchToggle = document.querySelector('.search-toggle');
    
    if (searchToggle && mobileSearch) {
        document.addEventListener('click', function(e) {
            if (!mobileSearch.contains(e.target) && !searchToggle.contains(e.target)) {
                const bsCollapse = new bootstrap.Collapse(mobileSearch, {
                    toggle: false
                });
                bsCollapse.hide();
            }
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && document.querySelector(href)) {
                e.preventDefault();
                document.querySelector(href).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Close mobile menu when clicking on links
    const mobileNavLinks = document.querySelectorAll('#mobileMenu .mobile-nav-link');
    const offcanvas = document.getElementById('mobileMenu');
    
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (this.getAttribute('href') !== '#') {
                const bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvas);
                if (bsOffcanvas) {
                    bsOffcanvas.hide();
                }
            }
        });
    });
});