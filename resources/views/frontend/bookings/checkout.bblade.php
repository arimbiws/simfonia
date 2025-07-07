@extends('frontend.layouts.app')
@section('title', 'Booking ')
@section('content')


<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <form action="{{ route('frontend.bookings.create') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" class="w-full border rounded px-3 py-2">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="w-full border rounded px-3 py-2">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm font-medium">Instansi</label>
                        <input type="text" name="instansi" class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">NIM</label>
                        <input type="text" name="nim" class="w-full border rounded px-3 py-2">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="w-full border rounded px-3 py-2">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">No HP</label>
                        <input type="text" name="no_hp" class="w-full border rounded px-3 py-2">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium">Alamat</label>
                    <input type="text" name="alamat" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium">Upload Surat Pengajuan</label>
                    <input type="file" name="surat_pengajuan" class="w-full">
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection