@extends('admin.layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Danh sách sản phẩm</h2>
        <a href="{{ route('admin.products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Thêm sản phẩm</a>
    </div>

    <table class="w-full border rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 text-left">#</th>
                <th class="p-3 text-left">Tên</th>
                <th class="p-3 text-left">Giá</th>
                <th class="p-3 text-left">Giảm giá</th>
                <th class="p-3 text-left">Kho</th>
                <th class="p-3 text-left">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="border-t">
                <td class="p-3">{{ $product->id }}</td>
                <td class="p-3">{{ $product->name }}</td>
                <td class="p-3">{{ number_format($product->price, 0, ',', '.') }} đ</td>
                <td class="p-3">{{ $product->discount }}%</td>
                <td class="p-3">{{ $product->stock }}</td>
                <td class="p-3 flex space-x-2">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-500">Sửa</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Xóa sản phẩm này?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
