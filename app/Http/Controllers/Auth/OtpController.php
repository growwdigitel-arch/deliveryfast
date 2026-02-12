<?php


use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required|numeric',
    ]);

    $otp = Otp::where('email', $request->email)
              ->where('otp', $request->otp)
              ->where('expires_at', '>', now())
              ->first();

    if (!$otp) {
        return back()->withErrors(['otp' => 'Invalid or expired OTP']);
    }

    $user = User::where('email', $request->email)->first();
    $user->is_verified = true;
    $user->save();

    Otp::where('email', $request->email)->delete(); // Remove used OTP

    Auth::login($user);
    return redirect()->route('dashboard');
}
