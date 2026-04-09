<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
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