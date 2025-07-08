@extends('frontend.layouts.app')
@section('title', 'Payment Page')
@section('content')

<x-navbar />


<!-- Progress Step -->
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="flex justify-center items-center mb-8">
        <div class="flex space-x-4 items-center">
            <div class="text-gray-400">Booking</div>
            <div class="w-8 h-1 bg-gray-300"></div>
            <div class="text-gray-400">Validation Process</div>
            <div class="w-8 h-1 bg-gray-300"></div>
            <div class="text-blue-600 font-semibold">Payment</div>
            <div class="w-8 h-1 bg-blue-600"></div>
            <div class="text-gray-400">Payment Status</div>
            <div class="w-8 h-1 bg-gray-300"></div>
            <div class="text-gray-400">Product Status</div>
        </div>
    </div>

    <h1 class="text-2xl font-bold mb-6">Payment</h1>

    <form class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Kolom 1: Nama Bank -->
            <div class="flex flex-col space-y-2">
                <label class="font-medium text-gray-700">Nama Bank</label>
                <select class="border border-gray-300 rounded px-4 py-2 w-full text-gray-700 bg-white">
                    <option value="" disabled selected hidden>Pilih Bank</option>
                    <option value="bca">Bank BCA</option>
                    <option value="bni">Bank BNI</option>
                    <option value="bri">Bank BRI</option>
                </select>
            </div>

            <!-- Kolom 2: Nomor Rekening -->
            <div class="flex flex-col space-y-2">
                <label class="font-medium text-gray-700">Nama Akun</label>
                <input
                    type="text"
                    class="w-full px-4 py-2 border border-gray-300 rounded"
                    placeholder="Input Nama Akun">
            </div>
        </div>

        <div>
            <label class="font-medium text-gray-700">Nomor Rekening</label>
            <div class="flex items-center mt-1">
                <input type="text"
                    class="w-full px-4 py-2 border border-gray-300 rounded"
                    placeholder="Input Nomor Rekening">
            </div>
        </div>

        <!--Upload Bukti Pembayaran-->
        <div class="flex flex-col space-y-2">
            <label class="font-medium text-gray-700">Bukti Pembayaran</label>
            <div class="relative inline-block">
                <button type="button" class="border-2 border-dashed border-gray-400 px-6 py-3 rounded-lg items-center justify-center text-gray-500 w-full">
                    <span id="fileButtonText" class="truncate">Choose File</span>
                    <i class="fas fa-paperclip ml-2"></i>
                </button>
                <input type="file" id="fileInput" class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer" />
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const fileInput = document.getElementById('fileInput');
                const fileButtonText = document.getElementById('fileButtonText');

                fileInput.addEventListener('change', function() {
                    if (fileInput.files.length > 0) {
                        fileButtonText.textContent = fileInput.files[0].name;
                    } else {
                        fileButtonText.textContent = 'Choose File';
                    }
                });
            });
        </script>

        <!--Submit-->
        <button
            onclick="window.location.href='success.html';"
            type="button"
            class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Submit</button>
    </form>
</div>


<x-footer />

@endsection