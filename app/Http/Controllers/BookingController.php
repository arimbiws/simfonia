<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        return view('frontend.bookings.index', []);
    }

    public function checkout()
    {
        return view('frontend.bookings.checkout', []);
    }

    public function payment()
    {
        return view('frontend.bookings.payment', []);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'nama_kegiatan' => 'required|string',
            'instansi' => 'required|string',
            'nama_lengkap' => 'required|string',
            'email' => 'required|email',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'surat_pengajuan' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $filePath = $request->hasFile('surat_pengajuan')
            ? $request->file('surat_pengajuan')->store('surat_pengajuan', 'public')
            : null;

        Booking::create([
            'product_id' => $validated['product_id'],
            'user_id' => Auth::id(),
            'tanggal_mulai' => $validated['tanggal_mulai'],
            'tanggal_selesai' => $validated['tanggal_selesai'],
            'nama_kegiatan' => $validated['nama_kegiatan'],
            'instansi' => $validated['instansi'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
            'alamat' => $validated['alamat'],
            'surat_pengajuan' => $filePath,
        ]);

        return redirect()->route('/')->with('success', 'Booking berhasil dikirim.');
    }
}
