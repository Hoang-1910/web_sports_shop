@extends('admin.layouts.app')
@section('title', 'Nhập sản phẩm vào kho')
@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 to-purple-100 py-8 flex flex-col items-center">
        <div class="w-full max-w-3xl bg-white rounded-3xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-indigo-700 mb-6 flex items-center gap-2">
                <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 4v16m8-8H4" />
                </svg>
                Tạo phiếu nhập kho mới
            </h2>
            <form method="POST" action="{{ route('admin.stock_imports.store') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Ngày nhập</label>
                        <input type="date" name="import_date"
                            class="w-full rounded-xl border-gray-300 focus:border-indigo-400 focus:ring focus:ring-indigo-100 shadow-sm"
                            value="{{ date('Y-m-d') }}">
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Ghi chú</label>
                        <input type="text" name="note"
                            class="w-full rounded-xl border-gray-300 focus:border-indigo-400 focus:ring focus:ring-indigo-100 shadow-sm"
                            placeholder="Ghi chú (nếu có)">
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-3">Danh sách sản phẩm nhập kho</label>
                    <div class="overflow-x-auto rounded-xl shadow mb-3">
                        <table class="min-w-full text-sm bg-white rounded-xl" id="import-table">
                            <thead>
                                <tr class="bg-indigo-50 text-indigo-900">
                                    <th class="p-3 text-left font-semibold min-w-[250px]">Sản phẩm / Biến thể</th>
                                    <th class="p-3 text-center font-semibold w-28">Số lượng</th>
                                    <th class="p-3 text-center font-semibold w-32">Giá nhập</th>
                                    <th class="p-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-2">
                                        <select name="variants[]"
                                            class="w-full rounded-lg border-gray-300 focus:border-indigo-400 focus:ring focus:ring-indigo-100 shadow-sm">
                                            @foreach ($variants as $variant)
                                                <option value="{{ $variant->id }}">
                                                    {{ $variant->product->name }}
                                                    {{ $variant->size ? ' - Size: ' . $variant->size : '' }}
                                                    {{ $variant->color ? ' - Màu: ' . $variant->color : '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="p-2 text-center">
                                        <input type="number" name="quantities[]" min="1" value="1"
                                            class="w-20 mx-auto rounded-lg border-gray-300 focus:border-indigo-400 focus:ring focus:ring-indigo-100 shadow-sm text-center">
                                    </td>
                                    <td class="p-2 text-center">
                                        <input type="number" name="import_prices[]" min="0" step="1000"
                                            value="0"
                                            class="w-28 mx-auto rounded-lg border-gray-300 focus:border-indigo-400 focus:ring focus:ring-indigo-100 shadow-sm text-center">
                                    </td>
                                    <td class="p-2 text-center">
                                        <button type="button"
                                            class="remove-row bg-red-50 hover:bg-red-100 text-red-600 px-4 py-1 rounded-xl shadow font-semibold transition">Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button"
                        class="mt-2 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 px-4 py-1 rounded-xl shadow font-semibold transition text-sm"
                        id="add-row">
                        + Thêm dòng
                    </button>
                </div>
                <div class="flex justify-end mt-8">
                    <button type="submit"
                        class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg transition">
                        Lưu phiếu nhập
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('add-row').onclick = function() {
            var table = document.getElementById('import-table').querySelector('tbody');
            var row = table.rows[0].cloneNode(true);
            // Đặt lại giá trị input trong dòng mới
            row.querySelectorAll('input').forEach(function(input) {
                input.value = input.type === 'number' ? '1' : '';
            });
            table.appendChild(row);
            // Gắn lại sự kiện xóa cho dòng mới
            row.querySelector('.remove-row').onclick = function() {
                if (table.rows.length > 1) row.remove();
            }
        };
        // Gắn sự kiện xóa cho dòng đầu tiên
        document.querySelectorAll('.remove-row').forEach(function(btn) {
            btn.onclick = function() {
                var table = document.getElementById('import-table').querySelector('tbody');
                if (table.rows.length > 1) this.closest('tr').remove();
            }
        });
    </script>
@endsection
