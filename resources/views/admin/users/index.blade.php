@extends('admin.layouts.app')

@section('content')
<style>
    .user-container {
        max-width: 1200px;
        margin: 40px auto;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', sans-serif;
    }

    .user-container h2 {
        color: #2c3e50;
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

    table.user-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .user-table th, .user-table td {
        padding: 12px 16px;
        text-align: left;
    }

    .user-table thead {
        background-color: #f5f5f5;
        color: #333;
        font-weight: bold;
    }

    .user-table tbody tr {
        border-bottom: 1px solid #eee;
        transition: background 0.2s;
    }

    .user-table tbody tr:hover {
        background: #f0f8ff;
    }

    .action-buttons a,
    .action-buttons button {
        display: inline-block;
        margin-right: 6px;
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 14px;
        text-decoration: none;
        cursor: pointer;
        border: none;
    }

    .btn-view {
        background-color: #3498db;
        color: white;
    }

    .btn-view:hover {
        background-color: #2980b9;
    }

    .btn-delete {
        background-color: #e74c3c;
        color: white;
    }

    .btn-delete:hover {
        background-color: #c0392b;
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
        background: #3498db;
        color: white;
        border-color: #3498db;
    }

    @media (max-width: 768px) {
        .user-table th, .user-table td {
            padding: 8px 10px;
        }

        .action-buttons a,
        .action-buttons button {
            padding: 4px 8px;
            font-size: 13px;
        }
    }
</style>

<div class="user-container">
    <h2> Danh sách người dùng</h2>

    @if(session('success'))
        <div class="alert-success">
             {{ session('success') }}
        </div>
    @endif

    <table class="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->phone ?? '---' }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('admin.users.show', $u) }}" class="btn-view">Xem</a>
                        <form method="POST" action="{{ route('admin.users.destroy', $u) }}" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if($users->isEmpty())
                <tr>
                    <td colspan="5" style="text-align:center; color:#999; font-style:italic;">Không có người dùng nào.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div>
        {{ $users->links() }}
    </div>
</div>
@endsection
