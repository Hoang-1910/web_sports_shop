<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantImage;
use Illuminate\Support\Facades\Storage;

class ProductVariantController extends Controller
{
    // Trang thêm biến thể
    public function create($product)
    {
        $product = Product::findOrFail($product);
        return view('admin.variants.create', compact('product'));
    }

    // Lưu biến thể mới
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
            'price' => 'required|numeric|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        $variant = ProductVariant::create($request->only(['product_id', 'size', 'color', 'price']));

        // Lưu ảnh cho biến thể
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('variants', 'public');
                ProductVariantImage::create([
                    'product_variant_id' => $variant->id,
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('admin.products.edit', $variant->product_id)
            ->with('success', 'Thêm lựa chọn/biến thể thành công!');
    }

    // Trang sửa biến thể
    public function edit($id)
    {
        $variant = ProductVariant::with('images')->findOrFail($id);
        return view('admin.variants.edit', compact('variant'));
    }

    // Lưu cập nhật biến thể
    public function update(Request $request, $id)
    {
        $variant = ProductVariant::findOrFail($id);

        $request->validate([
            'size' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
            'price' => 'required|numeric|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $variant->update($request->only(['size', 'color', 'price']));

        // Thêm ảnh mới nếu có
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('variants', 'public');
                ProductVariantImage::create([
                    'product_variant_id' => $variant->id,
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('admin.products.edit', $variant->product_id)
            ->with('success', 'Cập nhật lựa chọn/biến thể thành công!');
    }

    // Xóa biến thể
    public function destroy($id)
    {
        $variant = ProductVariant::with('images')->findOrFail($id);

        // Xóa ảnh vật lý và bản ghi ảnh
        foreach ($variant->images as $img) {
            Storage::disk('public')->delete($img->image_path);
            $img->delete();
        }

        $product_id = $variant->product_id;
        $variant->delete();

        return redirect()->route('admin.products.edit', $product_id)
            ->with('success', 'Đã xóa lựa chọn/biến thể!');
    }
}
