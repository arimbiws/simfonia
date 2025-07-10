<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\Unit_Bisnis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $my_products = Product::where('penjual_id', Auth::id())->get();
        $my_revenue = Transaction::where('penjual_id', Auth::id())->where('status_transaksi', 1)->sum('total_harga');
        $orders_success = Transaction::where('penjual_id', Auth::id())->where('status_transaksi', 1)->get();


        // Prepare chart data
        $labels = [];
        $orderCounts = [];
        $revenueTotals = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i)->format('Y-m-d');
            $labels[] = Carbon::parse($date)->format('d M');

            $orders = Transaction::where('penjual_id', Auth::id())
                ->where('status_transaksi', 1)
                ->whereDate('created_at', $date)
                ->count();

            $revenue = Transaction::where('penjual_id', Auth::id())
                ->where('status_transaksi', 1)
                ->whereDate('created_at', $date)
                ->sum('total_harga');

            $orderCounts[] = $orders;
            $revenueTotals[] = $revenue;
        }

        $chartData = [
            'labels' => $labels,
            'orders' => $orderCounts,
            'revenue' => $revenueTotals,
        ];

        return view('admin.dashboard', [
            'my_products' => $my_products,
            'my_revenue' => $my_revenue,
            'orders_success' => $orders_success,
            'chartData' => $chartData,
        ]);
    }
}
