@extends('penjual.layouts.app')
@section('title', 'Seller Dashboard')
@section('content')

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-sm font-medium text-gray-500 mb-2">Total Produk</h3>
        <div class="flex items-end justify-between">
            <div>
                <p class="text-3xl font-bold text-gray-900">{{count($my_products)}}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-sm font-medium text-gray-500 mb-2">Total Order</h3>
        <div class="flex items-end justify-between">
            <div>
                <p class="text-3xl font-bold text-gray-900">{{count($orders_success)}}</p>
                <p class="text-sm text-green-600 flex items-center mt-1">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Berhasil
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-sm font-medium text-gray-500 mb-2">Total Pendapatan</h3>
        <div class="flex items-end justify-between">
            <div>
                <p class="text-3xl font-bold text-gray-900">Rp{{number_format($my_revenue)}}</p>
                <p class="text-sm text-green-600 flex items-center mt-1">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Penjualan
                </p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    <!-- Chart Section -->
    <div class="xl:col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Statistik Penjualan</h3>
                <select class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                    <option>7 Hari Terakhir</option>
                    <option>30 Hari Terakhir</option>
                </select>
            </div>

            <div class="flex items-center space-x-6 mb-4">
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                    <span class="text-sm text-gray-600">Orders</span>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-purple-500 rounded-full mr-2"></div>
                    <span class="text-sm text-gray-600">Revenue</span>
                </div>
            </div>

            <div class="max-w-sm w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between mb-5">
                    <div>
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Rp{{number_format($my_revenue)}}</h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Penjualan minggu ini</p>
                    </div>
                    <div
                        class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                        {{count($orders_success)}}
                        <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                        </svg>
                    </div>
                </div>
                <div id="legend-chart"></div>
                <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button
                            id="dropdownDefaultButton"
                            data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            7 Hari Terakhir
                            <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kemarin</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hari Ini</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">7 Hari Terakhir</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">30 Hari Terakhir</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">90 Hari Terakhir</a>
                                </li>
                            </ul>
                        </div>
                        <a
                            href="#"
                            class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                            Laporan Penjualan
                            <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow mt-6">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Transaksi Terbaru</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 px-4 font-medium text-gray-500">Barang</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-500">Pembeli</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-500">Tanggal</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-500">Harga</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-500">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($recent_transactions as $transaction)
                            <tr>
                                <td class="py-4 px-4 font-medium text-gray-900">
                                    {{ $transaction->product->nama_produk ?? 'Produk tidak ditemukan' }}
                                </td>
                                <td class="py-4 px-4 text-gray-600">
                                    {{ $transaction->buyer->name ?? 'Pembeli tidak ditemukan' }}
                                </td>
                                <td class="py-4 px-4 text-gray-600">
                                    {{ $transaction->created_at->format('d/m/Y') }}
                                </td>
                                <td class="py-4 px-4 text-gray-900">
                                    Rp{{ number_format($transaction->total_harga) }}
                                </td>
                                <td class="py-4 px-4">
                                    @if($transaction->status_transaksi == 1)
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                        Berhasil
                                    </span>
                                    @elseif($transaction->status_transaksi == 0)
                                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-medium">
                                        Pending
                                    </span>
                                    @else
                                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-medium">
                                        Ditolak
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-4 px-4 text-center text-gray-500">
                                    Belum ada transaksi
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar -->
    <div class="space-y-6">
        <!-- Profile Section -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-medium">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <h4 class="font-medium text-gray-900">{{ Auth::user()->name }}</h4>
                    <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Cepat</h3>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Produk Aktif</span>
                    <span class="font-medium text-gray-900">{{ count($my_products) }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Total Penjualan</span>
                    <span class="font-medium text-gray-900">{{ count($orders_success) }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Pendapatan Total</span>
                    <span class="font-medium text-green-600">Rp{{ number_format($my_revenue) }}</span>
                </div>
            </div>

            <div class="mt-4 pt-4 border-t border-gray-200">
                <a href="#" class="text-blue-600 text-sm font-medium hover:text-blue-700">
                    Kelola Produk →
                </a>
            </div>
        </div>
    </div>
</div>
<x-footer-admin />

@endsection

@push('after-script')
<script>
    const options = {
        // add data series via arrays, learn more here: https://apexcharts.com/docs/series/
        series: [{
                name: "Orders",
                data: @json($chartData['orders']),
                color: "#1A56DB",
            },
            {
                name: "Revenue",
                data: @json($chartData['revenue']),
                color: "#7E3BF2",
            }
        ],
        xaxis: {
            categories: @json($chartData['labels']),
            labels: {
                show: true,
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },

        yaxis: {
            labels: {
                formatter: function(value) {
                    return 'Rp ' + value.toLocaleString();
                }
            }
        },

        chart: {
            height: "100%",
            maxWidth: "100%",
            type: "area",
            fontFamily: "Inter, sans-serif",
            dropShadow: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
        },
        tooltip: {
            enabled: true,
            x: {
                show: false,
            },
        },
        legend: {
            show: true
        },
        fill: {
            type: "gradient",
            gradient: {
                opacityFrom: 0.55,
                opacityTo: 0,
                shade: "#1C64F2",
                gradientToColors: ["#1C64F2"],
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: 6,
        },
        grid: {
            show: false,
            strokeDashArray: 4,
            padding: {
                left: 2,
                right: 2,
                top: -26
            },
        },
        xaxis: {
            categories: @json($chartData['labels']),
            labels: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            show: false,
            labels: {
                formatter: function(value) {
                    return 'Rp' + value;
                }
            }
        },
    }

    if (document.getElementById("legend-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("legend-chart"), options);
        chart.render();
    }
</script>
@endpush