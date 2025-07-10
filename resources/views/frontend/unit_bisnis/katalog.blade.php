@extends('frontend.layouts.app')
@section('title', 'Katalog SIMFONIA')
@section('content')

<x-navbar />

<div class="mt-[57px] w-auto">
    <h1 class="text-center justify-start text-zinc-900 text-6xl font-medium font-['DM_Sans']">Explore All {{ $unit_bisnis->nama_unit }}!</h1>
    <form method="GET" class="flex space-x-4 justify-center mt-6 mb-8">
        <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" class="p-2 border rounded">

        <!-- Sort -->
        <select name="sort" class="border border-gray-300 rounded px-3 py-2">
            <option value="">Sort By</option>
            <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
            <option value="harga_asc" {{ request('sort') == 'harga_asc' ? 'selected' : '' }}>Harga Terendah</option>
            <option value="harga_desc" {{ request('sort') == 'harga_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
        </select>

        <!-- Tombol Submit -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Terapkan</button>

        <!--  Tombol Reset Filter -->
        @if(request()->has('unit_bisnis_id') || request()->has('sort') || request()->has('search'))
        <a href="{{ route('frontend.unit_bisnis.katalog', ['unit_bisnis_id' => $unit_bisnis_id]) }}"
            class="flex items-center text-red-600 hover:underline text-sm px-3 py-2">
            ❌ Reset Filter
        </a>
        @endif
    </form>

</div>

<section class="flex justify-center py-[100px]">
    <div class="grid grid-cols-4 gap-x-[23px] gap-y-[35px]">
        @forelse ($products as $product)
        <div class="w-[282px] pb-5 relative bg-white rounded-xl outline outline-1 outline-neutral-300">
            <img src="{{ $product->gambar ? asset('storage/' . $product->gambar) : asset('images/default.jpg') }}"
                alt="{{ $product->nama }}" class="w-full h-32 object-cover rounded-tl-xl rounded-tr-xl">
            <h1 class="px-5 mt-3 text-zinc-900 text-base font-bold">{{ $product->nama }}</h1>
            <div class="px-5 mt-[5px] text-justify text-gray-700 text-[10px] leading-none">
                {{ \Illuminate\Support\Str::limit(strip_tags($product->deskripsi), 100) }}
            </div>
            <div class="px-5 mt-6 flex justify-between">
                <a href="{{ $product->unit_bisnis_id == 1 || $product->unit_bisnis_id == 2 
            ? route('frontend.bookings.checkout.booking', ['product_id' => $product->id]) 
            : route('frontend.bookings.checkout.transaction', ['product_id' => $product->id]) }}"
                    class="w-20 h-7 py-1.5 bg-[#6CC389] rounded-2xl text-white text-xs font-bold text-center">
                    Reservasi
                </a>
                <a href="{{ route('frontend.bookings.details', ['product_id' => $product->id]) }}"
                    class="w-20 h-7 py-1.5 bg-[#379AE659] rounded-2xl text-zinc-700 text-xs font-bold text-center">
                    Detail
                </a>
            </div>
        </div>
        @empty
        <p class="col-span-4 text-center text-gray-500">Tidak ada produk ditemukan.</p>
        @endforelse
    </div>


    <div class="mt-6">
        {{ $products->withQueryString()->links() }}
    </div>
</section>

<x-footer />

@endsection