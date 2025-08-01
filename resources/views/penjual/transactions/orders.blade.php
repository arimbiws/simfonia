@extends('penjual.layouts.app')
@section('title', 'Orders')
@section('content')

@if ($errors->any())
<div class="alert alert-danger mb-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li class="ps-5 py-5 bg-red-500 text-white font-bold">
            {{ $error }}
        </li>
        @endforeach

    </ul>
</div>
@endif


<div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-semibold">Daftar Transaksi</h2>
    <a href="{{ route('penjual.transactions.orders.download') }}" target="_blank"
        class="inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
        Download PDF
    </a>
</div>

<div class="item-product flex flex-row justify-between items-center relative overflow-x-auto">
    <table class="w-full text-left rtl:text-right">
        <thead class=" bg-gray-100  text-sm text-gray-700 uppercase">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Gambar
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Produk
                </th>
                <th scope="col" class="px-6 py-3">
                    Pembeli
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr class="bg-white border-b border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <img src=" {{ Storage::url($order->product->gambar) }}" class="h-[100px] w-[100px] rounded-2xl object-cover" alt="">

                </th>
                <td class="px-6 py-4">
                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold mb-2">{{ $order->product->nama }}</h3>
                        <p class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-indigo-700/10 ring-inset">
                            {{ $order->product->unit->nama_unit }}
                        </p>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <p class="text-gray-500">{{ $order->buyer->name }}</p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-indigo-950 text-lg font-bold">Rp{{ number_format($order->total_harga) }}</p>
                </td>
                <td class="px-6 py-4">
                    @if($order->status_transaksi)
                    <span class="py-1 px-3 rounded-full bg-green-500 text-white font-bold text-sm">
                        SUCCESS
                    </span>
                    @else
                    <span class="py-1 px-3 rounded-full bg-orange-500 text-white font-bold text-sm">
                        PENDING
                    </span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-row gap-x-3">
                        <a href="{{ route('penjual.transactions.order_details', $order) }}" class="py-3 px-5 bg-gray-500 text-white rounded-full">
                            Details
                        </a>
                    </div>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="5">
                    <p class="mt-7 text-gray-500 text-center">Belum ada pembelian produk yang dilakukan</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection