@extends('admin.layouts.app')

@section('title', 'Danh sách danh mục')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f4f6fa;
    }

    .category-wrapper {
        max-width: 1080px;
        margin: 40px auto;
        background: linear-gradient(145deg, #ffffff, #f0f0f0);
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
        padding: 30px 40px;
    }

    .category-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .category-header h2 {
        font-size: 26px;
        color: #4b2adb;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .category-header h2::before {
        content: '📁';
        font-size: 24px;
    }

    .btn-add {
        padding: 10px 18px;
        background: linear-gradient(to right, #6c5ce7, #341f97);
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-add:hover {
        background: linear-gradient(to right, #5a4ecb, #2d197a);
        transform: translateY(-1px);
    }

    .success-alert {
        background: #d0f8e8;
        color: #2e7d32;
        padding: 12px 18px;
        border-radius: 8px;
        font-weight: 600;
        margin-bottom: 20px;
        box-shadow: inset 0 0 0 1px #b9efdc;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        padding: 14px 20px;
        border-bottom: 1px solid #eaeaea;
        text-align: left;
    }

    th {
        background: #f7f7fb;
        font-weight: 600;
        color: #555;
    }

    tr:hover {
        background-color: #f5f2ff;
        transition: background-color 0.2s ease;
    }

    .action-group a, .action-group form {
        display: inline-block;
        margin-right: 10px;
    }

    .action-group a {
        color: #2980b9;
        text-decoration: none;
        font-weight: 600;
    }

    .action-group a:hover {
        text-decoration: underline;
    }

    .delete-btn {
        background: none;
        border: none;
        color: #c0392b;
        font-weight: 600;
        cursor: pointer;
    }

    .delete-btn:hover {
        text-decoration: underline;
    }

    .pagination {
        margin-top: 25px;
        text-align: center;
    }

    .no-data {
        text-align: center;
        padding: 30px;
        color: #888;
        font-style: italic;
    }
</style>

<div class="category-wrapper">
    <div class="category-header">
        <h2>Danh sách danh mục</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn-add">+ Thêm mới</a>
    </div>

    @if(session('success'))
        <div class="success-alert">✅ {{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $c)
                <tr>

                    <th class="p-4 text-left font-semibold text-gray-700">#</th>
                    <th class="p-4 text-left font-semibold text-gray-700">Tên danh mục</th>
                    <th class="p-4 text-left font-semibold text-gray-700">Mô tả</th>
                    <th class="p-4 text-left font-semibold text-gray-700">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="border-t hover:bg-purple-50 transition">
                    <td class="p-4">{{ $loop->iteration }}</td>
                    <td class="p-4 font-medium text-gray-900">{{ $category->name }}</td>
                    <td class="p-4 text-gray-700">{{ $category->description }}</td>
                    <td class="p-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                               class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition text-sm font-medium shadow-sm">
                                <span class="material-icons text-base mr-1">edit</span> Sửa
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Xóa danh mục này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition text-sm font-medium shadow-sm">
                                    <span class="material-icons text-base mr-1">delete</span> Xóa
                                </button>
                            </form>
                        </div>

                    <td>{{ $c->id }}</td>
                    <td>{{ $c->name }}</td>
                    <td class="action-group">
                        <a href="{{ route('admin.categories.edit', $c) }}">Sửa</a>
                        <form method="POST" action="{{ route('admin.categories.destroy', $c) }}" onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này?')">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">Xóa</button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="no-data">Không có danh mục nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $categories->links() }}
    </div>
</div>
@endsection
