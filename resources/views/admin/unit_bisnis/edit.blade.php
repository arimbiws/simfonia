@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Unit Bisnis</h1>

    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.unit_bisnis.update', $unit->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama_unit" class="block text-gray-700 font-semibold mb-2">Nama Unit</label>
            <select name="nama_unit" id="nama_unit" class="w-full border rounded px-3 py-2 @error('nama_unit') border-red-500 @enderror">
                @foreach($unitOptions as $option)
                <option value="{{ $option }}" {{ old('nama_unit', $unit->nama_unit) == $option ? 'selected' : '' }}>{{ $option }}</option>
                @endforeach
            </select>
            @error('nama_unit')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="5"
                class="w-full border rounded px-3 py-2 @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi', $unit->deskripsi) }}</textarea>
            @error('deskripsi')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="gambar" class="block text-gray-700 font-semibold mb-2">Gambar</label>
            @if ($unit->gambar)
            <img src="{{ str_starts_with($unit->gambar, 'unit_bisnis/') ? Storage::url($unit->gambar) : asset($unit->gambar) }}" alt="Current Image" class="w-32 h-32 object-cover mb-2 rounded">
            @endif
            <input type="file" name="gambar" id="gambar"
                class="w-full border rounded px-3 py-2 @error('gambar') border-red-500 @enderror">
            @error('gambar')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.unit_bisnis.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection