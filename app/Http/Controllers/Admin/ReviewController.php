<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'product'])->latest()->paginate(10);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Xóa đánh giá thành công');
    }
}
