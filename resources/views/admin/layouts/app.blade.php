<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Sports Shop</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Material Icons (Optional) -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- Navbar --}}
    <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-purple-700">SportsShop Admin</h1>

        <div class="flex items-center space-x-4">
            <span class="text-gray-600">Welcome, {{ Auth::user()->name }}</span>
            <img src="https://i.pravatar.cc/40" alt="Avatar" class="w-10 h-10 rounded-full">
        </div>
    </header>

    {{-- Nội dung chính --}}
    <main>
        <div class="flex h-screen bg-gray-100">
            {{-- Sidebar --}}
            <aside class="w-64 bg-white shadow-md p-4">
        
                <nav class="space-y-2">
                    <a href="#" class="flex items-center text-gray-700 hover:text-purple-700">
                        Sản phẩm
                    </a>
                    <a href="#" class="flex items-center text-gray-700 hover:text-purple-700">
                        Danh mục sản phẩm
                    </a>
                    <a href="#" class="flex items-center text-gray-700 hover:text-purple-700">
                        <span class="material-icons mr-2">message</span> Messages
                    </a>
                    <a href="#" class="flex items-center text-gray-700 hover:text-purple-700">
                        <span class="material-icons mr-2">bar_chart</span> Statistics
                    </a>
                </nav>
        
                <div class="mt-8">
                    <h2 class="text-sm text-gray-500 uppercase mb-2">Projects on Deadlines</h2>
                    <div class="bg-red-100 text-red-700 px-3 py-2 rounded-md text-sm">
                        Develop Chat Application
                    </div>
                </div>
            </aside>
        
            @yield('content')
        </div>
    </main>

</body>
</html>
