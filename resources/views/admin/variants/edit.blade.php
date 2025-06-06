{{-- filepath: resources/views/admin/variants/edit.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Sửa lựa chọn/biến thể sản phẩm')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-purple-700 mb-6 flex items-center gap-2">
        <span class="material-icons text-purple-500">edit</span>
        Sửa lựa chọn/biến thể sản phẩm
    </h2>

    <form action="{{ route('admin.variants.update', $variant->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')
        <input type="hidden" name="product_id" value="{{ $variant->product_id }}">

        <div>
            <label class="block font-semibold mb-1">Size</label>
            <input type="text" name="size" value="{{ old('size', $variant->size) }}" class="w-full border rounded px-4 py-2">
        </div>
        <div>
            <label class="block font-semibold mb-1">Màu</label>
            <input type="text" name="color" value="{{ old('color', $variant->color) }}" class="w-full border rounded px-4 py-2">
        </div>
        <div>
            <label class="block font-semibold mb-1">Giá</label>
            <input type="number" name="price" value="{{ old('price', $variant->price) }}" class="w-full border rounded px-4 py-2">
        </div>
        <div>
            <label class="block font-semibold mb-1">Tồn kho</label>
            <input type="number" name="stock" value="{{ old('stock', $variant->stock) }}" class="w-full border rounded px-4 py-2">
        </div>
        <div>
            <label class="block font-semibold mb-1">Ảnh hiện tại</label>
            <div class="flex gap-2 mb-2">
                @forelse($variant->images as $img)
                    <div class="relative">
                        <img src="{{ asset('storage/' . $img->image_path) }}" class="w-14 h-14 object-cover rounded border">
                        <form action="{{ route('admin.variant_images.destroy', $img->id) }}" method="POST" class="absolute top-0 right-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs" title="Xóa ảnh">&times;</button>
                        </form>
                    </div>
                @empty
                    <span class="text-gray-400 italic">Không có ảnh</span>
                @endforelse
            </div>
            <input type="file" name="images[]" multiple accept="image/*" class="w-full border rounded px-4 py-2">
            <small class="text-gray-500">Chọn để thêm ảnh mới (có thể chọn nhiều)</small>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.products.edit', $variant->product_id) }}" class="mr-4 px-5 py-2 rounded bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold">Quay lại</a>
            <button type="submit" class="bg-gradient-to-r from-purple-500 to-blue-500 text-white px-6 py-2 rounded-lg font-semibold shadow">Lưu thay đổi</button>
        </div>
    </form>
</div>
@endsection