@extends('admin.layouts.app')
@section('title', 'Dashboard Admin')
@section('content')

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
        <h3 class="text-sm font-medium text-gray-500 mb-2">Total Produk</h3>
        <p class="text-3xl font-bold text-gray-900">{{ count($my_products) }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
        <h3 class="text-sm font-medium text-gray-500 mb-2">Total Order Berhasil</h3>
        <p class="text-3xl font-bold text-gray-900">{{ count($orders_success) }}</p>
        <p class="text-sm text-green-600 flex items-center mt-1">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            2.5%
        </p>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
        <h3 class="text-sm font-medium text-gray-500 mb-2">Total Pendapatan</h3>
        <p class="text-3xl font-bold text-gray-900">Rp {{ number_format($my_revenue, 0, ',', '.') }}</p>
        <p class="text-sm text-green-600 flex items-center mt-1">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            3.1%
        </p>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    <!-- Chart Section -->
    <div class="xl:col-span-2">
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Statistik Pengguna & Penjual</h3>
                <select id="timePeriod" class="border border-gray-300 rounded-md px-3 py-1 text-sm focus:ring-2 focus:ring-blue-500">
                    <option value="lastMonth">Bulan Lalu</option>
                    <option value="currentMonth">Bulan Ini</option>
                    <option value="lastYear">Tahun Lalu</option>
                </select>
            </div>
            <div id="users-sellers-chart" class="h-80"></div>
            <!-- Legend Description -->
            <div class="mt-4 flex flex-wrap gap-4">
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-blue-600 rounded-sm mr-2"></div>
                    <span class="text-sm font-medium text-gray-600">Jumlah Pengguna: Jumlah pengguna baru yang terdaftar</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-yellow-400 rounded-sm mr-2"></div>
                    <span class="text-sm font-medium text-gray-600">Jumlah Penjual: Jumlah penjual baru yang terdaftar</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Statistik Penjualan & Pendapatan</h3>
            </div>
            <div id="transactions-revenue-chart" class="h-80"></div>
            <!-- Legend Description -->
            <div class="mt-4 flex flex-wrap gap-4">
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-green-600 rounded-sm mr-2"></div>
                    <span class="text-sm font-medium text-gray-600">Jumlah Transaksi: Total transaksi yang dilakukan</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-red-600 rounded-sm mr-2"></div>
                    <span class="text-sm font-medium text-gray-600">Pendapatan: Total pendapatan dari transaksi berhasil (Rp)</span>
                </div>
            </div>
        </div>

        <!-- Transactions Table -->
        <div class="bg-white rounded-xl shadow-sm mt-6">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Transaksi Terbaru</h3>
                    <a href="{{ route('admin.transactions.orders') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800">Lihat Lebih Banyak</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="py-3 px-4 font-medium text-gray-500">Barang</th>
                                <th class="py-3 px-4 font-medium text-gray-500">Tanggal</th>
                                <th class="py-3 px-4 font-medium text-gray-500">Harga</th>
                                <th class="py-3 px-4 font-medium text-gray-500">Pembayaran</th>
                                <th class="py-3 px-4 font-medium text-gray-500">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($latest_transactions as $transaction)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-4 font-medium text-gray-900">{{ $transaction->product->nama }}</td>
                                    <td class="py-4 px-4 text-gray-600">{{ \Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y') }}</td>
                                    <td class="py-4 px-4 text-gray-900">Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</td>
                                    <td class="py-4 px-4">
                                        <span class="flex items-center text-green-600">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $transaction->bukti_bayar ? 'Transfered' : 'Pending' }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                            {{ $transaction->status_transaksi ? 'Completed' : 'Pending' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar -->
    <div class="space-y-6">
        

        <!-- Profile Section -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                    <span class="text-gray-600 font-medium">{{ Auth::user()->name[0] }}</span>
                </div>
                <div>
                    <h4 class="font-medium text-gray-900">{{ Auth::user()->name }}</h4>
                    <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer-admin />

@endsection

@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.35.3/dist/apexcharts.min.js"></script>
<script>
    // Chart data from PHP
    const chartData = @json($chartData);

    // Base chart options
    const baseOptions = {
        chart: {
            type: 'bar',
            height: 320,
            fontFamily: 'Inter, sans-serif',
            toolbar: { show: false }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '20%',
                barHeight: '100%',
                distributed: false,
                endingShape: 'rounded',
                borderRadius: 6
            }
        },
        dataLabels: { enabled: false },
        stroke: {
            show: true,
            width: 4,
            colors: ['#ffffff']
        },
        xaxis: {
            labels: {
                style: {
                    fontSize: '12px',
                    fontWeight: 500,
                    colors: '#374151'
                }
            },
            group: {
                style: {
                    fontSize: '14px',
                    fontWeight: 700
                }
            }
        },
        yaxis: {
            title: { text: 'Jumlah' },
            labels: {
                formatter: function (val) {
                    return val.toLocaleString('id-ID');
                }
            }
        },
        fill: { opacity: 1 },
        tooltip: {
            y: {
                formatter: function (val, { seriesIndex }) {
                    if (seriesIndex === 1 && chartIndex === 1) { // Revenue in second chart
                        return 'Rp ' + val.toLocaleString('id-ID');
                    }
                    return val.toLocaleString('id-ID');
                },
                title: {
                    formatter: (seriesName) => seriesName + ':'
                }
            }
        },
        legend: {
            show: true,
            position: 'top',
            horizontalAlign: 'left',
            fontSize: '12px',
            fontWeight: 500,
            markers: {
                width: 12,
                height: 12,
                radius: 2
            }
        },
        grid: {
            borderColor: '#E5E7EB',
            strokeDashArray: 4
        }
    };

    // Chart 1: Users and Sellers
    let usersSellersChart;
    const usersSellersOptions = {
        ...baseOptions,
        series: [
            {
                name: 'Jumlah Pengguna',
                data: chartData.users,
                color: '#2563EB' // Blue
            },
            {
                name: 'Jumlah Penjual',
                data: chartData.sellers,
                color: '#F59E0B' // Yellow
            }
        ],
        xaxis: {
            ...baseOptions.xaxis,
            categories: ['Bulan Lalu', 'Bulan Ini', 'Tahun Lalu']
        }
    };

    // Chart 2: Transactions and Revenue
    let transactionsRevenueChart;
    const transactionsRevenueOptions = {
        ...baseOptions,
        series: [
            {
                name: 'Jumlah Transaksi',
                data: chartData.transactions,
                color: '#16A34A' // Green
            },
            {
                name: 'Pendapatan (Rp)',
                data: chartData.revenue,
                color: '#DC2626' // Red
            }
        ],
        xaxis: {
            ...baseOptions.xaxis,
            categories: ['Bulan Lalu', 'Bulan Ini', 'Tahun Lalu']
        }
    };

    // Initialize charts
    if (document.getElementById('users-sellers-chart') && typeof ApexCharts !== 'undefined') {
        usersSellersChart = new ApexCharts(document.getElementById('users-sellers-chart'), usersSellersOptions);
        usersSellersChart.render();
    }
    if (document.getElementById('transactions-revenue-chart') && typeof ApexCharts !== 'undefined') {
        transactionsRevenueChart = new ApexCharts(document.getElementById('transactions-revenue-chart'), transactionsRevenueOptions);
        transactionsRevenueChart.render();
    }

    // Dynamic filtering based on time period
    document.getElementById('timePeriod').addEventListener('change', function () {
        const period = this.value;
        let categories = ['Bulan Lalu', 'Bulan Ini', 'Tahun Lalu'];
        let usersData = chartData.users;
        let sellersData = chartData.sellers;
        let transactionsData = chartData.transactions;
        let revenueData = chartData.revenue;

        if (period === 'lastYear') {
            categories = chartData.last_year_monthly.months;
            usersData = chartData.last_year_monthly.users;
            sellersData = chartData.last_year_monthly.sellers;
            transactionsData = chartData.last_year_monthly.transactions;
            revenueData = chartData.last_year_monthly.revenue;
        } else if (period === 'lastMonth') {
            usersData = [chartData.users[0]];
            sellersData = [chartData.sellers[0]];
            transactionsData = [chartData.transactions[0]];
            revenueData = [chartData.revenue[0]];
            categories = ['Bulan Lalu'];
        } else if (period === 'currentMonth') {
            usersData = [chartData.users[1]];
            sellersData = [chartData.sellers[1]];
            transactionsData = [chartData.transactions[1]];
            revenueData = [chartData.revenue[1]];
            categories = ['Bulan Ini'];
        }

        usersSellersChart.updateOptions({
            series: [
                { name: 'Jumlah Pengguna', data: usersData },
                { name: 'Jumlah Penjual', data: sellersData }
            ],
            xaxis: { categories: categories }
        });

        transactionsRevenueChart.updateOptions({
            series: [
                { name: 'Jumlah Transaksi', data: transactionsData },
                { name: 'Pendapatan (Rp)', data: revenueData }
            ],
            xaxis: { categories: categories }
        });
    });
</script>
@endpush