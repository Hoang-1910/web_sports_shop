<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="{{ asset('customer/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <title>SportShop</title>
</head>
<body>
    @include('customer.layouts.nav')

    <div class="container-fluid p-0">
        <main>
            @yield('content')
        </main>
    </div>

    @include('customer.layouts.footer')
    
    <!-- Core JS -->
    <script src="{{ asset('customer/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <!-- Additional JS -->
    @stack('scripts')
    {{-- Thêm vào cuối file hoặc @push('scripts') --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Thành công',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false    
        });
    </script>
    @endif
    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: '{{ session('error') }}',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
    @endif
    <!-- Additional CSS -->
    @stack('styles')
</body>
</html>