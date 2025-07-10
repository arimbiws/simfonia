@extends('frontend.layouts.app')
@section('title', 'Detail Produk')
@section('content')

<x-navbar />

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-10">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content -->
        <div class="flex-1">
            <!-- Main Image -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
                <div class="relative">
                    <img src="{{ $product->gambar ? asset('storage/' . $product->gambar) : asset('images/default.jpg') }}"
                        alt="Auditorium" class="w-full h-80 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $product->unit->nama_unit }} </span>
                    </div>
                </div>
            </div>

            <!-- Title and Booking Button -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">
                        {{ $product ? $product->nama : 'Detail Produk' }}
                    </h1>
                    <h3 class="text-2xl font-bold text-gray-700">Rp{{ number_format($product ? $product->harga : 'Detail Produk') }}
                    </h3>
                </div>
                <div>

                    @php
                    $isBookingUnit = in_array($product->unit_bisnis_id, [1, 2]);
                    $checkoutRoute = $isBookingUnit ? 'frontend.bookings.checkout-booking' : 'frontend.bookings.checkout-transaction';
                    @endphp
                    <a href="{{ route($checkoutRoute, ['product_id' => $product->id]) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-medium transition-colors flex items-center">
                        Reservasi {{ $product->nama }} <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Home Highlights -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Home Highlights</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-car text-gray-400"></i>
                        <div>
                            <div class="font-medium text-gray-900">Parking</div>
                            <div class="text-sm text-gray-500">No info</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-snowflake text-gray-400"></i>
                        <div>
                            <div class="font-medium text-gray-900">A/C</div>
                            <div class="text-sm text-gray-500">No info</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-wifi text-gray-400"></i>
                        <div>
                            <div class="font-medium text-gray-900">Internet</div>
                            <div class="text-sm text-gray-500">No info</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-tree text-gray-400"></i>
                        <div>
                            <div class="font-medium text-gray-900">Outdoor</div>
                            <div class="text-sm text-gray-500">No info</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-shield-alt text-gray-400"></i>
                        <div>
                            <div class="font-medium text-gray-900">HVAC</div>
                            <div class="text-sm text-gray-500">No info</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-calendar text-gray-400"></i>
                        <div>
                            <div class="font-medium text-gray-900">Built in</div>
                            <div class="text-sm text-gray-500">2024</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8 px-10">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Contact Info</h2>
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-blue-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="font-medium text-gray-900">{{ $product->penjual->name }}</div>
                        <div class="text-sm text-gray-500">Seller</div>
                    </div>
                    <div class="flex">
                        <button class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center hover:bg-green-200 transition-colors">
                            <i class="fas fa-phone text-green-600"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Overview -->
            <div class="bg-white rounded-lg shadow-sm p-10 mb-8 ">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Overview</h2>
                <p class="text-gray-600 leading-relaxed">
                    {!! $product ? $product->deskripsi : 'Deskripsi belum tersedia.' !!}
                </p>
            </div>

            <!-- Location on Maps -->
            <div class="bg-white rounded-lg shadow-sm p-10">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Location on Maps</h2>
                <div class="rounded-lg overflow-hidden shadow-md">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d492.8574019091072!2d115.16986425693833!3d-8.799294618996862!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd244bc3acab8d9%3A0x7fba454d24527b74!2sFaculty%20of%20Math%20and%20Natural%20Sciences!5e0!3m2!1sen!2sid!4v1751782858813!5m2!1sen!2sid"
                        width="100%"
                        height="400"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-96">
                    </iframe>
                </div>
            </div>
        </div>

    </div>
</div>


<x-footer />

@endsection