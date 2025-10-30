<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\AdminNotificationController;



// USERS
Route::get('/', function () {
    return view('home.landing');
})->name('landing');

Route::get('/landing', [AuthController::class, 'index'])->name('landing');

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

// Halaman contact untuk user
Route::get('/contactus', [MessageController::class, 'show'])->name('home.contactus');

// Kirim pesan (user harus login agar bisa kirim)
Route::post('/contact/send', [MessageController::class, 'store'])
    ->middleware('auth')
    ->name('contact.send');



Route::get('/detail', function () {
    return view('home.detail');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/bookings/{id}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
});


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





// ADMIN
// Dashboard

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/messages', [MessageController::class, 'index'])->name('admin.messages');
});

// Notifications
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/notifications', [AdminNotificationController::class, 'index'])->name('admin.notifications');
});

// Service
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/services', [AdminServiceController::class, 'index'])->name('admin.services');
    Route::post('/services', [AdminServiceController::class, 'store'])->name('services.store');
    Route::delete('/services/{id}', [AdminServiceController::class, 'destroy'])->name('services.destroy');
    Route::put('/services/{id}', [AdminServiceController::class, 'update'])->name('services.update');
});

// Booking
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('admin.reviews');
});


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile');
    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});


// Gabungan
Route::get('/payment/{booking_id}', [PaymentController::class, 'createTransaction'])->name('payment.createPage');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/failed', [PaymentController::class, 'failed'])->name('payment.failed');

