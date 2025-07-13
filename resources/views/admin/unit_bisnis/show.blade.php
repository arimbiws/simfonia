@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">{{ $unit->nama_unit }}</h1>
    <img src="{{ asset($unit->gambar) }}" alt="{{ $unit->nama_unit }}" class="w-full max-h-96 object-cover mb-6 rounded">
    <p class="text-gray-700">{{ $unit->deskripsi }}</p>
    <a href="{{ route('admin.unit_bisnis.index') }}" class="inline-block mt-4 text-blue-600">&larr; Kembali ke Daftar</a>
</div>
@endsection