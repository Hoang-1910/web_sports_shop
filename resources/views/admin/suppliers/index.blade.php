@extends('admin.layouts.app')
@section('title', 'Quản lý nhà cung cấp')
@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-indigo-700">Danh sách nhà cung cấp</h2>
        <a href="{{ route('admin.suppliers.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700">+ Thêm nhà cung cấp</a>
    </div>
    @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 rounded p-3">{{ session('success') }}</div>
    @endif
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-indigo-50">
                <tr>
                    <th class="p-3 text-left">Tên</th>
                    <th class="p-3 text-left">Địa chỉ</th>
                    <th class="p-3 text-left">Điện thoại</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Ghi chú</th>
                    <th class="p-3 text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                <tr class="border-b">
                    <td class="p-3">{{ $supplier->name }}</td>
                    <td class="p-3">{{ $supplier->address }}</td>
                    <td class="p-3">{{ $supplier->phone }}</td>
                    <td class="p-3">{{ $supplier->email }}</td>
                    <td class="p-3">{{ $supplier->note }}</td>
                    <td class="p-3 text-center">
                        <a href="{{ route('admin.suppliers.edit', $supplier) }}" class="text-indigo-600 hover:underline mr-2">Sửa</a>
                        <form action="{{ route('admin.suppliers.destroy', $supplier) }}" method="POST" class="inline-block" onsubmit="return confirm('Xác nhận xóa?');">
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
    <div class="mt-4">{{ $suppliers->links() }}</div>
</div>
@endsection 