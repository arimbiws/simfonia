<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin  ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex h-screen">

            <x-sidebar-admin />

            <!-- Main Content -->
            <div class="flex-1 overflow-hidden">
                <!-- Header -->
                <header class="bg-white shadow-sm border-b">
                    <div class="flex items-center justify-between px-6 py-4">
                        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                        <div class="flex items-center space-x-4">
                            <button class="p-2 text-gray-400 hover:text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM12 9l-3 3m0 0l3 3m-3-3h12a2 2 0 002-2V6a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2z"></path>
                                </svg>
                            </button>
                            <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
                        </div>
                    </div>
                </header>

                <!-- Content Area -->
                <main class="p-6 overflow-y-auto h-full">
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-sm font-medium text-gray-500 mb-2">Total Pengguna</h3>
                            <div class="flex items-end justify-between">
                                <div>
                                    <p class="text-3xl font-bold text-gray-900">6,452</p>
                                    <p class="text-sm text-green-600 flex items-center mt-1">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        5.39%
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-sm font-medium text-gray-500 mb-2">Akun Penjual</h3>
                            <div class="flex items-end justify-between">
                                <div>
                                    <p class="text-3xl font-bold text-gray-900">2,231</p>
                                    <p class="text-sm text-red-600 flex items-center mt-1">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        0.65%
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-sm font-medium text-gray-500 mb-2">Akun Pembeli</h3>
                            <div class="flex items-end justify-between">
                                <div>
                                    <p class="text-3xl font-bold text-gray-900">4,221</p>
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

                                <canvas id="accountChart" width="400" height="200"></canvas>
                            </div>

                            <!-- Transactions Table -->
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
                </main>
            </div>
        </div>
    </div>
</x-app-layout>