@extends('admin.layouts.app')

@section('title', 'Quản lý thương hiệu')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold mb-4">Danh sách thương hiệu</h2>
        <a href="{{ route('admin.brands.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">Thêm thương hiệu</a>
    </div>
    <table class="w-full mt-4 border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">#</th>
                <th class="border px-3 py-2">Tên</th>
                <th class="border px-3 py-2">Slug</th>
                <th class="border px-3 py-2">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
            <tr class="text-center">
                <td class="border px-3 py-2">{{ $loop->iteration }}</td>
                <td class="border px-3 py-2">{{ $brand->name }}</td>
                <td class="border px-3 py-2">{{ $brand->slug }}</td>
                <td class="border px-3 py-2">
                    <a href="{{ route('admin.brands.edit', $brand) }}" class="text-blue-600 hover:underline">Sửa</a>
                    <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" class="inline" onsubmit="return confirm('Xác nhận xóa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline ml-2">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $brands->links() }}
    </div>
</div>
@endsection
