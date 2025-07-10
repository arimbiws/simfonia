<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function details(Request $request)
    {
        $product = $request->has('product_id') ? Product::find($request->product_id) : null;


        return view('frontend.bookings.details', [
            'product' => $product
        ]);
    }

    public function checkConflict(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'mulai' => 'required|date',
            'kembali' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $start = Carbon::parse($request->mulai . ' ' . $request->jam_mulai);
        $end = Carbon::parse($request->kembali . ' ' . $request->jam_selesai);

        $conflict = Booking::where('product_id', $request->product_id)
            ->where(function ($query) use ($start, $end) {
                $query->whereBetween('tanggal_mulai', [$start, $end])
                    ->orWhereBetween('tanggal_kembali', [$start, $end])
                    ->orWhere(function ($q) use ($start, $end) {
                        $q->where('tanggal_mulai', '<=', $start)
                            ->where('tanggal_kembali', '>=', $end);
                    });
            })->exists();

        return response()->json(['conflict' => $conflict]);
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
                'jam_mulai' => 'required|date_format:H:i',
                'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
                'nama_kegiatan' => 'required',
                'instansi' => 'required',
                'nik_nim' => 'required|numeric',
                'nama_lengkap' => 'required|string',
                'email' => 'required|email',
                'no_hp' => 'required',
                'alamat' => 'required|string',
                'surat_pengajuan' => 'required|file|mimes:pdf,doc,docx|max:10240'
            ]);

            $request->merge([
                'tanggal_mulai' => Carbon::parse("{$request->tanggal_mulai} {$request->jam_mulai}"),
                'tanggal_kembali' => Carbon::parse("{$request->tanggal_kembali} {$request->jam_selesai}"),
            ]);

            //jika terdapat tanggal bentrok
            $conflict = Booking::where('product_id', $product->id)
                ->where(function ($q) use ($request) {
                    $q->whereBetween('tanggal_mulai', [$request->tanggal_mulai, $request->tanggal_kembali])
                        ->orWhereBetween('tanggal_kembali', [$request->tanggal_mulai, $request->tanggal_kembali])
                        ->orWhere(function ($q2) use ($request) {
                            $q2->where('tanggal_mulai', '<=', $request->tanggal_mulai)
                                ->where('tanggal_kembali', '>=', $request->tanggal_kembali);
                        });
                })->exists();

            if ($conflict) {
                return back()->withErrors(['Tanggal & jam sudah dibooking. Mohon memilih waktu lain.'])->withInput();
            }


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
                'nama_bank' => '',
                'nama_akun_bank' => '',
                'nomor_rekening' => '',
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

            $booking = Booking::create([
                'product_id' => $product->id,
                'pembeli_id' => $user->id,
                'tanggal_mulai' => Carbon::parse($request->tanggal_mulai . ' ' . $request->jam_mulai),
                'tanggal_kembali' => Carbon::parse($request->tanggal_kembali . ' ' . $request->jam_selesai),
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
            'nama_bank' => 'required|string|max:255',
            'nama_akun_bank' => 'required|string|max:255',
            'nomor_rekening' => 'required|numeric',
        ]);

        $transaction = Transaction::where('pembeli_id', Auth::id())
            ->latest()->first();

        if (!$transaction) {
            return back()->withErrors('Tidak ditemukan transaksi.');
        }

        $filePath = $request->file('bukti_bayar')->store('bukti_bayar', 'public');

        $transaction->update([
            'bukti_bayar' => $filePath,
            'nama_bank' => $request->nama_bank,
            'nama_akun_bank' => $request->nama_akun_bank,
            'nomor_rekening' => $request->nomor_rekening,
        ]);

        return redirect()->route('frontend.bookings.processed')
            ->with('success', 'Bukti bayar berhasil diupload. Menunggu validasi.');
    }

    public function payment()
    {

        $transaction = Transaction::where('pembeli_id', Auth::id())
            ->latest()->first();

        if (!$transaction) {
            return redirect()->back()->withErrors('Transaksi tidak ditemukan.');
        }


        $product = Product::find($transaction->product_id);
        $harga = $product->harga;
        $jumlahItem = $transaction->jumlah_item;
        $subtotal = $harga * $jumlahItem;
        $biayaLayanan = 2000;
        $total = $subtotal + $biayaLayanan;

        return view('frontend.bookings.payment', compact(
            'transaction',
            'product',
            'harga',
            'jumlahItem',
            'subtotal',
            'biayaLayanan',
            'total'
        ));
    }

    public function processed()
    {
        return view('frontend.bookings.processed');
    }

    // Riwayat booking
    public function check()
    {
        $transactions = Transaction::with('product')->where('user_id', auth()->id())->get();

        return view('frontend.bookings.check', compact('transactions'));
    }
}
