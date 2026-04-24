<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * ===================================
     * FITUR LOGIN
     * ===================================
     */

    /**
     * Tampilkan halaman login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login dari form
     */
    public function login(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.exists' => 'Email tidak terdaftar di sistem',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek apakah user ada
        if (!$user) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Email tidak terdaftar di sistem']);
        }

        // Cek apakah password cocok
        // Handle case di mana password tidak di-hash (development)
        $passwordMatch = false;
        
        if (Hash::check($request->password, $user->password)) {
            $passwordMatch = true;
        } elseif ($user->password === $request->password) {
            // Fallback untuk password yang belum di-hash
            $passwordMatch = true;
            // Auto-hash password untuk development
            $user->update(['password' => bcrypt($request->password)]);
        }

        if ($passwordMatch) {
            // Login berhasil
            Auth::login($user, $request->remember ?? false);
            
            return redirect('/dashboard')
                ->with('success', 'Login berhasil! Selamat datang ' . $user->name);
        }

        // Login gagal
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['password' => 'Password salah']);
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'Anda telah logout');
    }

    /**
     * ===================================
     * FITUR OTP (Register)
     * ===================================
     */

    /**
     * Kirim OTP ke email user
     */
    public function sendOtp(Request $request)
    {
        $otp = rand(100000, 999999);

        DB::table('otps')->insert([
            'email' => $request->email,
            'otp' => $otp,
            'expired_at' => now()->addMinutes(5),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/verify-otp')
            ->with('email', $request->email)
            ->with('otp', $otp);
    }
}
