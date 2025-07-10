<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPenjualController extends Controller
{
    function index()
    {
        // Get seller's products
        $my_products = Product::where('penjual_id', Auth::id())->get();
        
        // Get seller's revenue from successful transactions
        $my_revenue = Transaction::where('penjual_id', Auth::id())
            ->where('status_transaksi', 1)
            ->sum('total_harga');
        
        // Get successful orders for this seller
        $orders_success = Transaction::where('penjual_id', Auth::id())
            ->where('status_transaksi', 1)
            ->get();

        // Get recent transactions for the table
        $recent_transactions = Transaction::where('penjual_id', Auth::id())
            ->with(['product', 'buyer'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Prepare chart data for the last 7 days
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

        return view('penjual.dashboard', [
            'my_products' => $my_products,
            'my_revenue' => $my_revenue,
            'orders_success' => $orders_success,
            'recent_transactions' => $recent_transactions,
            'chartData' => $chartData,
        ]);
    }
}
