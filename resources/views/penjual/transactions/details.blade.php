@extends('penjual.layouts.app')
@section('title', 'Detail Transaction')
@section('content')

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('penjual.transactions.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                Transactions
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <a href="{{ route('penjual.transactions.details', $transaction) }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Detail Transaction</a>
            </div>
        </li>
    </ol>
</nav>


@if ($errors->any())
<div class="alert alert-danger mb-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li class="ps-5 py-5 bg-red-500 text-white font-bold">
            {{ $error }}
        </li>
        @endforeach

    </ul>
</div>
@endif

<div class="item-product flex flex-col gap-y-10 justify-between mt-10">
    @if($transaction->product && $transaction->product->gambar)
        <img src="{{ Storage::url($transaction->product->gambar) }}" class="w-auto h-[200px] object-cover rounded-lg" alt="{{ $transaction->product->nama ?? 'Product Image' }}">
    @else
        <div class="w-auto h-[200px] bg-gray-200 rounded-lg flex items-center justify-center">
            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
        </div>
    @endif
    <div>
        <h3 class="text-indigo-950 text-xl font-bold">{{ $transaction->product->nama ?? 'Produk tidak ditemukan' }}</h3>
        <p class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-indigo-700/10 ring-inset">{{ $transaction->product->unit->nama_unit ?? 'Unit tidak ditemukan' }}</p>
    </div>

    <div class="flex flex-row gap-x-5 items-center">
        <p class="mb-2 text-2xl pt-2">Rp{{ number_format($transaction->total_harga) }}</p>
        @if($transaction->status_transaksi)
        <span class="py-1 px-3 rounded-full bg-green-500 text-white font-bold text-sm">
            SUCCESS
        </span>
        @else
        <span class="py-1 px-3 rounded-full bg-orange-500 text-white font-bold text-sm ">
            PENDING
        </span>
        @endif
    </div>

    <!-- Informasi Pembeli -->
    <div class="bg-gray-50 p-4 rounded-lg">
        <h4 class="text-lg font-semibold text-gray-800 mb-2">Informasi Pembeli</h4>
        <p class="text-gray-600">
            <span class="font-medium">Nama:</span> {{ $transaction->buyer->name ?? 'Pembeli tidak ditemukan' }}
        </p>
        <p class="text-gray-600">
            <span class="font-medium">Email:</span> {{ $transaction->buyer->email ?? 'Email tidak tersedia' }}
        </p>
        <p class="text-gray-600">
            <span class="font-medium">Tanggal Transaksi:</span> {{ $transaction->created_at->format('d M Y, H:i') }}
        </p>
    </div>

    <!-- Download Section (if commented out, can be enabled later) -->
    <!-- <div class="flex flex-row gap-x-3">
        @if($transaction->status_transaksi)
        <a href="{{ route('penjual.transactions.download', $transaction) }}" class="py-3 px-5 bg-red-500 text-white">Download Product</a>
        @endif
    </div> -->
</div>
@endsection