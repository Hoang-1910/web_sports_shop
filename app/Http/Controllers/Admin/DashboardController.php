<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter', 'month');
        $now = Carbon::now();

        $query = Order::where('status', 'delivered');

        $orders = match ($filter) {
            'day' => $query->where('created_at', '>=', $now->copy()->subDays(6)->startOfDay())
                ->select(
                    DB::raw('DATE(created_at) as label'),
                    DB::raw('SUM(total_amount) as total'),
                    DB::raw('COUNT(*) as count')
                )
                ->groupBy('label')
                ->orderBy('label')
                ->get(),

            'year' => $query->where('created_at', '>=', $now->copy()->subYears(5)->startOfYear())
                ->select(
                    DB::raw('YEAR(created_at) as label'),
                    DB::raw('SUM(total_amount) as total'),
                    DB::raw('COUNT(*) as count')
                )
                ->groupBy('label')
                ->orderBy('label')
                ->get(),

            default => $query->where('created_at', '>=', $now->copy()->subMonths(5)->startOfMonth())
                ->select(
                    DB::raw('DATE_FORMAT(created_at, "%m/%Y") as label'),
                    DB::raw('SUM(total_amount) as total'),
                    DB::raw('COUNT(*) as count')
                )
                ->groupBy('label')
                ->orderBy('label')
                ->get(),
        };

        $labels = $orders->pluck('label');
        $revenues = $orders->pluck('total');
        $orderCounts = $orders->pluck('count');

        return view('admin.dashboard1.index', [
            'totalProducts' => Product::count(),
            'totalOrders' => Order::count(),
            'totalRevenue' => Order::where('status', 'delivered')->sum('total_amount'),
            'totalUsers' => User::count(),
            'totalReviews' => Review::count(),
            'labels' => $labels,
            'revenues' => $revenues,
            'orderCounts' => $orderCounts,
            'filter' => $filter
        ]);
    }
}
