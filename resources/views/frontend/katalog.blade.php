@extends('frontend.layouts.app')
@section('title', 'Katalog')
@section('content')

<x-navbar />

<div class="mt-[57px] w-auto">
    <h1 class="text-center justify-start text-zinc-900 text-6xl font-medium font-['DM_Sans']">Explore all the products and services!</h1>
    <div class="mx-auto mt-12 w-[698px] h-14 relative bg-zinc-400 rounded-[100px] px-8 flex items-center gap-5">
        <img src="{{asset('images/search-normal.svg')}}" alt="" class="w-4 h-4">
        <h1 class="text-gray-100 text-base font-normal font-['Poppins']">Type anything to search...</h1>
    </div>
</div>

<section class="flex justify-center py-[120px]">
    <div class="grid grid-cols-4 gap-x-[23px] gap-y-[35px]">
        <div class="w-[282px] h-[300px] relative bg-white rounded-xl outline outline-1 outline-neutral-300">
            <img src="{{asset('images/produk.jpg')}}" alt="" class="left-0 top-0 rounded-tl-xl rounded-tr-xl border-neutral-300">
            <h1 class="px-5 mt-3 text-zinc-900 text-base font-bold font-['DM_Sans'] leading-relaxed">Laboratorium Komputer</h1>
            <div class="px-5 mt-[5px] text-justify text-gray-700 text-[10px] font-light font-['DM_Sans'] leading-none">
                Fasilitas pembelajaran dan penelitian yang dilengkapi dengan perangkat komputer berteknologi terkini
            </div>
            <div class="px-5 mt-6 flex justify-between">
                <button class="text-center items-center w-20 h-7 relative bg-[#6CC389] rounded-2xl text-white text-xs font-bold font-['Inter'] leading-tight">Reservasi</button>
                <button class="text-center items-center w-20 h-7 relative bg-[#379AE659] rounded-2xl text-zinc-700 text-xs font-bold font-['Inter'] leading-tight">Detail</button>
            </div>
        </div>
        <div class="w-[282px] h-[300px] relative bg-white rounded-xl outline outline-1 outline-neutral-300">
            <img src="{{asset('images/produk.jpg')}}" alt="" class="left-0 top-0 rounded-tl-xl rounded-tr-xl border-neutral-300">
            <h1 class="px-5 mt-3 text-zinc-900 text-base font-bold font-['DM_Sans'] leading-relaxed">Laboratorium Komputer</h1>
            <div class="px-5 mt-[5px] text-justify text-gray-700 text-[10px] font-light font-['DM_Sans'] leading-none">
                Fasilitas pembelajaran dan penelitian yang dilengkapi dengan perangkat komputer berteknologi terkini
            </div>
            <div class="px-5 mt-6 flex justify-between">
                <button class="text-center items-center w-20 h-7 relative bg-[#6CC389] rounded-2xl text-white text-xs font-bold font-['Inter'] leading-tight">Reservasi</button>
                <button class="text-center items-center w-20 h-7 relative bg-[#379AE659] rounded-2xl text-zinc-700 text-xs font-bold font-['Inter'] leading-tight">Detail</button>
            </div>
        </div>
        <div class="w-[282px] h-[300px] relative bg-white rounded-xl outline outline-1 outline-neutral-300">
            <img src="{{asset('images/produk.jpg')}}" alt="" class="left-0 top-0 rounded-tl-xl rounded-tr-xl border-neutral-300">
            <h1 class="px-5 mt-3 text-zinc-900 text-base font-bold font-['DM_Sans'] leading-relaxed">Laboratorium Komputer</h1>
            <div class="px-5 mt-[5px] text-justify text-gray-700 text-[10px] font-light font-['DM_Sans'] leading-none">
                Fasilitas pembelajaran dan penelitian yang dilengkapi dengan perangkat komputer berteknologi terkini
            </div>
            <div class="px-5 mt-6 flex justify-between">
                <button class="text-center items-center w-20 h-7 relative bg-[#6CC389] rounded-2xl text-white text-xs font-bold font-['Inter'] leading-tight">Reservasi</button>
                <button class="text-center items-center w-20 h-7 relative bg-[#379AE659] rounded-2xl text-zinc-700 text-xs font-bold font-['Inter'] leading-tight">Detail</button>
            </div>
        </div>
        <div class="w-[282px] h-[300px] relative bg-white rounded-xl outline outline-1 outline-neutral-300">
            <img src="{{asset('images/produk.jpg')}}" alt="" class="left-0 top-0 rounded-tl-xl rounded-tr-xl border-neutral-300">
            <h1 class="px-5 mt-3 text-zinc-900 text-base font-bold font-['DM_Sans'] leading-relaxed">Laboratorium Komputer</h1>
            <div class="px-5 mt-[5px] text-justify text-gray-700 text-[10px] font-light font-['DM_Sans'] leading-none">
                Fasilitas pembelajaran dan penelitian yang dilengkapi dengan perangkat komputer berteknologi terkini
            </div>
            <div class="px-5 mt-6 flex justify-between">
                <button class="text-center items-center w-20 h-7 relative bg-[#6CC389] rounded-2xl text-white text-xs font-bold font-['Inter'] leading-tight">Reservasi</button>
                <button class="text-center items-center w-20 h-7 relative bg-[#379AE659] rounded-2xl text-zinc-700 text-xs font-bold font-['Inter'] leading-tight">Detail</button>
            </div>
        </div>
        <div class="w-[282px] h-[300px] relative bg-white rounded-xl outline outline-1 outline-neutral-300">
            <img src="{{asset('images/produk.jpg')}}" alt="" class="left-0 top-0 rounded-tl-xl rounded-tr-xl border-neutral-300">
            <h1 class="px-5 mt-3 text-zinc-900 text-base font-bold font-['DM_Sans'] leading-relaxed">Laboratorium Komputer</h1>
            <div class="px-5 mt-[5px] text-justify text-gray-700 text-[10px] font-light font-['DM_Sans'] leading-none">
                Fasilitas pembelajaran dan penelitian yang dilengkapi dengan perangkat komputer berteknologi terkini
            </div>
            <div class="px-5 mt-6 flex justify-between">
                <button class="text-center items-center w-20 h-7 relative bg-[#6CC389] rounded-2xl text-white text-xs font-bold font-['Inter'] leading-tight">Reservasi</button>
                <button class="text-center items-center w-20 h-7 relative bg-[#379AE659] rounded-2xl text-zinc-700 text-xs font-bold font-['Inter'] leading-tight">Detail</button>
            </div>
        </div>
        <div class="w-[282px] h-[300px] relative bg-white rounded-xl outline outline-1 outline-neutral-300">
            <img src="{{asset('images/produk.jpg')}}" alt="" class="left-0 top-0 rounded-tl-xl rounded-tr-xl border-neutral-300">
            <h1 class="px-5 mt-3 text-zinc-900 text-base font-bold font-['DM_Sans'] leading-relaxed">Laboratorium Komputer</h1>
            <div class="px-5 mt-[5px] text-justify text-gray-700 text-[10px] font-light font-['DM_Sans'] leading-none">
                Fasilitas pembelajaran dan penelitian yang dilengkapi dengan perangkat komputer berteknologi terkini
            </div>
            <div class="px-5 mt-6 flex justify-between">
                <button class="text-center items-center w-20 h-7 relative bg-[#6CC389] rounded-2xl text-white text-xs font-bold font-['Inter'] leading-tight">Reservasi</button>
                <button class="text-center items-center w-20 h-7 relative bg-[#379AE659] rounded-2xl text-zinc-700 text-xs font-bold font-['Inter'] leading-tight">Detail</button>
            </div>
        </div>
        <div class="w-[282px] h-[300px] relative bg-white rounded-xl outline outline-1 outline-neutral-300">
            <img src="{{asset('images/produk.jpg')}}" alt="" class="left-0 top-0 rounded-tl-xl rounded-tr-xl border-neutral-300">
            <h1 class="px-5 mt-3 text-zinc-900 text-base font-bold font-['DM_Sans'] leading-relaxed">Laboratorium Komputer</h1>
            <div class="px-5 mt-[5px] text-justify text-gray-700 text-[10px] font-light font-['DM_Sans'] leading-none">
                Fasilitas pembelajaran dan penelitian yang dilengkapi dengan perangkat komputer berteknologi terkini
            </div>
            <div class="px-5 mt-6 flex justify-between">
                <button class="text-center items-center w-20 h-7 relative bg-[#6CC389] rounded-2xl text-white text-xs font-bold font-['Inter'] leading-tight">Reservasi</button>
                <button class="text-center items-center w-20 h-7 relative bg-[#379AE659] rounded-2xl text-zinc-700 text-xs font-bold font-['Inter'] leading-tight">Detail</button>
            </div>
        </div>
        <div class="w-[282px] h-[300px] relative bg-white rounded-xl outline outline-1 outline-neutral-300">
            <img src="{{asset('images/produk.jpg')}}" alt="" class="left-0 top-0 rounded-tl-xl rounded-tr-xl border-neutral-300">
            <h1 class="px-5 mt-3 text-zinc-900 text-base font-bold font-['DM_Sans'] leading-relaxed">Laboratorium Komputer</h1>
            <div class="px-5 mt-[5px] text-justify text-gray-700 text-[10px] font-light font-['DM_Sans'] leading-none">
                Fasilitas pembelajaran dan penelitian yang dilengkapi dengan perangkat komputer berteknologi terkini
            </div>
            <div class="px-5 mt-6 flex justify-between">
                <button class="text-center items-center w-20 h-7 relative bg-[#6CC389] rounded-2xl text-white text-xs font-bold font-['Inter'] leading-tight">Reservasi</button>
                <button class="text-center items-center w-20 h-7 relative bg-[#379AE659] rounded-2xl text-zinc-700 text-xs font-bold font-['Inter'] leading-tight">Detail</button>
            </div>
        </div>
        <div class="w-[282px] h-[300px] relative bg-white rounded-xl outline outline-1 outline-neutral-300">
            <img src="{{asset('images/produk.jpg')}}" alt="" class="left-0 top-0 rounded-tl-xl rounded-tr-xl border-neutral-300">
            <h1 class="px-5 mt-3 text-zinc-900 text-base font-bold font-['DM_Sans'] leading-relaxed">Laboratorium Komputer</h1>
            <div class="px-5 mt-[5px] text-justify text-gray-700 text-[10px] font-light font-['DM_Sans'] leading-none">
                Fasilitas pembelajaran dan penelitian yang dilengkapi dengan perangkat komputer berteknologi terkini
            </div>
            <div class="px-5 mt-6 flex justify-between">
                <button class="text-center items-center w-20 h-7 relative bg-[#6CC389] rounded-2xl text-white text-xs font-bold font-['Inter'] leading-tight">Reservasi</button>
                <button class="text-center items-center w-20 h-7 relative bg-[#379AE659] rounded-2xl text-zinc-700 text-xs font-bold font-['Inter'] leading-tight">Detail</button>
            </div>
        </div>
        <div class="w-[282px] h-[300px] relative bg-white rounded-xl outline outline-1 outline-neutral-300">
            <img src="{{asset('images/produk.jpg')}}" alt="" class="left-0 top-0 rounded-tl-xl rounded-tr-xl border-neutral-300">
            <h1 class="px-5 mt-3 text-zinc-900 text-base font-bold font-['DM_Sans'] leading-relaxed">Laboratorium Komputer</h1>
            <div class="px-5 mt-[5px] text-justify text-gray-700 text-[10px] font-light font-['DM_Sans'] leading-none">
                Fasilitas pembelajaran dan penelitian yang dilengkapi dengan perangkat komputer berteknologi terkini
            </div>
            <div class="px-5 mt-6 flex justify-between">
                <button class="text-center items-center w-20 h-7 relative bg-[#6CC389] rounded-2xl text-white text-xs font-bold font-['Inter'] leading-tight">Reservasi</button>
                <button class="text-center items-center w-20 h-7 relative bg-[#379AE659] rounded-2xl text-zinc-700 text-xs font-bold font-['Inter'] leading-tight">Detail</button>
            </div>
        </div>
        <div class="w-[282px] h-[300px] relative bg-white rounded-xl outline outline-1 outline-neutral-300">
            <img src="{{asset('images/produk.jpg')}}" alt="" class="left-0 top-0 rounded-tl-xl rounded-tr-xl border-neutral-300">
            <h1 class="px-5 mt-3 text-zinc-900 text-base font-bold font-['DM_Sans'] leading-relaxed">Laboratorium Komputer</h1>
            <div class="px-5 mt-[5px] text-justify text-gray-700 text-[10px] font-light font-['DM_Sans'] leading-none">
                Fasilitas pembelajaran dan penelitian yang dilengkapi dengan perangkat komputer berteknologi terkini
            </div>
            <div class="px-5 mt-6 flex justify-between">
                <button class="text-center items-center w-20 h-7 relative bg-[#6CC389] rounded-2xl text-white text-xs font-bold font-['Inter'] leading-tight">Reservasi</button>
                <button class="text-center items-center w-20 h-7 relative bg-[#379AE659] rounded-2xl text-zinc-700 text-xs font-bold font-['Inter'] leading-tight">Detail</button>
            </div>
        </div>
        <div class="w-[282px] h-[300px] relative bg-white rounded-xl outline outline-1 outline-neutral-300">
            <img src="{{asset('images/produk.jpg')}}" alt="" class="left-0 top-0 rounded-tl-xl rounded-tr-xl border-neutral-300">
            <h1 class="px-5 mt-3 text-zinc-900 text-base font-bold font-['DM_Sans'] leading-relaxed">Laboratorium Komputer</h1>
            <div class="px-5 mt-[5px] text-justify text-gray-700 text-[10px] font-light font-['DM_Sans'] leading-none">
                Fasilitas pembelajaran dan penelitian yang dilengkapi dengan perangkat komputer berteknologi terkini
            </div>
            <div class="px-5 mt-6 flex justify-between">
                <button class="text-center items-center w-20 h-7 relative bg-[#6CC389] rounded-2xl text-white text-xs font-bold font-['Inter'] leading-tight">Reservasi</button>
                <button class="text-center items-center w-20 h-7 relative bg-[#379AE659] rounded-2xl text-zinc-700 text-xs font-bold font-['Inter'] leading-tight">Detail</button>
            </div>
        </div>
    </div>
</section>

<x-footer />

@endsection