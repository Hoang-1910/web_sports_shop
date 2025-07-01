<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::orderByDesc('id')->paginate(20);
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.promotions.create', compact('products', 'categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount_type' => 'required|in:percent,amount',
            'discount_value' => 'required|numeric|min:0',
            'type' => 'required|in:product,category,supplier,global',
            'min_order_value' => 'nullable|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'active' => 'boolean',
            'products' => 'array',
            'categories' => 'array',
            'suppliers' => 'array',
        ]);
        $promotion = Promotion::create($data);
        if ($data['type'] === 'product' && !empty($data['products'])) {
            $promotion->products()->sync($data['products']);
        }
        if ($data['type'] === 'category' && !empty($data['categories'])) {
            $promotion->categories()->sync($data['categories']);
        }
        if ($data['type'] === 'supplier' && !empty($data['suppliers'])) {
            $promotion->suppliers()->sync($data['suppliers']);
        }
        return redirect()->route('admin.promotions.index')->with('success', 'Tạo khuyến mãi thành công!');
    }

    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        $products = Product::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.promotions.edit', compact('promotion', 'products', 'categories', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount_type' => 'required|in:percent,amount',
            'discount_value' => 'required|numeric|min:0',
            'type' => 'required|in:product,category,supplier,global',
            'min_order_value' => 'nullable|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'active' => 'boolean',
            'products' => 'array',
            'categories' => 'array',
            'suppliers' => 'array',
        ]);
        $promotion->update($data);
        $promotion->products()->sync($data['type'] === 'product' ? ($data['products'] ?? []) : []);
        $promotion->categories()->sync($data['type'] === 'category' ? ($data['categories'] ?? []) : []);
        $promotion->suppliers()->sync($data['type'] === 'supplier' ? ($data['suppliers'] ?? []) : []);
        return redirect()->route('admin.promotions.index')->with('success', 'Cập nhật khuyến mãi thành công!');
    }

    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();
        return redirect()->route('admin.promotions.index')->with('success', 'Đã xóa khuyến mãi!');
    }
} 