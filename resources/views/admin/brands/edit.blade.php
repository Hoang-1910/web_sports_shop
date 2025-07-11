@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa thương hiệu')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-semibold text-gray-800">
                <i class="fas fa-pen text-primary mr-2"></i>Chỉnh sửa thương hiệu
            </h2>
            <a href="{{ route('admin.brands.index') }}"
               class="text-sm text-gray-600 hover:text-blue-600 inline-flex items-center gap-1">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-800 p-4 rounded-lg mb-5">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.brands.update', $brand->id) }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block font-medium text-gray-700 mb-1">Tên thương hiệu</label>
                <input type="text" id="name" name="name" value="{{ old('name', $brand->name) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none"
                       required>
            </div>
            <div class="pt-4">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-lg shadow">
                    <i class="fas fa-save mr-1"></i> Cập nhật thương hiệu
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
