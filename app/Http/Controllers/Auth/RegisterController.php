<?php
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Otp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'is_verified' => false, // User must verify OTP before logging in
    ]);

    $otp = rand(100000, 999999);
    
    Otp::create([
        'user_id' => $user->id,
        'otp' => $otp,
        'expires_at' => now()->addMinutes(10),
    ]);

    Mail::to($user->email)->send(new OtpMail($otp));

    return redirect()->route('verify.otp', ['email' => $user->email]);
}
