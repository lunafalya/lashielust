<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;


Route::post('/midtrans/callback', [PaymentController::class, 'callback'])->name('midtrans.callback');
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
