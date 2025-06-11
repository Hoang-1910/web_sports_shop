document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.wishlist-form').forEach(form => {
        const productId = form.dataset.productId;
        const icon = form.querySelector('i');
        const button = form.querySelector('button');
        const isFavorite = form.dataset.favorite === 'true';

        // Đặt icon đúng ban đầu
        icon.classList.remove('far', 'fas', 'text-danger');
        if (isFavorite) {
            icon.classList.add('fas', 'text-danger');
        } else {
            icon.classList.add('far');
        }

        // Ngăn form submit mặc định
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const currentlyFav = icon.classList.contains('fas');
            const url = currentlyFav ? '/wishlist/remove' : '/wishlist/add';

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ product_id: productId })
            })
                .then(res => {
                    if (res.status === 401) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Bạn cần đăng nhập',
                            text: 'Vui lòng đăng nhập để sử dụng chức năng yêu thích.',
                            confirmButtonColor: '#d33'
                        });
                        throw new Error('Chưa đăng nhập');
                    }
                    return res.json();
                })
                .then(data => {
                    // Toggle icon
                    icon.classList.toggle('fas');
                    icon.classList.toggle('far');
                    icon.classList.toggle('text-danger');

                    // Cập nhật trạng thái
                    form.dataset.favorite = icon.classList.contains('fas') ? 'true' : 'false';

                    Swal.fire({
                        icon: currentlyFav ? 'info' : 'success',
                        title: currentlyFav ? 'Đã xóa khỏi yêu thích!' : 'Đã thêm vào yêu thích!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch(err => {
                    console.error('Lỗi:', err);
                });
        });
    });
});
