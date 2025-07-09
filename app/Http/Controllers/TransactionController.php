<?php

namespace App\Http\Controllers;

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
}
