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
                <a href="{{ route('penjual.transaction.show', $transaction) }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Detail Transaction</a>
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
    <img src="{{ Storage::url($transaction->product->gambar) }}" class="w-auto h-[200px] object-cover
 " alt="">
    <div>
        <h3 class="text-indigo-950 text-xl font-bold">{{ $transaction->product->nama }}</h3>
        <p class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-indigo-700/10 ring-inset">{{ $transaction->product->unit->nama_unit }}</p>
    </div>

    <div class="flex flex-row gap-x-5 items-center">
        <p class="mb-2 text-2xl pt-2">Rp {{ $transaction->total_harga }}</p>
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
    <!-- <div class="flex flex-row gap-x-3">
        @if($transaction->status_transaksi)
        <a href="{{ route('penjual.transactions.download', $transaction) }}" class="py-3 px-5 bg-red-500 text-white">Download Product</a>
        @endif
    </div> -->
</div>
@endsection