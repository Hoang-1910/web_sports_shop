<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promotion;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Carbon\Carbon;

class PromotionSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo khuyến mãi toàn cục
        $globalPromotion = Promotion::create([
            'name' => 'Siêu Sale Tháng 3',
            'description' => 'Khuyến mãi đặc biệt dành cho các sản phẩm thể thao cao cấp. Áp dụng cho tất cả khách hàng.',
            'discount_type' => 'percent',
            'discount_value' => 20, // Giảm 20%
            'type' => 'global',
            'min_order_value' => 500000, // Tối thiểu 500k
            'start_date' => Carbon::now()->subDays(5),
            'end_date' => Carbon::now()->addDays(25),
            'active' => true,
        ]);

        // Tạo khuyến mãi theo danh mục
        $categoryPromotion = Promotion::create([
            'name' => 'Giảm giá giày thể thao',
            'description' => 'Khuyến mãi đặc biệt cho các sản phẩm giày thể thao',
            'discount_type' => 'percent',
            'discount_value' => 15, // Giảm 15%
            'type' => 'category',
            'min_order_value' => 300000,
            'start_date' => Carbon::now()->subDays(10),
            'end_date' => Carbon::now()->addDays(20),
            'active' => true,
        ]);

        // Tạo khuyến mãi theo sản phẩm
        $productPromotion = Promotion::create([
            'name' => 'Flash Sale Sản phẩm nổi bật',
            'description' => 'Giảm giá sâu cho các sản phẩm được chọn',
            'discount_type' => 'amount',
            'discount_value' => 200000, // Giảm 200k
            'type' => 'product',
            'min_order_value' => 1000000,
            'start_date' => Carbon::now()->subDays(2),
            'end_date' => Carbon::now()->addDays(8),
            'active' => true,
        ]);

        // Lấy danh mục giày (nếu có)
        $shoeCategory = Category::where('name', 'like', '%giày%')->orWhere('name', 'like', '%shoes%')->first();
        if ($shoeCategory) {
            $categoryPromotion->categories()->attach($shoeCategory->id);
        }

        // Lấy một số sản phẩm để áp dụng khuyến mãi
        $products = Product::take(5)->get();
        if ($products->count() > 0) {
            $productPromotion->products()->attach($products->pluck('id')->toArray());
        }

        // Tạo khuyến mãi sắp tới (chưa active)
        Promotion::create([
            'name' => 'Khuyến mãi tháng 4',
            'description' => 'Chương trình khuyến mãi lớn tháng 4',
            'discount_type' => 'percent',
            'discount_value' => 25,
            'type' => 'global',
            'min_order_value' => 800000,
            'start_date' => Carbon::now()->addDays(5),
            'end_date' => Carbon::now()->addDays(35),
            'active' => false, // Chưa active
        ]);

        $this->command->info('Đã tạo ' . Promotion::count() . ' khuyến mãi mẫu!');
    }
} 