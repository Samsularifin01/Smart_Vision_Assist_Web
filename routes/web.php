<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // WAJIB ADA

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
});

Route::get('/verify-otp', function () {
    return view('auth.verify-otp');
});

Route::get('/reset-password', function () {
    return view('auth.reset-password');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/settings', function () {
    return view('dashboard.settings');
});