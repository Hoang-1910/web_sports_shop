@extends('admin.layouts.app')

@section('title', 'Thêm sản phẩm mới')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-purple-700 mb-6 flex items-center gap-2">
        <span class="material-icons text-purple-500">add_box</span>
        Thêm sản phẩm mới
    </h2>

    @if ($errors->any())
        <div class="mb-4">
            <ul class="bg-red-100 text-red-700 px-4 py-3 rounded">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Tên sản phẩm <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Danh mục <span class="text-red-500">*</span></label>
            <select name="category_id" required class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
                <option value="">-- Chọn danh mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block font-semibold mb-1">Giá <span class="text-red-500">*</span></label>
                <input type="number" name="price" value="{{ old('price') }}" min="0" required class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
            </div>
            <div class="flex-1">
                <label class="block font-semibold mb-1">Giảm giá (%)</label>
                <input type="number" name="discount" value="{{ old('discount', 0) }}" min="0" max="100" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
            </div>
        </div>

        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block font-semibold mb-1">Kho <span class="text-red-500">*</span></label>
                <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0" required class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
            </div>
            <div class="flex-1">
                <label class="block font-semibold mb-1">Thương hiệu</label>
                <input type="text" name="brand" value="{{ old('brand') }}" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
            </div>
        </div>

        <div>
            <label class="block font-semibold mb-1">Mô tả</label>
            <textarea name="description" rows="3" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block font-semibold mb-1">Ảnh sản phẩm</label>
            <input type="file" name="image" accept="image/*" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.products.index') }}" class="mr-4 px-5 py-2 rounded bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold transition">Quay lại</a>
            <button type="submit" class="bg-gradient-to-r from-purple-500 to-blue-500 hover:from-purple-600 hover:to-blue-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition">
                <span class="material-icons align-middle text-base mr-1">save</span>
                Lưu sản phẩm
            </button>
        </div>
    </form>
</div>
@endsection