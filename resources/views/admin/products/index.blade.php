@extends('admin.layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-purple-700 flex items-center gap-2">
                <span class="material-icons text-purple-500">inventory_2</span>
                Danh sách sản phẩm
            </h2>
            <a href="{{ route('admin.products.create') }}"
                class="bg-gradient-to-r from-purple-500 to-blue-500 hover:from-purple-600 hover:to-blue-600 text-white px-5 py-2 rounded-lg shadow font-semibold transition">
                <span class="material-icons align-middle text-base mr-1">add</span>
                Thêm sản phẩm
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-lg overflow-x-auto">
            <table class="w-full min-w-[800px]">
                <thead class="bg-gradient-to-r from-purple-100 to-blue-100">
                    <tr class="text-center">
                        <th class="p-4 font-semibold text-gray-700">#</th>
                        <th class="p-4 font-semibold text-gray-700">Ảnh</th>
                        <th class="p-4 font-semibold text-gray-700">Tên</th>
                        <th class="p-4 font-semibold text-gray-700">Giá</th>
                        <th class="p-4 font-semibold text-gray-700">Giảm giá</th>
                        <th class="p-4 font-semibold text-gray-700">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="border-t hover:bg-purple-50 transition">
                            <td class="p-4">{{ $loop->iteration }}</td>
                            <td class="p-4">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : '' }}"
                                    alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded shadow">
                            </td>
                            <td class="p-4 font-medium text-gray-900">{{ $product->name }}</td>
                            <td class="p-4 text-blue-700 font-semibold">{{ number_format($product->price, 0, ',', '.') }} đ
                            </td>
                            <td class="p-4">
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">
                                    {{ $product->discount }}%
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.products.show', $product->id) }}"
                                        class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition text-sm font-medium shadow-sm">
                                        <span class="material-icons text-base mr-1">visibility</span> Xem chi tiết
                                    </a>
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition text-sm font-medium shadow-sm">
                                        <span class="material-icons text-base mr-1">edit</span> Sửa
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
    class="d-inline delete-form" onsubmit="return confirmDelete(event)">
    @csrf
    @method('DELETE')
    <button type="submit"
        class="btn btn-danger btn-delete inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition text-sm font-medium shadow-sm">
        <span class="material-icons text-base mr-1">delete</span> Xóa
    </button>
</form>

<script>
    function confirmDelete(event) {
        // Hiển thị popup xác nhận
        if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
            return true; // cho phép submit
        } else {
            event.preventDefault(); // chặn submit
            return false;
        }
    }
</script>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');
                Swal.fire({
                    title: 'Bạn chắc chắn muốn xóa?',
                    text: "Hành động này không thể hoàn tác!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Xóa',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
