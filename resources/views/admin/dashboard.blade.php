@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-purple-700"> Thống kê tổng quan</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-700"> Tổng sản phẩm</h3>
            <p class="text-2xl text-purple-600 mt-2">{{ $totalProducts }}</p>
        </div>
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-700">Tổng đơn hàng</h3>
            <p class="text-2xl text-purple-600 mt-2">{{ $totalOrders }}</p>
        </div>
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-700"> Doanh thu</h3>
            <p class="text-2xl text-purple-600 mt-2">{{ number_format($totalRevenue, 0, ',', '.') }} đ</p>
        </div>
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-700"> Tổng người dùng</h3>
            <p class="text-2xl text-purple-600 mt-2">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-700"> Tổng đánh giá</h3>
            <p class="text-2xl text-purple-600 mt-2">{{ $totalReviews }}</p>
        </div>
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-700">Tổng chi nhập hàng</h3>
            <p class="text-2xl text-purple-600 mt-2">{{ number_format($totalExpense, 0, ',', '.') }} đ</p>
        </div>
    </div>

    {{-- Biểu đồ doanh thu & chi nhập hàng & đơn hàng --}}
    <div class="bg-white rounded-xl shadow p-6 mt-10">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-purple-700"> Biểu đồ Doanh thu, Chi nhập hàng & Số đơn hàng</h3>

            <form method="GET">
                <label for="filter" class="mr-2 font-semibold">Xem theo:</label>
                <select name="filter" id="filter" onchange="this.form.submit()" class="border rounded px-2 py-1">
                    <option value="month" {{ $filter == 'month' ? 'selected' : '' }}>Tháng</option>
                    <option value="year" {{ $filter == 'year' ? 'selected' : '' }}>Năm</option>
                </select>
            </form>
        </div>

        <canvas id="ordersChart" class="h-[400px]"></canvas>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let ordersChart = null;

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('ordersChart').getContext('2d');

            if (ordersChart !== null) {
                ordersChart.destroy();
            }

            const revenueGradient = ctx.createLinearGradient(0, 0, 0, 400);
            revenueGradient.addColorStop(0, 'rgba(124, 58, 237, 0.7)');
            revenueGradient.addColorStop(1, 'rgba(124, 58, 237, 0.1)');

            const expenseGradient = ctx.createLinearGradient(0, 0, 0, 400);
            expenseGradient.addColorStop(0, 'rgba(239, 68, 68, 0.7)');
            expenseGradient.addColorStop(1, 'rgba(239, 68, 68, 0.1)');

            ordersChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($labels),
                    datasets: [{
                            label: 'Doanh thu (VND)',
                            data: @json($revenues),
                            backgroundColor: revenueGradient,
                            borderColor: 'rgba(124, 58, 237, 1)',
                            borderWidth: 2,
                            yAxisID: 'y'
                        },
                        {
                            label: 'Tổng chi nhập hàng',
                            data: @json($expenses),
                            backgroundColor: expenseGradient,
                            borderColor: 'rgba(239, 68, 68, 0.8)',
                            borderWidth: 2,
                            yAxisID: 'y'
                        },
                        {
                            label: 'Số đơn hàng',
                            data: @json($orderCounts),
                            backgroundColor: 'rgba(34, 197, 94, 0.2)',
                            borderColor: 'rgba(34, 197, 94, 1)',
                            borderWidth: 2,
                            type: 'line',
                            yAxisID: 'y1',
                            tension: 0.4,
                            pointRadius: 4,
                            pointBackgroundColor: 'rgba(34, 197, 94, 1)',
                        }
                    ]
                },
                options: {
                    responsive: true,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#4B5563',
                                font: {
                                    weight: 'bold'
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            position: 'left',
                            title: {
                                display: true,
                                text: 'VND'
                            },
                            ticks: {
                                callback: function(value) {
                                    return value.toLocaleString() + ' đ';
                                }
                            }
                        },
                        y1: {
                            beginAtZero: true,
                            position: 'right',
                            grid: {
                                drawOnChartArea: false
                            },
                            title: {
                                display: true,
                                text: 'Số đơn hàng'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
