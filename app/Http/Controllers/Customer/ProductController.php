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
    public function index(Request $request)
    {
        $query = Product::query();

        // Lọc theo tên sản phẩm
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // Lọc theo danh mục
        if ($request->has('categories')) {
            // Nếu dùng category_id thì sửa lại cho đúng
            $query->whereHas('category', function ($q) use ($request) {
                $q->whereIn('slug', (array)$request->categories);
            });
        }

        // Lọc theo thương hiệu
        if ($request->has('brands')) {
            $query->whereIn('brand', (array)$request->brands);
        }

        // Lọc theo khoảng giá
        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        // Lọc theo size (kích thước)
        if ($request->has('sizes')) {
            $query->whereHas('variants', function ($q) use ($request) {
                $q->whereIn('size', (array)$request->sizes);
            });
        }

        // Lọc theo màu sắc
        if ($request->has('colors')) {
            $query->whereHas('variants', function ($q) use ($request) {
                $q->whereIn('color', (array)$request->colors);
            });
        }
        // Sắp xếp theo yêu cầu
        switch ($request->input('sort')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->latest(); // Mặc định: mới nhất
                break;
        }
        $products = $query->paginate(12);

        // Dữ liệu cho bộ lọc
        $categories = Category::all();
        $brands = Product::select('brand')->distinct()->pluck('brand');
        $sizes = ProductVariant::distinct()->pluck('size');
        $colors = ProductVariant::distinct()->pluck('color');

        // Lấy hết variants để hiển thị nếu cần
        $productVariants = ProductVariant::with('product')->get();

        return view('customer.products', compact(
            'products',
            'categories',
            'brands',
            'sizes',
            'colors',
            'productVariants'
        ));
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

    public function search(Request $request)
    {
        $q = $request->input('q');
        $products = Product::where('name', 'like', '%' . $q . '%')->paginate(16);
        // Bạn có thể trả thêm biến 'q' cho view hiển thị lại
        return view('customer.products_search', compact('products', 'q'));
    }
}
