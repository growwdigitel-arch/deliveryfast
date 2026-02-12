<?php
use Closure;
use Illuminate\Support\Facades\Auth;

public function handle($request, Closure $next)
{
    if (Auth::check() && !Auth::user()->is_verified) {
        return redirect()->route('verify.otp', ['email' => Auth::user()->email]);
    }

    return $next($request);
}
