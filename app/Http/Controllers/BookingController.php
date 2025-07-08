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
        // Ambil hanya produk unit bisnis Ruangan (1) dan Inventaris (2)
        $products = \App\Models\Product::whereIn('unit_bisnis_id', [1, 2])->get();

        return view('frontend.bookings.checkout', [
            'products' => $products,
        ]);
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
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_mulai',
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

        $booking = Booking::create([
            'product_id' => $validated['product_id'],
            'pembeli_id' => Auth::id(),
            'tanggal_mulai' => $validated['tanggal_mulai'],
            'tanggal_kembali' => $validated['tanggal_kembali'],
            'nama_kegiatan' => $validated['nama_kegiatan'],
            'instansi' => $validated['instansi'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
            'alamat' => $validated['alamat'],
            'surat_pengajuan' => $filePath,
        ]);

        // Ambil unit bisnis dari product
        $product = \App\Models\Product::find($validated['product_id']);

        if (in_array($product->unit_bisnis_id, [1, 2])) {
            // Buat transaksi otomatis untuk booking ini
            \App\Models\Transaction::create([
                'penjual_id' => $product->penjual_id,
                'pembeli_id' => Auth::id(),
                'product_id' => $product->id,
                'bukti_bayar' => '', // kosong dulu, user upload nanti
                'booking_id' => $booking->id,
                'jumlah_item' => 1,
                'total_harga' => $product->harga, // akan di-trigger lagi di DB
                'status_transaksi' => 0,
            ]);
        }

        return redirect()->route('frontend.bookings.payment')
            ->with('success', 'Booking berhasil dibuat, silakan lakukan pembayaran.');
    }
}
