@extends('adminLte.auth.layout')

<!--css & jq country_code -->
@include('cargo::adminLte.components.inputs.phone')

@section('pageTitle')
    {{ __('Sign Up') }}
@endsection

@section('content')
<div class="w-full max-w-[640px] my-2">
    <div class="premium-card p-5 sm:p-8 rounded-[2rem] relative overflow-hidden group">
        <div class="relative z-10 text-center mb-5">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 mb-3 hover:opacity-80 transition-opacity duration-300">
                <div class="bg-blue-600 p-2 rounded-xl text-white shadow-lg shadow-blue-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <span class="font-bold text-xl text-slate-800 tracking-tight">Delivery<span class="text-blue-600">Fast</span></span>
            </a>
            <h2 class="text-xl font-extrabold text-slate-900">Create Account</h2>
            <p class="text-slate-500 text-xs font-medium">Start shipping today</p>
        </div>

        <form method="POST" action="{{ route('register.request') }}" novalidate="novalidate" class="space-y-3.5">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Name & Email Toggle row -->
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 mb-1 ml-1 uppercase tracking-widest">Full Name</label>
                    <input type="text" name="name" required class="input-premium w-full px-4 py-2.5 rounded-xl outline-none text-sm font-medium" placeholder="John Doe" value="{{ old('name') }}">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 mb-1 ml-1 uppercase tracking-widest">Email Address</label>
                    <input type="email" name="email" required id="email" class="input-premium w-full px-4 py-2.5 rounded-xl outline-none text-sm font-medium" placeholder="john@example.com" value="{{ old('email') }}">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 mb-1 ml-1 uppercase tracking-widest">National ID</label>
                    <input type="text" name="national_id" required class="input-premium w-full px-4 py-2.5 rounded-xl outline-none text-sm font-medium" placeholder="ID Number" value="{{ old('national_id') }}">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 mb-1 ml-1 uppercase tracking-widest">Owner Name</label>
                    <input type="text" name="responsible_name" required class="input-premium w-full px-4 py-2.5 rounded-xl outline-none text-sm font-medium" placeholder="Legal Owner" value="{{ old('responsible_name') }}">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 mb-1 ml-1 uppercase tracking-widest">Phone Number</label>
                    <div class="relative min-h-[42px]">
                        <input type="tel" id="phone" dir="ltr" class="phone_input input-premium w-full px-4 py-2.5 rounded-xl outline-none text-sm font-medium" name="responsible_mobile" value="{{ old('responsible_mobile', isset($model->country_code) ?$model->country_code.$model->responsible_mobile : base_country_code()) }}">
                        <input type="hidden" class="country_code" name="country_code" value="{{ old('country_code', isset($model) ?$model->country_code : base_country_code()) }}" data-reflection="phone">
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 mb-1 ml-1 uppercase tracking-widest">Branch</label>
                    <select name="branch_id" class="input-premium w-full px-4 py-2.5 rounded-xl outline-none bg-[#f8fafc] text-sm font-medium appearance-none">
                        <option value="">Select Branch</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-bold text-slate-400 mb-1 ml-1 uppercase tracking-widest">Password</label>
                <input type="password" name="password" required id="password" class="input-premium w-full px-4 py-2.5 rounded-xl outline-none text-sm font-medium" placeholder="••••••••">
                @error('password') <p class="text-red-500 text-[10px] mt-1 font-medium ml-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-3 py-1">
                <label class="flex items-center gap-2 cursor-pointer group">
                    <div class="relative">
                        <input type="checkbox" name="terms_conditions" id="terms" class="peer sr-only">
                        <div class="w-4 h-4 border-2 border-slate-200 rounded peer-checked:bg-blue-600 peer-checked:border-blue-600 transition-all duration-200"></div>
                        <svg class="absolute top-0.5 left-0.5 w-3 h-3 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <span class="text-xs text-slate-500 font-medium tracking-tight">
                        I agree to the <a href="#" class="text-blue-600 font-bold hover:underline">Terms & Privacy</a>.
                    </span>
                </label>
            </div>

            <button type="submit" class="btn-premium w-full py-3.5 text-white font-bold rounded-xl shadow-lg text-sm tracking-wide">
                Create Account
            </button>
        </form>

        <div class="mt-5 pt-4 border-t border-slate-100 text-center">
            <p class="text-slate-500 text-xs font-medium uppercase tracking-tighter">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-blue-600 font-extrabold hover:underline ml-1">Sign In</a>
            </p>
        </div>
    </div>
</div>


<style>
    .iti { width: 100% !important; }
    .iti__country-list { background-color: #1e293b !important; color: white !important; border: 1px solid rgba(255,255,255,0.1) !important; border-radius: 1rem !important; margin-top: 0.5rem !important; }
    .iti__country:hover { background-color: rgba(255,255,255,0.05) !important; }
    .select2-container--default .select2-selection--single { background: rgba(255,255,255,0.05) !important; border: 1px solid rgba(255,255,255,0.1) !important; border-radius: 1rem !important; height: 58px !important; color: white !important; }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection



