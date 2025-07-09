<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardFrontendController;
use App\Http\Controllers\ProfileController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

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

Route::get('/katalog/{unit_bisnis_id}', [DashboardFrontendController::class, 'katalog'])->name('frontend.unit_bisnis.katalog');
Route::get('/all-katalog', [DashboardFrontendController::class, 'all_katalog'])->name('frontend.unit_bisnis.all-katalog');

Route::get('/check-bookings', [DashboardFrontendController::class, 'check_bookings'])->name('frontend.bookings.check-bookings');

Route::get('/calendar', [DashboardFrontendController::class, 'calendar'])->name('frontend.calendar');
Route::get('/calendar/events', [DashboardFrontendController::class, 'fetchEvents'])->name('frontend.calendar.events');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/bookings', [BookingController::class, 'details'])->name('frontend.bookings.details');
    Route::get('/bookings/checkout', [BookingController::class, 'checkout'])->name('frontend.bookings.checkout');

    Route::get('/bookings/payment/', [BookingController::class, 'payment'])->name('frontend.bookings.payment');
    // Route::get('/bookings/{booking}/payment', [BookingController::class, 'payment'])->name('frontend.bookings.payment');

    Route::post('/bookings/store/', [BookingController::class, 'store'])->name('frontend.bookings.store');

    Route::post('/bookings/payment/upload', [BookingController::class, 'uploadPayment'])
        ->name('frontend.bookings.payment.upload');

    Route::get('/bookings/payment/processed', [BookingController::class, 'processed'])->name('frontend.bookings.processed');


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
});

require __DIR__ . '/auth.php';
