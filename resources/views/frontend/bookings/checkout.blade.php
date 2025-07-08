@extends('frontend.layouts.app')
@section('title', 'Booking ')
@section('content')

<x-navbar />


<!-- Progress Step -->
<div class="max-w-4xl mx-auto px-4 my-[100px]">
    <div class="flex justify-center items-center mb-8">
        <div class="flex space-x-4 items-center">
            <div class="text-blue-600 font-semibold">Booking</div>
            <div class="w-8 h-1 bg-blue-600"></div>
            <div class="text-gray-400">Validation Process</div>
            <div class="w-8 h-1 bg-gray-300"></div>
            <div class="text-gray-400">Payment</div>
            <div class="w-8 h-1 bg-gray-300"></div>
            <div class="text-gray-400">Payment Status</div>
            <div class="w-8 h-1 bg-gray-300"></div>
            <div class="text-gray-400">Product Status</div>
        </div>
    </div>

    <h1 class="text-2xl font-bold mb-6">My Booking</h1>

    <form action="#" method="POST" class="space-y-6">

        <!-- Ruangan -->
        <div class="flex flex-col space-y-2">
            <label class="font-medium text-gray-700">Ruangan</label>
            <input type="text" class="border rounded px-4 py-2" placeholder="Input text">
        </div>

        <!-- Lokasi Kampus dan Biaya Penyewaan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col space-y-2">
                <label class="font-medium text-gray-700">Lokasi Kampus</label>
                <select class="border rounded px-4 py-2">
                    <div class="flex flex-col space-y-2">
                        <option value="" disabled selected hidden>Pilih Lokasi</option>
                        <option>Kampus Jimbaran</option>
                        <option>Kampus Sudirman</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label class="font-medium text-gray-700">Biaya Penyewaan</label>
                <div class="flex items-center border rounded px-4 py-2">
                    <span class="text-gray-500 mr-2">Rp</span>
                    <input type="text" class="flex-1 outline-none" placeholder="Input text">
                </div>
            </div>
        </div>

        <!-- Tanggal -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col space-y-2">
                <label class="font-medium text-gray-700">Tanggal Peminjaman</label>
                <input type="date" class="border rounded px-4 py-2">
            </div>
            <div class="flex flex-col space-y-2">
                <label class="font-medium text-gray-700">Tanggal Pengembalian</label>
                <input type="date" class="border rounded px-4 py-2">
            </div>
        </div>

        <!-- Nama Kegiatan -->
        <div class="flex flex-col space-y-2">
            <label class="font-medium text-gray-700">Nama Kegiatan</label>
            <input type="text" class="border rounded px-4 py-2" placeholder="Input text">
        </div>

        <!-- Instansi dan NIM -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col space-y-2">
                <label class="font-medium text-gray-700">Asal Instansi</label>
                <select class="border rounded px-4 py-2">
                    <option value="" disabled selected hidden>Pilih Instansi</option>
                    <option>Universitas Udayana</option>
                    <option>Lainnya</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label class="font-medium text-gray-700">NIM/ID Number</label>
                <input type="text" class="border rounded px-4 py-2" placeholder="Input text">
            </div>
        </div>

        <!-- Nama Lengkap -->
        <div class="flex flex-col space-y-2">
            <label class="font-medium text-gray-700">Full Name</label>
            <input type="text" class="border rounded px-4 py-2" placeholder="Input text">
        </div>

        <!-- Email dan Phone -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col space-y-2">
                <label class="font-medium text-gray-700">Email</label>
                <input type="email" class="border rounded px-4 py-2" placeholder="Input text">
            </div>
            <div class="flex flex-col space-y-2">
                <label class="font-medium text-gray-700">Phone Number</label>
                <input type="text" class="border rounded px-4 py-2" placeholder="Input text">
            </div>
        </div>

        <!-- Alamat -->
        <div class="flex flex-col space-y-2">
            <label class="font-medium text-gray-700">Alamat</label>
            <input type="text" class="border rounded px-4 py-2" placeholder="Input text">
        </div>

        <!-- Upload File -->
        <div class="flex flex-col space-y-2">
            <label class="font-medium text-gray-700">Surat Pengajuan Peminjaman/Penyewaan Ruangan</label>
            <div class="relative inline-block">
                <button type="button" class="border-2 border-dashed border-gray-400 px-6 py-3 rounded-lg items-center justify-center text-gray-500 w-full">
                    <span id="fileButtonText" class="truncate">Choose File</span>
                    <i class="fas fa-paperclip ml-2"></i>
                </button>
                <input type="file" id="fileInput" class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer" />
            </div>
        </div>


        <!-- Submit -->
        <a href="{{route('frontend.bookings.payment')}}"
            type="button"
            class="bg-blue-500 hover:bg-blue-600 text-white w-fullpx-6 py-3 rounded-lg">
            Submit
        </a>
    </form>
</div>

<x-footer />


@endsection


@push('after-script')

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


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const suratInput = document.getElementById('suratInput');
        const fileName = document.getElementById('fileName');
        const uploadTrigger = document.getElementById('uploadTrigger');

        // Kalau klik ikon, buka file explorer
        uploadTrigger.addEventListener('click', function() {
            suratInput.click();
        });

        // Tampilkan nama file yang dipilih
        suratInput.addEventListener('change', function() {
            if (suratInput.files.length > 0) {
                fileName.textContent = suratInput.files[0].name;
            } else {
                fileName.textContent = 'Choose File';
            }
        });
    });
</script>


@endpush