@extends('frontend.layouts.app')
@section('title', 'Booking Produk')
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

    <h1 class="text-3xl font-bold mb-6 mx-auto">Booking Product</h1>

    @if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="ps-5 py-5 bg-red-500 text-white font-bold">
                {{ $error }}
            </li>
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
        <input type="hidden" name="jumlah_item" id="jumlah_item" />


        <!-- Tanggal -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col mb-3">
                <label class="block mb-1 font-medium text-gray-900">Tanggal Peminjaman</label>
                <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="tanggal_mulai" required>
            </div>
            <div class="flex flex-col mb-3">
                <label class="block mb-1 font-medium text-gray-900">Tanggal Pengembalian</label>
                <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="tanggal_kembali" required>
            </div>
        </div>

        <!-- Jam Peminjaman -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col mb-3">
                <label class="block mb-1 font-medium text-gray-900">Jam Mulai</label>
                <input type="time" name="jam_mulai" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
            </div>
            <div class="flex flex-col mb-3">
                <label class="block mb-1 font-medium text-gray-900">Jam Selesai</label>
                <input type="time" name="jam_selesai" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
            </div>
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

        <!-- File Upload Section -->
        <div class="flex flex-col space-y-2">
            <label class="block mb-2 font-medium text-gray-900">Surat Pengajuan Peminjaman/Penyewaan Ruangan</label>
            <div class="flex items-center justify-center w-full">
                <label for="surat_pengajuan" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                    <div id="upload-area" class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500">DOCS, DOCX, or PDF (MAX. 10MB)</p>
                    </div>
                    <!-- Preview Area (hidden by default) -->
                    <div id="preview-area" class="hidden w-full h-full flex flex-col items-center justify-center p-4">
                        <div id="file-icon" class="w-16 h-16 mb-4 flex items-center justify-center">
                            <!-- File icon will be inserted here -->
                        </div>
                        <p id="file-name" class="text-sm text-gray-700 font-medium"></p>
                        <p id="file-size" class="text-xs text-gray-500"></p>
                        <button type="button" id="remove-file" class="mt-2 text-sm text-red-600 hover:text-red-800">Remove file</button>
                    </div>
                    <!-- Updated input with proper accept attribute -->
                    <input id="surat_pengajuan" type="file" name="surat_pengajuan" class="hidden"
                        accept=".doc,.docx,.pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf"
                        required />
                </label>
            </div>
        </div>

        <div class="flex text-center justify-between ">
            <a href="{{ route('frontend.unit_bisnis.all-katalog') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white w-[100px] mt-[50px] px-6 py-3 rounded-lg">
                Cancel
            </a>
            <!-- Submit -->
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white w-[350px] mt-[50px] px-6 py-3 rounded-lg">
                Ajukan Penyewaan
            </button>
        </div>
    </form>
</div>

<x-footer />
@endsection

@push('after-script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalMulai = document.querySelector('input[name="tanggal_mulai"]');
        const tanggalKembali = document.querySelector('input[name="tanggal_kembali"]');
        const productSelect = document.getElementById('productSelect');
        const jumlahItem = document.querySelector('input[name="jumlah_item"]');
        const jamMulai = document.querySelector('input[name="jam_mulai"]');
        const jamSelesai = document.querySelector('input[name="jam_selesai"]');

        function showAlert(message) {
            alert(message);
        }

        function hitungJumlahItem() {
            const mulai = new Date(tanggalMulai.value);
            const kembali = new Date(tanggalKembali.value);

            if (mulai && kembali && !isNaN(mulai) && !isNaN(kembali)) {
                const selisihHari = Math.floor((kembali - mulai) / (1000 * 60 * 60 * 24)) + 1;
                jumlahItem.value = selisihHari > 0 ? selisihHari : '';
            }
        }

        tanggalMulai.addEventListener('change', () => {
            validateTanggal();
            hitungJumlahItem();
        });
        tanggalKembali.addEventListener('change', () => {
            validateTanggal();
            hitungJumlahItem();
        });

        [jamMulai, jamSelesai].forEach(input => {
            input.addEventListener('change', () => {
                validateTanggal();
                hitungJumlahItem();
            });
        });

        async function validateTanggal() {
            const mulai = new Date(tanggalMulai.value);
            const kembali = new Date(tanggalKembali.value);
            const jamM = jamMulai.value;
            const jamS = jamSelesai.value;
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            if (mulai < today) {
                showAlert("Tanggal peminjaman tidak boleh di masa lalu.");
                tanggalMulai.value = '';
                return;
            }

            if (kembali < mulai) {
                showAlert("Tanggal kembali tidak boleh sebelum tanggal mulai.");
                tanggalKembali.value = '';
                return;
            }

            if (mulai && kembali && jamM && jamS && productSelect?.value) {
                const response = await fetch(`/api/check-booking?product_id=${productSelect.value}&mulai=${tanggalMulai.value}&kembali=${tanggalKembali.value}&jam_mulai=${jamM}&jam_selesai=${jamS}`);
                const data = await response.json();

                if (data.conflict) {
                    alert('Tanggal dan jam yang dipilih sudah dibooking.');
                    tanggalMulai.value = '';
                    tanggalKembali.value = '';
                    jamMulai.value = '';
                    jamSelesai.value = '';
                    jumlahItem.value = '';
                }
            }
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('surat_pengajuan');
        const uploadArea = document.getElementById('upload-area');
        const previewArea = document.getElementById('preview-area');
        const fileIcon = document.getElementById('file-icon');
        const fileName = document.getElementById('file-name');
        const fileSize = document.getElementById('file-size');
        const removeButton = document.getElementById('remove-file');

        const MAX_FILE_SIZE = 10 * 1024 * 1024;
        const ALLOWED_TYPES = [
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/pdf'
        ];

        function formatFileSize(bytes) {
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        function getFileIcon(fileType) {
            if (fileType === 'application/pdf') {
                return `<svg class="w-full h-full text-red-500" fill="currentColor" viewBox="0 0 20 20"><path d="M4 18h12V6l-4-4H4v16zm8-14v4h4l-4-4z"/></svg>`;
            } else if (fileType.includes('word') || fileType.includes('msword')) {
                return `<svg class="w-full h-full text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path d="M4 18h12V6l-4-4H4v16zm8-14v4h4l-4-4z"/></svg>`;
            }
            return `<svg class="w-full h-full text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path d="M4 18h12V6l-4-4H4v16zm8-14v4h4l-4-4z"/></svg>`;
        }

        function validateFile(file) {
            if (file.size > MAX_FILE_SIZE) {
                alert('Ukuran file melebihi 10MB.');
                return false;
            }

            if (!ALLOWED_TYPES.includes(file.type)) {
                alert('Jenis file tidak diizinkan. Hanya PDF, DOC, dan DOCX.');
                return false;
            }

            return true;
        }

        function showPreview(file) {
            if (!validateFile(file)) {
                resetUpload();
                return;
            }

            fileIcon.innerHTML = getFileIcon(file.type);
            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);

            uploadArea.classList.add('hidden');
            previewArea.classList.remove('hidden');
        }

        function resetUpload() {
            fileInput.value = '';
            fileIcon.innerHTML = '';
            fileName.textContent = '';
            fileSize.textContent = '';
            uploadArea.classList.remove('hidden');
            previewArea.classList.add('hidden');
        }

        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                showPreview(file);
            } else {
                resetUpload();
            }
        });

        removeButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            resetUpload();
        });

        const dropArea = document.querySelector('label[for="surat_pengajuan"]');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => dropArea.classList.add('border-blue-500', 'bg-blue-50'), false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => dropArea.classList.remove('border-blue-500', 'bg-blue-50'), false);
        });

        dropArea.addEventListener('drop', function(e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            if (files.length > 0) {
                const file = files[0];
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                fileInput.files = dataTransfer.files;
                showPreview(file);
            }
        });
    });
</script>
@endpush