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
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td class="action-group">
                        <a href="{{ route('admin.categories.edit', $category->id) }}">Sửa</a>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}" style="display:inline;" onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này?')">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="no-data">Không có danh mục nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $categories->links() }}
    </div>
</div>
@endsection
