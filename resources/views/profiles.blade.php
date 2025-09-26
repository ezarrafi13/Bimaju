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
            <div class="text-center space-y-2">
                <div class="flex items-center justify-center gap-2 mb-2">
                    <!-- Icon pakai emoji biar simple -->
                    <span class="text-3xl">👨‍🍳</span>
                    <h1 class="text-3xl font-bold text-gray-900">Resep Premium</h1>
                </div>
                <p class="text-gray-600 text-lg">
                    Temukan inspirasi menu terbaik untuk bisnismu
                </p>
            </div>
            <div class="flex flex-col md:flex-row gap-4 items-start md:items-center justify-between">
    <!-- Search -->
    <div class="flex-1 max-w-md">
        <div class="relative">
            <input
                type="text"
                placeholder="Cari resep..."
                class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
            >
            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">🔍</span>
        </div>
    </div>

    <!-- Filter Kategori -->
    <div class="flex flex-wrap gap-2">
        @foreach (['all' => 'Semua', 'Snack' => 'Snack', 'Beverage' => 'Beverage', 'Dessert' => 'Dessert', 'Main Course' => 'Main Course'] as $value => $label)
            <button
                class="px-4 py-2 rounded-lg text-sm font-medium border hover:bg-gray-100"
            >
                {{ $label }}
            </button>
        @endforeach
    </div>
</div>
<div class="group border rounded-lg overflow-hidden hover:shadow-lg transition">
    <!-- Gambar -->
    <div class="relative">
        <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
        <div class="absolute top-3 left-3">
            <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded text-xs">{{ $recipe['category'] }}</span>
        </div>
        <div class="absolute top-3 right-3">
            <span class="bg-indigo-600 text-white px-2 py-1 rounded text-xs">
                Rp {{ number_format($recipe['price'], 0, ',', '.') }}
            </span>
        </div>
    </div>

    <!-- Konten -->
    <div class="p-4 space-y-3">
        <div>
            <h3 class="font-semibold text-lg truncate">{{ $recipe['title'] }}</h3>
            <p class="text-sm text-gray-500 line-clamp-2 mt-1">{{ $recipe['description'] }}</p>
        </div>

        <div class="flex items-center gap-4 text-xs text-gray-500">
            <span>⏱ {{ $recipe['cookingTime'] }}</span>
            <span>👥 {{ $recipe['servingSize'] }}</span>
            <span>⭐ {{ $recipe['rating'] }}</span>
        </div>

        <div class="flex gap-2">
            <button class="flex-1 px-3 py-2 text-sm border rounded-lg hover:bg-gray-100">Preview</button>
            <button class="flex-1 px-3 py-2 text-sm bg-primary text-white rounded-lg hover:bg-primary/90">Beli</button>
        </div>
    </div>
</div>
<div x-data="{ open: false }">
    <!-- Trigger Button -->
    <button @click="open = true"
        class="flex-1 px-3 py-2 text-sm border rounded-lg hover:bg-gray-100">
        Preview
    </button>

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50 bg-black/50">
        <div class="bg-white rounded-lg max-w-2xl w-full p-6 relative">
            <button @click="open = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                ✖
            </button>

            <div class="flex flex-col md:flex-row gap-6">
                <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}"
                     class="w-full md:w-1/2 h-60 object-cover rounded-lg">

                <div class="flex-1 space-y-3">
                    <h2 class="text-2xl font-bold">{{ $recipe['title'] }}</h2>
                    <p class="text-gray-600 text-sm">{{ $recipe['description'] }}</p>

                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <span>⏱ {{ $recipe['cookingTime'] }}</span>
                        <span>👥 {{ $recipe['servingSize'] }}</span>
                        <span>⭐ {{ $recipe['rating'] }}</span>
                    </div>

                    <h3 class="font-semibold mt-4">Bahan-bahan:</h3>
                    <ul class="list-disc list-inside text-sm text-gray-600">
                        @foreach ($recipe['ingredients'] as $ingredient)
                            <li>{{ $ingredient }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button @click="open = false"
                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div x-data="{ open: false }">
    <!-- Trigger Button -->
    <button @click="open = true"
        class="flex-1 px-3 py-2 text-sm bg-primary text-white rounded-lg hover:bg-primary/90">
        Beli
    </button>

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50 bg-black/50">
        <div class="bg-white rounded-lg max-w-md w-full p-6 relative">
            <button @click="open = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                ✖
            </button>

            <h2 class="text-xl font-bold mb-4">Pembelian Resep</h2>
            <p class="text-gray-600 mb-4">
                Anda akan membeli resep <span class="font-semibold">{{ $recipe['title'] }}</span> seharga
                <span class="text-primary">Rp {{ number_format($recipe['price'], 0, ',', '.') }}</span>.
            </p>

            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium">Nama Lengkap</label>
                    <input type="text" name="name" required
                           class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                </div>

                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" required
                           class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                </div>

                <div>
                    <label class="block text-sm font-medium">Metode Pembayaran</label>
                    <select name="payment" required
                        class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                        <option value="">Pilih Metode</option>
                        <option value="gopay">GoPay</option>
                        <option value="ovo">OVO</option>
                        <option value="dana">Dana</option>
                        <option value="transfer">Transfer Bank</option>
                    </select>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" @click="open = false"
                        class="px-4 py-2 border rounded-lg hover:bg-gray-100">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">
                        Bayar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


        </div>
    </div>
</div>
</body>
</html>
