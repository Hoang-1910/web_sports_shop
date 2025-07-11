@extends('admin.layouts.app')
@section('title', 'Sửa nhà cung cấp')
@section('content')
<div class="container mx-auto py-8 max-w-xl">
    <h2 class="text-2xl font-bold text-indigo-700 mb-6">Sửa nhà cung cấp</h2>
    <form method="POST" action="{{ route('admin.suppliers.update', $supplier) }}" class="bg-white rounded-xl shadow p-6">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block font-semibold mb-1">Tên nhà cung cấp <span class="text-red-500">*</span></label>
            <input type="text" name="name" class="p-2 w-full rounded border-gray-300 focus:border-indigo-400 focus:ring focus:ring-indigo-100 shadow-sm" required value="{{ old('name', $supplier->name) }}">
            @error('name')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Địa chỉ</label>
            <input type="text" name="address" class="p-2 w-full rounded border-gray-300 focus:border-indigo-400 focus:ring focus:ring-indigo-100 shadow-sm" value="{{ old('address', $supplier->address) }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Điện thoại</label>
            <input type="text" name="phone" class="p-2 w-full rounded border-gray-300 focus:border-indigo-400 focus:ring focus:ring-indigo-100 shadow-sm" value="{{ old('phone', $supplier->phone) }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" class="p-2 w-full rounded border-gray-300 focus:border-indigo-400 focus:ring focus:ring-indigo-100 shadow-sm" value="{{ old('email', $supplier->email) }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Ghi chú</label>
            <textarea name="note" class="p-2 w-full rounded border-gray-300 focus:border-indigo-400 focus:ring focus:ring-indigo-100 shadow-sm">{{ old('note', $supplier->note) }}</textarea>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.suppliers.index') }}" class="mr-4 px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Hủy</a>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Cập nhật</button>
        </div>
    </form>
</div>
@endsection 