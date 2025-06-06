{{-- filepath: c:\xampp\htdocs\web_sports_shop\resources\views\admin\products\edit.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Sửa sản phẩm')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-purple-700 mb-6 flex items-center gap-2">
        <span class="material-icons text-purple-500">edit</span>
        Sửa sản phẩm
    </h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold mb-1">Tên sản phẩm</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Thương hiệu</label>
            <input type="text" name="brand" value="{{ old('brand', $product->brand) }}" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Danh mục</label>
            <select name="category_id" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(old('category_id', $product->category_id) == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold mb-1">Giá</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Giảm giá (%)</label>
            <input type="number" name="discount" value="{{ old('discount', $product->discount) }}" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Mô tả</label>
            <textarea name="description" rows="3" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label class="block font-semibold mb-1">Ảnh sản phẩm hiện tại</label>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded shadow mb-2">
            @else
                <span class="text-gray-400 italic">Không có ảnh</span>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300 mt-2">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.products.index') }}" class="mr-4 px-5 py-2 rounded bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold transition">Quay lại</a>
            <button type="submit" class="bg-gradient-to-r from-purple-500 to-blue-500 hover:from-purple-600 hover:to-blue-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition">
                <span class="material-icons align-middle text-base mr-1">save</span>
                Lưu thay đổi
            </button>
        </div>
    </form>

    {{-- Quản lý lựa chọn (biến thể) --}}
    <div class="mt-10">
        <h3 class="text-xl font-bold text-purple-700 mb-4 flex items-center gap-2">
            <span class="material-icons text-purple-500">tune</span>
            Lựa chọn/biến thể sản phẩm
        </h3>
        <table class="w-full mb-4">
            <thead>
                <tr>
                    <th class="p-2 text-left">Size</th>
                    <th class="p-2 text-left">Màu</th>
                    <th class="p-2 text-left">Giá</th>
                    <th class="p-2 text-left">Ảnh</th>
                    <th class="p-2 text-left">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product->variants as $variant)
                <tr class="border-t">
                    <td class="p-2">{{ $variant->size ?? '-' }}</td>
                    <td class="p-2">{{ $variant->color ?? '-' }}</td>
                    <td class="p-2">{{ number_format($variant->price, 0, ',', '.') }} đ</td>
                    <td class="p-2">
                        @if($variant->images->count())
                            <div class="flex gap-1">
                                @foreach($variant->images as $img)
                                    <img src="{{ asset('storage/' . $img->image_path) }}" class="w-10 h-10 object-cover rounded" alt="Ảnh biến thể">
                                @endforeach
                            </div>
                        @else
                            <span class="text-gray-400 italic">Không có ảnh</span>
                        @endif
                    </td>
                    <td class="p-2">
                        <a href="{{ route('admin.variants.edit', $variant->id) }}" class="text-yellow-600 hover:underline mr-2">Sửa</a>
                        <form action="{{ route('admin.variants.destroy', $variant->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Xóa lựa chọn này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.variants.create', ['product' => $product->id]) }}">
            Thêm lựa chọn mới
        </a>
    </div>
</div>
@endsection