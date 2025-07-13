@extends('admin.layouts.app')
@section('title', 'Edit Product')
@section('content')
<div class="container mx-auto px-4 py-8">
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 2a1 1 0 011 1v1h3a2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h3V3a1 1 0 011-1z" />
                    </svg>
                    Products
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-4 h-4 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-sm font-medium text-gray-500">Edit Product</span>
                </div>
            </li>
        </ol>
    </nav>

    <h1 class="text-3xl font-bold text-gray-800 mb-8">Edit Product</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg shadow-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Existing Cover -->
        <div class="mb-6">
            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Existing Cover</label>
            <img src="{{ Storage::url($product->gambar) }}" class="h-24 w-24 rounded-lg object-cover mb-3" alt="{{ $product->nama }}">
            <input id="gambar" type="file" name="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <p class="mt-1 text-sm text-gray-500">Only .JPG, .PNG, or .JPEG (optional)</p>
            @error('gambar')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Product Name -->
        <div class="mb-6">
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
            <input id="nama" type="text" name="nama" value="{{ old('nama', $product->nama) }}" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required autofocus>
            @error('nama')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price -->
        <div class="mb-6">
            <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
            <input id="harga" type="number" name="harga" value="{{ old('harga', $product->harga) }}" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            @error('harga')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Unit Bisnis -->
        <div class="mb-6">
            <label for="unit_bisnis" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
            <select name="unit_bisnis_id" id="unit_bisnis" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                <option value="{{ $product->unit_bisnis_id }}" selected>{{ $product->unit->nama_unit }}</option>
                @foreach ($unit_bisnis as $unit)
                    @if ($unit->id != $product->unit_bisnis_id)
                        <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                    @endif
                @endforeach
            </select>
            @error('unit_bisnis_id')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div class="mb-6">
            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <select name="status" id="status" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                <option value="tersedia" {{ $product->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="disewa" {{ $product->status == 'disewa' ? 'selected' : '' }}>Disewa</option>
                <option value="tutup" {{ $product->status == 'tutup' ? 'selected' : '' }}>Tutup</option>
            </select>
            @error('status')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-6">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="deskripsi" id="deskripsi" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 h-32" required>{{ old('deskripsi', $product->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                Update Product
            </button>
        </div>
    </form>
</div>
@endsection