document.addEventListener('DOMContentLoaded', function () {
    // Newsletter form submission
    const newsletterForm = document.getElementById('newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function (e) {
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

