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

    public function checkoutBooking(Request $request)
    {
        $selectedProductId = $request->query('product_id');

        if (!$selectedProductId) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        $product = Product::where('id', $selectedProductId)
            ->whereIn('unit_bisnis_id', [1, 2])
            ->firstOrFail();

        return view('frontend.bookings.checkout-booking', [
            'product' => $product,
            'selectedProductId' => $selectedProductId,
        ]);
    }

    public function checkoutTransaction(Request $request)
    {
        $selectedProductId = $request->query('product_id');

        if (!$selectedProductId) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        $product = Product::where('id', $selectedProductId)
            ->whereNotIn('unit_bisnis_id', [1, 2])
            ->firstOrFail();

        return view('frontend.bookings.checkout-transaction', [
            'product' => $product
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $product = Product::findOrFail($request->product_id);

        // Validasi jumlah_item wajib
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah_item' => 'required|integer|min:1',
        ]);

        // Jika unit bisnis = ruangan/inventaris DAN pembeli eksternal, validasi semua kolom booking
        if (in_array($product->unit_bisnis_id, [1, 2]) && $user->tipe_pembeli === 'eksternal') {
            $request->validate([
                'tanggal_mulai' => 'required|date|after_or_equal:today',
                'tanggal_kembali' => 'required|date|after_or_equal:tanggal_mulai',
                'nama_kegiatan' => 'required',
                'instansi' => 'required',
                'nik_nim' => 'required|numeric',
                'nama_lengkap' => 'required|string',
                'email' => 'required|email',
                'no_hp' => 'required',
                'alamat' => 'required|string',
                'surat_pengajuan' => 'required|file|mimes:pdf,doc,docx|max:10240'
            ]);

            $filePath = $request->file('surat_pengajuan')->store('surat_pengajuan', 'public');

            $booking = Booking::create([
                'product_id' => $product->id,
                'pembeli_id' => $user->id,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_kembali' => $request->tanggal_kembali,
                'nama_kegiatan' => $request->nama_kegiatan,
                'instansi' => $request->instansi,
                'nik_nim' => $request->nik_nim,
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'surat_pengajuan' => $filePath,
            ]);

            // Simpan transaksi kosong (bukti bayar nanti)
            Transaction::create([
                'penjual_id' => $product->penjual_id,
                'pembeli_id' => $user->id,
                'product_id' => $product->id,
                'jumlah_item' => $request->jumlah_item,
                'booking_id' => $booking->id,
                'bukti_bayar' => '',
                'status_transaksi' => 0,
            ]);

            return redirect()->route('frontend.bookings.payment');
        }

        // Jika unit bisnis = ruangan/inventaris DAN pembeli internal, tidak butuh transaksi/bukti bayar
        if (in_array($product->unit_bisnis_id, [1, 2]) && $user->tipe_pembeli === 'internal') {
            $request->validate([
                'tanggal_mulai' => 'required|date|after_or_equal:today',
                'tanggal_kembali' => 'required|date|after_or_equal:tanggal_mulai',
                'nama_kegiatan' => 'required',
                'instansi' => 'required',
                'nik_nim' => 'required|numeric',
                'nama_lengkap' => 'required|string',
                'email' => 'required|email',
                'no_hp' => 'required',
                'alamat' => 'required|string',
                'surat_pengajuan' => 'required|file|mimes:pdf,doc,docx|max:10240'
            ]);

            $filePath = $request->file('surat_pengajuan')->store('surat_pengajuan', 'public');

            Booking::create([
                'product_id' => $product->id,
                'pembeli_id' => $user->id,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_kembali' => $request->tanggal_kembali,
                'nama_kegiatan' => $request->nama_kegiatan,
                'instansi' => $request->instansi,
                'nik_nim' => $request->nik_nim,
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'surat_pengajuan' => $filePath,
            ]);

            return redirect()->route('frontend.bookings.processed')->with('success', 'Booking berhasil diajukan, menunggu persetujuan.');
        }

        // Jika bukan ruangan/inventaris, buat langsung transaksi saja
        Transaction::create([
            'penjual_id' => $product->penjual_id,
            'pembeli_id' => $user->id,
            'product_id' => $product->id,
            'jumlah_item' => $request->jumlah_item,
            'bukti_bayar' => '',
            'status_transaksi' => 0,
        ]);

        return redirect()->route('frontend.bookings.payment');
    }

    public function uploadPayment(Request $request)
    {
        $request->validate([
            'booking_id' => 'nullable|exists:bookings,id',
            'bukti_bayar' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
        ]);

        $transaction = Transaction::where('pembeli_id', Auth::id())
            ->latest()->first();

        if (!$transaction) {
            return back()->withErrors('Tidak ditemukan transaksi.');
        }

        $filePath = $request->file('bukti_bayar')->store('bukti_bayar', 'public');
        $transaction->bukti_bayar = $filePath;
        $transaction->save();

        return redirect()->route('frontend.bookings.processed')
            ->with('success', 'Bukti bayar berhasil diupload. Menunggu validasi.');
    }

    public function payment()
    {
        return view('frontend.bookings.payment');
    }

    public function processed()
    {
        return view('frontend.bookings.processed');
    }
}
