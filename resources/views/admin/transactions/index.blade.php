@extends('admin.layouts.app')
@section('title', 'My Transactions')
@section('content')
<pre>{{ dd($transactions) }}</pre>

@if ($errors->any())
<div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
    <strong class="font-bold">Error!</strong>
    <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="relative overflow-x-auto mt-10">
    <table class="w-full text-left rtl:text-right">
        <thead class="bg-gray-100 text-sm text-gray-700 uppercase">
            <tr>
                <th scope="col" class="px-6 py-3">Gambar</th>
                <th scope="col" class="px-6 py-3">Nama Produk</th>
                <th scope="col" class="px-6 py-3">Penjual</th>
                <th scope="col" class="px-6 py-3">Harga</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $transaction)
            <tr class="bg-white border-b border-gray-200 hover:bg-gray-100 transition duration-300">
                <td class="px-6 py-4">
                    @if($transaction->product && file_exists(storage_path('app/public/' . $transaction->product->gambar)))
                        <img src="{{ Storage::url($transaction->product->gambar) }}" class="h-[100px] w-[100px] rounded-2xl object-cover" alt="{{ $transaction->product->nama ?? 'No Name' }}">
                    @else
                        <p class="text-gray-500">Gambar tidak tersedia</p>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold mb-2">{{ $transaction->product->nama ?? 'Produk Tidak Ditemukan' }}</h3>
                        <p class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-indigo-700/10 ring-inset">
                            {{ $transaction->product->unit->nama_unit ?? 'Unit Tidak Ditemukan' }}
                        </p>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <p class="text-gray-500">{{ $transaction->seller->name ?? 'Penjual Tidak Ditemukan' }}</p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-indigo-950 text-lg font-bold">Rp{{ number_format($transaction->total_harga) }}</p>
                </td>
                <td class="px-6 py-4">
                    @if($transaction->status_transaksi)
                        <span class="py-1 px-3 rounded-full bg-green-500 text-white font-bold text-sm">SUCCESS</span>
                    @else
                        <span class="py-1 px-3 rounded-full bg-orange-500 text-white font-bold text-sm">PENDING</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.transaction.show', $transaction) }}" class="py-3 px-5 bg-gray-500 text-white rounded-full hover:bg-gray-600 transition duration-300">Details</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="py-10 text-center text-gray-500">Belum ada pembelian produk yang dilakukan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection