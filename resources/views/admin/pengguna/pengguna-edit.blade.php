@extends('admin.layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Edit Pengguna</h2>

    <form method="POST" action="{{ route('admin.pengguna.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('name') border-red-500 @enderror">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('email') border-red-500 @enderror">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700">Role:</label>
                <select name="role" id="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('role') border-red-500 @enderror">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="penjual" {{ $user->role == 'penjual' ? 'selected' : '' }}>Penjual</option>
                    <option value="pembeli" {{ $user->role == 'pembeli' ? 'selected' : '' }}>Pembeli</option>
                </select>
                @error('role')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tipe_pembeli" class="block text-sm font-medium text-gray-700">Tipe Pembeli:</label>
                <select name="tipe_pembeli" id="tipe_pembeli" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('tipe_pembeli') border-red-500 @enderror">
                    <option value="">-- Pilih Tipe --</option>
                    <option value="internal" {{ $user->tipe_pembeli == 'internal' ? 'selected' : '' }}>Internal</option>
                    <option value="eksternal" {{ $user->tipe_pembeli == 'eksternal' ? 'selected' : '' }}>Eksternal</option>
                </select>
                @error('tipe_pembeli')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nik_nim" class="block text-sm font-medium text-gray-700">NIK/NIM:</label>
                <input type="text" name="nik_nim" id="nik_nim" value="{{ old('nik_nim', $user->nik_nim) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('nik_nim') border-red-500 @enderror">
                @error('nik_nim')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="no_hp" class="block text-sm font-medium text-gray-700">No HP:</label>
                <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('no_hp') border-red-500 @enderror">
                @error('no_hp')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat:</label>
                <textarea name="alamat" id="alamat" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('alamat') border-red-500 @enderror">{{ old('alamat', $user->alamat) }}</textarea>
                @error('alamat')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="surat_persetujuan" class="block text-sm font-medium text-gray-700">Surat Persetujuan:</label>
                <input type="file" name="surat_persetujuan" id="surat_persetujuan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('surat_persetujuan') border-red-500 @enderror">
                @if($user->surat_persetujuan)
                <p class="text-sm text-gray-600 mt-1">File saat ini: <a href="{{ asset('storage/' . $user->surat_persetujuan) }}" target="_blank" class="text-blue-600 underline">Lihat File</a></p>
                @endif
                @error('surat_persetujuan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex space-x-4 mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                <a href="{{ route('admin.pengguna.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection