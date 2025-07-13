@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Daftar Unit Bisnis</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($units as $unit)
        <div class="bg-white rounded-lg shadow p-4">
            <img src="{{ asset($unit->gambar) }}" alt="{{ $unit->nama_unit }}" class="w-full h-40 object-cover mb-4 rounded">
            <h2 class="text-lg font-semibold mb-2">{{ $unit->nama_unit }}</h2>
            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($unit->deskripsi, 100) }}</p>
            <div class="flex space-x-2">
                <a href="{{ route('admin.unit_bisnis.show', $unit->slug) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded">Lihat Detail</a>
                <a href="{{ route('admin.unit_bisnis.edit', $unit->slug) }}" class="inline-block bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection