@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')
<div class="container mx-auto px-4 py-8">
    @if (session('success'))
    <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg shadow-sm">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">List of Products</h1>
        <a href="{{ route('admin.products.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New Product
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-50 text-gray-700 uppercase">
                    <tr>
                        <th class="px-6 py-4">Image</th>
                        <th class="px-6 py-4">Product Name</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4">Category</th>
                        <!-- <th class="px-6 py-4">Status</th> -->
                        <th class="px-6 py-4">Uploaded By</th>
                        <th class="px-6 py-4">Upload Date</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <img src="{{ Storage::url($product->gambar) }}" class="h-16 w-16 rounded-lg object-cover" alt="{{ $product->nama }}">
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-lg font-semibold text-gray-800">{{ $product->nama }}</div>
                        </td>
                        <td class="px-6 py-4">Rp{{ number_format($product->harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-indigo-700 bg-indigo-100 rounded-md">
                                {{ $product->unit->nama_unit }}
                            </span>
                        </td>
                        <!-- <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md
                                    {{ $product->status == 'tersedia' ? 'bg-green-100 text-green-700' : ($product->status == 'disewa' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                                    {{ ucfirst($product->status) }}
                                </span>
                            </td> -->
                        <td class="px-6 py-4">{{ $product->penjual->name }}</td>
                        <td class="px-6 py-4">{{ $product->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-3">
                                <a href="{{ route('admin.products.edit', $product) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">No products uploaded yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection