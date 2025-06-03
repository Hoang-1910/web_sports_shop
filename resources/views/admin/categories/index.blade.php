@extends('admin.layouts.app')

@section('title', 'Danh sách danh mục sản phẩm')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-purple-700 flex items-center gap-2">
            <span class="material-icons text-purple-500">category</span>
            Danh mục sản phẩm
        </h2>
        <a href="{{ route('admin.categories.create') }}" class="bg-gradient-to-r from-purple-500 to-blue-500 hover:from-purple-600 hover:to-blue-600 text-white px-5 py-2 rounded-lg shadow font-semibold transition">
            <span class="material-icons align-middle text-base mr-1">add</span>
            Thêm danh mục
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-lg overflow-x-auto">
        <table class="w-full min-w-[600px]">
            <thead class="bg-gradient-to-r from-purple-100 to-blue-100">
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
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection