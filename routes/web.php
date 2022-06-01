<?php

use App\Http\Controllers\Api\MidtransController;
use App\Http\Controllers\CMS\BlogController;
use App\Http\Controllers\CMS\UserController;
use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\CMS\FoodController;
use App\Http\Controllers\CMS\TransactionController;
use App\Http\Controllers\WEB\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get', 'post'], '/', [HomeController::class, 'index'])->name('web.home');

Route::prefix('dashboard')->middleware(['auth:sanctum', 'admin'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('food', FoodController::class);

    Route::get('transactions/{id}/status/{status}', [TransactionController::class, 'status'])->name('transactions.status');
    Route::resource('transactions', TransactionController::class);

    Route::get('blog', [BlogController::class, 'index'])->name('blog.index');

});

// Midtrans related
Route::get('midtrans/success', [MidtransController::class, 'success']);
Route::get('midtrans/unfinish', [MidtransController::class, 'unfinish']);
Route::get('midtrans/error', [MidtransController::class, 'error']);

require __DIR__.'/auth.php';
