@extends('admin.layouts.app')

@section('title', 'Daftar Pengguna')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-semibold">Daftar Pengguna</h2>
        <a href="{{ route('admin.pengguna.download', request()->only(['role', 'tipe', 'search'])) }}" target="_blank"
            class="inline-block px-4 py-2 bg-gray-600 text-white rounded hover:bg-red-700 transition">
            Download PDF
        </a>
    </div>
    <!-- Filter & Search Form -->
    <form method="GET" action="{{ route('admin.pengguna.index') }}" class="flex flex-wrap items-end gap-4 mb-4">
        <div>
            <label for="role" class="block text-sm font-medium text-gray-700">Filter Role:</label>
            <select name="role" id="role" class="mt-1 block w-44 border-gray-300 rounded-md shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="" disabled selected class="text-gray-400 font-normal">Select Role</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="penjual" {{ request('role') == 'penjual' ? 'selected' : '' }}>Penjual</option>
                <option value="pembeli" {{ request('role') == 'pembeli' ? 'selected' : '' }}>Pembeli</option>
            </select>
        </div>

        <div>
            <label for="tipe" class="block text-sm font-medium text-gray-700">Filter Tipe Pembeli:</label>
            <select name="tipe" id="tipe" class="mt-1 block w-44 border-gray-300 rounded-md shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="" disabled selected class="text-gray-400 font-normal">Select Tipe Pembeli</option>
                <option value="internal" {{ request('tipe') == 'internal' ? 'selected' : '' }}>Internal</option>
                <option value="eksternal" {{ request('tipe') == 'eksternal' ? 'selected' : '' }}>Eksternal</option>
            </select>
        </div>

        <div class="flex-1 min-w-[200px]">
            <label for="search" class="block mt-1  text-sm  font-medium text-gray-700">Cari NIK/NIM, Nama, atau Email:</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-400 placeholder:font-normal"
                placeholder="Contoh: 123456 atau Agus atau agus@email.com">
        </div>

        <div>
            <button type="submit" class="mt-6 px-4 py-2 bg-blue-600 text-white rounded">Terapkan</button>
        </div>
    </form>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-center align-middle">ID</th>
                    <th class="px-4 py-2 text-center align-middle">Nama</th>
                    <th class="px-4 py-2 text-center align-middle">Email</th>
                    <th class="px-4 py-2 text-center align-middle">Role</th>
                    <th class="px-4 py-2 text-center align-middle">Tipe</th>
                    <th class="px-4 py-2 text-center align-middle">NIK/NIM</th>
                    <th class="px-4 py-2 text-center align-middle">No HP</th>
                    <th class="px-4 py-2 text-center align-middle">Alamat</th>
                    <th class="px-4 py-2 text-center align-middle">Tanggal Daftar</th>
                    <th class="px-4 py-2 text-center align-middle">Aksi</th>

                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($users as $index => $user)
                <tr class="hover:bg-gray-50 transition duration-200 ease-in-out">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2 capitalize">{{ $user->role }}</td>
                    <td class="px-4 py-2 capitalize">{{ $user->tipe_pembeli ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $user->nik_nim }}</td>
                    <td class="px-4 py-2">{{ $user->no_hp }}</td>
                    <td class="px-4 py-2">{{ $user->alamat }}</td>
                    <td class="px-4 py-2">{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</td>
                    <td class="px-4 py-2">
                        <div class="flex space-x-2 p-2 bg-gray-50 border border-gray-200 rounded-md shadow-sm">
                            <a href="{{ route('admin.pengguna.detail', $user->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-150 ease-in-out">Lihat</a>
                            <a href="{{ route('admin.pengguna.edit', $user->id) }}" class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition duration-150 ease-in-out">Edit</a>
                            <form action="{{ route('admin.pengguna.delete', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition duration-150 ease-in-out">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="px-4 py-4 text-center text-gray-500">Tidak ada pengguna ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection