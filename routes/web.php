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
use App\Http\Controllers\UnitBisnisController;
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

Route::get('/', [DashboardFrontendController::class, 'dashboard'])->name('dashboard');

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

Route::get('/check-purchase', [DashboardFrontendController::class, 'check_purchase'])->name('frontend.bookings.check-purchase');

Route::get('/calendar', [DashboardFrontendController::class, 'calendar'])->name('frontend.calendar');
Route::get('/calendar/events', [DashboardFrontendController::class, 'fetchEvents'])->name('frontend.calendar.events');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
        Route::resource('products', ProductController::class);
        Route::resource('transaction', TransactionController::class);

        Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::get('/transactions/details/{transaction}', [TransactionController::class, 'transaction_details'])->name('transactions.details');
        Route::get('/orders', [TransactionController::class, 'orders'])->name('transactions.orders');
        Route::get('/orders/details/{transaction}', [TransactionController::class, 'order_details'])->name('transactions.order_details');
        Route::get('/download/file/{transaction}', [TransactionController::class, 'download_file'])->name('transactions.download');


        Route::get('/unit-bisnis', [UnitBisnisController::class, 'index'])->name('unit_bisnis.index');
        Route::get('/unit-bisnis/{slug}', [UnitBisnisController::class, 'show'])->name('unit_bisnis.show');
        Route::get('/unit-bisnis/{slug}/edit', [UnitBisnisController::class, 'edit'])->name('unit_bisnis.edit');
        Route::put('/unit-bisnis/{slug}', [UnitBisnisController::class, 'update'])->name('unit_bisnis.update');

        Route::get('/pengguna', [DashboardAdminController::class, 'pengguna'])->name('pengguna.index');
        Route::get('/pengguna/detail/{id}', [DashboardAdminController::class, 'penggunaDetail'])->name('pengguna.detail');
        Route::get('/pengguna/edit/{id}', [DashboardAdminController::class, 'edit'])->name('pengguna.edit');
        Route::delete('/pengguna/{id}', [DashboardAdminController::class, 'destroy'])->name('pengguna.delete');

        Route::get('/pengguna/download', [DashboardAdminController::class, 'download'])->name('pengguna.download');
        Route::get('/transactions/download', [TransactionController::class, 'download'])->name('transactions.download');


        Route::put('/bookings/mark-returned/{id}', [TransactionController::class, 'markReturned'])->name('bookings.markReturned');
    });
});

Route::middleware(['auth', 'role:penjual'])->group(function () {
    Route::prefix('penjual')->name('penjual.')->group(function () {
        Route::get('/dashboard', [DashboardPenjualController::class, 'index'])->name('dashboard');

        Route::get('/products', [ProductController::class, 'sellerIndex'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'sellerCreate'])->name('products.create');
        Route::post('/products', [ProductController::class, 'sellerStore'])->name('products.store');
        Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/products/{product}/edit', [ProductController::class, 'sellerEdit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'sellerUpdate'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'sellerDestroy'])->name('products.destroy');

        Route::get('/transactions', [TransactionController::class, 'penjualIndex'])->name('transactions.index');
        Route::get('/transactions/details/{transaction}', [TransactionController::class, 'penjualTransactionDetails'])->name('transactions.details');
        Route::get('/orders', [TransactionController::class, 'penjualOrders'])->name('transactions.orders');
        Route::get('/orders/details/{transaction}', [TransactionController::class, 'penjualOrderDetails'])->name('transactions.order_details');
        Route::put('/transactions/{transaction}', [TransactionController::class, 'penjualUpdate'])->name('transactions.update');
        Route::get('/download/file/{transaction}', [TransactionController::class, 'penjualDownloadFile'])->name('transactions.download');

        Route::get('/orders/download', [TransactionController::class, 'penjualDownload'])->name('transactions.orders.download');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/checkout/booking', [BookingController::class, 'checkoutBooking'])->name('frontend.bookings.checkout-booking');
    Route::get('/checkout/transaction', [BookingController::class, 'checkoutTransaction'])->name('frontend.bookings.checkout-transaction');

    Route::get('/bookings/details', [BookingController::class, 'details'])->name('frontend.bookings.details');
    Route::post('/bookings/store', [BookingController::class, 'store'])->name('frontend.bookings.store');
    Route::get('/bookings/payment', [BookingController::class, 'payment'])->name('frontend.bookings.payment');
    Route::post('/bookings/payment/upload', [BookingController::class, 'uploadPayment'])->name('frontend.bookings.payment.upload');
    Route::get('/bookings/processed', [BookingController::class, 'processed'])->name('frontend.bookings.processed');

    Route::post('/transactions/store', [TransactionController::class, 'store'])->name('frontend.transactions.store');
    Route::get('/api/check-booking', [BookingController::class, 'checkConflict']);
});

require __DIR__ . '/auth.php';
