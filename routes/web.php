<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('payment-amount/{orderId?}', [\App\Http\Controllers\PaymentController::class,'getPaymentAmount'])->name('payment-amount');
Route::get('payment-gateway-link/{orderId?}/{gatewayId?}', [\App\Http\Controllers\PaymentController::class,'getPaymentGatewayLink'])->name('payment-gateway-link');
Route::get('payment-verification/{orderId?}', [\App\Http\Controllers\PaymentController::class,'paymentVerification'])->name('payment-verification');
