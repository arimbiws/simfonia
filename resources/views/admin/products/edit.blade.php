<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-10 sm:rounded-lg">

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


                <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h1 class="text-indigo-950 text-3xl font-bold">Edit Product</h1>

                    <!-- Existing Cover -->
                    <div class="mt-8">
                        <x-input-label for="gambar" :value="__('Existing Cover')" />
                        <img src="{{ Storage::url(($product->gambar)) }}" class="h-[100px] w-[100px] my-3" alt="">

                        <x-text-input id="gambar" class="block mt-1 w-full" type="file" name="gambar" />
                        <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
                    </div>

                    <!-- Product Name -->
                    <div class="mt-4">
                        <x-input-label for="nama" :value="__('Product Name')" />
                        <x-text-input id="nama" value="{{ $product->nama }}" class="block mt-1 w-full" type="text" name="nama" autofocus autocomplete="nama" />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <!-- Price -->
                    <div class="mt-4">
                        <x-input-label for="harga" :value="__('Price')" />
                        <x-text-input id="harga" value="{{ $product->harga }}" class="block mt-1 w-full" type="number" name="harga" required />
                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>

                    <!-- Category -->
                    <div class="mt-4">
                        <x-input-label for="category" :value="__('Category')" />
                        <select name="unit_bisnis_id" id="category" class="w-full py-2 ps-5 border-gray-300 border-2 rounded-md">
                            <option value="{{ $product->unit_bisnis_id }}" class="text-gray-300">{{ $product->unit->nama_unit }}</option>
                            @forelse ($unit_bisnis as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>

                            @empty
                            @endforelse
                        </select>
                        <x-input-error :messages="$errors->get('unit_bisnis')" class="mt-2" />
                    </div>

                    <!-- About -->
                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <textarea name="deskripsi" id="deskripsi" class="w-full py-2 ps-2 border-gray-300 border-2 rounded-md">{{ $product->deskripsi }}</textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-10">
                        <x-primary-button class="ms-4 ">
                            {{ __('Update Product') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>