@extends('frontend.layouts.app')
@section('title', 'Success Checkout')
@section('content')

<x-navbar />


<!-- Konten Utama -->
<main class="flex-grow">
    <!-- Progress Step -->
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="flex justify-center items-center mb-8">
            <div class="flex space-x-4 items-center">
                <div class="text-gray-400">Booking</div>
                <div class="w-8 h-1 bg-gray-300"></div>
                <div class="text-gray-400">Validation Process</div>
                <div class="w-8 h-1 bg-gray-300"></div>
                <div class="text-gray-400">Payment</div>
                <div class="w-8 h-1 bg-gray-300"></div>
                <div class="text-gray-400">Payment Status</div>
                <div class="w-8 h-1 bg-blue-600"></div>
                <div class="text-blue-600 font-semibold">Product Status</div>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    <div class="flex flex-col items-center text-center px-4">
        <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" alt="success" class="w-24 mb-6">
        <h1 class="text-3xl font-extrabold text-purple-600">Success <span class="text-pink-500">Checkout</span></h1>
        <p class="mt-2 text-gray-500">Thank you for supporting our great creators</p>
        <button class="mt-6 px-6 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition">
            Check My Purchase
        </button>
    </div>

</main>


<x-footer />

@endsection