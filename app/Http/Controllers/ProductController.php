<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Unit_Bisnis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource for admin.
     */
    public function adminIndex()
    {
        $products = Product::where('penjual_id', Auth::id())->get();
        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Display a listing of the resource for seller.
     */
    public function sellerIndex()
    {
        $products = Product::where('penjual_id', Auth::id())->get();
        return view('penjual.products.index', [
            'products' => $products,
        ]);
    }


    /**
     * Show the form for creating a new resource for admin.
     */
    public function adminCreate()
    {
        $unit_bisnis = Unit_Bisnis::all();

        return view('admin.products.create', [
            'unit_bisnis' => $unit_bisnis
        ]);
    }

    /**
     * Show the form for creating a new resource for seller.
     */
    public function sellerCreate()
    {
        $unit_bisnis = Unit_Bisnis::all();

        return view('penjual.products.create', [
            'unit_bisnis' => $unit_bisnis
        ]);
    }

    /**
     * Store a newly created resource in storage for admin.
     */
    public function adminStore(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'gambar' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'harga' => ['required', 'integer', 'min:0'],
            'deskripsi' => ['required', 'string', 'max:65535'],
            'unit_bisnis_id' => ['required', 'integer'],
        ]);

        DB::beginTransaction();

        try {
            if ($request->hasFile('gambar')) {
                $gambarPath = $request->file('gambar')->store('product_gambar', 'public');
                $validated['gambar'] = $gambarPath;
            }
            $validated['slug'] = Str::slug($request->nama);
            $validated['penjual_id'] = Auth::id();
            $newProduct = Product::create($validated);
            DB::commit();

            return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                'system_error' => ['System Error!' . $e->getMessage()],
            ]);

            throw $error;
        }
    }

    /**
     * Store a newly created resource in storage for seller.
     */
    public function sellerStore(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'gambar' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'harga' => ['required', 'integer', 'min:0'],
            'deskripsi' => ['required', 'string', 'max:65535'],
            'unit_bisnis_id' => ['required', 'integer'],
        ]);

        DB::beginTransaction();

        try {
            if ($request->hasFile('gambar')) {
                $gambarPath = $request->file('gambar')->store('product_gambar', 'public');
                $validated['gambar'] = $gambarPath;
            }
            $validated['slug'] = Str::slug($request->nama);
            $validated['penjual_id'] = Auth::id();
            $newProduct = Product::create($validated);
            DB::commit();

            return redirect()->route('penjual.products.index')->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                'system_error' => ['System Error!' . $e->getMessage()],
            ]);

            throw $error;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource for admin.
     */
    public function adminEdit(Product $product)
    {
        $unit_bisnis = Unit_Bisnis::all();

        return view('admin.products.edit', [
            'product' => $product,
            'unit_bisnis' => $unit_bisnis,
        ]);
    }

    /**
     * Show the form for editing the specified resource for seller.
     */
    public function sellerEdit(Product $product)
    {
        $unit_bisnis = Unit_Bisnis::all();

        return view('penjual.products.edit', [
            'product' => $product,
            'unit_bisnis' => $unit_bisnis,
        ]);
    }

    /**
     * Update the specified resource in storage for admin.
     */
    public function adminUpdate(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'gambar' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'],
            'deskripsi' => ['required', 'string', 'max:65535'],
            'unit_bisnis_id' => ['required', 'integer'],
            'harga' => ['required', 'integer', 'min:0'],
        ]);

        DB::beginTransaction();

        try {
            if ($request->hasFile('gambar')) {
                $gambarPath = $request->file('gambar')->store('product_gambar', 'public');
                $validated['gambar'] = $gambarPath;
            }
            $validated['slug'] = Str::slug($request->nama);
            $validated['penjual_id'] = Auth::id();

            $product->update($validated);

            DB::commit();

            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                'system_error' => ['System Error!' . $e->getMessage()],
            ]);

            throw $error;
        }
    }

    /**
     * Update the specified resource in storage for seller.
     */
    public function sellerUpdate(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'gambar' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'],
            'deskripsi' => ['required', 'string', 'max:65535'],
            'unit_bisnis_id' => ['required', 'integer'],
            'harga' => ['required', 'integer', 'min:0'],
        ]);

        DB::beginTransaction();

        try {
            if ($request->hasFile('gambar')) {
                $gambarPath = $request->file('gambar')->store('product_gambar', 'public');
                $validated['gambar'] = $gambarPath;
            }
            $validated['slug'] = Str::slug($request->nama);
            $validated['penjual_id'] = Auth::id();

            $product->update($validated);

            DB::commit();

            return redirect()->route('penjual.products.index')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                'system_error' => ['System Error!' . $e->getMessage()],
            ]);

            throw $error;
        }
    }

    /**
     * Remove the specified resource from storage for admin.
     */
    public function adminDestroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('admin.products.index')->with('success', 'Product is deleted!');
        } catch (\Exception $e) {
            $error = ValidationException::withMessages([
                'system_error' => ['System Error!' . $e->getMessage()],
            ]);

            throw $error;
        }
    }

    /**
     * Remove the specified resource from storage for seller.
     */
    public function sellerDestroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('penjual.products.index')->with('success', 'Product is deleted!');
        } catch (\Exception $e) {
            $error = ValidationException::withMessages([
                'system_error' => ['System Error!' . $e->getMessage()],
            ]);

            throw $error;
        }
    }
}
