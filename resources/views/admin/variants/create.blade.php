@extends('admin.layouts.app')

@section('title', 'Thêm lựa chọn/biến thể sản phẩm')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-purple-700 mb-6 flex items-center gap-2">
        <span class="material-icons text-purple-500">add_circle</span>
        Thêm lựa chọn/biến thể cho sản phẩm
    </h2>
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            <span class="material-icons align-middle mr-2">check_circle</span>
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <span class="material-icons align-middle mr-2">error</span>
            <strong>Có lỗi xảy ra:</strong>
            <ul class="list-disc pl-5 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.variants.store', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <div>
            <label class="block font-semibold mb-1">Size</label>
            <input type="text" name="size" value="{{ old('size') }}" class="w-full border rounded px-4 py-2">
        </div>
        <div>
            <label class="block font-semibold mb-1">Màu</label>
            <input type="text" name="color" value="{{ old('color') }}" class="w-full border rounded px-4 py-2">
        </div>
        <div>
            <label class="block font-semibold mb-1">Giá</label>
            <input type="number" name="price" value="{{ old('price') }}" class="w-full border rounded px-4 py-2">
        </div>
        <div>
            <label class="block font-semibold mb-1">Ảnh cho lựa chọn này</label>
            <input type="file" name="images[]" multiple accept="image/*" class="w-full border rounded px-4 py-2">
            <small class="text-gray-500">Có thể chọn nhiều ảnh</small>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.products.edit',['product' => $product->id]) }}" class="mr-4 px-5 py-2 rounded bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold">Quay lại</a>
            <button type="submit" class="bg-gradient-to-r from-purple-500 to-blue-500 text-white px-6 py-2 rounded-lg font-semibold shadow">Lưu lựa chọn</button>
        </div>
    </form>
</div>
@endsection