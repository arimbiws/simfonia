@extends('frontend.layouts.app')
@section('title', 'Home Page')
@section('content')

<x-navbar />

<!-- Hero Section -->
<section class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">We invest in the world’s potential</h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <a href="{{ route('frontend.unit_bisnis.katalog') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Lihat Produk
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
            <a href="{{ route('register') }}" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                Join as Seller
            </a>
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
            <a href="{{ route('frontend.unit_bisnis.katalog') }}" class="bg-gray-800 text-white px-4 py-2 rounded-lg">Lihat Semua Katalog</a>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-4 gap-6 mb-8">
            <!-- Row 1 -->
            <div class="bg-white border rounded-lg overflow-hidden shadow-sm">
                <img src="https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?w=300&h=200&fit=crop" alt="Lab Equipment" class="w-full h-40 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-sm mb-1">Laboratorium Komputer</h3>
                    <p class="text-xs text-gray-600 mb-2">Sewa laboratorium komputer lengkap</p>
                    <div class="flex space-x-2">
                        <a href="{{ route('frontend.bookings.checkout') }}" class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Reservasi</a>
                        <a href="{{ route('frontend.bookings.index') }}" class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs">Detail</a>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-lg overflow-hidden shadow-sm">
                <img src="https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?w=300&h=200&fit=crop" alt="Lab Equipment" class="w-full h-40 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-sm mb-1">Laboratorium Komputer</h3>
                    <p class="text-xs text-gray-600 mb-2">Sewa laboratorium komputer lengkap</p>
                    <div class="flex space-x-2">
                        <a href="{{ route('frontend.bookings.checkout') }}" class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Reservasi</a>
                        <a href="{{ route('frontend.bookings.index') }}" class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs">Detail</a>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-lg overflow-hidden shadow-sm">
                <img src="https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?w=300&h=200&fit=crop" alt="Lab Equipment" class="w-full h-40 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-sm mb-1">Laboratorium Komputer</h3>
                    <p class="text-xs text-gray-600 mb-2">Sewa laboratorium komputer lengkap</p>
                    <div class="flex space-x-2">
                        <a href="{{ route('frontend.bookings.checkout') }}" class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Reservasi</a>
                        <a href="{{ route('frontend.bookings.index') }}" class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs">Detail</a>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-lg overflow-hidden shadow-sm">
                <img src="https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?w=300&h=200&fit=crop" alt="Lab Equipment" class="w-full h-40 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-sm mb-1">Laboratorium Komputer</h3>
                    <p class="text-xs text-gray-600 mb-2">Sewa laboratorium komputer lengkap</p>
                    <div class="flex space-x-2">
                        <a href="{{ route('frontend.bookings.checkout') }}" class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Reservasi</a>
                        <a href="{{ route('frontend.bookings.index') }}" class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs">Detail</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 2 -->
        <div class="grid grid-cols-4 gap-6">
            <div class="bg-white border rounded-lg overflow-hidden shadow-sm">
                <img src="https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?w=300&h=200&fit=crop" alt="Lab Equipment" class="w-full h-40 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-sm mb-1">Laboratorium Komputer</h3>
                    <p class="text-xs text-gray-600 mb-2">Sewa laboratorium komputer lengkap</p>
                    <div class="flex space-x-2">
                        <a href="{{ route('frontend.bookings.checkout') }}" class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Reservasi</a>
                        <a href="{{ route('frontend.bookings.index') }}" class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs">Detail</a>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-lg overflow-hidden shadow-sm">
                <img src="https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?w=300&h=200&fit=crop" alt="Lab Equipment" class="w-full h-40 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-sm mb-1">Laboratorium Komputer</h3>
                    <p class="text-xs text-gray-600 mb-2">Sewa laboratorium komputer lengkap</p>
                    <div class="flex space-x-2">
                        <a href="{{ route('frontend.bookings.checkout') }}" class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Reservasi</a>
                        <a href="{{ route('frontend.bookings.index') }}" class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs">Detail</a>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-lg overflow-hidden shadow-sm">
                <img src="https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?w=300&h=200&fit=crop" alt="Lab Equipment" class="w-full h-40 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-sm mb-1">Laboratorium Komputer</h3>
                    <p class="text-xs text-gray-600 mb-2">Sewa laboratorium komputer lengkap</p>
                    <div class="flex space-x-2">
                        <a href="{{ route('frontend.bookings.checkout') }}" class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Reservasi</a>
                        <a href="{{ route('frontend.bookings.index') }}" class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs">Detail</a>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-lg overflow-hidden shadow-sm">
                <img src="https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?w=300&h=200&fit=crop" alt="Lab Equipment" class="w-full h-40 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-sm mb-1">Laboratorium Komputer</h3>
                    <p class="text-xs text-gray-600 mb-2">Sewa laboratorium komputer lengkap</p>
                    <div class="flex space-x-2">
                        <a href="{{ route('frontend.bookings.checkout') }}" class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">Reservasi</a>
                        <a href="{{ route('frontend.bookings.index') }}" class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Calendar Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-8">Kalender KeReservasian Produk/Layanan</h2>
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