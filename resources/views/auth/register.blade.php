<x-guest-layout>
    <div class="w-full max-w-5xl flex bg-white rounded-3xl shadow-2xl overflow-hidden my-10">
        <!-- Left Side -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br relative p-12 items-center justify-center">
            <img src="{{ asset('images/gambar1.png') }}" alt="Register Illustration" class="max-h-96 object-contain" />
        </div>

        <!-- Right Side -->
        <div class="w-full lg:w-1/2 p-8 lg:p-12 flex items-center justify-center">
            <div class="max-w-md w-full">
                <div class="text-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Welcome to SIMFONIA 🎉</h1>
                    <p class="text-gray-500">Create your user account</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="block mt-1 w-full" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="block mt-1 w-full" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- NIK/NIM -->
                    <div class="mt-4">
                        <x-input-label for="nik_nim" :value="__('NIK / NIM')" />
                        <x-text-input id="nik_nim" name="nik_nim" type="number" class="block mt-1 w-full" :value="old('nik_nim')" required />
                        <x-input-error :messages="$errors->get('nik_nim')" class="mt-2" />
                    </div>

                    <!-- No HP -->
                    <div class="mt-4">
                        <x-input-label for="no_hp" :value="__('No HP')" />
                        <x-text-input id="no_hp" name="no_hp" type="number" class="block mt-1 w-full" :value="old('no_hp')" required />
                        <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                    </div>

                    <!-- Alamat -->
                    <div class="mt-4">
                        <x-input-label for="alamat" :value="__('Alamat')" />
                        <textarea name="alamat" id="alamat" class="w-full border-gray-300 border-2 rounded-md px-2 py-2" required>{{ old('alamat') }}</textarea>
                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                    </div>

                    <!-- Nama Bank -->
                    <div class="mt-4">
                        <x-input-label for="nama_bank" :value="__('Nama Bank')" />
                        <x-text-input id="nama_bank" name="nama_bank" type="text" class="block mt-1 w-full" :value="old('nama_bank')" required />
                        <x-input-error :messages="$errors->get('nama_bank')" class="mt-2" />
                    </div>

                    <!-- Nama Akun Bank -->
                    <div class="mt-4">
                        <x-input-label for="nama_akun_bank" :value="__('Nama Akun Bank')" />
                        <x-text-input id="nama_akun_bank" name="nama_akun_bank" type="text" class="block mt-1 w-full" :value="old('nama_akun_bank')" required />
                        <x-input-error :messages="$errors->get('nama_akun_bank')" class="mt-2" />
                    </div>

                    <!-- Nomor Rekening -->
                    <div class="mt-4">
                        <x-input-label for="nomor_rekening" :value="__('Nomor Rekening')" />
                        <x-text-input id="nomor_rekening" name="nomor_rekening" type="text" class="block mt-1 w-full" :value="old('nomor_rekening')" required />
                        <x-input-error :messages="$errors->get('nomor_rekening')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" name="password" type="password" class="block mt-1 w-full" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="block mt-1 w-full" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register-penjual') }}">
                            {{ __('Join as Seller!') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>

                <a class="mt-5 flex justify-center underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already have an account?') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>