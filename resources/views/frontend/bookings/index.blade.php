@extends('frontend.layouts.app')
@section('title', 'Detail Produk')
@section('content')

<x-navbar />

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content -->
        <div class="flex-1">
            <!-- Main Image -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
                <div class="relative">
                    <img src="{{asset('images/produk.jpg')}}"
                        alt="Auditorium" class="w-full h-80 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                            Ruangan/Gedung
                        </span>
                    </div>
                </div>
            </div>

            <!-- Title and Booking Button -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-4 sm:mb-0">
                    Laboratorium Komputer

                </h1>
                <a href="{{route('frontend.bookings.checkout')}}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-medium transition-colors flex items-center">
                    Reservasi Ruangan <i class="fas fa-arrow-right ml-2"></i>
                </a>

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
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Contact Info</h2>
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-blue-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="font-medium text-gray-900">Wanda Lika</div>
                        <div class="text-sm text-gray-500">Partner</div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center hover:bg-blue-200 transition-colors">
                            <i class="fas fa-copy text-blue-600"></i>
                        </button>
                        <button class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center hover:bg-green-200 transition-colors">
                            <i class="fas fa-phone text-green-600"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Overview -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Overview</h2>
                <p class="text-gray-600 leading-relaxed">
                    Emma Grace is a passionate Listing Agent, known for her in-depth consulting skills and understanding of the real estate market. She is dedicated to helping clients find and sell homes, providing optimal solutions to achieve their goals. Emma Grace is a passionate Listing Agent, known for her in-depth consulting skills and understanding of the real estate market. She is dedicated to helping clients find and sell homes, providing optimal solutions to achieve their goals Emma Grace is a passionate Listing Agent, known for her in-depth consulting skills and understanding of the real estate market. She is dedicated to helping clients find and sell homes, providing optimal solutions to achieve their goals. Emma Grace is a passionate Listing Agent, known for her in-depth consulting skills and understanding of the real estate market. She is dedicated to helping clients find and sell homes, providing optimal solutions to achieve their goals.
                </p>
            </div>

            <!-- Location on Maps -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Location on Maps</h2>
                <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-gray-300 to-gray-400 opacity-50"></div>
                    <div class="relative z-10 bg-blue-500 w-12 h-12 rounded-full flex items-center justify-center shadow-lg">
                        <i class="fas fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="absolute inset-0 opacity-20">
                        <svg class="w-full h-full" viewBox="0 0 400 200">
                            <path d="M50,150 Q100,100 150,120 T250,100 T350,130" stroke="#9CA3AF" stroke-width="2" fill="none" />
                            <path d="M20,180 Q80,160 140,170 T240,160 T340,175" stroke="#9CA3AF" stroke-width="2" fill="none" />
                            <path d="M70,50 Q120,30 170,40 T270,35 T370,45" stroke="#9CA3AF" stroke-width="2" fill="none" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:w-80 space-y-4">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=300&h=200&fit=crop"
                    alt="Office Space" class="w-full h-32 object-cover">
            </div>
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=300&h=200&fit=crop"
                    alt="Sound System" class="w-full h-32 object-cover">
            </div>
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="https://images.unsplash.com/photo-1571624436279-b272aff752b5?w=300&h=200&fit=crop"
                    alt="Interior Design" class="w-full h-32 object-cover">
            </div>
        </div>
    </div>
</div>


<x-footer />

@endsection