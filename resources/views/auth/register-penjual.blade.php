<x-guest-layout>

    <div class="w-full max-w-5xl flex bg-white rounded-3xl shadow-2xl overflow-hidden my-10">
        <!-- Left Side - Illustration -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br relative p-12 items-center justify-center">

            <img src="{{asset('images/gambar1.png')}}" alt="Login Illustration" class="max-h-96 object-contain" />
        </div>

        <!-- Right Side - Login Form -->
        <div class="w-full lg:w-1/2 p-8 lg:p-12 flex items-center justify-center">
            <div class="max-w-md w-full">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">
                        Sell Your Products in SIMFONIA <span class="text-2xl">🚀</span>
                    </h1>
                    <p class="text-gray-500">Sign up as seller</p>
                </div>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- NIK/NIM -->
                    <div class="mt-4">
                        <x-input-label for="nik_nim" :value="__('NIK/NIM')" />
                        <x-text-input id="nik_nim" class="block mt-1 w-full" type="number" name="nik_nim" :value="old('nik_nim')" required />
                        <x-input-error :messages="$errors->get('nik_nim')" class="mt-2" />
                    </div>

                    <!-- No HP -->
                    <div class="mt-4">
                        <x-input-label for="no_hp" :value="__('Nomor HP')" />
                        <x-text-input id="no_hp" class="block mt-1 w-full" type="number" name="no_hp" :value="old('no_hp')" required />
                        <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                    </div>


                    <!-- Alamat -->
                    <div class="mt-4">
                        <x-input-label for="alamat" :value="__('Alamat')" />
                        <textarea name="alamat" id="alamat" class="w-full py-2 ps-2 border-gray-300 border-2 rounded-md"></textarea>
                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                    </div>


                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- File Upload Section -->
                    <div class="flex flex-col space-y-2 mt-4">
                        <x-input-label for="password_confirmation" :value="__('Upload Surat Persetujuan Ketentuan SIMFONIA')" />
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

                    <div class="flex items-center justify-between mt-7">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Register as Seller') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>


@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('surat_persetujuan');
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

        const dropArea = document.querySelector('label[for="surat_persetujuan"]');

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