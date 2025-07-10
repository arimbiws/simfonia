@extends('admin.layouts.app')
@section('title', 'Dashboard Admin ')
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
                <p class="text-sm text-red-600 flex items-center mt-1">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    2%
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-sm font-medium text-gray-500 mb-2">Total Transaksi</h3>
        <div class="flex items-end justify-between">
            <div>
                <p class="text-3xl font-bold text-gray-900">Rp{{number_format($my_revenue)}}</p>
                <p class="text-sm text-green-600 flex items-center mt-1">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    2.29%
                </p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    <!-- Chart Section -->
    <!-- <div class="xl:col-span-2">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Statistik Total Akun</h3>
                    <select class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                        <option>2022</option>
                        <option>2023</option>
                    </select>
                </div>

                <div class="flex items-center space-x-6 mb-4">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                        <span class="text-sm text-gray-600">Penjual</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-pink-500 rounded-full mr-2"></div>
                        <span class="text-sm text-gray-600">Pembeli</span>
                    </div>
                </div>
                <canvas id="accountChart" width="400" height="200"></canvas>
            </div> -->

    <!--Chart Section -->
    <div class="xl:col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Statistik Total Akun</h3>
                <select class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                    <option>2022</option>
                    <option>2023</option>
                </select>
            </div>

            <div class="flex items-center space-x-6 mb-4">
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                    <span class="text-sm text-gray-600">Penjual</span>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-pink-500 rounded-full mr-2"></div>
                    <span class="text-sm text-gray-600">Pembeli</span>
                </div>
            </div>

            <div class="max-w-sm w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between mb-5">
                    <div>
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">$12,423</h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Sales this week</p>
                    </div>
                    <div
                        class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                        23%
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
                            Last 7 days
                            <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
                                </li>
                            </ul>
                        </div>
                        <a
                            href="#"
                            class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                            Sales Report
                            <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--Transactions Table -->
        <div class="bg-white rounded-lg shadow mt-6">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Transaksi</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 px-4 font-medium text-gray-500">Barang</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-500">Tanggal</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-500">Harga</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-500">Pembayaran</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-500">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="py-4 px-4 font-medium text-gray-900">Pensil</td>
                                <td class="py-4 px-4 text-gray-600">02/08/2023</td>
                                <td class="py-4 px-4 text-gray-900">$473.18</td>
                                <td class="py-4 px-4">
                                    <span class="flex items-center text-green-600">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Transfered
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                        Completed
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-4 font-medium text-gray-900">Penggaris</td>
                                <td class="py-4 px-4 text-gray-600">01/09/2023</td>
                                <td class="py-4 px-4 text-gray-900">$665.86</td>
                                <td class="py-4 px-4">
                                    <span class="flex items-center text-green-600">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Transfered
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                        Completed
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-4 font-medium text-gray-900">Penghapus</td>
                                <td class="py-4 px-4 text-gray-600">15/12/2023</td>
                                <td class="py-4 px-4 text-gray-900">$322.23</td>
                                <td class="py-4 px-4">
                                    <span class="flex items-center text-green-600">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Transfered
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                        Completed
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar -->
    <div class="space-y-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Kategori UBIS</h3>
                <button class="text-blue-600 text-sm font-medium">+ Tambah Kategori</button>
            </div>

            <div class="space-y-4">
                <div class="p-3 bg-gray-50 rounded-lg">
                    <h4 class="font-medium text-gray-900">Ruangan & Gedung</h4>
                    <p class="text-sm text-gray-600 mt-1">In eu do do culpa lorem exercitation ea dolor.</p>
                </div>

                <div class="p-3 bg-gray-50 rounded-lg">
                    <h4 class="font-medium text-gray-900">Inventaris</h4>
                    <p class="text-sm text-gray-600 mt-1">Deserunt minim incididunt culpa nostrud voluptate excepteur.</p>
                </div>

                <div class="p-3 bg-gray-50 rounded-lg">
                    <h4 class="font-medium text-gray-900">Alat Tulis & Printing</h4>
                    <p class="text-sm text-gray-600 mt-1">Mollit consectetur occaecat et ad adipisicing ex deserunt fugiat.</p>
                </div>

                <div class="p-3 bg-gray-50 rounded-lg">
                    <h4 class="font-medium text-gray-900">Pengembangan Software</h4>
                    <p class="text-sm text-gray-600 mt-1">Cupidatat eiusmod tempor labore amet amet proident duis.</p>
                </div>

                <div class="p-3 bg-gray-50 rounded-lg">
                    <h4 class="font-medium text-gray-900">UMKM</h4>
                    <p class="text-sm text-gray-600 mt-1">Duis excepteur enim enim dolore aliqua officia nisl labore ipsum.</p>
                </div>
            </div>
        </div>

        <!-- Profile Section -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                <div>
                    <h4 class="font-medium text-gray-900">Sergey Goldberg</h4>
                    <p class="text-sm text-gray-500">company@example.com</p>
                </div>
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
            categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
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
                    return '$' + value;
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