@extends('admin.layouts.app')
@section('title', 'Add New Product')
@section('content')


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


<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf

    <!-- Cover -->
    <div class="mt-3">
        <x-input-label for="gambar" :value="__('Cover')" />
        <x-text-input id="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 " type="file" name="gambar" aria-describedby="user_avatar_help" required />
</form>

<x-input-error :messages="$errors->get('gambar')" class="mt-2" />
</div>

<!-- Product Name -->
<div class="mt-4">
    <x-input-label for="nama" :value="__('Product Name')" />
    <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus autocomplete="nama" />
    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
</div>

<!-- Price -->
<div class="mt-4">
    <x-input-label for="harga" :value="__('Price')" />
    <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga" :value="old('harga')" required />
    <x-input-error :messages="$errors->get('harga')" class="mt-2" />
</div>

<!-- Unit Bisnis -->
<div class="mt-4">
    <x-input-label for="unit_bisnis" :value="__('Unit Bisnis')" />
    <select name="unit_bisnis_id" id="unit_bisnis" class="w-full py-2 ps-5 border-gray-300 border-2 rounded-md">
        <option value="" class="text-gray-200">Select Category Unit Bisnis</option>
        @forelse ($unit_bisnis as $unit)
        <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
        @empty
        @endforelse
    </select>
    <x-input-error :messages="$errors->get('unit_bisnis')" class="mt-2" />
</div>

<!-- Deskripsi   -->
<div class="mt-4">
    <x-input-label for="deskripsi" :value="__('Deskripsi')" />
    <textarea name="deskripsi" id="deskripsi" class=" h-[100px] w-full py-2 ps-2 border-gray-300 border-2 rounded-md">
        </textarea>
    <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
</div>

<div class="flex items-center justify-end mt-10">
    <x-primary-button class="ms-4 ">
        {{ __('Add Product') }}
    </x-primary-button>
</div>
</form>
@endsection