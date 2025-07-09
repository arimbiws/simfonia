@extends('frontend.layouts.app')
@section('title', 'All Products ')
@section('content')

<x-navbar />

<div class="mt-[57px] w-auto">
    <h1 class="text-center justify-start text-zinc-900 text-6xl font-medium font-['DM_Sans']">Explore all the products and services!</h1>
    <form class="max-w-xl mx-auto mt-5">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-gray-500 focus:border-gray-500" placeholder="Search Products" required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
        </div>
    </form>

</div>

<section class="flex justify-center py-[60px]">
    <div class="grid grid-cols-4 gap-x-[23px] gap-y-[35px]">
        @foreach ($products as $product)
        <div class="w-[282px] h-[300px] bg-white rounded-xl outline outline-1 outline-neutral-300">
            <img src="{{ $product->gambar ? asset('storage/' . $product->gambar) : asset('images/default.jpg') }}"
                alt="{{ $product->nama }}" class="w-full h-32 object-cover rounded-tl-xl rounded-tr-xl">
            <h1 class="px-5 mt-3 text-zinc-900 text-base font-bold">{{ $product->nama }}</h1>
            <div class="px-5 mt-[5px] text-justify text-gray-700 text-[10px] leading-none">
                {{ \Illuminate\Support\Str::limit(strip_tags($product->deskripsi), 60) }}
            </div>
            <div class="px-5 mt-6 flex justify-between">
                <a href="{{ route('frontend.bookings.checkout', ['product_id' => $product->id]) }}"
                    class="w-20 h-7 py-2 bg-[#6CC389] rounded-2xl text-white text-xs font-bold text-center">Reservasi</a>
                <a href="{{ route('frontend.bookings.details', ['product_id' => $product->id]) }}"
                    class="w-20 h-7 py-2 bg-[#379AE659] rounded-2xl text-zinc-700 text-xs font-bold text-center">Detail</a>
            </div>
        </div>
        @endforeach
    </div>
</section>

<x-footer />

@endsection