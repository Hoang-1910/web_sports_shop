@extends('admin.layouts.app')
@section('title', 'Sửa khuyến mãi')
@section('content')
<div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-purple-700 mb-6">Sửa khuyến mãi</h2>
        
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <form method="POST" action="{{ route('admin.promotions.update', $promotion) }}" class="p-8">
                @csrf
                @method('PUT')
                
                {{-- Tên chương trình --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Tên chương trình <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-400 focus:ring focus:ring-purple-100 transition duration-200" 
                           required value="{{ old('name', $promotion->name) }}" placeholder="Nhập tên chương trình khuyến mãi">
                    @error('name')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Mô tả --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Mô tả</label>
                    <textarea name="description" rows="4"
                              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-400 focus:ring focus:ring-purple-100 transition duration-200" 
                              placeholder="Mô tả chi tiết về chương trình khuyến mãi">{{ old('description', $promotion->description) }}</textarea>
                </div>

                {{-- Kiểu giảm giá và Giá trị giảm --}}
                <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            Kiểu giảm giá <span class="text-red-500">*</span>
                        </label>
                        <select name="discount_type" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-400 focus:ring focus:ring-purple-100 transition duration-200" 
                                required>
                            <option value="percent" {{ old('discount_type', $promotion->discount_type) == 'percent' ? 'selected' : '' }}>Phần trăm (%)</option>
                            <option value="amount" {{ old('discount_type', $promotion->discount_type) == 'amount' ? 'selected' : '' }}>Số tiền (VNĐ)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            Giá trị giảm <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="discount_value" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-400 focus:ring focus:ring-purple-100 transition duration-200" 
                               required min="0" value="{{ old('discount_value', $promotion->discount_value) }}" placeholder="0">
                    </div>
                </div>

                {{-- Loại áp dụng --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Loại áp dụng <span class="text-red-500">*</span>
                    </label>
                    <select name="type" id="promotion-type" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-400 focus:ring focus:ring-purple-100 transition duration-200" 
                            required onchange="showTargetSelect()">
                        <option value="global" {{ old('type', $promotion->type) == 'global' ? 'selected' : '' }}>Toàn shop</option>
                        <option value="product" {{ old('type', $promotion->type) == 'product' ? 'selected' : '' }}>Sản phẩm</option>
                        <option value="category" {{ old('type', $promotion->type) == 'category' ? 'selected' : '' }}>Danh mục</option>
                        <option value="supplier" {{ old('type', $promotion->type) == 'supplier' ? 'selected' : '' }}>Nhà cung cấp</option>
                    </select>
                </div>

                {{-- Chọn sản phẩm --}}
                <div class="mb-6" id="target-product" style="display:none;">
                    <label class="block text-gray-700 font-semibold mb-2">Chọn sản phẩm áp dụng</label>
                    <select name="products[]" multiple 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-400 focus:ring focus:ring-purple-100 transition duration-200" 
                            size="6">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ in_array($product->id, old('products', $promotion->products->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500 mt-2">Giữ Ctrl để chọn nhiều sản phẩm</p>
                </div>

                {{-- Chọn danh mục --}}
                <div class="mb-6" id="target-category" style="display:none;">
                    <label class="block text-gray-700 font-semibold mb-2">Chọn danh mục áp dụng</label>
                    <select name="categories[]" multiple 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-400 focus:ring focus:ring-purple-100 transition duration-200" 
                            size="6">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', $promotion->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500 mt-2">Giữ Ctrl để chọn nhiều danh mục</p>
                </div>

                {{-- Chọn nhà cung cấp --}}
                <div class="mb-6" id="target-supplier" style="display:none;">
                    <label class="block text-gray-700 font-semibold mb-2">Chọn nhà cung cấp áp dụng</label>
                    <select name="suppliers[]" multiple 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-400 focus:ring focus:ring-purple-100 transition duration-200" 
                            size="6">
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ in_array($supplier->id, old('suppliers', $promotion->suppliers->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500 mt-2">Giữ Ctrl để chọn nhiều nhà cung cấp</p>
                </div>

                {{-- Ngày bắt đầu và kết thúc --}}
                <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            Ngày bắt đầu <span class="text-red-500">*</span>
                        </label>
                        <input type="datetime-local" name="start_date" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-400 focus:ring focus:ring-purple-100 transition duration-200" 
                               required value="{{ old('start_date', $promotion->start_date ? $promotion->start_date->format('Y-m-d\TH:i') : '') }}">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            Ngày kết thúc <span class="text-red-500">*</span>
                        </label>
                        <input type="datetime-local" name="end_date" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-400 focus:ring focus:ring-purple-100 transition duration-200" 
                               required value="{{ old('end_date', $promotion->end_date ? $promotion->end_date->format('Y-m-d\TH:i') : '') }}">
                    </div>
                </div>

                {{-- Giá trị đơn tối thiểu --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Giá trị đơn tối thiểu (VNĐ)
                    </label>
                    <input type="number" name="min_order_value" 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-400 focus:ring focus:ring-purple-100 transition duration-200" 
                           min="0" value="{{ old('min_order_value', $promotion->min_order_value) }}" placeholder="0">
                    <p class="text-sm text-gray-500 mt-2">Áp dụng khi chọn "Toàn shop"</p>
                </div>

                {{-- Trạng thái --}}
                <div class="mb-8">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="active" value="1" 
                               class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500" 
                               {{ old('active', $promotion->active) ? 'checked' : '' }}>
                        <span class="ml-3 text-gray-700 font-semibold">Kích hoạt</span>
                    </label>
                </div>

                {{-- Buttons --}}
                <div class="flex flex-col sm:flex-row justify-end gap-4">
                    <a href="{{ route('admin.promotions.index') }}" 
                       class="px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition duration-200 text-center">
                        Hủy bỏ
                    </a>
                    <button type="submit" 
                            class="px-8 py-3 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition duration-200">
                        Cập nhật khuyến mãi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function showTargetSelect() {
    const type = document.getElementById('promotion-type').value;
    
    // Ẩn tất cả các target select
    document.getElementById('target-product').style.display = 'none';
    document.getElementById('target-category').style.display = 'none';
    document.getElementById('target-supplier').style.display = 'none';
    
    // Hiển thị target select tương ứng
    if (type === 'product') {
        document.getElementById('target-product').style.display = 'block';
    } else if (type === 'category') {
        document.getElementById('target-category').style.display = 'block';
    } else if (type === 'supplier') {
        document.getElementById('target-supplier').style.display = 'block';
    }
}

// Khởi tạo khi trang load
document.addEventListener('DOMContentLoaded', function() {
    showTargetSelect();
});
</script>
@endpush
@endsection