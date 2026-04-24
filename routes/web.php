<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// ===================================
// ROUTE AUTH (LOGIN/LOGOUT)
// ===================================
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===================================
// ROUTE AUTH (REGISTER/OTP)
// ===================================
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot-password');

Route::get('/verify-otp', function () {
    return view('auth.verify-otp');
})->name('verify-otp');

Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send-otp');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('reset-password');

// ===================================
// ROUTE DASHBOARD (PROTECTED)
// ===================================
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::get('/settings', function () {
        return view('dashboard.settings');
    })->name('settings');

    Route::get('/users', function () {
        return view('dashboard.users');
    })->name('users');
});
