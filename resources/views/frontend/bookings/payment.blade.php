@extends('frontend.layouts.app')
@section('title', 'Payment Page')
@section('content')

<x-navbar />


<!-- Progress Step -->
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="flex justify-center items-center mb-8">
        <div class="flex space-x-4 items-center">
            <div class="text-gray-400">Booking</div>
            <div class="w-8 h-1 bg-gray-300"></div>
            <div class="text-blue-600 font-semibold">Payment</div>
            <div class="w-8 h-1 bg-blue-600"></div>
            <div class="text-gray-400">Payment Status</div>
        </div>
    </div>

    <h1 class="text-2xl font-bold mb-6">Payment</h1>

    @if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="ps-5 py-5 bg-red-500 text-white font-bold">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('frontend.bookings.payment.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf


        <input type="hidden" name="booking_id" value="{{ $booking->id }}">


        <!-- Data Bank user -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col space-y-2">
                <label class="block mb-1 font-medium text-gray-900">Nama Bank</label>
                <input type="text" readonly value="{{ Auth::user()->nama_bank }}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div class="flex flex-col space-y-2">
                <label class="font-medium text-gray-700">Nama Akun</label>
                <input type="text" readonly value="{{ Auth::user()->nama_akun_bank }}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
        </div>

        <div class="flex flex-col space-y-2">
            <label class="font-medium text-gray-700">Nomor Rekening</label>
            <input type="text" readonly value="{{ Auth::user()->nomor_rekening }}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>

        <!-- File Upload Section -->
        <div class="flex flex-col space-y-2">
            <label class="block mb-2 font-medium text-gray-900">Upload Bukti Pembayaran</label>
            <div class="flex items-center justify-center w-full">
                <label for="bukti_bayar" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                    <div id="upload-area" class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <!-- Preview Area (hidden by default) -->
                    <div id="preview-area" class="hidden w-full h-full flex flex-col items-center justify-center p-4">
                        <img id="image-preview" class="max-w-full max-h-40 object-contain rounded-lg mb-2" alt="Preview">
                        <p id="file-name" class="text-sm text-gray-700 font-medium"></p>
                        <p id="file-size" class="text-xs text-gray-500"></p>
                        <button type="button" id="remove-file" class="mt-2 text-sm text-red-600 hover:text-red-800">Remove file</button>
                    </div>
                    <input id="bukti_bayar" type="file" name="bukti_bayar" class="hidden" accept="image/*" required />
                </label>
            </div>
        </div>
        <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Submit Pembayaran
        </button>
    </form>

</div>


<x-footer />

@endsection


@push('after-script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('bukti_bayar');
        const uploadArea = document.getElementById('upload-area');
        const previewArea = document.getElementById('preview-area');
        const imagePreview = document.getElementById('image-preview');
        const fileName = document.getElementById('file-name');
        const fileSize = document.getElementById('file-size');
        const removeButton = document.getElementById('remove-file');

        // Function to format file size
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        // Function to show file preview
        function showPreview(file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                fileName.textContent = file.name;
                fileSize.textContent = formatFileSize(file.size);

                // Hide upload area and show preview
                uploadArea.classList.add('hidden');
                previewArea.classList.remove('hidden');
            };

            reader.readAsDataURL(file);
        }

        // Function to reset to upload state
        function resetUpload() {
            fileInput.value = '';
            imagePreview.src = '';
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

                // Validate file type
                if (file.type.startsWith('image/')) {
                    showPreview(file);
                } else {
                    alert('Please select a valid image file (JPG, PNG, GIF, SVG)');
                    resetUpload();
                }
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
        const dropArea = document.querySelector('label[for="bukti_bayar"]');

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
                fileInput.files = files;
                const file = files[0];

                if (file.type.startsWith('image/')) {
                    showPreview(file);
                } else {
                    alert('Please select a valid image file (JPG, PNG, GIF, SVG)');
                    resetUpload();
                }
            }
        }
    });
</script>
@endpush