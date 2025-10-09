<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex">
        @include('components.sidebar')
        <div class="flex-grow flex flex-col pl-64">
            <div class="border-b border-gray-200 p-6 flex justify-between items-center">
                <div class="flex flex-col">
                    <h1 class="font-bold text-2xl">Welcome back, {{ auth()->user()->name ?? 'User' }}!</h1>
                    <p class="text-gray-500">Ready to grow your F&B business today?</p>
                </div>
                <div class="profile-wrapper">
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="{{ asset('assets/images/flower.jpg') }}" alt="" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="text-center mb-10">
        <h1 class="text-2xl font-bold">Paket Langganan</h1>
        <p class="text-gray-600">Pilih paket sesuai kebutuhan bisnismu</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Basic Plan -->
        <div class="relative bg-white border rounded-lg shadow-sm p-6 text-center">
            <span class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-green-100 text-green-600 text-xs font-medium px-3 py-1 rounded-full">
                Paket Saat Ini
            </span>
            <div class="text-3xl mb-2">⚡</div>
            <h2 class="text-lg font-semibold">Basic</h2>
            <p class="text-sm text-gray-500 mb-4">Untuk memulai bisnis F&amp;B</p>

            <p class="text-2xl font-bold">Gratis <span class="text-base font-normal text-gray-500">selamanya</span></p>

            <ul class="mt-6 space-y-2 text-sm text-gray-600 text-left">
                <li>✔ Dashboard dasar</li>
                <li>✔ Kalkulator HPP sederhana</li>
                <li>✔ 5 resep gratis</li>
                <li>✔ Konsultasi terbatas</li>
                <li>✔ Support email</li>
            </ul>

            <button class="mt-6 w-full px-4 py-2 bg-gray-200 text-gray-600 font-medium rounded-md cursor-not-allowed">
                Paket Aktif
            </button>
        </div>

        <!-- Pro Plan -->
        <div class="relative bg-white border-2 border-sky-500 rounded-lg shadow-md p-6 text-center">
            <span class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-sky-500 text-white text-xs font-medium px-3 py-1 rounded-full">
                Populer
            </span>
            <div class="text-3xl mb-2">👑</div>
            <h2 class="text-lg font-semibold">Pro</h2>
            <p class="text-sm text-gray-500 mb-4">Untuk bisnis yang berkembang</p>

            <p class="text-2xl font-bold">Rp99.000 <span class="text-base font-normal text-gray-500">/bulan</span></p>

            <ul class="mt-6 space-y-2 text-sm text-gray-600 text-left">
                <li>✔ Semua fitur Basic</li>
                <li>✔ Kalkulator HPP advanced</li>
                <li>✔ Resep unlimited</li>
                <li>✔ Analytics lengkap</li>
                <li>✔ Konsultasi prioritas</li>
                <li>✔ Support 24/7</li>
            </ul>

            <button class="mt-6 w-full px-4 py-2 bg-sky-500 text-white font-medium rounded-md hover:bg-sky-600">
                Coming Soon
            </button>
        </div>

        <!-- Premium Plan -->
        <div class="relative bg-white border rounded-lg shadow-sm p-6 text-center">
            <div class="text-3xl mb-2">✨</div>
            <h2 class="text-lg font-semibold">Premium</h2>
            <p class="text-sm text-gray-500 mb-4">Untuk bisnis skala besar</p>

            <p class="text-2xl font-bold">Rp199.000 <span class="text-base font-normal text-gray-500">/bulan</span></p>

            <ul class="mt-6 space-y-2 text-sm text-gray-600 text-left">
                <li>✔ Semua fitur Pro</li>
                <li>✔ Multi-outlet management</li>
                <li>✔ Custom branding</li>
                <li>✔ API access</li>
                <li>✔ Dedicated account manager</li>
                <li>✔ Training & onboarding</li>
            </ul>

            <button class="mt-6 w-full px-4 py-2 border border-sky-500 text-sky-600 font-medium rounded-md hover:bg-sky-50">
                Coming Soon
            </button>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
