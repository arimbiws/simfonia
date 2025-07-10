@extends('frontend.layouts.app')
@section('title', 'Transaksi Produk')
@section('content')

<x-navbar />

<div class="max-w-3xl mx-auto my-12 px-6">
    <h1 class="text-2xl font-bold mb-6">Form Transaksi Produk</h1>

    @if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="ps-5 py-5 bg-red-500 text-white font-bold">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('frontend.bookings.store') }}" method="POST">
        @csrf

        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <div class="mb-4">
            <label class="block font-semibold">Produk:</label>
            <p class="text-gray-700">{{ $product->nama }}</p>
        </div>

        <!-- Jumlah -->
        <div class="mb-4">
            <label for="jumlah_item" class="block font-semibold">Jumlah</label>
            <input type="number" name="jumlah_item" min="1" required class="w-full border px-3 py-2 rounded" />
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700" type="submit">Lanjut ke Pembayaran</button>
    </form>
</div>

<x-footer />
@endsection