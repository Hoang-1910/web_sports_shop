<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderByDesc('id')->paginate(20);
        return view('admin.suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.suppliers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone'   => 'nullable|string|max:50',
            'email'   => 'nullable|email|max:255',
            'note'    => 'nullable|string',
        ]);
        Supplier::create($data);
        return redirect()->route('admin.suppliers.index')->with('success', 'Thêm nhà cung cấp thành công!');
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone'   => 'nullable|string|max:50',
            'email'   => 'nullable|email|max:255',
            'note'    => 'nullable|string',
        ]);
        $supplier->update($data);
        return redirect()->route('admin.suppliers.index')->with('success', 'Cập nhật nhà cung cấp thành công!');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('admin.suppliers.index')->with('success', 'Đã xóa nhà cung cấp!');
    }
} 