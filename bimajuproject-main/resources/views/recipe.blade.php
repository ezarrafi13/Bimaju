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
        <div class="w-full">
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
            <div class="p-6">
                <div class="container mx-auto px-4 py-6">
                    <!-- Title -->
                    <h1 class="text-2xl font-bold text-center mb-2">
                        <img src="{{ asset('assets/images/food.svg') }}" alt="" class="w-6">
                        Resep Premium</h1>
                    <p class="text-gray-600 text-center mb-6">Temukan inspirasi menu terbaik untuk bisnismu</p>

                    <!-- Search -->
                    <div class="flex justify-center mb-4">
                        <input type="text" placeholder="Cari resep..."
                            class="w-1/2 border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <!-- Tabs -->
                    <div class="flex justify-center gap-2 mb-6">
                        <button class="px-4 py-2 bg-blue-500 text-white rounded-lg">Semua</button>
                        <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg">Snack</button>
                        <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg">Beverage</button>
                        <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg">Dessert</button>
                        <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg">Main Course</button>
                    </div>

                    <!-- Card Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Card -->
                        <div class="border rounded-lg shadow-sm p-4 flex flex-col">
                            <div class="relative">
                                <span class="text-xs text-gray-500 mb-1 absolute bg-white rounded-full px-4 py-1">Dessert</span>
                                <img src="{{ asset('assets/images/kue-lapis.jpg') }}" alt="" class="w-full h-full object-cover">
                            </div>
                            <h2 class="font-semibold text-lg">Kue Lapis Legit Premium</h2>
                            <p class="text-sm text-gray-600 mb-3">Resep rahasia kue lapis legit dengan teknik layer yang sempurna</p>

                            <div class="flex items-center justify-between text-sm text-gray-500 mb-3">
                                <span>⏱ 3 jam</span>
                                <span>👥 12 porsi</span>
                                <span>⭐ 4.9</span>
                            </div>

                            <div class="flex justify-between items-center mt-auto">
                                <button onclick="openModal('lapis-legit')"
                                        class="px-4 py-2 text-blue-500 border border-blue-500 rounded-lg hover:bg-blue-50">
                                    Preview
                                </button>
                                <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                    Rp 75.000
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Modal -->
<div id="modal-lapis-legit" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center hidden">
    <div class="bg-white w-11/12 md:w-1/2 rounded-lg shadow-lg p-6 relative">
        <!-- Close -->
        <button onclick="closeModal('lapis-legit')" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
            ✖
        </button>
        <span class="text-xs text-gray-500 mb-2 block bg-white">Dessert</span>
        <h2 class="text-xl font-bold">Kue Lapis Legit Premium</h2>
        <p class="text-sm text-gray-600 mb-3">Resep rahasia kue lapis legit dengan teknik layer yang sempurna</p>

        <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
            <span>⏱ 3 jam</span>
            <span>👥 12 porsi</span>
            <span>⭐ 4.9</span>
        </div>

        <!-- Preview terkunci -->
        <div class="border border-dashed p-4 text-center text-gray-500 mb-4">
            🔒 Beli resep untuk melihat detail lengkap <br>
            (termasuk bahan, langkah, dan tips rahasia)
        </div>

        <!-- Action -->
        <div class="flex justify-between items-center">
            <span class="font-bold text-lg text-blue-600">Rp 75.000</span>
            <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Beli Sekarang
            </button>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
        document.getElementById('modal-' + id).classList.add('flex');
    }
    function closeModal(id) {
        document.getElementById('modal-' + id).classList.remove('flex');
        document.getElementById('modal-' + id).classList.add('hidden');
    }
</script>
</body>
</html>
