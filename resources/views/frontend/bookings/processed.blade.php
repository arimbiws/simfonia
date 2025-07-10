@extends('frontend.layouts.app')
@section('title', 'Success Checkout')
@section('content')

<x-navbar />


<!-- Konten Utama -->
<main class="max-w-4xl mx-auto px-4 pt-5 pb-[75px]">
    <!-- Progress Step -->
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="flex justify-center items-center mb-8">
            <div class="flex space-x-4 items-center">
                <div class="text-gray-400">Booking</div>
                <div class="w-8 h-1 bg-gray-300"></div>
                <div class="text-gray-400">Payment</div>
                <div class="w-8 h-1 bg-blue-600"></div>
                <div class="text-blue-600">Payment Status</div>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    <div class="flex flex-col items-center text-center px-4">
        <img src="{{ asset('images/check.png') }}" alt="checked" class=" mb-6">
        <h1 class="text-3xl font-extrabold text-purple-600">Pembayaran Berhasil!</h1>
        <p class="mt-2 mb-5 text-gray-500">Terima kasih telah bertransaksi di SIMFONIA. <br> Cek status pesanan anda secara berkala pada halaman Cek Pemesanan</p>
        <a href="{{ route('frontend.bookings.check-purchase') }}" class="mt-6 px-6 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition">
            Cek Pemesanan
        </a>
    </div>

</main>


<x-footer />

@endsection