<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Unit_Bisnis;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;


class DashboardAdminController extends Controller
{
    /**
     * Dashboard Admin – menampilkan statistik & ringkasan data.
     */
    public function index()
    {

        /* --------------------------------------------------------------------
         |  KARTU STATISTIK ATAS
         |---------------------------------------------------------------------*/
        // 1. Total produk (ikut hitung yang soft‑delete jika ada)
        $my_products = Product::all(); // koleksi → di Blade tetap pakai count()

        // 2. Transaksi sukses (status_transaksi = 1)
        $orders_success = Transaction::where('status_transaksi', 1)->get(); // koleksi

        // 3. Total pendapatan dari transaksi sukses
        $my_revenue = $orders_success->sum('total_harga');       // angka

        // 4. 5 transaksi terbaru (apa pun status)
        $latest_transactions = Transaction::with('product')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // 5. Daftar unit bisnis
        $unit_bisnis = Unit_Bisnis::all();

        /* --------------------------------------------------------------------
         |  DATA UNTUK CHART (tetap sama seperti logika aslinya)
         |---------------------------------------------------------------------*/
        $chartData = [
            'users'       => [],
            'sellers'     => [],
            'transactions' => [],
            'revenue'     => [],
            'last_year_monthly' => [
                'users'       => [],
                'sellers'     => [],
                'transactions' => [],
                'revenue'     => [],
                'months'      => []
            ]
        ];

        /* ----- Periode Bulan Lalu ----- */
        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd   = Carbon::now()->subMonth()->endOfMonth();

        $chartData['users'][]        = User::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();
        $chartData['sellers'][]      = User::where('role', 'penjual')->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();
        $chartData['transactions'][] = Transaction::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();
        $chartData['revenue'][]      = Transaction::where('status_transaksi', 1)->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->sum('total_harga');

        /* ----- Periode Bulan Ini ----- */
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd   = Carbon::now()->endOfMonth();

        $chartData['users'][]        = User::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count();
        $chartData['sellers'][]      = User::where('role', 'penjual')->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count();
        $chartData['transactions'][] = Transaction::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count();
        $chartData['revenue'][]      = Transaction::where('status_transaksi', 1)->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->sum('total_harga');

        /* ----- Periode Tahun Lalu (aggregate) ----- */
        $lastYearStart = Carbon::now()->subYear()->startOfYear();
        $lastYearEnd   = Carbon::now()->subYear()->endOfYear();

        $chartData['users'][]        = User::whereBetween('created_at', [$lastYearStart, $lastYearEnd])->count();
        $chartData['sellers'][]      = User::where('role', 'penjual')->whereBetween('created_at', [$lastYearStart, $lastYearEnd])->count();
        $chartData['transactions'][] = Transaction::whereBetween('created_at', [$lastYearStart, $lastYearEnd])->count();
        $chartData['revenue'][]      = Transaction::where('status_transaksi', 1)->whereBetween('created_at', [$lastYearStart, $lastYearEnd])->sum('total_harga');

        /* ----- Data Bulanan Tahun Lalu (untuk filter "Tahun Lalu") ----- */
        $months = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        for ($i = 1; $i <= 12; $i++) {
            $monthStart = Carbon::now()->subYear()->month($i)->startOfMonth();
            $monthEnd   = Carbon::now()->subYear()->month($i)->endOfMonth();

            $chartData['last_year_monthly']['users'][]        = User::whereBetween('created_at', [$monthStart, $monthEnd])->count();
            $chartData['last_year_monthly']['sellers'][]      = User::where('role', 'penjual')->whereBetween('created_at', [$monthStart, $monthEnd])->count();
            $chartData['last_year_monthly']['transactions'][] = Transaction::whereBetween('created_at', [$monthStart, $monthEnd])->count();
            $chartData['last_year_monthly']['revenue'][]      = Transaction::where('status_transaksi', 1)->whereBetween('created_at', [$monthStart, $monthEnd])->sum('total_harga');
            $chartData['last_year_monthly']['months'][]       = $months[$i - 1];
        }

        /* --------------------------------------------------------------------
         |  KIRIM KE VIEW
         |---------------------------------------------------------------------*/
        return view('admin.dashboard', [
            'my_products'        => $my_products,        // koleksi → hitung di Blade
            'orders_success'     => $orders_success,     // koleksi → hitung di Blade
            'my_revenue'         => $my_revenue,         // angka Rupiah
            'latest_transactions' => $latest_transactions,
            'unit_bisnis'        => $unit_bisnis,
            'chartData'          => $chartData,
        ]);
    }

    /* ======================================================================
       ==========  BAGIAN LAIN TETAP (Pengguna, Edit, Hapus, dst.) ===========
       ===================================================================== */

    public function pengguna(Request $request)
    {
        $query = User::query();

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        if ($request->filled('tipe')) {
            $query->where('tipe_pembeli', $request->tipe);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nik_nim', 'like', "%{$search}%");
            });
        }

        $users = $query->get();

        return view('admin.pengguna.index', compact('users'));
    }

    public function penggunaDetail($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pengguna-detail', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pengguna-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255|unique:users,email,' . $user->id,
            'role'          => 'required|in:admin,penjual,pembeli',
            'tipe_pembeli'  => 'nullable|in:internal,eksternal',
            'nik_nim'       => 'required|string|max:255',
            'no_hp'         => 'required|string|max:20',
            'alamat'        => 'required|string|max:255',
            'surat_persetujuan' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('surat_persetujuan')) {
            if ($user->surat_persetujuan) {
                Storage::delete($user->surat_persetujuan);
            }
            $validated['surat_persetujuan'] = $request->file('surat_persetujuan')->store('surat_persetujuan');
        }

        $user->update($validated);

        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->surat_persetujuan) {
            Storage::delete($user->surat_persetujuan);
        }

        $user->delete();

        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil dihapus');
    }

    public function markReturned($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'selesai';
        $booking->save();

        return back()->with('success', 'Status diperbarui menjadi selesai');
    }

    public function download(Request $request)
    {
        $query = User::query();

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        if ($request->filled('tipe')) {
            $query->where('tipe_pembeli', $request->tipe);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nik_nim', 'like', "%{$search}%");
            });
        }

        $users = $query->orderBy('created_at', 'desc')->get();

        $pdf = FacadePdf::loadView('admin.pengguna.pengguna-pdf', [
            'users' => $users,
            'filters' => [
                'role' => $request->role,
                'tipe' => $request->tipe,
                'search' => $request->search,
            ]
        ])->setPaper('a4', 'landscape');

        return $pdf->download('laporan_pengguna.pdf');
    }
}
