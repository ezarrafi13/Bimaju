<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resep Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="flex">
    @include('components.sidebar')
    <div class="flex-grow flex flex-col pl-64">
        <div class="border-b border-gray-200 bg-white p-6 flex justify-between items-center fixed z-10 w-full pr-72">
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

        <div class="p-6 pt-32">
            <div class="container mx-auto px-4 py-6">
                <!-- Title -->
                <h1 class="text-2xl font-bold text-center mb-2 flex justify-center items-center gap-2">
                    <img src="{{ asset('assets/images/food.svg') }}" alt="" class="w-6">
                    Resep Premium
                </h1>
                <p class="text-gray-600 text-center mb-6">Temukan inspirasi menu terbaik untuk bisnismu</p>

                <!-- Tabs -->
                <div class="flex justify-center mb-6">
                    <button id="tab-all" class="tab-btn px-6 py-2 bg-cyan-500 text-white rounded-l-lg">Semua Resep</button>
                    <button id="tab-bought" class="tab-btn px-6 py-2 bg-gray-100 hover:bg-gray-200 rounded-r-lg">Resep Dibeli</button>
                </div>

                <!-- Search -->
                <div class="flex justify-center mb-4">
                    <input id="search-input" type="text" placeholder="Cari resep..."
                           class="w-1/2 border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none" autocomplete="off">
                </div>

                <!-- Filter -->
                <div class="flex justify-center gap-2 mb-6">
                    <button class="filter-btn px-4 py-2 bg-cyan-500 text-white rounded-lg" data-category="Semua">Semua</button>
                    <button class="filter-btn px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg" data-category="Snack">Snack</button>
                    <button class="filter-btn px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg" data-category="Beverage">Beverage</button>
                    <button class="filter-btn px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg" data-category="Dessert">Dessert</button>
                    <button class="filter-btn px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg" data-category="Main Course">Main Course</button>
                </div>

                <!-- Card Grid -->
                <div id="recipe-list">
                    @if (count($recipes) > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            @foreach ($recipes as $recipe)
                                <div class="border rounded-lg shadow-sm p-4 flex flex-col">
                                    <div class="relative h-48 overflow-hidden rounded-lg">
                                        <span class="absolute top-3 left-3 bg-white text-xs px-3 py-1 rounded-full text-gray-600">
                                            {{ $recipe->category }}
                                        </span>
                                        <span class="absolute top-3 right-3 bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full">
                                            Rp {{ number_format($recipe->price, 0, ',', '.') }}
                                        </span>
                                        <img src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}" class="w-full h-full object-cover">
                                    </div>
                                    <h2 class="font-semibold text-lg mt-2">{{ $recipe->title }}</h2>
                                    <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $recipe->desc }}</p>

                                    <div class="flex items-center justify-between text-sm text-gray-500 mb-3">
                                        <span>⏱ {{ $recipe->time }}</span>
                                        <span>👥 {{ $recipe->serving }}</span>
                                        <span>⭐ {{ $recipe->rating }}</span>
                                    </div>

                                    <div class="flex justify-between gap-2">
                                        @if (in_array($recipe->id, $boughtRecipeIds ?? []))
                                            <!-- Sudah dibeli -->
                                            <button onclick="openModal('{{ $recipe->id }}')"
                                                    class="flex-1 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                                                👀 Lihat Resep
                                            </button>
                                        @else
                                            <!-- Belum dibeli -->
                                            <button onclick="openModal('{{ $recipe->id }}')"
                                                    class="flex-1 px-4 py-2 text-cyan-500 border border-cyan-500 rounded-lg hover:bg-cyan-50">
                                                Preview
                                            </button>
                                            <button onclick="buyRecipe('{{ $recipe->id }}')"
                                                    class="flex-1 px-4 py-2 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600">
                                                Beli
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center text-gray-500 py-10">
                            Tidak ada data resep
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
@foreach ($recipes as $recipe)
    @if (in_array($recipe->id, $boughtRecipeIds ?? []))
        <!-- ✅ UNLOCKED -->
        <div id="modal-{{ $recipe->id }}" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center hidden z-50">
            <div class="bg-white w-11/12 md:w-1/2 rounded-lg shadow-lg p-6 relative">
                <button onclick="closeModal('{{ $recipe->id }}')" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">✖</button>
                <div class="flex justify-between items-start">
                    <span class="text-xs text-gray-500 mb-2">{{ $recipe->category }}</span>
                    <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full">✔ Unlocked</span>
                </div>

                <h2 class="text-xl font-bold mb-1">{{ $recipe->title }}</h2>
                <div class="flex gap-4 text-sm text-gray-500 mb-3">
                    <span>⏱ {{ $recipe->time }}</span>
                    <span>👥 {{ $recipe->serving }}</span>
                    <span>⭐ {{ $recipe->rating }}</span>
                </div>
                <p class="text-gray-700 mb-4">{{ $recipe->desc }}</p>

                <h3 class="font-semibold text-lg mb-2">Bahan-bahan</h3>
                <ul class="list-disc ml-6 mb-4">
                    @foreach($recipe->ingredients ?? [] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>

                <h3 class="font-semibold text-lg mb-2">Langkah-langkah</h3>
                <ol class="list-decimal ml-6 mb-4">
                    @foreach($recipe->steps as $step)
                        <li>{{ $step->description }}</li>
                    @endforeach
                </ol>

                @if($recipe->tips->count())
                    <h3 class="font-semibold text-lg mb-2">Tips & Trik</h3>
                    <ul class="list-disc ml-6">
                        @foreach($recipe->tips as $tip)
                            <li>{{ $tip->tip }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    @else
        <!-- 🔒 LOCKED -->
        <div id="modal-{{ $recipe->id }}" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center hidden z-50">
            <div class="bg-white w-11/12 md:w-1/2 rounded-lg shadow-lg p-6 relative">
                <button onclick="closeModal('{{ $recipe->id }}')" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">✖</button>
                <span class="text-xs text-gray-500 mb-2 block">{{ $recipe->category }}</span>
                <h2 class="text-xl font-bold">{{ $recipe->title }}</h2>
                <p class="text-sm text-gray-600 mb-3">{{ $recipe->desc }}</p>

                <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                    <span>⏱ {{ $recipe->time }}</span>
                    <span>👥 {{ $recipe->serving }}</span>
                    <span>⭐ {{ $recipe->rating }}</span>
                </div>

                <div class="border border-dashed p-4 text-center text-gray-500 mb-4">
                    🔒 Beli resep untuk melihat detail lengkap <br>
                    (termasuk bahan, langkah, dan tips rahasia)
                </div>

                <div class="flex justify-between items-center">
                    <span class="font-bold text-lg text-cyan-600">{{ $recipe->price }}</span>
                    <button onclick="buyRecipe('{{ $recipe->id }}')" class="px-4 py-2 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600">
                        Beli Sekarang
                    </button>
                </div>
            </div>
        </div>
    @endif
@endforeach

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

<script>
    let currentCategory = "Semua";
    let currentTab = "all";

    // === TAB ===
    document.getElementById("tab-all").addEventListener("click", function () {
        currentTab = "all";
        fetchData();
        this.classList.add("bg-cyan-500", "text-white");
        this.classList.remove("bg-gray-100", "hover:bg-gray-200");
        document.getElementById("tab-bought").classList.remove("bg-cyan-500", "text-white");
        document.getElementById("tab-bought").classList.add("bg-gray-100", "hover:bg-gray-200");
    });

    document.getElementById("tab-bought").addEventListener("click", function () {
        currentTab = "bought";
        fetchData();
        this.classList.add("bg-cyan-500", "text-white");
        this.classList.remove("bg-gray-100", "hover:bg-gray-200");
        document.getElementById("tab-all").classList.remove("bg-cyan-500", "text-white");
        document.getElementById("tab-all").classList.add("bg-gray-100", "hover:bg-gray-200");
    });

    // === FILTER ===
    document.querySelectorAll(".filter-btn").forEach(btn => {
        btn.addEventListener("click", function () {
            currentCategory = this.dataset.category;
            fetchData();
            document.querySelectorAll(".filter-btn").forEach(b => {
                b.classList.remove("bg-cyan-500", "text-white");
                b.classList.add("bg-gray-100", "hover:bg-gray-200");
            });
            this.classList.remove("bg-gray-100", "hover:bg-gray-200");
            this.classList.add("bg-cyan-500", "text-white");
        });
    });

    // === SEARCH ===
    document.getElementById("search-input").addEventListener("keyup", function () {
        fetchData();
    });

    // === AJAX LOAD ===
    function fetchData() {
        let search = document.getElementById("search-input").value;

        fetch(`{{ route('recipes.index') }}?search=${search}&category=${currentCategory}&tab=${currentTab}`, {
            headers: { "X-Requested-With": "XMLHttpRequest" }
        })
            .then(res => res.text())
            .then(html => {
                let parser = new DOMParser();
                let doc = parser.parseFromString(html, "text/html");
                let newContent = doc.querySelector("#recipe-list").innerHTML;
                document.getElementById("recipe-list").innerHTML = newContent;
            });
    }

    // === BELI ===
    function buyRecipe(id) {
        fetch(`/recipes/${id}/buy`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
            .then(res => res.json())
            .then(data => {
                alert(data.message);
                fetchData(); // refresh agar tombol berubah jadi "Lihat Resep"
            })
            .catch(err => console.error(err));
    }
</script>

</body>
</html>
