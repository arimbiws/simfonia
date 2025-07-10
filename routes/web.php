<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardFrontendController;
use App\Http\Controllers\DashboardPenjualController;
use App\Http\Controllers\ProfileController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Models\Booking;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/register/seller', [RegisteredUserController::class, 'create_seller'])
    ->middleware('guest')
    ->name('register-penjual');

Route::get('/logout-and-register-penjual', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('register-penjual');
})->name('logout.and.register.seller');

Route::get('/katalog/{unit_bisnis_id}', [DashboardFrontendController::class, 'katalog'])->name('frontend.unit_bisnis.katalog');
Route::get('/all-katalog', [DashboardFrontendController::class, 'all_katalog'])->name('frontend.unit_bisnis.all-katalog');

Route::get('/check-bookings', [DashboardFrontendController::class, 'check_bookings'])->name('frontend.bookings.check-bookings');

Route::get('/calendar', [DashboardFrontendController::class, 'calendar'])->name('frontend.calendar');
Route::get('/calendar/events', [DashboardFrontendController::class, 'fetchEvents'])->name('frontend.calendar.events');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::middleware(['auth', 'role:penjual'])->get('/penjual/dashboard', function () {
    return view('penjual.dashboard');
})->name('penjual.dashboard');

Route::middleware(['auth', 'role:pembeli'])->get('/', [DashboardFrontendController::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/bookings/checkout-booking', [BookingController::class, 'checkoutBooking'])
    //     ->middleware('check.booking.unit')
    //     ->name('frontend.bookings.checkout-booking');

    Route::get('/checkout/booking', [BookingController::class, 'checkoutBooking'])->name('frontend.bookings.checkout.booking');
    Route::get('/checkout/transaction', [BookingController::class, 'checkoutTransaction'])->name('frontend.bookings.checkout.transaction');

    Route::get('/bookings/details', [BookingController::class, 'details'])
        ->name('frontend.bookings.details');

    Route::post('/bookings/store', [BookingController::class, 'store'])
        ->name('frontend.bookings.store');

    Route::get('/bookings/payment', [BookingController::class, 'payment'])
        ->name('frontend.bookings.payment');

    Route::post('/bookings/payment/upload', [BookingController::class, 'uploadPayment'])
        ->name('frontend.bookings.payment.upload');

    Route::get('/bookings/processed', [BookingController::class, 'processed'])
        ->name('frontend.bookings.processed');

    Route::post('/transactions/store', [TransactionController::class, 'store'])
        ->name('frontend.transactions.store');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

        Route::resource('products', ProductController::class);
        Route::resource('transaction', controller: TransactionController::class);

        Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::get('/transactions/details/{transaction}', [TransactionController::class, 'transaction_details'])->name('transactions.details');
        Route::get('/orders', [TransactionController::class, 'orders'])->name('transactions.orders');
        Route::get('/orders/details/{transaction}', [TransactionController::class, 'order_details'])->name('transactions.order_details');

        Route::get('/download/file/{transaction}', [TransactionController::class, 'download_file'])->name('transactions.download');
    });

    Route::prefix('seller')->name('seller.')->group(function () {
        Route::get('/dashboard', [DashboardPenjualController::class, 'index'])->name('dashboard');
    });

    Route::get('/api/check-booking', function (Request $request) {
        $exists = Booking::where('product_id', $request->product_id)
            ->where(function ($q) use ($request) {
                $q->whereBetween('tanggal_mulai', [$request->mulai, $request->kembali])
                    ->orWhereBetween('tanggal_kembali', [$request->mulai, $request->kembali]);
            })->exists();
        return response()->json(['conflict' => $exists]);
    });
});

require __DIR__ . '/auth.php';
