@extends('frontend.layouts.app')
@section('title', 'Transaksi Produk')
@section('content')

<x-navbar />

<!-- Progress Step -->
<div class="max-w-4xl p-5 mx-auto px-4 my-[50px]">
    <div class="flex justify-center items-center mb-8">
        <div class="flex space-x-4 items-center">
            <div class="text-blue-600 font-semibold">Booking</div>
            <div class="w-8 h-1 bg-blue-600"></div>
            <div class="text-gray-400">Process Payment</div>
            <div class="w-8 h-1 bg-gray-300"></div>
            <div class="text-gray-400">Payment Status</div>
        </div>
    </div>

    <h1 class="text-3xl font-bold mb-6 mx-auto">Form Transaksi Produk</h1>

    @if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="ps-5 py-5 bg-red-500 text-white font-bold">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('frontend.bookings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <div class="mb-4">
            <label class="block font-semibold">Produk:</label>
            <input class="ps-5 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $product->nama }}">
        </div>

        @php
        $tipe = Auth::user()->tipe_pembeli;
        @endphp

        @if ($tipe === 'eksternal')

        <!-- Harga Penyewaan -->
        <div class="flex flex-col mb-3">
            <label class="block mb-1 font-medium text-gray-900">Biaya Penyewaan</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                    </svg>
                </div>
                <input type="text" readonly value="Rp {{ number_format($product->harga, 0, ',', '.') }}"
                    class="ps-12 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
            </div>
        </div>
        @endif

        <!-- Jumlah -->
        <div class="mb-4">
            <label for="jumlah_item" class="block mb-1 font-medium text-gray-900">Jumlah</label>
            <input type="number" name="jumlah_item" min="1" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
        </div>


        <!-- Nama Kegiatan -->
        <div class="flex flex-col mb-3">
            <label class="block mb-1 font-medium text-gray-900">Nama Kegiatan</label>
            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Input text" name="nama_kegiatan" required>
        </div>

        <!-- Instansi dan NIM -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col mb-3">
                <label class="block mb-1 font-medium text-gray-900">Institution</label>
                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Input text" name="instansi" required>
            </div>
            <div class="flex flex-col mb-3">
                <label class="block mb-1 font-medium text-gray-900" for="nik_nim">NIM/ID Number</label>
                <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="nik_nim" value="{{ Auth::user()->nik_nim }}" readonly placeholder="Input text" required>
            </div>
        </div>

        <!-- Nama Lengkap -->
        <div class="flex flex-col mb-3">
            <label class="block mb-1 font-medium text-gray-900">Full Name</label>
            <input type="text" name="nama_lengkap" value="{{ Auth::user()->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Input text" required>
        </div>

        <!-- Email dan Phone -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col mb-3">
                <label for="email" class="block mb-1 font-medium text-gray-900 ">Email</label>
                <input type="email" name="email" value="{{ Auth::user()->email }}" readonly id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan email" required />
            </div>
            <div class="flex flex-col mb-3">
                <label class="block mb-1 font-medium text-gray-900">Phone Number</label>
                <input type="text" name="no_hp" value="{{ Auth::user()->no_hp }}" readonly class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Input text" required>
            </div>
        </div>

        <!-- Alamat -->
        <div class="flex flex-col mb-3">
            <label class="block mb-1 font-medium text-gray-900">Alamat</label>
            <input type="text" name="alamat" value="{{ Auth::user()->alamat }}" readonly class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Input text">
        </div>

        <div class="flex text-center justify-between ">
            <a href="{{ route('frontend.unit_bisnis.all-katalog') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white w-[100px] mt-[50px] px-6 py-3 rounded-lg">
                Cancel
            </a>
            <!-- Submit -->
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white w-[350px] mt-[50px] px-6 py-3 rounded-lg">
                Lanjutkan Pembayaran
            </button>
        </div>
    </form>
</div>

<x-footer />
@endsection