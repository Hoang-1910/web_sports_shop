<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\News;

class HomeController extends Controller
{

    public function index()
    {
        
        // Lấy 8 sản phẩm mới nhất
        $featuredProducts = Product::orderBy('created_at', 'desc')
            ->take(8)
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image ?? '/customer/images/default-product.jpg',
                    'price' => $product->price,
                    'discount' => $product->discount,
                    // Nếu muốn test badge trên giao diện thì gán tạm cứng: 'badges' => ['NEW'],
                    'badges' => [],
                ];
            });

        // // Lấy các thương hiệu nổi tiếng
        // $brands = Brand::orderBy('priority', 'desc')
        //     ->take(8)
        //     ->get()
        //     ->map(function ($brand) {
        //         return [
        //             'name' => $brand->name,
        //             'logo' => $brand->logo ?? '/customer/images/default-brand.png',
        //         ];
        //     });

        // // Lấy 3 tin tức mới nhất
        // $news = News::orderBy('created_at', 'desc')
        //     ->take(3)
        //     ->get()
        //     ->map(function ($item) {
        //         return [
        //             'title' => $item->title,
        //             'date' => $item->created_at->format('d/m/Y'),
        //             'image' => $item->image ?? '/customer/images/default-news.jpg',
        //             'excerpt' => $item->excerpt ?? \Str::limit(strip_tags($item->content), 100),
        //             'slug' => $item->slug,
        //         ];
        //     });

        return view('customer.home', compact('featuredProducts'));
    }
}
