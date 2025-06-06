@extends('admin.layouts.app')

@section('title', 'Chi tiết sản phẩm')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-purple-700 mb-6 flex items-center gap-2">
        <span class="material-icons text-purple-500">info</span>
        Chi tiết sản phẩm
    </h2>

    <div class="flex gap-8">
        <div id="main-image-block">
            <img id="main-product-image"
                 src="{{ $product->image ? asset('storage/' . $product->image) : '' }}"
                 alt="{{ $product->name }}"
                 class="w-64 h-64 object-cover rounded shadow
                 {{ $product->image ? '' : 'hidden' }}">
            @unless($product->image)
                <div class="w-64 h-64 flex items-center justify-center bg-gray-100 rounded text-gray-400">Không có ảnh</div>
            @endunless
        </div>
        <div class="flex-1 space-y-4">
            <div>
                <span class="font-semibold text-gray-700">Tên sản phẩm:</span>
                <span class="text-lg font-bold text-gray-900">{{ $product->name }}</span>
            </div>
            <div>
                <span class="font-semibold text-gray-700">Thương hiệu:</span>
                <span>{{ $product->brand ?? 'Không có' }}</span>
            </div>
            <div>
                <span class="font-semibold text-gray-700">Danh mục:</span>
                <span>{{ $product->category->name ?? 'Không có' }}</span>
            </div>
            <div>
                <span class="font-semibold text-gray-700">Giá:</span>
                <span class="text-blue-700 font-semibold">{{ number_format($product->price, 0, ',', '.') }} đ</span>
            </div>
            <div>
                <span class="font-semibold text-gray-700">Giảm giá:</span>
                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">{{ $product->discount }}%</span>
            </div>
            <div>
                <span class="font-semibold text-gray-700">Mô tả:</span>
                <div class="mt-1 text-gray-800">{{ $product->description ?? 'Không có mô tả' }}</div>
            </div>
        </div>
    </div>

    {{-- Các lựa chọn/biến thể --}}
    @if($product->variants->count())
    <div class="mt-10">
        <h3 class="text-lg font-bold text-purple-700 mb-3 flex items-center gap-2">
            <span class="material-icons text-purple-500">tune</span>
            Các lựa chọn/biến thể
        </h3>
        @php
            $sizes = $product->variants->pluck('size')->unique()->filter();
            $colors = $product->variants->pluck('color')->unique()->filter();
        @endphp

        <div class="flex gap-4 mb-4">
            {{-- Chọn size --}}
            <div>
                <div class="mb-1 font-semibold">Size:</div>
                <div class="flex gap-2">
                    @foreach($sizes as $size)
                        <button type="button" class="size-btn px-3 py-1 rounded border border-purple-300 bg-white text-gray-700 hover:bg-purple-100" data-size="{{ $size }}">{{ $size }}</button>
                    @endforeach
                </div>
            </div>
            {{-- Chọn màu --}}
            <div>
                <div class="mb-1 font-semibold">Màu:</div>
                <div class="flex gap-2">
                    @foreach($colors as $color)
                        <button type="button" class="color-btn px-3 py-1 rounded border border-purple-300 bg-white text-gray-700 hover:bg-purple-100" data-color="{{ $color }}">{{ $color }}</button>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="variant-images" class="flex gap-2"></div>
    </div>
    @endif

    <div class="mt-8 flex justify-end">
        <a href="{{ route('admin.products.index') }}" class="px-5 py-2 rounded bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold transition">Quay lại</a>
        <a href="{{ route('admin.products.edit', $product->id) }}" class="ml-4 px-5 py-2 rounded bg-yellow-100 hover:bg-yellow-200 text-yellow-700 font-semibold transition">Sửa</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let selectedSize = null;
    let selectedColor = null;
    const variants = @json($product->variants->map(function($v){
        return [
            'size' => $v->size,
            'color' => $v->color,
            'images' => $v->images->pluck('image_path')
        ];
    }));

    function renderVariantImages() {
        const container = document.getElementById('variant-images');
        container.innerHTML = '';
        const variant = variants.find(v => v.size === selectedSize && v.color === selectedColor);
        if (variant && variant.images.length) {
            variant.images.forEach(img => {
                const el = document.createElement('img');
                el.src = '{{ asset('storage') }}/' + img;
                el.className = 'w-16 h-16 object-cover rounded shadow';
                container.appendChild(el);
            });
        } else {
            container.innerHTML = '<span class="text-gray-400 italic">Không có ảnh cho lựa chọn này</span>';
        }
    }

    document.querySelectorAll('.size-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('bg-purple-200', 'text-purple-900'));
            this.classList.add('bg-purple-200', 'text-purple-900');
            selectedSize = this.dataset.size;

            // Khi chọn size, tự động chọn màu đầu tiên có biến thể với size này
            const availableColors = variants.filter(v => v.size === selectedSize).map(v => v.color);
            let found = false;
            document.querySelectorAll('.color-btn').forEach(b => {
                if (availableColors.includes(b.dataset.color)) {
                    if (!found) {
                        b.click();
                        found = true;
                    }
                    b.disabled = false;
                    b.classList.remove('opacity-50');
                } else {
                    b.disabled = true;
                    b.classList.add('opacity-50');
                }
            });
            if (!found) {
                selectedColor = null;
                renderVariantImages();
            }
        });
    });

    document.querySelectorAll('.color-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            if (btn.disabled) return;
            document.querySelectorAll('.color-btn').forEach(b => b.classList.remove('bg-purple-200', 'text-purple-900'));
            this.classList.add('bg-purple-200', 'text-purple-900');
            selectedColor = this.dataset.color;
            renderVariantImages();
        });
    });

    // Tự động chọn giá trị đầu tiên nếu có
    if(document.querySelector('.size-btn')) {
        document.querySelector('.size-btn').click();
    }
</script>
@endsection