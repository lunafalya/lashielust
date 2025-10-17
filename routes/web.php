<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;

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

Route::get('/booking', function () {
    return view('home.booking');
});

Route::middleware('auth')->group(function () {
    // Tampilkan profil (view: resources/views/home/profile.blade)
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Tampilkan form edit (view: resources/views/home/editprofile.blade)
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Proses update (form method PUT ke route('profile.update'))
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


Route::get('/history', function () {
    return view('home.history');
});

Route::get('/review', function () {
    return view('home.review');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
