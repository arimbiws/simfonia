@extends('frontend.layouts.app')
@section('title', 'Check Bookings')
@section('content')

<x-navbar />

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Page Title -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">Check Your Purchase's Progress!</h1>

    </div>

    <!-- Recent Orders Section -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Recent Orders</h2>
            {{-- filter --}}
            <form method="GET" class="ml-auto flex items-center gap-4">
                <select name="status" class="border px-2 py-1 rounded">
                    <option value="">Semua Status</option>
                    <option value="1">Completed</option>
                    <option value="0">Pending</option>
                </select>

                <input type="date" name="start_date" class="border px-2 py-1 rounded">
                <input type="date" name="end_date" class="border px-2 py-1 rounded">

                <input type="text" name="keyword" placeholder="Cari Produk" class="border px-2 py-1 rounded">

                <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded">Filter</button>
            </form>
        </div>


        <!-- Table Header -->
        <div class="px-6 py-3 bg-gray-50 border-b border-gray-200">
            <div class="grid grid-cols-5 gap-4 text-sm font-medium text-gray-500">
                <div>Items</div>
                <div>Date</div>
                <div>Price</div>
                <div>Payment</div>
                <div>Status</div>
            </div>
        </div>

        <!-- Table Rows -->
        <div class="divide-y divide-gray-200">
            @forelse ($transactions as $trx)
            <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                <div class="grid grid-cols-5 gap-4 items-center">
                    <div class="text-gray-900 font-medium">{{ $trx->product->nama ?? 'N/A' }}</div>
                    <div class="text-gray-600 text-sm">
                        {{ optional($trx->created_at)->format('d/m/Y') ?? 'N/A' }}
                    </div>
                    <div class="text-gray-900 font-medium">
                        Rp{{ number_format($trx->product->harga * $trx->jumlah_item, 2) }}
                    </div>
                    <div class="flex items-center text-sm">
                        @if ($trx->bukti_bayar)
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span class="text-gray-600">Transferred</span>
                        @else
                        <i class="fas fa-clock text-yellow-500 mr-2"></i>
                        <span class="text-gray-600">Waiting</span>
                        @endif
                    </div>
                    <div>
                        <span
                            class="inline-flex px-3 py-1 rounded-full text-xs font-medium
                        {{ $trx->status_transaksi == 1 ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $trx->status_transaksi == 1 ? 'Completed' : 'Pending' }}
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="px-6 py-6 text-center text-gray-500">
                No transactions found.

            </div>
            @endforelse
        </div>
    </div>
</div>



<x-footer />

@endsection