<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class WishlistController extends Controller
{
    /**
     * Display the user's wishlist.
     */
    public function index()
    {
        // Sample wishlist data
        $items = [
            [
                'id' => 1,
                'name' => 'Nike Air Zoom Pegasus 38',
                'description' => 'Giày chạy bộ Nike Air Zoom Pegasus 38 là phiên bản mới nhất của dòng giày chạy bộ phổ biến nhất của Nike.',
                'price' => 2450000,
                'discount' => 15,
                'brand' => 'Nike',
                'category' => [
                    'name' => 'Giày thể thao'
                ],
                'image' => '/customer/images/product1.jpg'
            ],
            [
                'id' => 2,
                'name' => 'Adidas Ultraboost 22',
                'description' => 'Giày chạy bộ Adidas Ultraboost 22 với công nghệ Boost mới nhất mang đến sự thoải mái tối đa.',
                'price' => 3200000,
                'discount' => 10,
                'brand' => 'Adidas',
                'category' => [
                    'name' => 'Giày thể thao'
                ],
                'image' => '/customer/images/product2.jpg'
            ],
            [
                'id' => 3,
                'name' => 'Puma RS-X',
                'description' => 'Giày thể thao Puma RS-X với thiết kế retro và công nghệ đệm RS mới.',
                'price' => 1890000,
                'discount' => 0,
                'brand' => 'Puma',
                'category' => [
                    'name' => 'Giày thể thao'
                ],
                'image' => '/customer/images/product3.jpg'
            ]
        ];

        // Create paginator
        $page = request()->get('page', 1);
        $perPage = 9;
        $offset = ($page - 1) * $perPage;
        $itemsForCurrentPage = array_slice($items, $offset, $perPage);
        
        $wishlist = new LengthAwarePaginator(
            $itemsForCurrentPage,
            count($items),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('customer.wishlist', compact('wishlist'));
    }

    /**
     * Add a product to wishlist.
     */
    public function add(Request $request)
    {
        // TODO: Implement add to wishlist functionality
        return response()->json([
            'success' => true,
            'message' => 'Đã thêm vào danh sách yêu thích'
        ]);
    }

    /**
     * Remove a product from wishlist.
     */
    public function remove(Request $request)
    {
        // TODO: Implement remove from wishlist functionality
        return response()->json([
            'success' => true,
            'message' => 'Đã xóa khỏi danh sách yêu thích'
        ]);
    }
} 