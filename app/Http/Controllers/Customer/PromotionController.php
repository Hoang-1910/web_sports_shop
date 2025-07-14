<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    /**
     * Hiển thị danh sách khuyến mãi cho khách hàng.
     */
    public function index()
    {
        $now = now();
        $activePromotions = Promotion::where('active', true)
            ->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->orderBy('end_date')
            ->get();

        $upcomingPromotions = Promotion::where('active', true)
            ->where('start_date', '>', $now)
            ->orderBy('start_date')
            ->get();

        return view('customer.promotions', compact('activePromotions', 'upcomingPromotions'));
    }
} 