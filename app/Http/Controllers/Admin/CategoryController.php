<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:categories']);
        Category::create(['name' => $request->name]);
        return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục thành công');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|unique:categories,name,' . $category->id]);
        $category->update(['name' => $request->name]);
        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Xóa thành công');
    }
}
