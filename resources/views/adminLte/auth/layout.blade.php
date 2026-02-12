@php
    if (check_module('Localization')) {
        $current_lang = Modules\Localization\Entities\Language::where('code', LaravelLocalization::getCurrentLocale())->first();
    }
@endphp
<!DOCTYPE html>
@if(isset($current_lang) && $current_lang->dir == 'rtl')
<html lang="{{LaravelLocalization::getCurrentLocale()}}" direction="rtl" dir="rtl" style="direction: rtl;">
@else
<html lang="{{LaravelLocalization::getCurrentLocale()}}">
@endif
    <head>
        <title>{{ config('app.name') . ' | ' . ($pageTitle ?? 'Dashboard') }}</title>
        <meta name="description" content="Algoriza - Framework" />
        <meta name="keywords" content="Algoriza - Framework" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta charset="utf-8" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{ config('app.name') }}" />

        <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%232563eb'%3E%3Cpath d='M13 10V3L4 14h7v7l9-11h-7z'/%3E%3C/svg%3E">

        <!-- Fonts & Icons -->
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            body { font-family: 'Outfit', sans-serif !important; }
            .auth-bg {
                background-color: #f8fafc;
                background-image: radial-gradient(at 0% 0%, hsla(210,100%,96%,1) 0, transparent 50%), 
                                  radial-gradient(at 50% 0%, hsla(225,100%,96%,1) 0, transparent 50%), 
                                  radial-gradient(at 100% 0%, hsla(210,100%,96%,1) 0, transparent 50%);
                background-attachment: fixed;
            }
            .premium-card {
                background: white;
                border: 1px solid #f1f5f9;
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
            }
            .input-premium {
                background: #f8fafc;
                border: 1px solid #e2e8f0;
                color: #1e293b !important;
                transition: all 0.2s ease;
            }
            .input-premium:focus {
                background: white;
                border-color: #3b82f6;
                box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.08);
            }
            .btn-premium {
                background: #3b82f6;
                transition: all 0.2s ease;
            }
            .btn-premium:hover {
                background: #2563eb;
                transform: translateY(-1px);
                box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
            }
            .custom-scrollbar::-webkit-scrollbar { width: 0px; display: none; }
            .custom-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
            .custom-scrollbar::-webkit-scrollbar-thumb { background: transparent; }
        </style>
        
        @yield('styles')
    </head>
    <body class="hold-transition login-page auth-bg min-h-screen flex flex-col overflow-x-hidden">

		<!-- Main content -->
		<div class="flex-grow w-full flex justify-center items-center py-10">
		    @yield('content')
		</div>

        <!-- Global Footer -->
        <div class="w-full mt-auto">
            @include('theme.layout.layout-components.footer')
        </div>

        <!-- jQuery -->
        <script src="{{ asset('assets/lte') }}/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
        <script src="{{ asset('assets/lte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
        <script src="{{ asset('assets/lte') }}/js/adminlte.js"></script>

        {{-- Show message alert from session flash --}}
		@include('adminLte.helpers.message-alert')
        
        @yield('scripts')

    </body>
</html>