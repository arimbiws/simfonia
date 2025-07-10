<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use App\Models\Unit_Bisnis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardFrontendController extends Controller
{
    function dashboard()
    {
        $products = Product::orderBy('created_at', 'desc')->take(8)->get(); // Ambil 8 produk terbaru
        return view('frontend.dashboard', [
            'products' => $products
        ]);
    }


    public function katalog($unit_bisnis_id, Request $request)
    {
        $userId = Auth::id();
        $query = Product::where('unit_bisnis_id', $unit_bisnis_id);

        // Ambil unit bisnis spesifik
        $unit_bisnis = Unit_Bisnis::findOrFail($unit_bisnis_id);

        // Ambil semua unit bisnis (untuk filter dropdown)
        $unitBisnisList = Unit_Bisnis::all();

        // Filter
        if ($request->has('search')) {
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

        $products =  Product::where('unit_bisnis_id', $unit_bisnis_id)
            ->where('penjual_id', '!=', $userId)  // Hanya produk yang bukan milik user
            ->get()->paginate(12);

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


    function check_bookings()
    {
        return view('frontend.bookings.check-bookings', []);
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
