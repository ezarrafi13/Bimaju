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
    <div class="flex w-full">
        @include('components.sidebar')
        <div class="p-6 space-y-6 w-full">
            <div class="mb-2 border-b border-gray-200 p-6 flex justify-between items-center">
                <div class="flex flex-col gap-2">
                    <h1 class="font-semibold text-3xl">Welcome back, Sari!</h1>
                    <p>Ready to grow your F&B business today?</p>
                </div>
                <div class="profile-wrapper">
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="{{ asset('assets/images/flower.jpg') }}" alt="" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Finance</h1>
            <p class="text-gray-500 mt-1">
                Manage your business income & expenses easily
            </p>
        </div>

        {{-- Quick Actions --}}
        <div class="flex flex-col sm:flex-row gap-2">
            <button class="flex items-center gap-2 border border-gray-300 text-gray-700 px-3 py-2 rounded-md text-sm hover:bg-gray-100">
                {{-- Icon Calculator --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 6h6M9 12h6m-6 6h6" />
                </svg>
                Quick HPP
            </button>

            <a href="" class="flex items-center gap-2 border border-gray-300 text-gray-700 px-3 py-2 rounded-md text-sm hover:bg-gray-100">
                {{-- Icon Calculator --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 6h6M9 12h6m-6 6h6" />
                </svg>
                Full HPP Calculator
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2h11a2 2 0 002-2v-5l4 4" />
                </svg>
            </a>

            <button class="flex items-center gap-2 bg-[#12B6D3] text-white px-3 py-2 rounded-md text-sm hover:bg-bg-[#12B6D3]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Transaction
            </button>
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm text-gray-500">Total Income</h3>
            <p class="text-2xl font-bold text-gray-900">Rp 15,750,000</p>
            <p class="text-green-600 text-sm">+12.5% from last month</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm text-gray-500">Total Expenses</h3>
            <p class="text-2xl font-bold text-gray-900">Rp 8,250,000</p>
            <p class="text-red-600 text-sm">+5.2% from last month</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm text-gray-500">Net Profit</h3>
            <p class="text-2xl font-bold text-gray-900">Rp 7,500,000</p>
            <p class="text-green-600 text-sm">+18.3% from last month</p>
        </div>
    </div>

    {{-- Transaction List --}}
    <div class="space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="text-xl font-semibold">Recent Transactions</h2>
            <button class="flex items-center gap-2 border border-gray-300 text-gray-700 px-3 py-2 rounded-md text-sm hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Export CSV
            </button>
        </div>

        <div class="bg-white rounded-lg shadow divide-y">
            {{-- Transaction Item --}}
            <div class="flex items-center justify-between p-4">
                <div>
                    <p class="font-medium text-gray-900">Penjualan Nasi Gudeg</p>
                    <p class="text-sm text-gray-500">15 Jan 2024</p>
                </div>
                <div class="text-right">
                    <p class="text-green-600 font-semibold">+Rp 750.000</p>
                    <span class="inline-block text-xs bg-teal-100 text-[#12B6D3] px-2 py-0.5 rounded">Income</span>
                </div>
            </div>

            <div class="flex items-center justify-between p-4">
                <div>
                    <p class="font-medium text-gray-900">Beli Bahan Baku</p>
                    <p class="text-sm text-gray-500">15 Jan 2024</p>
                </div>
                <div class="text-right">
                    <p class="text-red-600 font-semibold">-Rp 350.000</p>
                    <span class="inline-block text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded">Expense</span>
                </div>
            </div>

            <div class="flex items-center justify-between p-4">
                <div>
                    <p class="font-medium text-gray-900">Penjualan Ayam Geprek</p>
                    <p class="text-sm text-gray-500">14 Jan 2024</p>
                </div>
                <div class="text-right">
                    <p class="text-green-600 font-semibold">+Rp 425.000</p>
                    <span class="inline-block text-xs bg-teal-100 text-bg-[#12B6D3] px-2 py-0.5 rounded">Income</span>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</body>
</html>
