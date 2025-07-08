@extends('frontend.layouts.app')
@section('title', 'Home Page')
@section('content')

<x-navbar />

<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-green-800 to-yellow-600 text-white">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="relative container mx-auto px-4 py-20 flex items-center">
        <div class="w-1/2">
            <div class="text-sm mb-2">Kelompok 3 > Kelas D</div>
            <h1 class="text-4xl font-bold mb-4">Unit Bisnis FMIPA Universitas Udayana</h1>
            <div class="text-sm mb-4">Juli 8, 2025 • <span class="bg-green-500 px-2 py-1 rounded text-xs">OPEN</span></div>
        </div>
        <div class="w-1/2">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&h=400&fit=crop" alt="Students working" class="rounded-lg shadow-lg" />
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-4 gap-6">
            <div class="bg-purple-100 p-6 rounded-lg text-center">
                <div class="text-2xl font-bold text-purple-600">6,452+</div>
                <div class="text-sm text-gray-600">Total Pengguna Sistem</div>
            </div>
            <div class="bg-blue-100 p-6 rounded-lg text-center">
                <div class="text-2xl font-bold text-blue-600">502+</div>
                <div class="text-sm text-gray-600">Total Unit Bisnis</div>
            </div>
            <div class="bg-green-100 p-6 rounded-lg text-center">
                <div class="text-2xl font-bold text-green-600">56,201+</div>
                <div class="text-sm text-gray-600">Total Produk/Layanan</div>
            </div>
            <div class="bg-orange-100 p-6 rounded-lg text-center">
                <div class="text-2xl font-bold text-orange-600">6,507+</div>
                <div class="text-sm text-gray-600">Total Transaksi</div>
            </div>
        </div>
    </div>
</section>

<!-- Unit Bisnis Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-center mb-12 text-black text-5xl font-normal font-['DM_Sans']">Unit Bisnis</h2>
        {{-- Row 1 --}}
        <div class="flex justify-center">
            <div class="grid grid-cols-3 gap-x-7">
                <div class="w-96 h-96 bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{asset('images/ruangan.jpg')}}" alt="Meeting Room" class="w-full h-48 object-cover"/> 
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">RUANGAN/GEDUNG</h3>
                        <p class="text-gray-600 text-sm mb-4">Sewa ruangan dan gedung untuk berbagai keperluan acara dan pertemuan.</p>
                        <button class="ml-0 bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">Details</button>
                    </div>
                </div>

                <div class="w-96 h-96 bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{asset('images/inventaris.jpg')}}" alt="Computer Lab" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">INVENTARIS</h3>
                        <p class="text-gray-600 text-sm mb-4">Penyewaan inventaris dan peralatan untuk mendukung kegiatan akademik.</p>
                        <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">Details</button>
                    </div>
                </div>

                <div class="w-96 h-96 bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{asset('images/atk.jpg')}}" alt="Printer" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">ALAT TULIS & PRINTING</h3>
                        <p class="text-gray-600 text-sm mb-4">Layanan printing dan penyediaan alat tulis untuk mahasiswa dan dosen.</p>
                        <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">Details</button>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Row 2 --}}
        <div class="mt-11 flex justify-center">
            <div class="grid grid-cols-2 gap-x-7">
                <div class="w-96 h-96 bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{asset('images/software.jpg')}}" alt="Software Development" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">PENGEMBANGAN SOFTWARE</h3>
                        <p class="text-gray-600 text-sm mb-4">Jasa pengembangan software dan aplikasi untuk berbagai kebutuhan.</p>
                        <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">Details</button>
                    </div>
                </div>

                <div class="w-96 h-96 bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{asset('images/umkm.jpg')}}" alt="Campus Store" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">UMKM KAMPUS</h3>
                        <p class="text-gray-600 text-sm mb-4">Mendukung UMKM kampus dengan berbagai produk dan layanan.</p>
                        <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rekomendasi Section -->
<div class="max-w-7xl mx-auto flex justify-between items-center px-4 mb-8">
    <h2 class="text-2xl font-semibold text-zinc-900">Rekomendasi produk/layanan</h2>
    <a href="#" class="bg-gray-900 text-white text-sm px-4 py-2 rounded hover:bg-gray-800">Lihat Semua Katalog</a>
</div>
<div class="flex justify-center">
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
</div>

<section class="py-16 bg-white">

<!-- Calendar Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-8">Kalender Ketersediaan Produk/Layanan</h2>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold">July 2023</h3>
                <div class="flex space-x-2">
                    <button class="p-2 hover:bg-gray-100 rounded"><i class="fas fa-chevron-left"></i></button>
                    <button class="p-2 hover:bg-gray-100 rounded"><i class="fas fa-chevron-right"></i></button>
                    <button class="bg-gray-800 text-white px-4 py-2 rounded">Today</button>
                </div>
            </div>

            <!-- Calendar Grid -->
            <div class="grid grid-cols-7 gap-1 text-center text-sm">
                <!-- Header -->
                <div class="p-2 font-semibold text-gray-600">SUN</div>
                <div class="p-2 font-semibold text-gray-600">MON</div>
                <div class="p-2 font-semibold text-gray-600">TUE</div>
                <div class="p-2 font-semibold text-gray-600">WED</div>
                <div class="p-2 font-semibold text-gray-600">THU</div>
                <div class="p-2 font-semibold text-gray-600">FRI</div>
                <div class="p-2 font-semibold text-gray-600">SAT</div>

                <!-- Calendar Days -->
                <div class="p-2 h-20 border border-gray-100"></div>
                <div class="p-2 h-20 border border-gray-100"></div>
                <div class="p-2 h-20 border border-gray-100"></div>
                <div class="p-2 h-20 border border-gray-100"></div>
                <div class="p-2 h-20 border border-gray-100"></div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">1</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">2</div>
                </div>

                <!-- Week 2 -->
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">3</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">4</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">5</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">6</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">7</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">8</div>
                    <div class="bg-gray-600 text-white text-xs px-1 py-0.5 rounded mt-1">Rapat Dosen</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">9</div>
                </div>

                <!-- Week 3 -->
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">10</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">11</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">12</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">13</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">14</div>
                    <div class="bg-gray-600 text-white text-xs px-1 py-0.5 rounded mt-1">Seminar</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">15</div>
                    <div class="bg-gray-600 text-white text-xs px-1 py-0.5 rounded mt-1">Workshop</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">16</div>
                </div>

                <!-- Week 4 -->
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">17</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">18</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">19</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">20</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">21</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">22</div>
                    <div class="bg-gray-600 text-white text-xs px-1 py-0.5 rounded mt-1">Ujian Tengah</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">23</div>
                </div>

                <!-- Week 5 -->
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">24</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">25</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">26</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">27</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">28</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">29</div>
                    <div class="bg-gray-600 text-white text-xs px-1 py-0.5 rounded mt-1">Presentasi</div>
                </div>
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">30</div>
                </div>

                <!-- Week 6 -->
                <div class="p-2 h-20 border border-gray-100">
                    <div class="text-xs">31</div>
                </div>
                <div class="p-2 h-20 border border-gray-100"></div>
                <div class="p-2 h-20 border border-gray-100"></div>
                <div class="p-2 h-20 border border-gray-100"></div>
                <div class="p-2 h-20 border border-gray-100"></div>
                <div class="p-2 h-20 border border-gray-100"></div>
                <div class="p-2 h-20 border border-gray-100"></div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-gray-700 to-orange-500">
    <div class="container mx-auto px-4 flex items-center">
        <div class="w-1/2 text-white">
            <h2 class="text-3xl font-bold mb-4">Want to join us?</h2>
            <p class="mb-6">Bergabunglah dengan Unit Bisnis FMIPA Universitas Udayana dan nikmati berbagai layanan terbaik untuk mendukung kegiatan akademik Anda.</p>
            <button class="bg-white text-gray-800 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">Contact us</button>
        </div>
        <div class="w-1/2">
            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=500&h=400&fit=crop" alt="Student" class="rounded-lg" />
        </div>
    </div>
</section>

<x-footer />

@endsection