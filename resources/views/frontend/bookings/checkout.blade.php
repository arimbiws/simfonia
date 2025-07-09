@extends('frontend.layouts.app')
@section('title', 'Booking ')
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

    <h1 class="text-3xl font-bold mb-6 ms-7">My Booking</h1>


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



    <form action="{{ route('frontend.bookings.store') }}" method="POST" enctype="multipart/form-data" class=" w-full my-6">
        @csrf
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <!-- Ruangan -->
            <div class="flex flex-col mb-3">
                <label class="block mb-1 font-medium text-gray-900">Pilih Ruangan</label>
                <select id="productSelect" name="product_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="" disabled selected hidden>Pilih Ruangan</option>
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}" data-harga="{{ $product->harga }}"
                        {{ isset($selectedProductId) && $selectedProductId == $product->id ? 'selected' : '' }}>
                        {{ $product->nama }}
                    </option>
                    @endforeach
                </select>
            </div>

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
                    <input type="text" id="hargaInput" readonly value=""
                        class="ps-8 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">

                </div>
            </div>

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
                    <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="nik_nim" placeholder="Input text" required>
                </div>
            </div>

            <!-- Nama Lengkap -->
            <div class="flex flex-col mb-3">
                <label class="block mb-1 font-medium text-gray-900">Full Name</label>
                <input type="text" name="nama_lengkap" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Input text" required>
            </div>

            <!-- Email dan Phone -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col mb-3">
                    <label for="email" class="block mb-1 font-medium text-gray-900 ">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan email" required />
                </div>
                <div class="flex flex-col mb-3">
                    <label class="block mb-1 font-medium text-gray-900">Phone Number</label>
                    <input type="text" name="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Input text" required>
                </div>
            </div>

            <!-- Alamat -->
            <div class="flex flex-col mb-3">
                <label class="block mb-1 font-medium text-gray-900">Alamat</label>
                <input type="text" name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Input text">
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
        </div>
        <!-- Submit -->
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white w-full mt-[50px] px-6 py-3 rounded-lg">
            Ajukan Penyewaan
        </button>

    </form>
</div>

<x-footer />


@endsection


@push('after-script')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('surat_pengajuan');
        const uploadArea = document.getElementById('upload-area');
        const previewArea = document.getElementById('preview-area');
        const fileIcon = document.getElementById('file-icon');
        const fileName = document.getElementById('file-name');
        const fileSize = document.getElementById('file-size');
        const removeButton = document.getElementById('remove-file');

        // Maximum file size (10MB in bytes)
        const MAX_FILE_SIZE = 10 * 1024 * 1024;

        // Allowed file types
        const ALLOWED_TYPES = [
            'application/msword', // .doc
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
            'application/pdf' // .pdf
        ];

        // Function to format file size
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        // Function to get file icon based on file type
        function getFileIcon(fileType) {
            if (fileType === 'application/pdf') {
                return `<svg class="w-full h-full text-red-500" fill="currentColor" viewBox="0 0 20 20">
                <path d="M4 18h12V6l-4-4H4v16zm8-14v4h4l-4-4z"/>
                <text x="10" y="14" text-anchor="middle" class="text-xs font-bold fill-white">PDF</text>
            </svg>`;
            } else if (fileType.includes('word') || fileType.includes('msword')) {
                return `<svg class="w-full h-full text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                <path d="M4 18h12V6l-4-4H4v16zm8-14v4h4l-4-4z"/>
                <text x="10" y="14" text-anchor="middle" class="text-xs font-bold fill-white">DOC</text>
            </svg>`;
            }
            return `<svg class="w-full h-full text-gray-500" fill="currentColor" viewBox="0 0 20 20">
            <path d="M4 18h12V6l-4-4H4v16zm8-14v4h4l-4-4z"/>
        </svg>`;
        }

        // Function to validate file
        function validateFile(file) {
            // Check file size
            if (file.size > MAX_FILE_SIZE) {
                alert('File size exceeds 10MB limit. Please choose a smaller file.');
                return false;
            }

            // Check file type
            if (!ALLOWED_TYPES.includes(file.type)) {
                alert('Invalid file type. Please select a DOC, DOCX, or PDF file.');
                return false;
            }

            return true;
        }

        // Function to show file preview
        function showPreview(file) {
            if (!validateFile(file)) {
                resetUpload();
                return;
            }

            fileIcon.innerHTML = getFileIcon(file.type);
            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);

            // Hide upload area and show preview
            uploadArea.classList.add('hidden');
            previewArea.classList.remove('hidden');
        }

        // Function to reset to upload state
        function resetUpload() {
            fileInput.value = '';
            fileIcon.innerHTML = '';
            fileName.textContent = '';
            fileSize.textContent = '';

            // Show upload area and hide preview
            uploadArea.classList.remove('hidden');
            previewArea.classList.add('hidden');
        }

        // File input change event
        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                showPreview(file);
            } else {
                resetUpload();
            }
        });

        // Remove file button event
        removeButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            resetUpload();
        });

        // Drag and drop functionality
        const dropArea = document.querySelector('label[for="surat_pengajuan"]');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropArea.classList.add('border-blue-500', 'bg-blue-50');
        }

        function unhighlight(e) {
            dropArea.classList.remove('border-blue-500', 'bg-blue-50');
        }

        dropArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            if (files.length > 0) {
                const file = files[0];

                // Create a new FileList with the dropped file
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                fileInput.files = dataTransfer.files;

                showPreview(file);
            }
        }
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