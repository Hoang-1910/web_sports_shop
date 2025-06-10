<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariant;
use App\Models\ProductVariantImage;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);
        $categories = Category::all();
        $productVariants = ProductVariant::with('product')->get();
        $brands = Product::select('brand')->distinct()->pluck('brand');
        $sizes = ProductVariant::distinct()->pluck('size');
        $colors = ProductVariant::distinct()->pluck('color');
        return view('customer.products', compact('products', 'categories', 'productVariants', 'brands', 'sizes', 'colors'));
    }

    /**
     * Hiển thị chi tiết sản phẩm dữ liệu demo.
     */
    public function show($id)
    {
        // Sample product data
        $product = Product::with([
            'images',           // hasMany ProductVariantImage hoặc ProductImage
            'variants',         // hasMany ProductVariant
            'category',         // belongsTo Category
            'reviews.user'      // hasMany Review, mỗi review belongsTo User
        ])->findOrFail($id);
        return view('customer.product-detail', compact('product'));
    }
}
