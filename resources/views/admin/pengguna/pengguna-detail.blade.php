@extends('admin.layouts.app')

@section('title', 'Detail Pengguna')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Detail Pengguna</h2>
        <a href="{{ route('admin.pengguna.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Kembali</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-4">
            <div class="p-4 bg-gray-50 border border-gray-200 rounded-md shadow-sm">
                <label class="block text-sm font-medium text-gray-700">Nama:</label>
                <p class="mt-1 text-gray-900">{{ $user->name }}</p>
            </div>
            <div class="p-4 bg-gray-50 border border-gray-200 rounded-md shadow-sm">
                <label class="block text-sm font-medium text-gray-700">Email:</label>
                <p class="mt-1 text-gray-900">{{ $user->email }}</p>
            </div>
            <div class="p-4 bg-gray-50 border border-gray-200 rounded-md shadow-sm">
                <label class="block text-sm font-medium text-gray-700">Role:</label>
                <p class="mt-1 text-gray-900 capitalize">{{ $user->role }}</p>
            </div>
            <div class="p-4 bg-gray-50 border border-gray-200 rounded-md shadow-sm">
                <label class="block text-sm font-medium text-gray-700">Tipe Pembeli:</label>
                <p class="mt-1 text-gray-900 capitalize">{{ $user->tipe_pembeli ?? '-' }}</p>
            </div>
        </div>
        <div class="space-y-4">
            <div class="p-4 bg-gray-50 border border-gray-200 rounded-md shadow-sm">
                <label class="block text-sm font-medium text-gray-700">NIK/NIM:</label>
                <p class="mt-1 text-gray-900">{{ $user->nik_nim }}</p>
            </div>
            <div class="p-4 bg-gray-50 border border-gray-200 rounded-md shadow-sm">
                <label class="block text-sm font-medium text-gray-700">No HP:</label>
                <p class="mt-1 text-gray-900">{{ $user->no_hp }}</p>
            </div>
            <div class="p-4 bg-gray-50 border border-gray-200 rounded-md shadow-sm">
                <label class="block text-sm font-medium text-gray-700">Alamat:</label>
                <p class="mt-1 text-gray-900">{{ $user->alamat }}</p>
            </div>
            <div class="p-4 bg-gray-50 border border-gray-200 rounded-md shadow-sm">
                <label class="block text-sm font-medium text-gray-700">Surat Persetujuan:</label>
                <div class="mt-1 flex items-center space-x-2">
                    @if($user->surat_persetujuan)
                    <a href="{{ asset('storage/' . $user->surat_persetujuan) }}" target="_blank" class="text-blue-600 hover:underline">Lihat File</a>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs Stu-sm font-medium bg green-100 text-green-800">Disetujui</span>
                    @else
                    <span class="text-gray-500">-</span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Belum Disetujui</span>
                    @endif
                </div>
            </div>
            <div class="p-4 bg-gray-50 border border-gray-200 rounded-md shadow-sm">
                <label class="block text-sm font-medium text-gray-700">Tanggal Daftar:</label>
                <p class="mt-1 text-gray-900">{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</p>
            </div>
        </div>
    </div>

    <div class="mt-6 flex space-x-4">
        <a href="{{ route('admin.pengguna.edit', $user->id) }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Edit</a>
        <form action="{{ route('admin.pengguna.delete', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
        </form>
    </div>
</div>
@endsection