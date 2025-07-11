<?php

namespace App\Http\Controllers;

use App\Models\StockImport;
use App\Models\StockImportItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class StockImportController extends Controller
{
    // Danh sách phiếu nhập kho
    public function index()
    {
        $imports = StockImport::with(['user', 'items.productVariant.product'])
            ->orderByDesc('import_date')
            ->paginate(20);

        return view('admin.stock_imports.index', compact('imports'));
    }

    // Form tạo mới
    public function create()
    {
        $variants = ProductVariant::with('product')->get();
        $suppliers = \App\Models\Supplier::all();

        return view('admin.stock_imports.create', compact('variants', 'suppliers'));
    }

    // Lưu phiếu nhập
    public function store(Request $request)
    {
        $request->validate([
            'import_date'     => 'required|date',
            'supplier_id'     => 'required|exists:suppliers,id',
            'variants'        => 'required|array',
            'variants.*'      => 'required|exists:product_variants,id',
            'quantities.*'    => 'required|integer|min:1',
            'import_prices.*' => 'required|numeric|min:0',
        ]);

        $import = StockImport::create([
            'user_id'     => auth()->id(),
            'supplier_id' => $request->supplier_id,
            'import_date' => $request->import_date,
            'note'        => $request->note,
            'total_money' => 0,
        ]);

        $total = 0;

        foreach ($request->variants as $index => $variant_id) {
            $qty   = (int) $request->quantities[$index];
            $price = (float) $request->import_prices[$index];

            StockImportItem::create([
                'stock_import_id'    => $import->id,
                'product_variant_id' => $variant_id,
                'quantity'           => $qty,
                'import_price'       => $price,
            ]);

            // ✅ Cập nhật tồn kho:
            $variant = ProductVariant::find($variant_id);
            if ($variant) {
                $variant->stock = ($variant->stock ?? 0) + $qty;
                $variant->save();
            }

            $total += $qty * $price;
        }

        $import->update(['total_money' => $total]);

        return redirect()->route('admin.stock_imports.index')->with('success', 'Nhập kho thành công!');
    }

    // Xóa phiếu nhập
    public function destroy($id)
    {
        $import = StockImport::findOrFail($id);

        // Khi xóa, cần cập nhật lại tồn kho
        foreach ($import->items as $item) {
            $variant = $item->productVariant;
            if ($variant) {
                $variant->stock = max(0, $variant->stock - $item->quantity);
                $variant->save();
            }
        }

        $import->items()->delete();
        $import->delete();

        return redirect()->route('admin.stock_imports.index')->with('success', 'Đã xóa phiếu nhập kho!');
    }
}
