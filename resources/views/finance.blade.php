<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>{{ __('Bimaju | Finance') }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <div class="flex w-full">
    @include('components.sidebar')
    <div class="flex-grow flex flex-col pl-64">
      <div class="border-b border-gray-200 p-6 flex justify-between items-center">
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

      <div class="p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
          <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ __('Finance') }}</h1>
            <p class="text-gray-500 mt-1">{{ __('Manage your business income & expenses easily') }}</p>
          </div>

          <div class="flex flex-col sm:flex-row gap-2">
            <button class="flex items-center gap-2 border border-gray-300 text-gray-700 px-3 py-2 rounded-md text-sm hover:bg-gray-100" onclick="openModal('hppModal')">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 6h6M9 12h6m-6 6h6" />
              </svg>
              {{ __('Quick HPP') }}
            </button>

            <a href="/hpp-calculator" class="flex items-center gap-2 border border-gray-300 text-gray-700 px-3 py-2 rounded-md text-sm hover:bg-gray-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 6h6M9 12h6m-6 6h6" />
              </svg>
              {{ __('Full {{ __("HPP Calculator") }}') }}
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2h11a2 2 0 002-2v-5l4 4" />
              </svg>
            </a>

            <button class="flex items-center gap-2 bg-[#12B6D3] text-white px-3 py-2 rounded-md text-sm hover:bg-bg-[#12B6D3]" onclick="openModal('transactionModal')">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              {{ __('Add Transaction') }}
            </button>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
          <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm text-gray-500">{{ __('Total Income') }}</h3>
            <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($income, 0, ',', '.') }}</p>
          </div>
          <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm text-gray-500">{{ __('Total Expenses') }}</h3>
            <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($expense, 0, ',', '.') }}</p>
          </div>
          <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm text-gray-500">{{ __('Net Profit') }}</h3>
            <p class="text-2xl font-bold text-gray-900 {{ $profit >= 0 ? 'text-green-600' : 'text-red-600' }}">
              Rp {{ number_format($profit, 0, ',', '.') }}
            </p>
          </div>
        </div>


        <!-- Transaction List -->
        <div id="transactionList" class="bg-white rounded-lg shadow divide-y mt-4">
          @forelse($transactions as $tx)
            <div class="flex items-center justify-between p-4 gap-4">
              <div>
                <p class="font-medium text-gray-900">{{ $tx->desc }}</p>
                <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($tx->date)->format('d M Y') }}{{ $tx->note ? ' - '.$tx->note : '' }}</p>
              </div>
              <div class="flex items-center gap-4">
                <div class="text-right">
                  <p class="{{ $tx->type === 'Income' ? 'text-green-600' : 'text-red-600' }} font-semibold">
                    {{ $tx->type === 'Income' ? '+' : '-' }}Rp {{ number_format($tx->amount,0,',','.') }}
                  </p>
                  <span class="inline-block text-xs px-2 py-0.5 rounded {{ $tx->type === 'Income' ? 'bg-teal-100 text-[#12B6D3]' : 'bg-red-100 text-red-600' }}">
                    {{ __($tx->type) }}
                  </span>
                </div>
                <form action="{{ route('finance.destroy', $tx) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this transaction?') }}');">
                  @csrf
                  @method('DELETE')
                  <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-3 py-1.5 text-xs font-medium border border-red-200 text-red-600 rounded-md hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-200 transition"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m2 0v12a2 2 0 01-2 2H8a2 2 0 01-2-2V7h12z" />
                    </svg>
                    {{ __('Delete') }}
                  </button>
                </form>
              </div>
            </div>
          @empty
            <div class="p-4 text-center text-gray-500">{{ __('No transactions yet. Add one from the Finance page.') }}</div>
          @endforelse
        </div>

      </div>
    </div>
  </div>

  <!-- HPP Modal -->
  <div id="hppModal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-[500px] shadow-lg">
      <h2 class="text-lg font-bold mb-4">{{ __("HPP Calculator") }}</h2>

      <!-- Ingredients -->
      <div id="ingredientsContainer" class="space-y-2 mb-3">
        <div class="flex gap-2 items-center">
          <input type="text" class="border rounded-md p-2 w-2/6" placeholder="{{ __('Ingredient Name') }}">
          <input type="number" step="0.01" class="border rounded-md p-2 w-1/6" placeholder="{{ __('Qty') }}">
          <input type="text" class="border rounded-md p-2 w-1/6" placeholder="{{ __('Unit') }}">
          <input type="number" class="border rounded-md p-2 w-1/4" placeholder="{{ __('Price') }}">
          <button onclick="removeIngredient(this)" class="text-red-500 text-lg">🗑</button>
        </div>
      </div>

      <button onclick="addIngredient()" class="flex items-center gap-2 px-3 py-2 bg-[#12B6D3] text-white rounded-md text-sm hover:bg-[#0fa2bd]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        {{ __("Add Ingredient") }}
      </button>

      <!-- Portions -->
      <div class="mt-4 mb-3">
        <label class="block text-sm text-gray-600 mb-1">{{ __("Number of Servings") }}</label>
        <input id="portionInput" type="number" value="1" class="border rounded-md w-full p-2">
      </div>

      <!-- Results -->
      <div id="hppResults" class="mt-4 p-4 bg-gray-50 rounded-lg border shadow-sm">
        <h3 class="flex items-center gap-2 text-sm font-medium text-[#12B6D3] mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2h6v2m-7-4h8V9H8v4z" />
          </svg>
          {{ __("Calculation Result") }}
        </h3>
        <p>{{ __("Total Cost") }}: <span id="totalCost" class="font-medium">Rp 0</span></p>
        <p>{{ __("Cost per Serving") }}: <span id="costPerPortion" class="text-green-600 font-semibold">Rp 0</span></p>
        <p>{{ __("Suggested Selling Price") }}: <span id="sellingPrice" class="font-bold text-[#12B6D3]">Rp 0</span></p>
        <div class="mt-2 text-xs text-gray-500 flex items-center gap-1 bg-yellow-50 p-2 rounded">
          {{ __("Selling price recommendation includes 300% markup") }}
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex justify-end gap-2 mt-6">
        <button onclick="closeModal('hppModal')" class="px-4 py-2 border rounded-md text-gray-700">{{ __("Cancel") }}</button>
        <button onclick="calculateHPP()" class="px-4 py-2 bg-[#12B6D3] text-white rounded-md">{{ __("Calculate") }}</button>
      </div>
    </div>
  </div>

  <!-- Add Transaction Modal -->
  <div id="transactionModal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-[400px] shadow-lg">
      <h2 class="text-lg font-bold mb-4">{{ __('Add New Transaction') }}</h2>
      <form action="{{ route('finance.store') }}" method="POST">
        @csrf
        <div class="flex gap-2 mb-3">
          <div class="flex-1">
            <label class="block text-sm text-gray-600 mb-1">{{ __('Type *') }}</label>
            <select name="type" class="border rounded-md w-full p-2" required>
              <option value="">{{ __('Select type') }}</option>
              <option value="Income">{{ __('Income') }}</option>
              <option value="Expense">{{ __('Expense') }}</option>
            </select>
          </div>
          <div class="flex-1">
            <label class="block text-sm text-gray-600 mb-1">{{ __('Date *') }}</label>
            <input type="date" name="date" class="border rounded-md w-full p-2" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="block text-sm text-gray-600 mb-1">{{ __('Description *') }}</label>
          <input type="text" name="desc" placeholder="{{ __('e.g., Nasi Gudeg Sales') }}" class="border rounded-md w-full p-2" required>
        </div>

        <div class="mb-3">
          <label class="block text-sm text-gray-600 mb-1">{{ __('Amount (Rp) *') }}</label>
          <input type="number" name="amount" value="0" class="border rounded-md w-full p-2" required>
        </div>

        <div class="mb-4">
          <label class="block text-sm text-gray-600 mb-1">{{ __('Note (Optional)') }}</label>
          <textarea name="note" class="border rounded-md w-full p-2" rows="2" placeholder="{{ __('Additional notes...') }}"></textarea>
        </div>

        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('transactionModal')" class="px-4 py-2 border rounded-md text-gray-700">{{ __('Cancel') }}</button>
          <button type="submit" class="px-4 py-2 bg-[#12B6D3] text-white rounded-md">{{ __('Add Transaction') }}</button>
        </div>
      </form>

    </div>
  </div>

<script>
  // Modal helpers (global)
  function openModal(id) {
    const el = document.getElementById(id);
    el.classList.remove("hidden");
    el.classList.add("flex");
  }
  function closeModal(id) {
    const el = document.getElementById(id);
    el.classList.add("hidden");
    el.classList.remove("flex");
  }

  const financeMessages = {
    ingredientExpense: @json(__('Ingredient cost (HPP)')),
    estimatedSales: @json(__('Estimated sales')),
    hppNote: @json(__('HPP - :portion servings'))
  };

  // ---------- HPP: ingredient helpers (global as original) ----------
  function addIngredient() {
    const container = document.getElementById("ingredientsContainer");
    const div = document.createElement("div");
    div.className = "flex gap-2 items-center";
    div.innerHTML = `
      <input type="text" class="border rounded-md p-2 w-2/6" placeholder="{{ __('Ingredient Name') }}">
      <input type="number" step="0.01" class="border rounded-md p-2 w-1/6" placeholder="{{ __('Qty') }}">
      <input type="text" class="border rounded-md p-2 w-1/6" placeholder="{{ __('Unit') }}">
      <input type="number" class="border rounded-md p-2 w-1/4" placeholder="{{ __('Price') }}">
      <button onclick="removeIngredient(this)" class="text-red-500 text-lg">🗑</button>
    `;
    container.appendChild(div);
  }

  function removeIngredient(btn) {
    btn.parentElement.remove();
  }

  // ---------- HPP Calculation (global so onclick works) ----------
  function calculateHPP() {
    const rows = document.querySelectorAll("#ingredientsContainer .flex");
    let totalCost = 0;

    rows.forEach(row => {
      const qty = parseFloat(row.children[1].value) || 0;
      const price = parseFloat(row.children[3].value) || 0;
      totalCost += qty * price;
    });

    const portions = parseInt(document.getElementById("portionInput").value) || 1;
    const costPerPortion = portions ? (totalCost / portions) : 0;
    const sellingPricePerPortion = costPerPortion * 3; // markup 300%
    const sellingPriceTotal = sellingPricePerPortion * portions;

    document.getElementById("totalCost").innerText = formatRupiah(totalCost);
    document.getElementById("costPerPortion").innerText = formatRupiah(costPerPortion);
    document.getElementById("sellingPrice").innerText = formatRupiah(sellingPriceTotal);

    // Add Transactions: expense (bahan) + estimated income (selling)
    const todayISO = new Date().toISOString().split("T")[0];
    // expense
    pushTransaction({
      type: "Expense",
      date: todayISO,
      desc: financeMessages.ingredientExpense,
      amount: Math.round(totalCost),
      note: financeMessages.hppNote.replace(':portion', portions)
    });
    // estimated income
    pushTransaction({
      type: "Income",
      date: todayISO,
      desc: financeMessages.estimatedSales,
      amount: Math.round(sellingPriceTotal),
      note: financeMessages.hppNote.replace(':portion', portions)
    });

    // show results (keep modal open so user can review) - optionally close modal:
    // closeModal('hppModal');
  }
</script>
</body>
</html>
