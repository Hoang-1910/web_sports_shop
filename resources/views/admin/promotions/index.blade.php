@extends('admin.layouts.app')
@section('title', 'Quản lý khuyến mãi')
@section('content')
<div class="w-full max-w-5xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-indigo-700">Danh sách khuyến mãi</h2>
        <a href="{{ route('admin.promotions.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700">+ Thêm khuyến mãi</a>
    </div>
    @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 rounded p-3">{{ session('success') }}</div>
    @endif
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-indigo-50">
                <tr>
                    <th class="p-3 text-left">Tên</th>
                    <th class="p-3 text-left">Kiểu</th>
                    <th class="p-3 text-left">Giá trị giảm</th>
                    <th class="p-3 text-left">Thời gian</th>
                    <th class="p-3 text-left">Trạng thái</th>
                    <th class="p-3 text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($promotions as $promotion)
                <tr class="border-b">
                    <td class="p-3">{{ $promotion->name }}</td>
                    <td class="p-3">{{ ucfirst($promotion->type) }}</td>
                    <td class="p-3">
                        {{ $promotion->discount_type === 'percent' ? $promotion->discount_value . '%' : number_format($promotion->discount_value) . 'đ' }}
                    </td>
                    <td class="p-3">{{ $promotion->start_date }}<br>-<br>{{ $promotion->end_date }}</td>
                    <td class="p-3">{{ $promotion->active ? 'Đang áp dụng' : 'Ngừng' }}</td>
                    <td class="p-3 text-center">
                        <a href="{{ route('admin.promotions.edit', $promotion) }}" class="text-indigo-600 hover:underline mr-2">Sửa</a>
                        <form action="{{ route('admin.promotions.destroy', $promotion) }}" method="POST" class="inline-block" onsubmit="return confirm('Xác nhận xóa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $promotions->links() }}</div>
</div>
@endsection 