<?php

namespace App\Http\Controllers;

use App\Models\Unit_Bisnis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UnitBisnisController extends Controller
{

    public function index()
    {
        $units = Unit_Bisnis::all();
        return view('admin.unit_bisnis.index', compact('units'));
    }

    public function show($slug)
    {
        $unit = Unit_Bisnis::where('slug', $slug)->firstOrFail();
        return view('admin.unit_bisnis.show', compact('unit'));
    }

    public function edit($slug)
    {
        $unit = Unit_Bisnis::where('slug', $slug)->firstOrFail();
        $unitOptions = Unit_Bisnis::pluck('nama_unit', 'nama_unit')->toArray();
        return view('admin.unit_bisnis.edit', compact('unit', 'unitOptions'));
    }

    public function update(Request $request, $slug)
    {
        $unit = Unit_Bisnis::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'nama_unit' => 'required|string|in:Ruangan,Inventaris,Alat Tulis & Printing,Pengembangan Software,Kewirausahaan',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['nama_unit', 'deskripsi']);
        $data['slug'] = Str::slug($request->nama_unit);

        if ($request->hasFile('gambar')) {
            // Delete old image if it exists in storage
            if ($unit->gambar && str_starts_with($unit->gambar, 'unit_bisnis/')) {
                Storage::disk('public')->delete($unit->gambar);
            }
            $path = $request->file('gambar')->store('unit_bisnis', 'public');
            $data['gambar'] = $path;
        }

        $unit->update($data);

        return redirect()->route('unit_bisnis.index')->with('success', 'Unit Bisnis berhasil diperbarui');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit_Bisnis $unit_Bisnis)
    {
        //
    }
}
