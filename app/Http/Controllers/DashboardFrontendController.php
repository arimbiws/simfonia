<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Unit_Bisnis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardFrontendController extends Controller
{
    function dashboard()
    {
        $products = Product::orderBy('created_at', 'desc')->take(8)->get(); // Ambil 8 produk terbaru
        return view('frontend.dashboard', [
            'totalUsers' => User::count(),
            'totalUnits' => Unit_Bisnis::count(),
            'totalProducts' => Product::count(),
            'totalTransactions' => Transaction::count(),
            'products' => Product::latest()->take(8)->get(),
        ]);
    }

    public function katalog($unit_bisnis_id, Request $request)
    {
        $userId = Auth::id();

        $query = Product::where('unit_bisnis_id', $unit_bisnis_id)
            ->where('penjual_id', '!=', $userId);  // Hanya produk yang bukan milik user

        // Ambil unit bisnis spesifik
        $unit_bisnis = Unit_Bisnis::findOrFail($unit_bisnis_id);

        // Ambil semua unit bisnis (untuk filter dropdown)
        $unitBisnisList = Unit_Bisnis::all();

        // Filter pencarian
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // Sort
        if ($request->sort === 'harga_asc') {
            $query->orderBy('harga', 'asc');
        } elseif ($request->sort === 'harga_desc') {
            $query->orderBy('harga', 'desc');
        } elseif ($request->sort === 'terbaru') {
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(12); // 12 items per page

        return view('frontend.unit_bisnis.katalog', [
            'products' => $products,
            'unit_bisnis' => $unit_bisnis,
            'unitBisnisList' => $unitBisnisList,
            'unit_bisnis_id' => $unit_bisnis_id, // untuk reset filter
        ]);
    }

    public function all_katalog(Request $request)
    {
        $userId = Auth::id();
        $query = Product::query();

        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        if ($request->sort === 'harga') {
            $query->orderBy('harga');
        } elseif ($request->sort === 'terbaru') {
            $query->orderBy('created_at', 'desc');
        }

        $products = Product::where('penjual_id', '!=', $userId)  // Semua produk selain milik user
            ->get();

        return view('frontend.unit_bisnis.all-katalog', [
            'products' => $products
        ]);
    }


    function check_purchase()
    {
        $query = Transaction::with('product')
            ->where('pembeli_id', auth()->id());

        // Jika user memilih filter status
        if (request('status') !== null && request('status') !== '') {
            $query->where('status_transaksi', request('status'));
        }

        if (request('start_date')) {
            $query->whereDate('created_at', '>=', request('start_date'));
        }
        if (request('end_date')) {
            $query->whereDate('created_at', '<=', request('end_date'));
        }

        if (request('keyword')) {
            $query->whereHas('product', function ($q) {
                $q->where('nama', 'like', '%' . request('keyword') . '%');
            });
        }
        $transactions = $query->latest()->get();
        return view('frontend.bookings.check-purchase', compact('transactions'));
    }

    function calendar(Request $request)
    {

        return view('frontend.calendar', []);
    }

    function fetchEvents(Request $request)
    {

        $bookings = Booking::select('nama_kegiatan', 'tanggal_mulai', 'tanggal_kembali', 'nama_lengkap')
            ->whereDate('tanggal_mulai', '>=', $request->start)
            ->whereDate('tanggal_kembali', '<=', $request->end)
            ->get();

        $events = [];

        foreach ($bookings as $booking) {
            $events[] = [
                'title' => $booking->nama_kegiatan . ' - ' . $booking->nama_lengkap,
                'start' => $booking->tanggal_mulai,
                'end'   => date('Y-m-d', strtotime($booking->tanggal_kembali . ' +1 day')), // untuk FullCalendar
            ];
        }

        return response()->json($events);
    }
}
