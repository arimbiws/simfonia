@extends('admin.layouts.app')
@section('title', 'Orders')
@section('content')

@if ($errors->any())
<div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg">
    <strong class="font-semibold">Error!</strong>
    <ul class="list-disc list-inside mt-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="relative overflow-x-auto mt-8 bg-white shadow-md rounded-lg">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-semibold">Daftar Transaksi</h2>
        <a href="{{ route('admin.transactions.download') }}" target="_blank"
            class="inline-block px-4 py-2 bg-gray-600 text-white rounded hover:bg-red-700 transition">
            Download PDF
        </a>
    </div>
    <table class="w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-xs uppercase text-gray-600">
            <tr>
                <th scope="col" class="px-6 py-4">Gambar</th>
                <th scope="col" class="px-6 py-4">Nama Produk</th>
                <th scope="col" class="px-6 py-4">Pembeli</th>
                <th scope="col" class="px-6 py-4">Harga</th>
                <th scope="col" class="px-6 py-4">Tanggal Pembelian</th>
                <th scope="col" class="px-6 py-4">Tanggal Pengembalian</th>
                <th scope="col" class="px-6 py-4">Status</th>
                <!-- <th scope="col" class="px-6 py-4">Status Pengembalian</th> -->
                <th scope="col" class="px-6 py-4">Aksi</th>
                <!-- <th scope="col" class="px-6 py-4">Konfirmasi</th> -->
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-200">
                <td class="px-6 py-4">
                    @if($order->product && $order->product->gambar && file_exists(storage_path('app/public/' . $order->product->gambar)))
                    <img src="{{ Storage::url($order->product->gambar) }}" class="h-24 w-24 rounded-xl object-cover" alt="{{ $order->product->nama ?? 'No Name' }}">
                    @else
                    <p class="text-gray-500">Gambar tidak tersedia</p>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">{{ $order->product ? $order->product->nama : 'Produk Tidak Ditemukan' }}</h3>
                        <span class="inline-flex items-center mt-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                            {{ $order->product && $order->product->unit ? $order->product->unit->nama_unit : 'Unit Tidak Ditemukan' }}
                        </span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <p class="text-gray-600">
                        {{ $order->buyer ? $order->buyer->name : 'Pembeli Tidak Ditemukan' }}
                        <span class="text-xs font-medium text-gray-500">
                            ({{ $order->buyer ? ($order->buyer->tipe_pembeli ?? 'eksternal') : 'eksternal' }})
                        </span>
                    </p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-lg font-semibold text-gray-800">Rp{{ number_format($order->total_harga, 0, ',', '.') }}</p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-gray-600">
                        {{ $order->booking ? \Carbon\Carbon::parse($order->booking->tanggal_mulai)->format('d M Y') : \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-gray-600">
                        {{ optional($order->booking)->tanggal_kembali ? \Carbon\Carbon::parse($order->booking->tanggal_kembali)->format('d M Y') : '-' }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $order->status_transaksi ? 'bg-green-500 text-white' : 'bg-orange-500 text-white' }}">
                        {{ $order->status_transaksi ? 'SELESAI' : 'PENDING' }}
                    </span>
                </td>
                <!-- <td class="px-6 py-4">
                    @if($order->booking)
                    @php $status = $order->booking->status; @endphp
                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium
                        @switch($status)
                            @case('pending') bg-gray-300 text-gray-800 @break
                            @case('disetujui') bg-blue-300 text-blue-800 @break
                            @case('ditolak') bg-red-300 text-red-800 @break
                            @case('sedang digunakan') bg-yellow-300 text-yellow-800 @break
                            @case('pengembalian') bg-purple-300 text-purple-800 @break
                            @case('selesai') bg-green-300 text-green-800 @break
                            @default bg-gray-100 text-gray-800
                        @endswitch
                        ">
                        {{ ucfirst($status) }}
                    </span>
                    @else
                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-gray-200 text-gray-600">
                        Non-booking
                    </span>
                    @endif
                </td> -->
                <td class="px-6 py-4">
                    <a href="{{ route('admin.transactions.order_details', $order) }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-200">
                        Details
                    </a>
                </td>
                <!-- <td class="px-6 py-4">
                    @if($order->booking && $order->status_transaksi)
                    @php
                    $returnDate = \Carbon\Carbon::parse($order->booking->tanggal_kembali);
                    $today = \Carbon\Carbon::today();
                    @endphp
                    @if($order->booking->status == 'selesai')
                    <span class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg">
                        Done
                    </span>
                    @elseif($today->gt($returnDate) && $order->booking->status != 'selesai')
                    <span class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg cursor-not-allowed">
                        Report (No Login)
                    </span>
                    @elseif($order->booking->status != 'selesai')
                    <span class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg cursor-not-allowed">
                        Confirm Done (No Login)
                    </span>
                    @endif
                    @else
                    <span class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-600 rounded-lg cursor-not-allowed">
                        Non-Penyewaan
                    </span>
                    @endif
                </td> -->
            </tr>
            @empty
            <tr>
                <td colspan="10" class="py-10 text-center text-gray-500">Belum ada pembelian atau penyewaan produk yang dilakukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection