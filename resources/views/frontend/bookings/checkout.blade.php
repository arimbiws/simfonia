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

    <form action="{{ route('frontend.bookings.store') }}" method="POST" enctype="multipart/form-data" class="my-6">
        @csrf
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <!-- Ruangan -->
            <div class="flex flex-col space-y-2">
                <label class="block mb-1 font-medium text-gray-900">Pilih Ruangan</label>
                <select id="productSelect" name="product_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="" disabled selected hidden>Pilih Ruangan</option>
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}" data-harga="{{ $product->harga }}">
                        {{ $product->nama }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Lokasi Kampus dan Biaya Penyewaan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col space-y-2">
                    <label class="block mb-1 font-medium text-gray-900">Lokasi Kampus</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <div class="flex flex-col space-y-2">
                            <option value="" disabled selected hidden>Pilih Lokasi</option>
                            <option>Kampus Jimbaran</option>
                            <option>Kampus Sudirman</option>
                    </select>
                </div>

                <!-- Harga Penyewaan -->
                <div class="flex flex-col space-y-2">
                    <label class="block mb-1 font-medium text-gray-900">Biaya Penyewaan</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                        </div>
                        <input type="text" id="hargaInput" readonly
                            class="ps-8 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
                    </div>
                </div>
            </div>

            <!-- Tanggal -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col space-y-2">
                    <label class="block mb-1 font-medium text-gray-900">Tanggal Peminjaman</label>
                    <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="tanggal_mulai">
                </div>
                <div class="flex flex-col space-y-2">
                    <label class="block mb-1 font-medium text-gray-900">Tanggal Pengembalian</label>
                    <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="tanggal_kembali">
                </div>
            </div>

            <!-- Nama Kegiatan -->
            <div class="flex flex-col space-y-2">
                <label class="block mb-1 font-medium text-gray-900">Nama Kegiatan</label>
                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Input text" name="nama_kegiatan">
            </div>

            <!-- Instansi dan NIM -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col space-y-2">
                    <label class="block mb-1 font-medium text-gray-900">Asal Instansi</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Input text" name="instansi">
                </div>
                <div class="flex flex-col space-y-2">
                    <label class="block mb-1 font-medium text-gray-900" for="nik_nim">NIM/ID Number</label>
                    <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="nik_nim" placeholder="Input text">
                </div>
            </div>

            <!-- Nama Lengkap -->
            <div class="flex flex-col space-y-2">
                <label class="block mb-1 font-medium text-gray-900">Full Name</label>
                <input type="text" name="nama_lengkap" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Input text">
            </div>

            <!-- Email dan Phone -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col space-y-2">
                    <label for="email" class="block mb-1 font-medium text-gray-900 ">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan email" required />
                </div>
                <div class="flex flex-col space-y-2">
                    <label class="block mb-1 font-medium text-gray-900">Phone Number</label>
                    <input type="text" name="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Input text">
                </div>
            </div>

            <!-- Alamat -->
            <div class="flex flex-col space-y-2">
                <label class="block mb-1 font-medium text-gray-900">Alamat</label>
                <input type="text" name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Input text">
            </div>

            <!-- Upload File -->
            <div class="flex flex-col space-y-2">
                <label class="block mb-1 font-medium text-gray-900">Surat Pengajuan Peminjaman/Penyewaan Ruangan</label>
                <input type="file" name="surat_pengajuan" required>
            </div>
        </div>

        <!-- Submit -->
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white w-full mt-[50px] px-6 py-3 rounded-lg">
            Submit
        </button>

</div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const select = document.getElementById('productSelect');
        const hargaInput = document.getElementById('hargaInput');

        select.addEventListener('change', function() {
            const selectedOption = select.options[select.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga');
            hargaInput.value = harga ? 'Rp ' + new Intl.NumberFormat('id-ID').format(harga) : '';
        });
    });
</script>


@endpush