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