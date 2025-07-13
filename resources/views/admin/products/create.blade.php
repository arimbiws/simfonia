@extends('admin.layouts.app')
@section('title', 'Add New Product')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Add New Product</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg shadow-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf

        <!-- Cover Image -->
        <div class="mb-6">
            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Cover Image</label>
            <input id="gambar" type="file" name="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            <p class="mt-1 text-sm text-gray-500">Only .JPG, .PNG, or .JPEG</p>
            @error('gambar')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Product Name -->
        <div class="mb-6">
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
            <input id="nama" type="text" name="nama" value="{{ old('nama') }}" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required autofocus>
            @error('nama')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price -->
        <div class="mb-6">
            <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
            <input id="harga" type="number" name="harga" value="{{ old('harga') }}" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            @error('harga')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Unit Bisnis -->
        <div class="mb-6">
            <label for="unit_bisnis" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
            <select name="unit_bisnis_id" id="unit_bisnis" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                <option value="" disabled selected>Select Category</option>
                @foreach ($unit_bisnis as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
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
                <option value="tersedia">Tersedia</option>
                <option value="disewa">Disewa</option>
                <option value="tutup">Tutup</option>
            </select>
            @error('status')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-6">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="deskripsi" id="deskripsi" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 h-32" required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                Add Product
            </button>
        </div>
    </form>
</div>
@endsection