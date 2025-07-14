@extends('admin.layouts.app')

@section('content')
    <style>
        .order-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .btn {
            padding: 8px 14px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            color: white;
            text-decoration: none;
        }

        .btn-warning { background-color: #f0ad4e; }
        .btn-primary { background-color: #0275d8; }
        .btn-info { background-color: #5bc0de; }
        .btn-success { background-color: #5cb85c; }
        .btn-danger { background-color: #d9534f; }
        .btn-secondary { background-color: #6c757d; }

        .btn-sm {
            padding: 4px 8px;
            font-size: 13px;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f0f0f0;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 12px;
            color: white;
            font-size: 12px;
        }

        .bg-success { background-color: #28a745; }
        .bg-primary { background-color: #007bff; }
        .bg-danger { background-color: #dc3545; }
        .bg-warning { background-color: #ffc107; color: black; }

        .summary-box {
            margin-bottom: 15px;
            padding: 10px;
            background: #e3f2fd;
            border-left: 5px solid #2196f3;
            font-size: 15px;
        }
    </style>

    <div class="order-header">📦 Danh Sách Đơn Hàng</div>

<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; ">
    <div class="btn-group" style="display: flex; flex-wrap: wrap; gap: 10px;">
        <button class="btn btn-warning" onclick="importFile()">Tải từ file</button>
        <button class="btn btn-primary" onclick="window.print()"> In dữ liệu</button>
        <button class="btn btn-info" onclick="copyTable()"> Sao chép</button>
        <a href="{{ route('admin.orders.exportExcel') }}" class="btn btn-success"> Xuất Excel</a>
        <a href="{{ route('admin.orders.exportPdf') }}" class="btn btn-danger"> Xuất PDF</a>
        <form action="{{ route('admin.orders.deleteAll') }}" method="POST" onsubmit="return confirm('Xóa tất cả đơn hàng?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-secondary"> Xóa tất cả</button>
        </form>
    </div>


</div>
<div style="margin-bottom: 20px; text-align: right;">
    <form method="GET" action="{{ route('admin.orders.index') }}" style="display: inline-block; max-width: 300px; width: 100%;">
        <div class="input-group" style="box-shadow: 0 2px 6px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden;">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control"
                placeholder="Tìm theo  tên khách..."
                style="border: none; box-shadow: none; padding: 10px 12px; font-size: 14px;"
            >
            <button
                class="btn btn-primary btn-sm"
                type="submit"
                style="padding: 10px 14px; font-size: 14px; font-weight: 500;"
            >
                 Tìm
            </button>
        </div>
    </form>
</div>






    @php
        $totalQuantity = $orders->pluck('orderDetails')->flatten()->sum('quantity');
    @endphp

    <div class="summary-box">
         <strong>Tổng số sản phẩm trong các đơn hàng:</strong> {{ $totalQuantity }}
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>

                    <th>Khách hàng</th>
                    <th>Đơn hàng</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th style="width: 130px;">Tình trạng</th>
                    <th style="width: 150px;">Tính năng</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>

                        <td>{{ $order->user->name }}</td>
                        <td>
                            @foreach ($order->orderDetails as $detail)
                                {{ $detail->productVariant->product->name ?? 'SP?' }}@if(!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>{{ $order->orderDetails->sum('quantity') }}</td>
                        <td>{{ number_format($order->total_amount, 0, ',', '.') }} đ</td>
                        <td>
                            @php
                                $statusClass = match($order->status) {
                                    'completed' => 'bg-success',
                                    'pending' => 'bg-primary',
                                    'cancelled' => 'bg-danger',
                                    default => 'bg-warning',
                                };
                                $statusText = match($order->status) {
                                    'completed' => 'Hoàn thành',
                                    'pending' => 'Chờ thanh toán',
                                    'cancelled' => 'Đã hủy',
                                    default => ucfirst(__($order->status)),
                                };
                            @endphp
                            <span class="badge {{ $statusClass }}">{{ $statusText }}</span>
                        </td>
                        <td>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Xóa đơn hàng này?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-warning">Xem chi tiết</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Không có đơn hàng nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $orders->links() }}
    </div>

    <script>
        function copyTable() {
            let text = '';
            document.querySelectorAll('table tr').forEach(row => {
                row.querySelectorAll('th, td').forEach(cell => {
                    text += cell.innerText + '\t';
                });
                text += '\n';
            });
            navigator.clipboard.writeText(text).then(() => alert('Đã sao chép!'));
        }

        function importFile() {
            alert("Chức năng đang phát triển...");
        }
    </script>
@endsection
