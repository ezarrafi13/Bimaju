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
        <div class="space-y-6 w-full">
            <div class="border-b border-gray-200 p-6 flex justify-between items-center">
        <div class="flex flex-col">
          <h1 class="font-bold text-2xl">Welcome back, Sari!</h1>
          <p class="text-gray-500">Ready to grow your F&B business today?</p>
        </div>
        <div class="profile-wrapper">
          <div class="w-12 h-12 rounded-full overflow-hidden">
            <img src="{{ asset('assets/images/flower.jpg') }}" alt="" class="w-full h-full object-cover">
          </div>
        </div>
      </div>
            <div class="max-w-6xl mx-auto p-6">
                <!-- Title -->
                <div class="mb-8">
                    <h1 class="text-2xl font-bold">Profil Pengguna</h1>
                    <p class="text-gray-600">Lihat dan kelola informasi pribadimu.</p>
                </div>

                <div class="max-w-6xl mx-auto p-6 space-y-6">
                    <!-- Langganan Saat Ini -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-lg font-semibold flex items-center gap-2 mb-2">👑 Langganan Saat Ini</h2>
                        <p class="text-sm text-gray-600 mb-4">Kelola paket langganan dan benefitmu</p>

                        <div class="flex items-center gap-2 mb-4">
                            <span class="px-3 py-1 text-xs font-medium text-white bg-sky-500 rounded-full">Pro Plan</span>
                            <span class="text-sm text-gray-600">Berlaku hingga 31 Desember 2025</span>
                        </div>

                        <div class="flex gap-3 mb-6">
                            <button class="px-4 py-2 bg-sky-500 text-white font-medium rounded-md hover:bg-sky-600">
                                Upgrade Plan
                            </button>
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
                                    <button class="flex items-center gap-1 px-3 py-1 border rounded-md hover:bg-gray-100 text-sm">
                                        ⬇ Download
                                    </button>
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
                                    <button class="flex items-center gap-1 px-3 py-1 border rounded-md hover:bg-gray-100 text-sm">
                                        ⬇ Download
                                    </button>
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
                                    <button class="flex items-center gap-1 px-3 py-1 border rounded-md hover:bg-gray-100 text-sm">
                                        ⬇ Download
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Preferensi -->
                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-lg font-semibold flex items-center gap-2 mb-4">🔔 Preferensi</h2>
                            <p class="text-sm text-gray-600 mb-4">Atur notifikasi dan bahasa</p>

                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="flex items-center gap-2">📧 Email</span>
                                    <input type="checkbox" checked class="toggle-checkbox" />
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="flex items-center gap-2">📱 WhatsApp</span>
                                    <input type="checkbox" class="toggle-checkbox" />
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="flex items-center gap-2">🔔 In-app</span>
                                    <input type="checkbox" checked class="toggle-checkbox" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">🌐 Bahasa</label>
                                    <select class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500">
                                        <option>Bahasa Indonesia</option>
                                        <option>English</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Keamanan -->
                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-lg font-semibold flex items-center gap-2 mb-4">🛡 Keamanan</h2>
                            <p class="text-sm text-gray-600 mb-4">Kelola keamanan akun Anda</p>

                            <div class="space-y-3">
                                <button class="w-full px-4 py-2 border rounded-md hover:bg-gray-100 flex items-center gap-2">
                                    🔑 Ubah Password
                                </button>
                                <button class="w-full px-4 py-2 border rounded-md hover:bg-gray-100 flex items-center gap-2">
                                    ↪ Logout dari Semua Perangkat
                                </button>
                            </div>
                        </div>

                        <!-- Zona Berbahaya -->
                        <div class="bg-red-50 border border-red-300 shadow rounded-lg p-6">
                            <h2 class="text-lg font-semibold text-red-600 flex items-center gap-2 mb-4">🗑 Zona Berbahaya</h2>
                            <p class="text-sm text-gray-600 mb-4">Tindakan yang tidak dapat dibatalkan</p>

                            <button class="w-full px-4 py-2 bg-red-500 text-white font-medium rounded-md hover:bg-red-600 flex items-center gap-2">
                                🗑 Hapus Akun
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
