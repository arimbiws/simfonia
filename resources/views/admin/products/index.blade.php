<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-10 sm:rounded-lg">

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


                <div class="flex flex-row justify-between items-center mb-5">
                    <h3 class="text-indigo-950 font-bold text-3xl">List of Products</h3>
                    <a href="{{ route('admin.products.create') }}" class="rounded-full  w-fit py-3 px-5 bg-indigo-500 text-white">Add New Product</a>
                </div>

                <div class="item-product flex items-center mt-10">
                    <table class="table-auto w-full ">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody class="items-center ">
                            @forelse($products as $product)
                            <tr>
                                <td> <img src="{{ Storage::url(path: $product->gambar) }}" class="h-[120px] w-[120px]" alt="">
                                </td>
                                <td>
                                    <div class="">
                                        <h3 class="font-bold text-xl">{{ $product->nama }}</h3>
                                        <p class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-indigo-700/10 ring-inset">{{ $product->unit->nama_unit }}</p>
                                        <!-- <p>{{ $product->penjual->name }}</p>    -->
                                    </div>
                                </td>
                                <td>
                                    <p>Rp {{ $product->harga }}</p>
                                </td>
                                <td>
                                    <div class="flex flex-row gap-x-3">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="rounded-full py-3 px-5 bg-yellow-500 text-white">Edit</a>
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-full py-3 px-5 bg-red-500 text-white">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <p class="mt-8">Belum ada produk tersedia</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>