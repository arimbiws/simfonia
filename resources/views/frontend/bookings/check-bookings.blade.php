@extends('frontend.layouts.app')
@section('title', 'Check Bookings')
@section('content')

<x-navbar />

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Page Title -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">Check Your Purchase's Progress!</h1>

        <!-- Search Bar -->
        <div class="max-w-lg mx-auto">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" placeholder="Type Booking ID / NIK / ID Number"
                    class="w-full pl-10 pr-4 py-3 bg-gray-600 text-white placeholder-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
    </div>

    <!-- Recent Orders Section -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-900">Recent Orders</h2>
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
            <!-- Order 1 -->
            <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                <div class="grid grid-cols-5 gap-4 items-center">
                    <div class="text-gray-900 font-medium">Consequat</div>
                    <div class="text-gray-600 text-sm">02/08/2023</div>
                    <div class="text-gray-900 font-medium">$47.18</div>
                    <div class="flex items-center text-sm">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span class="text-gray-600">Transferred</span>
                    </div>
                    <div>
                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Completed
                        </span>
                    </div>
                </div>
            </div>

            <!-- Order 2 -->
            <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                <div class="grid grid-cols-5 gap-4 items-center">
                    <div class="text-gray-900 font-medium">Reprehende</div>
                    <div class="text-gray-600 text-sm">01/08/2023</div>
                    <div class="text-gray-900 font-medium">$865.86</div>
                    <div class="flex items-center text-sm">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span class="text-gray-600">Transferred</span>
                    </div>
                    <div>
                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Completed
                        </span>
                    </div>
                </div>
            </div>

            <!-- Order 3 -->
            <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                <div class="grid grid-cols-5 gap-4 items-center">
                    <div class="text-gray-900 font-medium">Labore</div>
                    <div class="text-gray-600 text-sm">15/12/2023</div>
                    <div class="text-gray-900 font-medium">$322.33</div>
                    <div class="flex items-center text-sm">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span class="text-gray-600">Transferred</span>
                    </div>
                    <div>
                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Completed
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<x-footer />

@endsection