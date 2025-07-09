<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function details(Request $request)
    {
        $product = null;
        if ($request->has('product_id')) {
            $product = Product::find($request->product_id);
        }

        return view('frontend.bookings.details', [
            'product' => $product
        ]);
    }


    public function checkout(Request $request)
    {
        $selectedProductId = $request->query('product_id');
        $products = Product::whereIn('unit_bisnis_id', [1, 2])->get();

        return view('frontend.bookings.checkout', [
            'products' => $products,
            'selectedProductId' => $selectedProductId,
        ]);
    }


    public function payment()
    {
        return view('frontend.bookings.payment', []);
    }

    function processed()
    {
        return view('frontend.bookings.processed', []);
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
            'surat_pengajuan' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB = 10240 KB

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
        $product = Product::find($validated['product_id']);

        if (in_array($product->unit_bisnis_id, [1, 2])) {
            // Buat transaksi otomatis untuk booking ini
            Transaction::create([
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

    public function uploadPayment(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'bukti_bayar' => 'required|file|mimes:jpg,png,jpeg,pdf',
        ]);

        $filePath = $request->file('bukti_bayar')->store('bukti_bayar', 'public');

        $transaction = Transaction::where('booking_id', $request->booking_id)->firstOrFail();
        $transaction->bukti_bayar = $filePath;
        $transaction->save();

        return redirect()->route('frontend.bookings.processed')->with('success', 'Bukti pembayaran berhasil diupload, silahkan menunggu penjual menyetujui pemesanan anda!');
    }
}
