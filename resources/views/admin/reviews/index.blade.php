@extends('admin.layouts.app')

@section('content')
<style>
    .review-container {
        max-width: 1200px;
        /* margin: 40px auto; */
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', sans-serif;
    }

    .review-container h2 {
        color: #5c3dff;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .alert-success {
        background: #d1f7d1;
        color: #207720;
        padding: 10px 15px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-weight: 500;
    }

    table.review-table {
        width: 100%;
        border-collapse: collapse;
    }

    .review-table th, .review-table td {
        padding: 12px 16px;
        text-align: left;
    }

    .review-table thead {
        background-color: #f0ebff;
        color: #333;
        font-weight: bold;
    }

    .review-table tbody tr {
        border-bottom: 1px solid #eee;
        transition: background 0.2s;
    }

    .review-table tbody tr:hover {
        background: #f9f5ff;
    }

    .rating-star {
        color: #f39c12;
        font-weight: bold;
    }

    .btn-delete {
        background: #e74c3c;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-delete:hover {
        background: #c0392b;
    }

    .no-data {
        text-align: center;
        color: #999;
        font-style: italic;
        padding: 20px 0;
    }

    .pagination {
        margin-top: 25px;
        display: flex;
        justify-content: center;
        list-style: none;
        padding-left: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a,
    .pagination li span {
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        text-decoration: none;
        color: #333;
        transition: background 0.2s;
    }

    .pagination li a:hover {
        background: #eee;
    }

    .pagination .active span {
        background: #5c3dff;
        color: white;
        border-color: #5c3dff;
    }
</style>

<div class="review-container">
    <h2>🌟 Danh sách đánh giá</h2>

    @if(session('success'))
        <div class="alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="table-wrapper">
        <table class="review-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Người dùng</th>
                    <th>Sản phẩm</th>
                    <th>Đánh giá</th>
                    <th>Bình luận</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->user->name }}</td>
                        <td>{{ $r->product->name }}</td>
                        <td><span class="rating-star">{{ $r->rating }}/5</span></td>
                        <td>{{ $r->comment }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.reviews.destroy', $r) }}"
                                  onsubmit="return confirm('Bạn có chắc chắn muốn xoá đánh giá này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Xoá</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($reviews->isEmpty())
                    <tr>
                        <td colspan="6" class="no-data">Không có đánh giá nào.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div>
        {{ $reviews->links() }}
    </div>
</div>
@endsection
