<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DeliveryFast - Premium Courier & Logistics Solution</title>
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%232563eb'%3E%3Cpath d='M13 10V3L4 14h7v7l9-11h-7z'/%3E%3C/svg%3E">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            scroll-behavior: smooth;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        .blob {
            position: absolute;
            filter: blur(50px);
            opacity: 0.4;
            animation: float 10s infinite ease-in-out;
        }
        @keyframes float {
            0% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-20px) scale(1.1); }
            100% { transform: translateY(0px) scale(1); }
        }
        .animate-spin-slow {
            animation: spin 30s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-slate-50 text-gray-800 antialiased overflow-x-hidden">

    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md fixed w-full z-50 transition-all duration-300 border-b border-gray-100" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center">
                    <a href="#" class="flex-shrink-0 flex items-center gap-2">
                         <!-- Icon -->
                         <div class="bg-blue-600 p-2 rounded-lg text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                         </div>
                        <span class="font-bold text-2xl text-slate-800 tracking-tight">Delivery<span class="text-blue-600">Fast</span></span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="text-slate-600 hover:text-blue-600 font-medium transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-slate-600 hover:text-blue-600 font-medium transition">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-slate-900 hover:bg-slate-800 text-white px-6 py-2.5 rounded-full font-medium transition shadow-lg shadow-slate-900/20">Get Started</a>
                            @endif
                        @endauth
                    @endif
                </div>
                 <!-- Mobile toggle -->
                 <div class="md:hidden flex items-center">
                    <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-white pt-20 overflow-hidden min-h-[90vh] flex items-center">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 w-1/2 h-full overflow-hidden z-0 hidden lg:block">
             <div class="absolute inset-0 bg-gradient-to-l from-white via-transparent to-transparent z-10"></div>
             <img src="{{ asset('assets/img/premium/logistics_hero_modern_1770892930794.png') }}" alt="Logistics Tech" class="w-full h-full object-cover object-center scale-110 opacity-90">
        </div>
        
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 lg:hidden opacity-20">
             <img src="{{ asset('assets/img/premium/logistics_hero_modern_1770892930794.png') }}" alt="Logistics Tech" class="w-full h-full object-cover">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 z-10 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right" data-aos-duration="1200">
                    <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-blue-50 text-blue-700 text-sm font-bold mb-6 border border-blue-100 uppercase tracking-wider">
                        <span class="relative flex h-2 w-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-600"></span>
                        </span>
                        Global Logistics Excellence
                    </span>
                    <h1 class="text-5xl tracking-tight font-[900] text-slate-900 sm:text-6xl md:text-7xl mb-8 leading-[1.1]">
                        The Smart Way to <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-500">Move Anything</span>
                    </h1>
                    <p class="mt-6 max-w-xl text-xl text-slate-500 mb-12 leading-relaxed font-medium">
                        End-to-end logistics powered by AI. Experience lightning-fast delivery with real-time intelligence for your business.
                    </p>
                    
                    <!-- Tracking Form -->
                    <div class="max-w-xl" data-aos="fade-up" data-aos-delay="400">
                        <div class="bg-white p-2.5 rounded-2xl shadow-[0_20px_50px_rgba(37,99,235,0.15)] border border-slate-100 flex flex-col sm:flex-row gap-2 relative z-20">
                            <div class="relative flex-grow">
                                 <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-6 w-6 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                                <form action="{{ route('shipments.tracking') }}" method="GET" class="w-full" id="trackingForm">
                                    <input type="text" name="code" id="trackingInput" class="block w-full pl-12 pr-4 py-4 border-none bg-transparent rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-0 text-lg font-bold" placeholder="Tracking Number">
                                </form>
                            </div>
                            <button type="button" onclick="validateAndTrack()" class="inline-flex items-center justify-center px-10 py-4 border border-transparent text-lg font-bold rounded-xl text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-500/25 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                                Track Now
                            </button>
                        </div>
                        
                        <!-- AJAX Error Alert -->
                        <div id="trackingErrorAlert" class="hidden mt-4 p-4 bg-red-50 border border-red-100 rounded-xl flex items-center gap-3" data-aos="fade-in">
                            <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            <p id="trackingErrorMessage" class="text-red-700 font-bold text-sm"></p>
                        </div>

                        <p class="mt-6 text-sm text-slate-400 flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            Trusted by 10,000+ verified businesses in India
                        </p>
                    </div>
                </div>
                <div class="hidden lg:block"></div>
            </div>
        </div>
    </div>

    <script>
        function validateAndTrack() {
            const code = document.getElementById('trackingInput').value;
            const errorAlert = document.getElementById('trackingErrorAlert');
            const errorMessage = document.getElementById('trackingErrorMessage');

            // Reset error
            errorAlert.classList.add('hidden');

            fetch(`{{ route('shipments.ajax-validate') }}?code=${code}`)
                .then(response => response.json())
                .then(data => {
                    if (data.valid) {
                        document.getElementById('trackingForm').submit();
                    } else {
                        errorMessage.textContent = data.error;
                        errorAlert.classList.remove('hidden');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    errorMessage.textContent = 'An error occurred. Please try again.';
                    errorAlert.classList.remove('hidden');
                });
        }
        
        // Allow Enter key to submit
        document.getElementById('trackingInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                validateAndTrack();
            }
        });
    </script>

    <!-- Stats Section -->
    <div class="bg-slate-900 py-12 text-white border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
             <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-slate-800">
                 <div data-aos="fade-up" data-aos-delay="0">
                     <p class="text-4xl font-bold text-blue-400">2M+</p>
                     <p class="text-slate-400 mt-1">Packages Delivered</p>
                 </div>
                 <div data-aos="fade-up" data-aos-delay="100">
                     <p class="text-4xl font-bold text-blue-400">98%</p>
                     <p class="text-slate-400 mt-1">On-Time Rate</p>
                 </div>
                 <div data-aos="fade-up" data-aos-delay="200">
                     <p class="text-4xl font-bold text-blue-400">250+</p>
                     <p class="text-slate-400 mt-1">Cities Covered</p>
                 </div>
                 <div data-aos="fade-up" data-aos-delay="300">
                     <p class="text-4xl font-bold text-blue-400">24/7</p>
                     <p class="text-slate-400 mt-1">Customer Support</p>
                 </div>
             </div>
        </div>
    </div>

    <!-- Integrations Section -->
    <div class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-sm font-bold text-blue-600 uppercase tracking-widest mb-3">Seamless Connectivity</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-slate-900">Integrates with your favorite apps</h3>
                <p class="mt-4 text-slate-500 max-w-2xl mx-auto text-lg">
                    Connect your store easily. We support major eCommerce platforms to automate your shipping workflow.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 items-center opacity-70 grayscale hover:grayscale-0 transition-all duration-500">
                <!-- Shopify -->
                <div class="flex justify-center p-6" data-aos="fade-up" data-aos-delay="0">
                    <span class="text-2xl font-bold font-sans text-green-600">shopify</span>
                </div>
                <!-- WooCommerce -->
                <div class="flex justify-center p-6" data-aos="fade-up" data-aos-delay="100">
                     <span class="text-2xl font-bold font-serif text-purple-700">WooCommerce</span>
                </div>
                <!-- Magento -->
                <div class="flex justify-center p-6" data-aos="fade-up" data-aos-delay="200">
                    <span class="text-2xl font-bold font-mono text-orange-600">Magento</span>
                </div>
                <!-- BigCommerce -->
                 <div class="flex justify-center p-6" data-aos="fade-up" data-aos-delay="300">
                    <span class="text-xl font-bold text-slate-800">BigCommerce</span>
                </div>
                <!-- Wix -->
                 <div class="flex justify-center p-6" data-aos="fade-up" data-aos-delay="400">
                    <span class="text-2xl font-extrabold text-black">WiX</span>
                </div>
                 <!-- OpenCart -->
                 <div class="flex justify-center p-6" data-aos="fade-up" data-aos-delay="500">
                    <span class="text-xl font-bold text-blue-500">OpenCart</span>
                </div>
            </div>
            <div class="text-center mt-12">
                <a href="#" class="text-blue-600 font-semibold hover:text-blue-700 flex items-center justify-center gap-2 group">
                    View all integrations 
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Features Grid -->
    <div class="py-32 bg-slate-50 relative overflow-hidden">
        <!-- Floating Globe Background -->
        <div class="absolute -right-40 -top-40 opacity-20 pointer-events-none">
            <img src="{{ asset('assets/img/premium/global_shipping_globe_1770892975192.png') }}" alt="Global" class="w-[600px] h-[600px] object-contain animate-spin-slow">
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-24">
                <span class="text-blue-600 font-bold tracking-[0.2em] uppercase text-sm mb-4 block">Technology Driven</span>
                <h2 class="text-4xl md:text-5xl font-[900] text-slate-900 leading-tight">
                    Everything you need to <br>ship smarter
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Card 1 -->
                <div class="group bg-white p-10 rounded-[2.5rem] shadow-xl hover:shadow-[0_30px_60px_-15px_rgba(37,99,235,0.2)] transition-all duration-500 transform hover:-translate-y-2 border border-slate-100" data-aos="fade-up" data-aos-delay="0">
                    <div class="h-20 w-20 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center mb-8 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-500 shadow-inner">
                        <svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-4">Super Fast Delivery</h3>
                    <p class="text-slate-500 leading-relaxed text-lg">
                        We prioritize speed. Our optimized routes and AI-driven logistics ensure your packages arrive faster than ever.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="group bg-slate-900 p-10 rounded-[2.5rem] shadow-2xl hover:shadow-[0_30px_60px_-15px_rgba(37,99,235,0.3)] transition-all duration-500 transform hover:-translate-y-2 relative overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute -right-10 -bottom-10 opacity-30 group-hover:opacity-50 transition-opacity">
                        <img src="{{ asset('assets/img/premium/tracking_feature_3d_1770892958524.png') }}" class="w-48 h-48 object-contain">
                    </div>
                    <div class="h-20 w-20 rounded-2xl bg-blue-600 text-white flex items-center justify-center mb-8 shadow-lg shadow-blue-500/30">
                        <svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-white mb-4">Real-Time Tracking</h3>
                    <p class="text-slate-400 leading-relaxed text-lg">
                        Track every step with millisecond accuracy. Get notified via SMS or WhatsApp the moment your package moves.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="group bg-white p-10 rounded-[2.5rem] shadow-xl hover:shadow-[0_30px_60px_-15px_rgba(79,70,229,0.2)] transition-all duration-500 transform hover:-translate-y-2 border border-slate-100" data-aos="fade-up" data-aos-delay="200">
                    <div class="h-20 w-20 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-8 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-500 shadow-inner">
                        <svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-4">Cash on Delivery</h3>
                    <p class="text-slate-500 leading-relaxed text-lg">
                        Boost your sales with our reliable COD handling. We collect payments and remit them to you with 24h settlements.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works -->
    <div class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-4xl font-extrabold text-slate-900">How It Works</h2>
                <p class="mt-4 text-lg text-slate-500">Shipping made simple in 3 steps</p>
            </div>
            
            <div class="relative">
                <!-- Connector Line -->
                <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-gray-100 -translate-y-1/2 z-0"></div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative z-10">
                    <!-- Step 1 -->
                    <div class="bg-white p-6 text-center" data-aos="zoom-in" data-aos-delay="0">
                        <div class="w-20 h-20 mx-auto bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mb-6 shadow-xl shadow-blue-600/20 border-4 border-white">1</div>
                        <h3 class="text-xl font-bold mb-2">Book a Shipment</h3>
                        <p class="text-slate-500">Create an order via our dashboard or connect your store API.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="bg-white p-6 text-center" data-aos="zoom-in" data-aos-delay="200">
                        <div class="w-20 h-20 mx-auto bg-indigo-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mb-6 shadow-xl shadow-indigo-600/20 border-4 border-white">2</div>
                        <h3 class="text-xl font-bold mb-2">We Pick & Pack</h3>
                        <p class="text-slate-500">Our courier picks up the package from your doorstep instantly.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="bg-white p-6 text-center" data-aos="zoom-in" data-aos-delay="400">
                        <div class="w-20 h-20 mx-auto bg-slate-900 text-white rounded-full flex items-center justify-center text-2xl font-bold mb-6 shadow-xl shadow-slate-900/20 border-4 border-white">3</div>
                        <h3 class="text-xl font-bold mb-2">Delivered Safely</h3>
                        <p class="text-slate-500">We deliver to your customer and collect cash if needed.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Contact Section -->
    <div class="py-24 bg-white" id="contact">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-sm font-bold text-blue-600 uppercase tracking-widest mb-3">Get in Touch</h2>
                    <h3 class="text-4xl font-extrabold text-slate-900 mb-6">Request a Callback</h3>
                    <p class="text-slate-500 text-lg mb-8 leading-relaxed">
                        Have a specific requirement or need bulk shipping rates? Our experts are ready to help. Fill in the form and we'll get back to you within 30 minutes.
                    </p>
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Direct Support</h4>
                                <p class="text-slate-500">+91 1800-FAST-DEL</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Email Analysis</h4>
                                <p class="text-slate-500">support@deliveryfast.in</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-8 md:p-10 rounded-3xl shadow-2xl border border-slate-100" data-aos="fade-left">
                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Full Name</label>
                                <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none" placeholder="John Doe">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Phone Number</label>
                                <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none" placeholder="+91 98765 43210">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Business Email</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none" placeholder="john@company.com">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Shipping Volume</label>
                            <select name="volume" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none bg-white">
                                <option>Less than 50 / month</option>
                                <option>50 - 500 / month</option>
                                <option>500+ / month</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Message (Optional)</label>
                            <textarea name="message" rows="3" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none" placeholder="Tell us about your needs..."></textarea>
                        </div>
                        <button type="submit" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-xl shadow-blue-500/30 transition transform hover:-translate-y-1 active:scale-95">
                            Submit Request
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <!-- Call to Action -->
     <div class="py-20 bg-blue-600 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-700"></div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10" data-aos="fade-up">
            <h2 class="text-3xl md:text-5xl font-extrabold mb-6">Ready to scale your business?</h2>
            <p class="text-blue-100 text-xl mb-10 max-w-2xl mx-auto">Join thousands of merchants who trust DeliveryFast for their logistics.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-blue-700 font-bold rounded-full text-lg shadow-lg hover:bg-gray-100 transition transform hover:-translate-y-1">Get Started for Free</a>
                <a href="#" class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full text-lg hover:bg-white/10 transition">Contact Sales</a>
            </div>
        </div>
     </div>

     <!-- Footer -->
     @include('theme.layout.layout-components.footer')

     <!-- AOS Animation Script -->
     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
     <script>
         AOS.init({
             once: true,
             offset: 50,
             duration: 800,
             easing: 'ease-out-cubic',
         });
     </script>
</body>
</html>
