<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // WAJIB ADA

Route::get('/', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/forgot-password', function () {
    return view('forgot-password');
});

Route::get('/verify-otp', function () {
    return view('verify-otp');
});

Route::get('/reset-password', function () {
    return view('reset-password');
});

// ROUTE OTP
Route::post('/send-otp', [AuthController::class, 'sendOtp']);

Route::get('/dashboard', function () {
    return view('dashboard');
});