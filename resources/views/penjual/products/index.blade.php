@extends('penjual.layouts.app')
@section('title', 'Products ')
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


<div class="flex flex-row justify-between items-center mb-10">
    <!-- <h3 class="text-indigo-950 font-bold text-3xl">List of Products</h3> -->
    <a href="{{ route('penjual.products.create') }}" class="rounded-full w-fit py-3 px-5 bg-indigo-500 text-white">Add New Product</a>
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
                    Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr class="bg-white border-b border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    @if($product->gambar)
                    <img src="{{ Storage::url($product->gambar) }}" class="h-[100px] w-[100px] rounded-2xl object-cover" alt="{{ $product->nama }}">
                    @else
                    <div class="h-[100px] w-[100px] rounded-2xl bg-gray-200 flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    @endif
                </th>
                <td class="px-6 py-4">
                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold mb-2">{{ $product->nama }}</h3>
                        <p class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-indigo-700/10 ring-inset">
                            {{ $product->unit->nama_unit }}
                        </p>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <p class="text-indigo-950 text-lg font-bold">Rp{{ number_format($product->harga ) }}</p>
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-row gap-x-3">
                        <a href="{{ route('penjual.products.edit', $product) }}" class="rounded-full py-3 px-5 bg-yellow-500 text-white">Edit</a>
                        <form action="{{ route('penjual.products.destroy', $product) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-full py-3 px-5 bg-red-500 text-white">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">
                    <p class="mt-7 text-gray-500 text-center">Belum ada produk yang diunggah</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection