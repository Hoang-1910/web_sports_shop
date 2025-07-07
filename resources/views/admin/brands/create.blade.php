@extends('admin.layouts.app')

@section('title', 'Thêm thương hiệu')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow p-6">
    <h2 class="text-xl font-bold mb-4">Thêm thương hiệu</h2>
    <form action="{{ route('admin.brands.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block font-semibold">Tên thương hiệu</label>
            <input name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2">
            @error('name')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.brands.index') }}" class="px-4 py-2 bg-gray-200 rounded">Hủy</a>
            <button class="px-4 py-2 bg-purple-600 text-white rounded ml-2">Lưu</button>
        </div>
    </form>
</div>
@endsection
