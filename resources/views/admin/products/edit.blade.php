@extends('admin.layouts.app')
@section('title', 'Edit Products ')
@section('content')


<nav class="flex mb-5" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.products.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                Products
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <a href="{{ route('admin.products.edit', $product) }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Edit Product</a>
            </div>
        </li>
    </ol>
</nav>


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

    <!-- Existing Cover -->
    <div class="mt-8">
        <x-input-label for="gambar" :value="__('Existing Cover')" />
        <img src="{{ Storage::url(($product->gambar)) }}" class="h-[100px] w-[100px] mb-3 mt-1" alt="">

        <x-text-input id="gambar" class="block py-3 mt-1 w-full border border-gray-300 rounded-lg bg-gray-50" type="file" name="gambar" />
        <p class="mt-1 text-sm text-gray-500" id="gambar_help">Only .JPG, .PNG, or .JPEG</p>
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
            <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>

            @empty
            @endforelse
        </select>
        <x-input-error :messages="$errors->get('unit_bisnis')" class="mt-2" />
    </div>

    <!-- About -->
    <div class="mt-4">
        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
        <textarea name="deskripsi" id="deskripsi" class=" h-[150px] w-full py-2 ps-2 border-gray-300 border-2 rounded-md">{{ $product->deskripsi }}</textarea>
        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-10">
        <x-primary-button class="ms-4 ">
            {{ __('Update Product') }}
        </x-primary-button>
    </div>
</form>


@endsection