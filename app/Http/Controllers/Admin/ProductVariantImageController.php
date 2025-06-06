<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariantImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductVariantImageController extends Controller
{
    // Xóa ảnh của biến thể
    public function destroy($id)
    {
        $image = ProductVariantImage::findOrFail($id);
        $variant_id = $image->product_variant_id;

        // Xóa file vật lý
        Storage::disk('public')->delete($image->image_path);

        // Xóa bản ghi trong DB
        $image->delete();

        return back()->with('success', 'Đã xóa ảnh biến thể!');
    }
}
