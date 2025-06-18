<?php

namespace App\Http\Controllers;

use App\Models\StockImport;
use App\Models\StockImportItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StockImportController extends Controller
{
    // Trang danh sách phiếu nhập kho
    public function index()
    {
        // Lấy các phiếu nhập, kèm user và items (load eager)
        $imports = StockImport::with(['user', 'items.productVariant.product'])
            ->orderByDesc('import_date')
            ->paginate(20);

        return view('admin.stock_imports.index', compact('imports'));
    }

    // Trang tạo phiếu nhập kho mới
    public function create()
    {
        // Lấy tất cả biến thể kèm tên sản phẩm cha
        $variants = ProductVariant::with('product')->get();
        return view('admin.stock_imports.create', compact('variants'));
    }

    // Xử lý lưu phiếu nhập kho
    public function store(Request $request)
    {
        $request->validate([
            'import_date'        => 'required|date',
            'variants'           => 'required|array',
            'variants.*'         => 'required|integer|exists:product_variants,id',
            'quantities.*'       => 'required|integer|min:1',
            'import_prices.*'    => 'required|numeric|min:0',
        ]);

        // Tạo phiếu nhập
        $import = StockImport::create([
            'user_id'     => auth()->id(),
            'import_date' => $request->import_date,
            'note'        => $request->note,
            'total_money' => 0, // cập nhật sau
        ]);

        $total = 0;

        foreach ($request->variants as $index => $variant_id) {
            $qty   = $request->quantities[$index];
            $price = $request->import_prices[$index];

            StockImportItem::create([
                'stock_import_id'    => $import->id,
                'product_variant_id' => $variant_id,
                'quantity'           => $qty,
                'import_price'       => $price,
            ]);

            $total += $qty * $price;
        }

        $import->update(['total_money' => $total]);

        return redirect()->route('admin.stock_imports.index')->with('success', 'Nhập kho thành công!');
    }

    public function destroy($id)
    {
        $import = \App\Models\StockImport::findOrFail($id);
        // Xóa tất cả dòng chi tiết trước
        $import->items()->delete();
        $import->delete();

        return redirect()->route('admin.stock_imports.index')->with('success', 'Đã xóa phiếu nhập kho thành công!');
    }
}
