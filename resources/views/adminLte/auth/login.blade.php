@extends('adminLte.auth.layout')

@section('pageTitle')
    {{ __('view.sign_in') }}
@endsection

@section('content')
<div class="w-full max-w-[440px]">
    <div class="premium-card p-6 sm:p-10 rounded-[2.5rem] relative overflow-hidden group">
        <div class="relative z-10 text-center mb-8">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 mb-6 hover:opacity-80 transition-opacity duration-300">
                <div class="bg-blue-600 p-2.5 rounded-2xl text-white shadow-lg shadow-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <span class="font-bold text-2xl text-slate-800 tracking-tight">Delivery<span class="text-blue-600">Fast</span></span>
            </a>
            <h2 class="text-2xl font-extrabold text-slate-900 mb-1">Welcome Back</h2>
            <p class="text-slate-500 text-sm">Please enter your details to sign in</p>
        </div>

        @if(env('DEMO_MODE') == 'On')
        <div class="mb-6 p-4 bg-blue-50/50 border border-blue-100 rounded-2xl">
            <div class="flex items-center gap-2 mb-3 text-blue-600 font-bold cursor-pointer text-xs uppercase tracking-wider" id="login_admin">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                <span>Click to auto-fill Admin</span>
            </div>
            <div class="grid grid-cols-2 gap-4 text-[11px]">
                <div>
                    <span class="text-slate-400 block mb-0.5 font-medium">Email</span>
                    <span class="text-slate-700 font-semibold">admin@admin.com</span>
                </div>
                <div>
                    <span class="text-slate-400 block mb-0.5 font-medium">Password</span>
                    <span class="text-slate-700 font-semibold">123456</span>
                </div>
            </div>
        </div>
        @endif

        <form method="POST" action="{{ route('login.request') }}" novalidate="novalidate" class="space-y-4">
            @csrf
            <div>
                <label class="block text-[11px] font-bold text-slate-400 mb-1.5 ml-1 uppercase tracking-widest">Email Address</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </span>
                    <input type="email" name="email" id="email" required class="input-premium w-full pl-11 pr-4 py-3.5 rounded-[1.25rem] outline-none text-[15px] font-medium" placeholder="name@company.com">
                </div>
                @error('email') <p class="text-red-500 text-[11px] mt-1.5 ml-1 font-medium">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-[11px] font-bold text-slate-400 mb-1.5 ml-1 uppercase tracking-widest">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </span>
                    <input type="password" name="password" id="password" required class="input-premium w-full pl-11 pr-4 py-3.5 rounded-[1.25rem] outline-none text-[15px] font-medium" placeholder="••••••••">
                </div>
            </div>

            <div class="flex items-center justify-between py-1">
                <label class="flex items-center gap-2.5 cursor-pointer group">
                    <div class="relative">
                        <input type="checkbox" id="remember" class="peer sr-only">
                        <div class="w-5 h-5 border-2 border-slate-200 rounded-lg peer-checked:bg-blue-600 peer-checked:border-blue-600 transition-all duration-200"></div>
                        <svg class="absolute top-1 left-1 w-3 h-3 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <span class="text-sm text-slate-500 font-medium group-hover:text-slate-700 transition-colors">{{ __('view.remember_me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-bold text-blue-600 hover:text-blue-700 transition-colors tracking-tight">Forgot password?</a>
                @endif
            </div>

            <button type="submit" class="btn-premium w-full py-4 text-white font-bold rounded-[1.25rem] shadow-xl text-[15px] tracking-wide mt-4">
                Sign In
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-slate-100 text-center">
            <p class="text-slate-500 text-[13px] font-medium">
                New to DeliveryFast? 
                <a href="{{ route('register') }}" class="text-blue-600 font-bold hover:underline ml-1">Create an account</a>
            </p>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    @if(env('DEMO_MODE') == 'On')
      $(document).ready(function() {
        $('body').on('click','#login_admin', function(e){
          $('#email').val('admin@admin.com').addClass('bg-blue-500/5');
          $('#password').val('123456').addClass('bg-blue-500/5');
          setTimeout(() => {
            $('form').submit();
          }, 300);
        });
      });
    @endif
</script>
@endsection



