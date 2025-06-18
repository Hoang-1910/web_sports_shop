<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard - Sports Shop</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-gradient-to-br from-purple-100 via-white to-purple-200 min-h-screen">

    {{-- Navbar --}}
    <header class="bg-white shadow-lg px-8 py-5 flex justify-between items-center">
        <h1 class="text-2xl font-extrabold text-purple-700 tracking-wide flex items-center gap-2">
            <span class="material-icons text-purple-600">sports_soccer</span>
            SportsShop Admin
        </h1>
        <div class="flex items-center space-x-4">
            <span class="text-gray-700 font-medium">Welcome, {{ Auth::user()->name }}</span>
            <img src="https://i.pravatar.cc/40" alt="Avatar"
                class="w-11 h-11 rounded-full border-2 border-purple-300 shadow" />
        </div>
    </header>

    {{-- Main Content --}}
    <main>
        <div class="flex min-h-[calc(100vh-80px)]">
            {{-- Sidebar --}}
            <aside
                class="w-72 bg-white shadow-2xl p-6 flex flex-col justify-between rounded-tr-3xl rounded-br-3xl mt-2">
                <nav class="space-y-3">

                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-purple-100 hover:text-purple-700 transition">
                        <span class="material-icons">dashboard</span>
                        <span class="font-semibold">Bảng điều khiển</span>
                    </a>
                    <a href="{{ route('admin.products.index') }}"
                        class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-purple-100 hover:text-purple-700 transition">
                        <span class="material-icons">inventory_2</span>
                        <span class="font-semibold">Sản phẩm</span>
                    </a>
                    <a href="{{ route('admin.categories.index') }}"
                        class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-purple-100 hover:text-purple-700 transition">
                        <span class="material-icons">category</span>
                        <span class="font-semibold">Danh mục sản phẩm</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}"
                        class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-purple-100 hover:text-purple-700 transition">
                        <span class="material-icons">people</span>
                        <span class="font-semibold">Danh mục tài khoản</span>
                    </a>
                    <a href="{{ route('admin.reviews.index') }}"
                        class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-purple-100 hover:text-purple-700 transition">
                        <span class="material-icons">shopping_cart</span>
                        <span class="font-semibold">Đánh Giá</span>
                    </a>
                    <a href="{{ route('admin.orders.index') }}"
                        class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-purple-100 hover:text-purple-700 transition">
                        <span class="material-icons">shopping_cart</span>
                        <span class="font-semibold">Danh mục đơn hàng </span>
                    </a>
                    <a href="{{ route('admin.stock_imports.index') }}"
                        class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-purple-100 hover:text-purple-700 transition">
                        <span class="material-icons">inventory</span>
                        <span class="font-semibold">Phiếu nhập kho</span>
                    </a>
                </nav>
            </aside>

            <section class="flex-1 p-8">
                @yield('content')
            </section>
        </div>
    </main>

    {{-- Thêm đoạn này để nạp các script đẩy từ view con --}}
    @stack('scripts')

</body>

</html>
