<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::where('pembeli_id', Auth::id())->get();  // untuk mengambil data produk yg kita beli dari creator lain (kita sbg buyer)
        return view('admin.transactions.index', [
            'transactions' => $transactions
        ]);
    }

    public function orders()
    {
        $orders = Transaction::with(['product.unit', 'buyer', 'booking'])
            ->where('penjual_id', Auth::id())
            ->get();

        foreach ($orders as $order) {
            if ($order->booking) {
                $now = now();
                $mulai = \Carbon\Carbon::parse($order->booking->tanggal_mulai);
                $kembali = \Carbon\Carbon::parse($order->booking->tanggal_kembali);

                if ($order->booking->status === 'disetujui') {
                    if ($now->between($mulai, $kembali)) {
                        $order->booking->status = 'sedang digunakan';
                        $order->booking->save();
                    } elseif ($now->gt($kembali)) {
                        $order->booking->status = 'pengembalian';
                        $order->booking->save();
                    }
                }
            }
        }

        return view('admin.transactions.orders', [
            'orders' => $orders
        ]);
    }


    // Riwayat transaksi pembeli
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class);
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
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('admin.transactions.details', [
            'transaction' => $transaction
        ]);
    }
    public function order_details(Transaction $transaction)
    {
        return view('admin.transactions.order_details', [
            'order' => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update(['status_transaksi' => true]);

        // Jika transaksi memiliki booking → tolak booking lain yang bentrok
        if ($transaction->booking) {
            $booking = $transaction->booking;

            Booking::where('product_id', $booking->product_id)
                ->where('id', '!=', $booking->id)
                ->where('status', 'pending')
                ->where(function ($q) use ($booking) {
                    $q->whereBetween('tanggal_mulai', [$booking->tanggal_mulai, $booking->tanggal_kembali])
                        ->orWhereBetween('tanggal_kembali', [$booking->tanggal_mulai, $booking->tanggal_kembali])
                        ->orWhere(function ($q2) use ($booking) {
                            $q2->where('tanggal_mulai', '<=', $booking->tanggal_mulai)
                                ->where('tanggal_kembali', '>=', $booking->tanggal_kembali);
                        });
                })
                ->update(['status' => 'ditolak']);
        }

        return redirect()->route('admin.transactions.orders')->with('message', 'Payment is successfully approved!');
    }



    // Method baru untuk konfirmasi pengembalian
    public function confirmReturn(Transaction $transaction)
    {
        // Pastikan transaksi memiliki booking
        if (!$transaction->booking) {
            return redirect()->back()->with('error', 'Transaksi ini bukan penyewaan!');
        }

        // Update status booking menjadi selesai
        $transaction->booking->update([
            'status' => 'selesai',
            'tanggal_pengembalian_aktual' => now()
        ]);

        return redirect()->back()->with('success', 'Pengembalian berhasil dikonfirmasi!');
    }

    // Method baru untuk report keterlambatan
    public function reportLate(Transaction $transaction)
    {
        // Pastikan transaksi memiliki booking
        if (!$transaction->booking) {
            return redirect()->back()->with('error', 'Transaksi ini bukan penyewaan!');
        }

        // Update status booking dengan report
        $transaction->booking->update([
            'status' => 'terlambat',
            'reported_at' => now()
        ]);

        // Anda bisa menambahkan logic lain seperti:
        // - Mengirim notifikasi ke pembeli
        // - Menghitung denda keterlambatan
        // - Log ke sistem

        return redirect()->back()->with('success', 'Keterlambatan berhasil dilaporkan!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function penjualIndex()
    {
        $transactions = Transaction::where('penjual_id', Auth::id())
            ->with(['product.unit', 'buyer'])
            ->orderBy('created_at', 'desc')
            ->get();  // untuk mengambil data transaksi produk yang kita jual

        $transactions = Transaction::where('pembeli_id', Auth::id())->get();  // untuk mengambil data produk yg kita beli dari creator lain (kita sbg buyer)
        return view('penjual.transactions.index', [
            'transactions' => $transactions
        ]);
    }

    /**
     * Display orders for penjual.
     */
    public function penjualOrders()
    {
        $orders = Transaction::where('penjual_id', Auth::id())->get();  // untuk mengambil data orang yg beli produk kita
        return view('penjual.transactions.orders', [
            'orders' => $orders
        ]);
    }

    /**
     * Display transaction details for penjual.
     */
    public function penjualTransactionDetails(Transaction $transaction)
    {
        return view('penjual.transactions.details', [
            'transaction' => $transaction
        ]);
    }

    /**
     * Display order details for penjual.
     */
    public function penjualOrderDetails(Transaction $transaction)
    {
        return view('penjual.transactions.order_details', [
            'order' => $transaction
        ]);
    }

    /**
     * Update transaction status for penjual.
     */
    public function penjualUpdate(Request $request, Transaction $transaction)
    {
        $transaction->update(['status_transaksi' => true]);
        return redirect()->route('penjual.transactions.orders')->with('message', 'Payment is successfully approved!');
    }


    // Method untuk penjual konfirmasi pengembalian
    public function penjualConfirmReturn(Transaction $transaction)
    {
        // Pastikan transaksi milik penjual yang login
        if ($transaction->penjual_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke transaksi ini!');
        }

        // Pastikan transaksi memiliki booking
        if (!$transaction->booking) {
            return redirect()->back()->with('error', 'Transaksi ini bukan penyewaan!');
        }

        // Update status booking menjadi selesai
        $transaction->booking->update([
            'status' => 'selesai',
            'tanggal_pengembalian_aktual' => now()
        ]);

        return redirect()->back()->with('success', 'Pengembalian berhasil dikonfirmasi!');
    }

    // Method untuk penjual report keterlambatan
    public function penjualReportLate(Transaction $transaction)
    {
        // Pastikan transaksi milik penjual yang login
        if ($transaction->penjual_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke transaksi ini!');
        }

        // Pastikan transaksi memiliki booking
        if (!$transaction->booking) {
            return redirect()->back()->with('error', 'Transaksi ini bukan penyewaan!');
        }

        // Update status booking dengan report
        $transaction->booking->update([
            'status' => 'terlambat',
            'reported_at' => now()
        ]);

        return redirect()->back()->with('success', 'Keterlambatan berhasil dilaporkan!');
    }


    /**
     * Download file for penjual.
     */
    public function penjualDownloadFile(Transaction $transaction)
    {
        return Storage::download($transaction->bukti_transfer);
    }

    /**
     * Display transaction details for admin.
     */
    public function transaction_details(Transaction $transaction)
    {
        return view('admin.transactions.details', [
            'transaction' => $transaction
        ]);
    }

    /**
     * Download file for admin.
     */
    public function download_file(Transaction $transaction)
    {
        return Storage::download($transaction->bukti_transfer);
    }


    public function download(Request $request)
    {
        $transactions = Transaction::with(['product.unit', 'buyer', 'booking'])
            ->orderBy('created_at', 'desc')
            ->get();

        $pdf = FacadePdf::loadView('admin.transactions.pdf', compact('transactions'));

        return $pdf->download('laporan_transaksi.pdf');
    }

    public function penjualDownload()
    {
        $orders = Transaction::with(['product.unit', 'buyer', 'booking'])
            ->where('penjual_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        $pdf = FacadePdf::loadView('penjual.transactions.pdf', compact('orders'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan_transaksi_penjual.pdf');
    }
}
