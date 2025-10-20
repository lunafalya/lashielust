<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('home.landing');
})->name('landing');

Route::get('/landing', [AuthController::class, 'index'])->name('dashboard');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/forgotpassword', function () {
    return view('home.forgotpassword');
});

Route::get('/resetpassword', function () {
    return view('home.resetpw');
});

Route::get('/aboutus', function () {
    return view('home.aboutus');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/contactus', function () {
    return view('home.contactus');
});

Route::get('/detail', function () {
    return view('home.detail');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/bookings/{id}', [BookingController::class, 'create'])->name('bookings.create');
});

Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');

Route::middleware('auth')->group(function () {
    // Tampilkan profil (view: resources/views/home/profile.blade)
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Tampilkan form edit (view: resources/views/home/editprofile.blade)
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Proses update (form method PUT ke route('profile.update'))
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/profile/orders', [BookingController::class, 'history'])->name('orders.history');


Route::get('/review/{booking}', [ReviewController::class, 'create'])->name('review.create');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
