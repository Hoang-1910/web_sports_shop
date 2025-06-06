@extends('customer.layouts.app')

@section('title', 'Liên hệ')

@section('content')
<!-- Hero Section -->
<section class="contact-hero position-relative py-5" style="background: linear-gradient(135deg, #e53935 0%, #c62828 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-white">
                <h1 class="display-4 fw-bold mb-3">Liên hệ với chúng tôi</h1>
                <p class="lead mb-4">Chúng tôi luôn sẵn sàng hỗ trợ và giải đáp mọi thắc mắc của bạn!</p>
                <div class="d-flex gap-3">
                    <a href="#contact-form" class="btn btn-light btn-lg px-4">
                        <i class="fas fa-envelope me-2"></i>Gửi tin nhắn
                    </a>
                    <a href="#contact-info" class="btn btn-outline-light btn-lg px-4">
                        <i class="fas fa-info-circle me-2"></i>Thông tin liên hệ
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Info Section -->
<section id="contact-info" class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Phone -->
            <div class="col-md-4">
                <div class="contact-info-card bg-white rounded-4 p-4 text-center shadow-sm h-100">
                    <div class="contact-icon mb-3">
                        <i class="fas fa-phone-alt text-danger fs-1"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-2">Điện thoại</h3>
                    <p class="text-muted mb-2">Hotline hỗ trợ 24/7</p>
                    <a href="tel:19001234" class="text-danger fw-bold text-decoration-none">1900 1234</a>
                </div>
            </div>
            
            <!-- Email -->
            <div class="col-md-4">
                <div class="contact-info-card bg-white rounded-4 p-4 text-center shadow-sm h-100">
                    <div class="contact-icon mb-3">
                        <i class="fas fa-envelope text-danger fs-1"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-2">Email</h3>
                    <p class="text-muted mb-2">Phản hồi trong 24h</p>
                    <a href="mailto:info@sportshop.com" class="text-danger fw-bold text-decoration-none">info@sportshop.com</a>
                </div>
            </div>
            
            <!-- Address -->
            <div class="col-md-4">
                <div class="contact-info-card bg-white rounded-4 p-4 text-center shadow-sm h-100">
                    <div class="contact-icon mb-3">
                        <i class="fas fa-map-marker-alt text-danger fs-1"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-2">Địa chỉ</h3>
                    <p class="text-muted mb-2">Trụ sở chính</p>
                    <p class="text-danger fw-bold mb-0">123 Đường ABC, Quận 1, TP.HCM</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section id="contact-form" class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="text-center fw-bold mb-4">Gửi tin nhắn cho chúng tôi</h2>
                        
                        <form id="contactForm" class="needs-validation" novalidate>
                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Họ và tên <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" required>
                                    <div class="invalid-feedback">Vui lòng nhập họ tên của bạn</div>
                                </div>
                                
                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" required>
                                    <div class="invalid-feedback">Vui lòng nhập email hợp lệ</div>
                                </div>
                                
                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="tel" class="form-control" id="phone">
                                </div>
                                
                                <!-- Subject -->
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Chủ đề <span class="text-danger">*</span></label>
                                    <select class="form-select" id="subject" required>
                                        <option value="">Chọn chủ đề</option>
                                        <option value="support">Hỗ trợ khách hàng</option>
                                        <option value="order">Đơn hàng</option>
                                        <option value="product">Sản phẩm</option>
                                        <option value="other">Khác</option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn chủ đề</div>
                                </div>
                                
                                <!-- Message -->
                                <div class="col-12">
                                    <label for="message" class="form-label">Nội dung tin nhắn <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="message" rows="5" required></textarea>
                                    <div class="invalid-feedback">Vui lòng nhập nội dung tin nhắn</div>
                                </div>
                                
                                <!-- Submit Button -->
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-danger btn-lg px-5">
                                        <i class="fas fa-paper-plane me-2"></i>Gửi tin nhắn
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Vị trí của chúng tôi</h2>
        <div class="ratio ratio-21x9 rounded-4 overflow-hidden shadow-sm">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.424167741793!2d106.6984!3d10.7756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTDCsDQ2JzMyLjEiTiAxMDbCsDQxJzU4LjQiRQ!5e0!3m2!1svi!2s!4v1234567890!5m2!1svi!2s" 
                    style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Câu hỏi thường gặp</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    @php
                    $faqs = [
                        [
                            'question' => 'Làm thế nào để đặt hàng online?',
                            'answer' => 'Bạn có thể đặt hàng online bằng cách: 1) Chọn sản phẩm muốn mua, 2) Thêm vào giỏ hàng, 3) Điền thông tin giao hàng, 4) Chọn phương thức thanh toán, 5) Xác nhận đơn hàng.'
                        ],
                        [
                            'question' => 'Thời gian giao hàng là bao lâu?',
                            'answer' => 'Thời gian giao hàng phụ thuộc vào khu vực của bạn: - Nội thành TP.HCM: 1-2 ngày làm việc - Các tỉnh thành khác: 2-5 ngày làm việc - Khu vực miền núi: 5-7 ngày làm việc'
                        ],
                        [
                            'question' => 'Chính sách đổi trả như thế nào?',
                            'answer' => 'Chúng tôi chấp nhận đổi trả trong vòng 30 ngày kể từ ngày nhận hàng với điều kiện sản phẩm còn nguyên tem, mác và chưa qua sử dụng. Chi tiết vui lòng xem tại trang Chính sách đổi trả.'
                        ],
                        [
                            'question' => 'Có những phương thức thanh toán nào?',
                            'answer' => 'Chúng tôi chấp nhận các phương thức thanh toán sau: - Thẻ tín dụng/ghi nợ - Chuyển khoản ngân hàng - Thanh toán khi nhận hàng (COD) - Ví điện tử (Momo, ZaloPay, VNPay)'
                        ],
                        [
                            'question' => 'Làm sao để theo dõi đơn hàng?',
                            'answer' => 'Bạn có thể theo dõi đơn hàng bằng cách: 1) Đăng nhập vào tài khoản, 2) Vào mục "Đơn hàng của tôi", 3) Chọn đơn hàng cần theo dõi. Hoặc sử dụng mã đơn hàng để tra cứu trạng thái đơn hàng.'
                        ]
                    ];
                    @endphp

                    @foreach($faqs as $index => $faq)
                    <div class="accordion-item border-0 mb-3">
                        <h3 class="accordion-header">
                            <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" 
                                    data-bs-toggle="collapse" data-bs-target="#faq{{ $index }}">
                                {{ $faq['question'] }}
                            </button>
                        </h3>
                        <div id="faq{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" 
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link href="{{ asset('customer/css/contact.css') }}" rel="stylesheet">
@endpush