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


    public function download_file(Transaction $transaction)
    {
        $user_id = Auth::id();
        $product_id = $transaction->product_id;

        $paidTransactionExist = Transaction::where('pembeli_id', $user_id)->where('product_id', $product_id)->where('is_paid', 1)->first();


        if (!$paidTransactionExist) {
            session()->flash('error', 'You must pay the purchase before downloading!');
            return redirect()->back();
        }

        $productDetails = Product::find($product_id);

        $filePath = $productDetails->path_file;

        if (!Storage::disk('public')->exists($filePath)) {
            abort(404);
        }

        return Storage::disk('public')->download($filePath);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
