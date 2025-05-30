@extends('admin.layouts.app')

@section('title', 'Thêm danh mục mới')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-purple-700 mb-6 flex items-center gap-2">
        <span class="material-icons text-purple-500">add</span>
        Thêm danh mục mới
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

    <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Tên danh mục <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Mô tả</label>
            <textarea name="description" rows="3" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-300">{{ old('description') }}</textarea>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.categories.index') }}" class="mr-4 px-5 py-2 rounded bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold transition">Quay lại</a>
            <button type="submit" class="bg-gradient-to-r from-purple-500 to-blue-500 hover:from-purple-600 hover:to-blue-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition">
                <span class="material-icons align-middle text-base mr-1">save</span>
                Lưu danh mục
            </button>
        </div>
    </form>
</div>
@endsection