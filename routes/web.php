<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardAdminController;
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

Route::get('/', function () {
    return view('frontend.dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/bookings', [BookingController::class, 'index'])->name('frontend.bookings.create');


// Route::get('/bookings', function () {
//     return view('frontend.bookings.create');
// })->name('frontend.bookings.create');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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
