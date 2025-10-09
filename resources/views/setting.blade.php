<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('User Profile') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50" x-data="{ showChangePass:false }">
    <div class="flex">
        @include('components.sidebar')

        <div class="flex-grow flex flex-col pl-64">
            <!-- Header -->
            <div class="border-b border-gray-200 bg-white p-6 flex justify-between items-center fixed z-10 w-full pr-72">
                <div class="flex flex-col">
                    <h1 class="font-bold text-2xl">{{ __('Welcome back, :name!', ['name' => auth()->user()->name ?? __('User')]) }}</h1>
                    <p class="text-gray-500">{{ __("Ready to grow your F&B business today?") }}</p>
                </div>
                <div class="profile-wrapper">
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="{{ asset('assets/images/flower.jpg') }}" alt="" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Main -->
            <div class="max-w-6xl mx-auto p-6 mt-24">
                <!-- Title -->
                <div class="mb-8">
                    <h1 class="text-2xl font-bold">{{ __('User Profile') }}</h1>
                    <p class="text-gray-600">{{ __('View and manage your personal information.') }}</p>
                </div>

                <div class="space-y-6">
                    <!-- Language Preference -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-lg font-semibold mb-4">{{ __('Language Preference') }}</h2>
                        <form method="POST" action="{{ route('settings.language') }}" class="flex flex-col gap-4 md:flex-row md:items-end">
                            @csrf
                            <div class="flex-1">
                                <label for="locale" class="block text-sm font-medium text-gray-700 mb-1">
                                    {{ __('Choose interface language') }}
                                </label>
                                <select id="locale" name="locale" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#12B6D3]">
                                    @foreach($availableLocales as $value => $label)
                                        <option value="{{ $value }}" @selected($currentLocale === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('locale')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-[#12B6D3] text-white font-medium rounded-md hover:bg-[#0fa2bd] transition">
                                {{ __('Save Language') }}
                            </button>
                        </form>
                    </div>

                    <!-- Langganan Saat Ini -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-lg font-semibold flex items-center gap-2 mb-2">👑 Langganan Saat Ini</h2>
                        <p class="text-sm text-gray-600 mb-4">Kelola paket langganan dan benefitmu</p>

                        <div class="flex items-center gap-2 mb-4">
                            <span class="px-3 py-1 text-xs font-medium text-white bg-sky-500 rounded-full">Pro Plan</span>
                            <span class="text-sm text-gray-600">Berlaku hingga 31 Desember 2025</span>
                        </div>

                        <div class="flex gap-3 mb-6">
                            <a href="{{ url('/subscription') }}" class="px-4 py-2 bg-sky-500 text-white font-medium rounded-md hover:bg-sky-600 inline-flex items-center justify-center">
                                Upgrade Plan
                            </a>
                            <button class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-100">
                                Perpanjang Langganan
                            </button>
                        </div>

                        <h3 class="text-sm font-semibold mb-2">Benefit Pro Plan:</h3>
                        <ul class="list-disc list-inside text-sm text-gray-600 space-y-1">
                            <li>Semua fitur Basic</li>
                            <li>Resep premium & eksklusif</li>
                            <li>Analisis bisnis mendalam</li>
                            <li>Konsultasi dengan ahli</li>
                            <li>Laporan real-time</li>
                        </ul>
                    </div>

                    <!-- Riwayat Transaksi -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-lg font-semibold flex items-center gap-2 mb-2">📜 Riwayat Transaksi</h2>
                        <p class="text-sm text-gray-600 mb-4">Lihat semua transaksi dan unduh invoice</p>

                        <div class="space-y-3">
                            <!-- Item Transaksi -->
                            <div class="flex items-center justify-between border rounded-lg p-4">
                                <div>
                                    <p class="font-medium">Perpanjang Langganan Pro</p>
                                    <p class="text-xs text-gray-500">1 Sept 2025</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <p class="font-medium">Rp100.000</p>
                                    <span class="px-2 py-0.5 text-xs bg-sky-100 text-sky-600 rounded-full">Sukses</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between border rounded-lg p-4">
                                <div>
                                    <p class="font-medium">Pembelian Resep Premium</p>
                                    <p class="text-xs text-gray-500">15 Ags 2025</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <p class="font-medium">Rp25.000</p>
                                    <span class="px-2 py-0.5 text-xs bg-sky-100 text-sky-600 rounded-full">Sukses</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between border rounded-lg p-4">
                                <div>
                                    <p class="font-medium">Upgrade ke Pro Plan</p>
                                    <p class="text-xs text-gray-500">1 Ags 2025</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <p class="font-medium">Rp75.000</p>
                                    <span class="px-2 py-0.5 text-xs bg-sky-100 text-sky-600 rounded-full">Sukses</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Keamanan -->
                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-lg font-semibold flex items-center gap-2 mb-4">🛡 Keamanan</h2>
                            <p class="text-sm text-gray-600 mb-4">Kelola keamanan akun Anda</p>

                            <div class="space-y-3">
                                <!-- tombol ubah password -->
                                <button @click="showChangePass = true" class="w-full px-4 py-2 border rounded-md hover:bg-gray-100 flex items-center gap-2">
                                    🔑 Ubah Password
                                </button>

                                <!-- logout semua device + keluar -->
                                <form method="POST" action="{{ route('profile.logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full px-4 py-2 border rounded-md hover:bg-gray-100 flex items-center gap-2">
                                        ↪ Logout dari Semua Perangkat
                                    </button>
                                </form>
                            </div>
                        </div>


                        <!-- Zona Berbahaya -->
                        <div class="bg-red-50 border border-red-300 shadow rounded-lg p-6">
                            <h2 class="text-lg font-semibold text-red-600 flex items-center gap-2 mb-4">🗑 Zona Berbahaya</h2>
                            <p class="text-sm text-gray-600 mb-4">Tindakan yang tidak dapat dibatalkan</p>

                            <form method="POST" action="{{ route('account.delete') }}">
                                @csrf
                                @method('DELETE')
                                <button class="w-full px-4 py-2 bg-red-500 text-white font-medium rounded-md hover:bg-red-600 flex items-center gap-2">
                                    🗑 Hapus Akun
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Modal Ubah Password -->
<!-- Modal Ubah Password -->
<div
    x-show="showChangePass"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40"
>
    <div class="bg-white rounded-lg w-full max-w-md p-6 relative shadow-lg"
         x-data="{ showOld:false, showNew:false, showConfirm:false }">

        <h3 class="text-lg font-semibold mb-4">Ubah Password</h3>

        <!-- ALERT ERROR -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.change-password') }}">
            @csrf

            <!-- Password Lama -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Password Lama</label>
                <div class="relative">
                    <input :type="showOld ? 'text' : 'password'" name="current_password"
                        class="w-full border rounded-md px-3 py-2 pr-10 @error('current_password') border-red-500 @enderror" required>
                    <button type="button" @click="showOld = !showOld"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">
                        <i :class="showOld ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
                    </button>
                </div>
                @error('current_password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Baru -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Password Baru</label>
                <div class="relative">
                    <input :type="showNew ? 'text' : 'password'" name="new_password"
                        class="w-full border rounded-md px-3 py-2 pr-10 @error('new_password') border-red-500 @enderror" required>
                    <button type="button" @click="showNew = !showNew"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">
                        <i :class="showNew ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
                    </button>
                </div>
                @error('new_password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Konfirmasi Password Baru</label>
                <div class="relative">
                    <input :type="showConfirm ? 'text' : 'password'" name="new_password_confirmation"
                        class="w-full border rounded-md px-3 py-2 pr-10" required>
                    <button type="button" @click="showConfirm = !showConfirm"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">
                        <i :class="showConfirm ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
                    </button>
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" @click="showChangePass = false"
                    class="px-4 py-2 border rounded-md hover:bg-gray-100">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Sukses -->
@if(session('success'))
<div
    x-data="{ show:true }"
    x-show="show"
    x-init="setTimeout(()=>show=false,5000)"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40"
>
    <div class="bg-white rounded-lg w-full max-w-sm p-6 text-center shadow-lg">
        <h3 class="text-lg font-semibold text-green-600 mb-2">✅ Berhasil</h3>
        <p class="text-gray-700">{{ session('success') }}</p>
    </div>
</div>
@endif


</body>
</html>
