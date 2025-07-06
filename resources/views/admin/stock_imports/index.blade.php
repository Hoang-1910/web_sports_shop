@extends('admin.layouts.app')
@section('title', 'Danh sách phiếu nhập kho')
@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 to-purple-100 py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                <h2
                    class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent flex items-center gap-2">
                    <svg class="w-7 h-7 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M3 3v18h18V3H3zm3 8h3v6H6v-6zm6 0h3v6h-3v-6zm6 0h3v6h-3v-6z" />
                    </svg>
                    Danh sách phiếu nhập kho
                </h2>
                <a href="{{ route('admin.stock_imports.create') }}"
                    class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-xl shadow transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 4v16m8-8H4" />
                    </svg>
                    Tạo phiếu nhập mới
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 px-4 py-3 rounded-lg bg-green-50 border border-green-200 text-green-800 shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-indigo-50 text-gray-700">
                        <tr>
                            <th class="p-4 text-center font-semibold">#</th>
                            <th class="p-4 font-semibold">Ngày nhập</th>
                            <th class="p-4 font-semibold">Người nhập</th>
                            <th class="p-4 font-semibold">Ghi chú</th>
                            <th class="p-4 font-semibold text-right">Tổng tiền</th>
                            <th class="p-4 text-center font-semibold">Chi tiết</th>
                            <th class="p-3 text-left font-semibold">Nhà cung cấp</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse($imports as $import)
                            <tr>
                                <td class="text-center text-gray-500 font-semibold py-4">{{ $loop->index + 1 }}</td>
                                <td class="text-center">
                                    <span
                                        class="inline-block px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 font-medium text-xs shadow">
                                        {{ \Carbon\Carbon::parse($import->import_date)->format('d/m/Y') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="flex items-center gap-2 font-medium">
                                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 10a4 4 0 100-8 4 4 0 000 8zm0 2c-4 0-6 2-6 4v1h12v-1c0-2-2-4-6-4z" />
                                        </svg>
                                        {{ $import->user->name ?? '' }}
                                    </span>
                                </td>
                                <td class="text-gray-500">{{ $import->note }}</td>
                                <td class="text-right font-bold text-indigo-700">{{ number_format($import->total_money) }}đ
                                </td>
                                <td class="text-center">
                                    <!-- Modal detail dùng AlpineJS -->
                                    <div x-data="{ open: false }" class="flex flex-row gap-2 items-center justify-center">
                                        <button @click="open = true"
                                            class="inline-flex items-center gap-1 bg-indigo-50 text-indigo-700 hover:bg-indigo-100 px-4 py-1 rounded-lg shadow font-semibold transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                                viewBox="0 0 24 24">
                                                <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Xem
                                        </button>
                                        <form action="{{ route('admin.stock_imports.destroy', $import->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa phiếu này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center gap-1 bg-red-50 text-red-600 hover:bg-red-100 px-4 py-1 rounded-lg shadow font-semibold transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                                    viewBox="0 0 24 24">
                                                    <path d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Xóa
                                            </button>
                                        </form>
                                        <!-- Modal overlay -->
                                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition ease-in duration-100"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="fixed inset-0 z-40 bg-black bg-opacity-40 flex items-center justify-center"
                                            x-cloak>
                                            <div @click.away="open = false"
                                                class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full p-6 relative">
                                                <div class="flex justify-between items-center mb-4">
                                                    <h3 class="text-lg font-bold text-indigo-700 flex items-center gap-2">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            stroke-width="2" viewBox="0 0 24 24">
                                                            <path d="M13 16h-1v-4h-1m1-4h.01" />
                                                        </svg>
                                                        Chi tiết phiếu nhập #{{ $import->id }}
                                                    </h3>
                                                    <button @click="open = false"
                                                        class="text-gray-500 hover:text-indigo-700 rounded-full p-2 transition">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                            stroke-width="2" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="overflow-x-auto">
                                                    <table class="min-w-full text-sm">
                                                        <thead>
                                                            <tr class="bg-indigo-50">
                                                                <th class="p-2 font-semibold">Sản phẩm</th>
                                                                <th class="p-2 font-semibold">Biến thể</th>
                                                                <th class="p-2 font-semibold text-right">Số lượng</th>
                                                                <th class="p-2 font-semibold text-right">Giá nhập</th>
                                                                <th class="p-2 font-semibold text-right">Thành tiền</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($import->items as $item)
                                                                <tr>
                                                                    <td class="p-2 font-medium text-gray-800">
                                                                        {{ $item->productVariant->product->name ?? '' }}
                                                                    </td>
                                                                    <td class="p-2">
                                                                        @if ($item->productVariant)
                                                                            <span
                                                                                class="inline-block px-2 py-1 rounded bg-blue-50 text-blue-700 text-xs font-medium">
                                                                                {{ $item->productVariant->size ?? '' }}
                                                                                {{ $item->productVariant->color ? ' - ' . $item->productVariant->color : '' }}
                                                                            </span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="p-2 text-right">{{ $item->quantity }}</td>
                                                                    <td class="p-2 text-right">
                                                                        {{ number_format($item->import_price) }}đ</td>
                                                                    <td class="p-2 text-right">
                                                                        {{ number_format($item->quantity * $item->import_price) }}đ
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="flex justify-end mt-4">
                                                    <button @click="open = false"
                                                        class="px-6 py-2 bg-indigo-600 text-white rounded-xl font-semibold shadow hover:bg-indigo-700 transition">
                                                        Đóng
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End modal -->
                                </td>
                                <td class="p-3">{{ $import->supplier->name ?? '' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-400 py-6 font-semibold">Chưa có phiếu nhập
                                    nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                {{ $imports->links() }}
            </div>
        </div>
    </div>
    <!-- AlpineJS nếu chưa có -->
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
