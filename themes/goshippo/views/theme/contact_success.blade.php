<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request Received - DeliveryFast</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-gray-800 antialiased h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full text-center bg-white p-10 rounded-3xl shadow-2xl border border-slate-100">
        <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <h1 class="text-3xl font-extrabold text-slate-900 mb-4">Request Received!</h1>
        <p class="text-slate-500 text-lg mb-8">
            Thank you for reaching out. One of our delivery experts <span class="text-blue-600 font-bold underline decoration-blue-200 underline-offset-4">will call you shortly</span> to discuss your requirements.
        </p>
        <a href="{{ route('home') }}" class="inline-block w-full py-4 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-xl transition transform hover:-translate-y-1">
            Back to Home
        </a>
    </div>

</body>
</html>
