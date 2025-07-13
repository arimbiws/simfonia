@extends('admin.layouts.app')
@section('title', 'Detail Order')
@section('content')

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.transactions.orders') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                Orders
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <a href="{{ route('admin.transactions.order_details', $order) }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Detail Order</a>
            </div>
        </li>
    </ol>
</nav>

@if ($errors->any())
<div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
    <strong class="font-bold">Error!</strong>
    <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="mt-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <img src="{{ Storage::url($order->product->gambar) }}" class="w-full h-auto object-cover rounded-lg shadow-md transition duration-500 ease-in-out transform hover:scale-105" alt="">
        </div>
        <div>
            <h3 class="text-indigo-950 text-2xl font-bold mb-2">{{ $order->product->nama }}</h3>
            <p class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-indigo-700/10 ring-inset mb-4">{{ $order->product->unit->nama_unit }}</p>
            <div class="flex items-center mb-4">
                <p class="text-2xl font-bold text-indigo-950">Rp {{ number_format($order->total_harga) }}</p>
                @if($order->status_transaksi)
                <span class="ml-4 py-1 px-3 rounded-full bg-green-500 text-white font-bold text-sm">SUCCESS</span>
                @else
                <span class="ml-4 py-1 px-3 rounded-full bg-orange-500 text-white font-bold text-sm">PENDING</span>
                @endif
            </div>
            <div class="flex flex-row gap-x-3">
                @if($order->status_transaksi)
                <button class="py-3 px-5 bg-green-600 text-white rounded-full">Payment Approved</button>
                @else
                <form action="{{ route('admin.transaction.update', $order) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="py-3 px-5 bg-red-600 text-white rounded-full hover:bg-red-700 transition duration-300">Approve Payment</button>
                </form>
                @endif
            </div>
            <div class="flex flex-row gap-x-3">
                @if($order->booking && $order->booking->status === 'pengembalian')
                <form action="{{ route('admin.bookings.markReturned', $order->booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Tandai Sudah Kembali
                    </button>
                </form>
                @endif
            </div>

        </div>
    </div>
</div>

@endsection