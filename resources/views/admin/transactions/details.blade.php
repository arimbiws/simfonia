@extends('admin.layouts.app')
@section('title', 'Detail Transaction')
@section('content')

<nav class="flex" aria-label="Breadcrumb">
    <!-- Your breadcrumb code here -->
    <a href="{{ route('admin.transaction.show', $transaction) }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Detail Transaction</a>
</nav>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mt-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <img src="{{ Storage::url($transaction->product->gambar) }}" class="w-full h-auto object-cover rounded-lg shadow-md" alt="{{ $transaction->product->nama }}">
        </div>
        <div>
            <h3 class="text-indigo-950 text-2xl font-bold mb-2">{{ $transaction->product->nama }}</h3>
            <p class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-indigo-700/10 ring-inset mb-4">{{ $transaction->product->unit->nama_unit }}</p>
            <p class="text-gray-500 mb-4">Penjual: {{ $transaction->product->penjual->name }}</p>
            <div class="flex items-center">
                <p class="text-2xl font-bold text-indigo-950">Rp {{ number_format($transaction->total_harga) }}</p>
                @if($transaction->status_transaksi)
                    <span class="ml-4 py-1 px-3 rounded-full bg-green-500 text-white font-bold text-sm">SUCCESS</span>
                @else
                    <span class="ml-4 py-1 px-3 rounded-full bg-orange-500 text-white font-bold text-sm">PENDING</span>
                @endif
            </div>
            <!-- Add any action buttons here if needed -->
        </div>
    </div>
</div>

@endsection