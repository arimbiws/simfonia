@extends('frontend.layouts.app')
@section('title', 'Profile')
@section('content')

<x-navbar />

<!-- Main Content -->
<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Profile Header -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">My Profile</h1>
        
        <div class="flex items-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-red-500 rounded-full flex items-center justify-center mr-4">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='40' r='15' fill='white'/%3E%3Cpath d='M25 70 Q25 55 50 55 Q75 55 75 70 L75 85 L25 85 Z' fill='white'/%3E%3C/svg%3E" alt="Profile" class="w-10 h-10">
            </div>
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Scarlett Johansson</h2>
            </div>
        </div>

        <!-- Profile Form -->
        <form class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" id="name" name="name" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-500 cursor-not-allowed"
                    placeholder="Input text" readonly>
            </div>

            <div>
                <label for="id" class="block text-sm font-medium text-gray-700 mb-2">ID / NIM</label>
                <input type="text" id="id" name="id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-500 cursor-not-allowed"
                    placeholder="Input text" readonly>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input type="email" id="email" name="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-500 cursor-not-allowed"
                    placeholder="Input text" readonly>
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                <input type="tel" id="phone" name="phone"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-500 cursor-not-allowed"
                    placeholder="Input text" readonly>
            </div>

            <div>
                <label for="country" class="block text-sm font-medium text-gray-700 mb-2">Country</label>
                <input type="text" id="country" name="country"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-500 cursor-not-allowed"
                    placeholder="Input text" readonly>
            </div>

            <div>
                <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City</label>
                <input type="text" id="city" name="city"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-500 cursor-not-allowed"
                    placeholder="Input text" readonly>
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Home Address</label>
                <textarea id="address" name="address" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-500 cursor-not-allowed resize-none"
                        placeholder="Input text" readonly></textarea>
            </div>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-4 gap-8 mb-8">
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded"></div>
                    <span class="font-bold text-xl">FMIPA</span>
                </div>
            </div>
            <div>
                <h4 class="font-semibold mb-4">Product</h4>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><a href="#" class="hover:text-gray-900">Overview</a></li>
                    <li><a href="#" class="hover:text-gray-900">Pricing</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4">Resources</h4>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><a href="#" class="hover:text-gray-900">Blog</a></li>
                    <li><a href="#" class="hover:text-gray-900">User guide</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4">Institute</h4>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><a href="#" class="hover:text-gray-900">About us</a></li>
                    <li><a href="#" class="hover:text-gray-900">Join us</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t pt-8 flex justify-between items-center">
            <div class="text-sm text-gray-600">© 2023 Antariksa. English • Privacy • Terms • Sitemap</div>
            <div class="flex space-x-4">
                <a href="#" class="text-blue-500"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-blue-400"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-blue-700"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="text-red-500"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>

@endsection