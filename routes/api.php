<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function() {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('user/update-profile-photo', [UserController::class, 'updateProfilePhoto']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('transaction', [TransactionController::class, 'all']);
    Route::post('transaction/{id}', [TransactionController::class, 'update']);

    Route::post('checkout', [TransactionController::class, 'checkout']);

});


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::get('food', [FoodController::class, 'all']);

Route::post('midtrans/callback', [MidtransController::class, 'callback']);

