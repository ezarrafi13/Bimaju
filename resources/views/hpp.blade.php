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
            {{-- Header --}}
            <div class="p-6 space-y-6 max-w-6xl mx-auto">
              <!-- Header -->
              <div class="text-center space-y-2">
                <div class="flex items-center justify-center gap-2 mb-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M9 8h6m-6-4h6m2 0h-1a2 2 0 00-2-2H9a2 2 0 00-2 2H6a2 2 0 00-2 2v14a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2z"/>
                  </svg>
                  <h1 class="text-3xl font-bold text-gray-800">Kalkulator HPP</h1>
                </div>
                <p class="text-gray-500 text-lg">
                  Hitung biaya produksi dan harga jual dengan mudah
                </p>
              </div>

              <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column -->
                <div class="lg:col-span-2 space-y-6">
                  <!-- Ingredients -->
                  <div class="bg-white shadow rounded-xl p-4">
                    <div class="flex items-center justify-between mb-4">
                      <h2 class="font-semibold text-lg">Daftar Bahan Baku</h2>
                      <button id="addIngredientBtn" class="px-3 py-1 bg-indigo-600 text-white rounded-lg text-sm hover:bg-indigo-700 flex items-center gap-1">
                        + Tambah Bahan
                      </button>
                    </div>

                    <div id="ingredientsList" class="space-y-4">
                      <!-- Ingredient rows akan ditambahkan via JS -->
                    </div>
                  </div>

                  <!-- Portion & Margin -->
                  <div class="bg-white shadow rounded-xl p-4 space-y-4">
                    <div>
                      <label for="portionCount" class="block text-sm font-medium text-gray-700">Jumlah Porsi</label>
                      <input id="portionCount" type="number" value="10"
                        class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                      <label for="margin" class="block text-sm font-medium text-gray-700">Margin Keuntungan (%)</label>
                      <input id="margin" type="number" value="30"
                        class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                  </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                  <!-- Results -->
                  <div id="resultCard" class="hidden bg-green-50 border border-green-200 rounded-xl p-4 space-y-3">
                    <h3 class="text-lg font-semibold text-green-700">Hasil Kalkulasi</h3>
                    <div class="flex justify-between">
                      <span class="text-gray-600">Total Biaya Bahan:</span>
                      <span id="totalCost" class="font-medium">Rp 0</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600">Biaya per Porsi:</span>
                      <span id="costPerPortion" class="font-medium">Rp 0</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-800 font-semibold">Harga Jual Disarankan:</span>
                      <span id="suggestedPrice" class="font-bold text-indigo-600">Rp 0</span>
                    </div>
                  </div>

                  <!-- Actions -->
                  <div class="bg-white shadow rounded-xl p-4 space-y-3">
                    <button id="calculateBtn"
                      class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                      Hitung HPP
                    </button>
                    <div class="grid grid-cols-2 gap-2">
                      <button id="exportPdf" disabled
                        class="px-3 py-2 border rounded-lg text-sm hover:bg-gray-50 disabled:opacity-50">Export PDF</button>
                      <button id="exportCsv" disabled
                        class="px-3 py-2 border rounded-lg text-sm hover:bg-gray-50 disabled:opacity-50">Export CSV</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", () => {
  let ingredients = [
    { id: Date.now(), name: "Beras", unit: "kg", pricePerUnit: 12000, quantityUsed: 0.5 },
    { id: Date.now()+1, name: "Ayam", unit: "kg", pricePerUnit: 35000, quantityUsed: 0.3 }
  ];

  const ingredientsList = document.getElementById("ingredientsList");
  const calculateBtn = document.getElementById("calculateBtn");
  const resultCard = document.getElementById("resultCard");
  const totalCostEl = document.getElementById("totalCost");
  const costPerPortionEl = document.getElementById("costPerPortion");
  const suggestedPriceEl = document.getElementById("suggestedPrice");

  const portionInput = document.getElementById("portionCount");
  const marginInput = document.getElementById("margin");

  function renderIngredients() {
    ingredientsList.innerHTML = "";
    ingredients.forEach((ing, index) => {
      const row = document.createElement("div");
      row.className = "grid grid-cols-12 gap-2 items-center";
      row.innerHTML = `
        <input type="text" value="${ing.name}" placeholder="Nama" class="col-span-3 border rounded px-2 py-1"
          oninput="updateIngredient(${ing.id}, 'name', this.value)">
        <input type="text" value="${ing.unit}" placeholder="Satuan" class="col-span-2 border rounded px-2 py-1"
          oninput="updateIngredient(${ing.id}, 'unit', this.value)">
        <input type="number" value="${ing.pricePerUnit}" placeholder="Harga" class="col-span-3 border rounded px-2 py-1"
          oninput="updateIngredient(${ing.id}, 'pricePerUnit', this.value)">
        <input type="number" step="0.1" value="${ing.quantityUsed}" placeholder="Jumlah" class="col-span-2 border rounded px-2 py-1"
          oninput="updateIngredient(${ing.id}, 'quantityUsed', this.value)">
        <button onclick="removeIngredient(${ing.id})" class="col-span-2 text-red-600 hover:underline text-sm">Hapus</button>
      `;
      ingredientsList.appendChild(row);
    });
  }

  window.updateIngredient = (id, field, value) => {
    ingredients = ingredients.map(ing => ing.id === id ? { ...ing, [field]: field.includes("price") || field.includes("quantity") ? parseFloat(value) || 0 : value } : ing);
  };

  window.removeIngredient = (id) => {
    ingredients = ingredients.filter(ing => ing.id !== id);
    renderIngredients();
  };

  document.getElementById("addIngredientBtn").addEventListener("click", () => {
    ingredients.push({ id: Date.now(), name: "", unit: "", pricePerUnit: 0, quantityUsed: 0 });
    renderIngredients();
  });

  calculateBtn.addEventListener("click", () => {
    if (ingredients.length === 0) {
      alert("Tambahkan minimal satu bahan!");
      return;
    }
    const portion = parseInt(portionInput.value) || 1;
    const margin = parseInt(marginInput.value) || 0;

    const totalCost = ingredients.reduce((sum, ing) => sum + (ing.pricePerUnit * ing.quantityUsed), 0);
    const costPerPortion = totalCost / portion;
    const suggestedPrice = costPerPortion * (1 + margin/100);

    totalCostEl.textContent = formatRupiah(totalCost);
    costPerPortionEl.textContent = formatRupiah(costPerPortion);
    suggestedPriceEl.textContent = formatRupiah(suggestedPrice);

    resultCard.classList.remove("hidden");
    document.getElementById("exportPdf").disabled = false;
    document.getElementById("exportCsv").disabled = false;
  });

  document.getElementById("exportPdf").addEventListener("click", () => {
    alert("Export PDF masih dummy 🚀");
  });
  document.getElementById("exportCsv").addEventListener("click", () => {
    alert("Export CSV masih dummy 🚀");
  });

  function formatRupiah(value) {
    return new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 0 }).format(value);
  }

  renderIngredients();
});
</script>
</body>
</html>
