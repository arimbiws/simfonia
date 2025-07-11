@extends('frontend.layouts.app')
@section('title', 'Home Page')
@section('content')

<x-navbar />

<!-- Hero Section -->
<section class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">We invest in the world’s potential</h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">An integrated platform to manage business units, support student services, and promote entrepreneurial growth within FMIPA.</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <a href="{{ route('frontend.unit_bisnis.all-katalog') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Lihat Produk
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
            <button onclick="confirmJoinAsSeller()" href="{{ route('register-penjual') }}" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                Join as Seller
            </button>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-4 gap-6">
            <div class="bg-purple-100 p-6 rounded-lg text-center">
                <div class="text-2xl font-bold text-purple-600">{{ $totalUsers }}</div>
                <div class="text-sm text-gray-600">Total Pengguna Sistem</div>
            </div>
            <div class="bg-blue-100 p-6 rounded-lg text-center">
                <div class="text-2xl font-bold text-blue-600">{{ $totalUnits }}</div>
                <div class="text-sm text-gray-600">Total Unit Bisnis</div>
            </div>
            <div class="bg-green-100 p-6 rounded-lg text-center">
                <div class="text-2xl font-bold text-green-600">{{ $totalProducts }}</div>
                <div class="text-sm text-gray-600">Total Produk/Layanan</div>
            </div>
            <div class="bg-orange-100 p-6 rounded-lg text-center">
                <div class="text-2xl font-bold text-orange-600">{{ $totalTransactions }}</div>
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
                    <img src="{{asset('images/ruangan.jpg')}}" alt="Meeting Room" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">RUANGAN/GEDUNG</h3>
                        <p class="text-gray-600 text-sm mb-4">Sewa ruangan dan gedung untuk berbagai keperluan acara dan pertemuan.</p>
                    </div>
                </div>

                <div class="w-96 h-96 bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{asset('images/inventaris.jpg')}}" alt="Computer Lab" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">INVENTARIS</h3>
                        <p class="text-gray-600 text-sm mb-4">Penyewaan inventaris dan peralatan untuk mendukung kegiatan akademik.</p>
                    </div>
                </div>

                <div class="w-96 h-96 bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{asset('images/atk.jpg')}}" alt="Printer" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">ALAT TULIS & PRINTING</h3>
                        <p class="text-gray-600 text-sm mb-4">Layanan printing dan penyediaan alat tulis untuk mahasiswa dan dosen.</p>
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
                    </div>
                </div>

                <div class="w-96 h-96 bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{asset('images/umkm.jpg')}}" alt="Campus Store" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">UMKM KAMPUS</h3>
                        <p class="text-gray-600 text-sm mb-4">Mendukung UMKM kampus dengan berbagai produk dan layanan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Rekomendasi Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold">Rekomendasi produk/layanan</h2>
            <a href="{{ route('frontend.unit_bisnis.all-katalog',) }}" class="bg-gray-800 text-white px-4 py-2 rounded-lg">Lihat Semua Katalog</a>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-4 gap-6 mb-8">
            @foreach ($products as $product)
            <div class="bg-white border rounded-lg overflow-hidden shadow-sm">
                <img src="{{ $product->gambar ? asset('storage/' . $product->gambar) : asset('images/default.jpg') }}" alt="{{ $product->nama }}"
                    class="w-full h-40 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-sm mb-1">{{ $product->nama }}</h3>
                    <p class="text-xs text-gray-600 mb-2">{{ \Illuminate\Support\Str::limit(strip_tags($product->deskripsi), 60) }}</p>
                    <div class="flex space-x-2">
                        <a href="{{ $product->unit_bisnis_id == 1 || $product->unit_bisnis_id == 2 
            ? route('frontend.bookings.checkout.booking', ['product_id' => $product->id]) 
            : route('frontend.bookings.checkout.transaction', ['product_id' => $product->id]) }}"
                            class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Reservasi</a>
                        <a href="{{ route('frontend.bookings.details', ['product_id' => $product->id]) }}"
                            class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Calendar Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-8">Kalender Reservasi Produk</h2>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div id="calendar" class="min-h-[500px]"></div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-gray-700 to-orange-500">
    <div class="container mx-auto px-4 flex items-center">
        <div class="w-1/2 text-white">
            <h2 class="text-3xl font-bold mb-4">Want to join us?</h2>
            <p class="mb-6">Bergabunglah dengan Unit Bisnis FMIPA Universitas Udayana dan nikmati berbagai layanan terbaik untuk mendukung kegiatan akademik Anda.</p>
            <button onclick="confirmJoinAsSeller()" href="{{ route('register-penjual') }}" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                Daftar Sekarang
            </button>
        </div>
        <div class="w-1/2">
            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=500&h=400&fit=crop" alt="Student" class="rounded-lg" />
        </div>
    </div>
</section>

<x-footer />

@push('after-style')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet" />
@endpush

@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
    function confirmJoinAsSeller() {
        if (confirm("Anda saat ini login sebagai pembeli. Untuk menjadi penjual, Anda harus logout dan daftar sebagai penjual. Lanjutkan?")) {
            window.location.href = "{{ route('logout.and.register.seller') }}";
        }
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            events: '/calendar/events',
            height: "auto",
        });

        calendar.render();
    });
</script>
@endpush
