<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $orders = Transaction::where('penjual_id', Auth::id())->get();  // untuk mengambil data orang yg beli produk kita
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
        return redirect()->route('admin.transactions.orders')->with('message', 'Payment is successfully approved!');
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
}
