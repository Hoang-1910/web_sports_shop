<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index()
    {
        return view('customer.products');
    }

    /**
     * Hiển thị chi tiết sản phẩm dữ liệu demo.
     */
    public function show($id)
    {
        // Sample product data
        $product = [
            'id' => $id,
            'name' => 'Nike Air Zoom Pegasus 38',
            'description' => 'Giày chạy bộ Nike Air Zoom Pegasus 38 là phiên bản mới nhất của dòng giày chạy bộ phổ biến nhất của Nike. Với công nghệ Air Zoom mới nhất và đế ngoài bền bỉ, đôi giày này mang đến sự thoải mái và hiệu suất tối ưu cho mọi buổi chạy.',
            'price' => 2450000,
            'discount' => 15,
            'brand' => 'Nike',
            'category' => [
                'name' => 'Giày thể thao'
            ],
            'image' => '/customer/images/product1.jpg',
            'images' => [
                ['image_path' => '/customer/images/product1.jpg'],
                ['image_path' => '/customer/images/product2.jpg'],
                ['image_path' => '/customer/images/product3.jpg']
            ],
            'variants' => [
                ['size' => '38', 'color' => 'Đen'],
                ['size' => '39', 'color' => 'Đen'],
                ['size' => '40', 'color' => 'Đen'],
                ['size' => '41', 'color' => 'Đen'],
                ['size' => '42', 'color' => 'Đen'],
                ['size' => '38', 'color' => 'Trắng'],
                ['size' => '39', 'color' => 'Trắng'],
                ['size' => '40', 'color' => 'Trắng'],
                ['size' => '41', 'color' => 'Trắng'],
                ['size' => '42', 'color' => 'Trắng']
            ],
            'reviews' => [
                [
                    'user' => ['name' => 'Nguyễn Văn A'],
                    'rating' => 5,
                    'comment' => 'Sản phẩm rất tốt, đúng như mô tả. Đi rất êm và thoải mái.',
                    'created_at' => now()->subDays(2)
                ],
                [
                    'user' => ['name' => 'Trần Thị B'],
                    'rating' => 4,
                    'comment' => 'Chất lượng tốt, giá cả hợp lý. Sẽ mua thêm sản phẩm khác.',
                    'created_at' => now()->subDays(5)
                ],
                [
                    'user' => ['name' => 'Lê Văn C'],
                    'rating' => 5,
                    'comment' => 'Giao hàng nhanh, đóng gói cẩn thận. Sản phẩm đẹp và chất lượng.',
                    'created_at' => now()->subDays(7)
                ]
            ]
        ];
        
        return view('customer.product-detail', compact('product'));
    }
} 