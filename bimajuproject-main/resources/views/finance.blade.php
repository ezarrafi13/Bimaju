<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <div class="flex w-full">
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
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
          <div>
            <h1 class="text-3xl font-bold text-gray-900">Finance</h1>
            <p class="text-gray-500 mt-1">Manage your business income & expenses easily</p>
          </div>

          <div class="flex flex-col sm:flex-row gap-2">
            <button class="flex items-center gap-2 border border-gray-300 text-gray-700 px-3 py-2 rounded-md text-sm hover:bg-gray-100" onclick="openModal('hppModal')">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 6h6M9 12h6m-6 6h6" />
              </svg>
              Quick HPP
            </button>

            <a href="/hpp-calculator" class="flex items-center gap-2 border border-gray-300 text-gray-700 px-3 py-2 rounded-md text-sm hover:bg-gray-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 6h6M9 12h6m-6 6h6" />
              </svg>
              Full HPP Calculator
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2h11a2 2 0 002-2v-5l4 4" />
              </svg>
            </a>

            <button class="flex items-center gap-2 bg-[#12B6D3] text-white px-3 py-2 rounded-md text-sm hover:bg-bg-[#12B6D3]" onclick="openModal('transactionModal')">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              Add Transaction
            </button>
          </div>
        </div>

        <!-- Summary Cards (dynamic) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
          <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm text-gray-500">Total Income</h3>
            <p id="totalIncomeValue" class="text-2xl font-bold text-gray-900">Rp 0</p>
            <p id="incomeChange" class="text-green-600 text-sm">—</p>
          </div>
          <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm text-gray-500">Total Expenses</h3>
            <p id="totalExpensesValue" class="text-2xl font-bold text-gray-900">Rp 0</p>
            <p id="expenseChange" class="text-red-600 text-sm">—</p>
          </div>
          <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm text-gray-500">Net Profit</h3>
            <p id="netProfitValue" class="text-2xl font-bold text-gray-900">Rp 0</p>
            <p id="profitChange" class="text-green-600 text-sm">—</p>
          </div>
        </div>

        <!-- Transaction List -->
        <div class="space-y-4 mt-6">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="text-xl font-semibold">Recent Transactions</h2>
            <button class="flex items-center gap-2 border border-gray-300 text-gray-700 px-3 py-2 rounded-md text-sm hover:bg-gray-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              Export CSV
            </button>
          </div>

          <div id="transactionList" class="bg-white rounded-lg shadow divide-y">
            <!-- list will be rendered here by JS -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- HPP Modal -->
  <div id="hppModal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-[500px] shadow-lg">
      <h2 class="text-lg font-bold mb-4">HPP Calculator</h2>

      <!-- Ingredients -->
      <div id="ingredientsContainer" class="space-y-2 mb-3">
        <div class="flex gap-2 items-center">
          <input type="text" class="border rounded-md p-2 w-2/6" placeholder="Ingredient name">
          <input type="number" step="0.01" class="border rounded-md p-2 w-1/6" placeholder="Qty">
          <input type="text" class="border rounded-md p-2 w-1/6" placeholder="Unit">
          <input type="number" class="border rounded-md p-2 w-1/4" placeholder="Price">
          <button onclick="removeIngredient(this)" class="text-red-500 text-lg">🗑</button>
        </div>
      </div>

      <button onclick="addIngredient()" class="flex items-center gap-2 px-3 py-2 bg-[#12B6D3] text-white rounded-md text-sm hover:bg-[#0fa2bd]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Add Ingredient
      </button>

      <!-- Portions -->
      <div class="mt-4 mb-3">
        <label class="block text-sm text-gray-600 mb-1">Number of Portions</label>
        <input id="portionInput" type="number" value="1" class="border rounded-md w-full p-2">
      </div>

      <!-- Results -->
      <div id="hppResults" class="mt-4 p-4 bg-gray-50 rounded-lg border shadow-sm">
        <h3 class="flex items-center gap-2 text-sm font-medium text-[#12B6D3] mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2h6v2m-7-4h8V9H8v4z" />
          </svg>
          Calculation Results
        </h3>
        <p>Total Cost: <span id="totalCost" class="font-medium">Rp 0</span></p>
        <p>Cost per Portion: <span id="costPerPortion" class="text-green-600 font-semibold">Rp 0</span></p>
        <p>Suggested Selling Price: <span id="sellingPrice" class="font-bold text-[#12B6D3]">Rp 0</span></p>
        <div class="mt-2 text-xs text-gray-500 flex items-center gap-1 bg-yellow-50 p-2 rounded">
          💡 Saran harga jual sudah termasuk markup 300%
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex justify-end gap-2 mt-6">
        <button onclick="closeModal('hppModal')" class="px-4 py-2 border rounded-md text-gray-700">Cancel</button>
        <button onclick="calculateHPP()" class="px-4 py-2 bg-[#12B6D3] text-white rounded-md">Calculate</button>
      </div>
    </div>
  </div>

  <!-- Add Transaction Modal -->
  <div id="transactionModal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-[400px] shadow-lg">
      <h2 class="text-lg font-bold mb-4">Add New Transaction</h2>

      <div class="flex gap-2 mb-3">
        <div class="flex-1">
          <label class="block text-sm text-gray-600 mb-1">Type *</label>
          <select id="transType" class="border rounded-md w-full p-2">
            <option value="">Select type</option>
            <option value="Income">Income</option>
            <option value="Expense">Expense</option>
          </select>
        </div>
        <div class="flex-1">
          <label class="block text-sm text-gray-600 mb-1">Date *</label>
          <input type="date" id="transDate" class="border rounded-md w-full p-2">
        </div>
      </div>

      <div class="mb-3">
        <label class="block text-sm text-gray-600 mb-1">Description *</label>
        <input type="text" id="transDesc" placeholder="e.g., Penjualan Nasi Gudeg" class="border rounded-md w-full p-2">
      </div>

      <div class="mb-3">
        <label class="block text-sm text-gray-600 mb-1">Amount (Rp) *</label>
        <input type="number" id="transAmount" value="0" class="border rounded-md w-full p-2">
      </div>

      <div class="mb-4">
        <label class="block text-sm text-gray-600 mb-1">Note (Optional)</label>
        <textarea id="transNote" class="border rounded-md w-full p-2" rows="2" placeholder="Additional notes..."></textarea>
      </div>

      <div class="flex justify-end gap-2">
        <button onclick="closeModal('transactionModal')" class="px-4 py-2 border rounded-md text-gray-700">Cancel</button>
        <!-- changed function name to avoid collision with internal push -->
        <button onclick="addTransactionModal()" class="px-4 py-2 bg-[#12B6D3] text-white rounded-md">Add Transaction</button>
      </div>
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

  // ---------- Data & Helpers ----------
  // initial sample transactions (you can replace or fetch from backend)
  let transactions = [
    { id: Date.now()+1, type: "Income",  desc: "Penjualan Nasi Gudeg", date: "2024-01-15", amount: 750000, note: "" },
    { id: Date.now()+2, type: "Expense", desc: "Beli Bahan Baku",   date: "2024-01-15", amount: 350000, note: "" },
    { id: Date.now()+3, type: "Income",  desc: "Penjualan Ayam Geprek", date: "2024-01-14", amount: 425000, note: "" }
  ];

  function formatRupiah(value) {
    return new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 0 }).format(value || 0);
  }

  function formatDate(dateStr) {
    if (!dateStr) return "";
    // if already in YYYY-MM-DD format
    const d = new Date(dateStr);
    if (isNaN(d)) return dateStr;
    return d.toLocaleDateString("id-ID", { day: "2-digit", month: "short", year: "numeric" });
  }

  // push a transaction object and update UI
  function pushTransaction(tx) {
    tx.id = Date.now() + Math.floor(Math.random()*1000);
    transactions.unshift(tx); // newest first
    renderTransactionList();
    updateSummary();
  }

  // ---------- Render & Summary ----------
  function renderTransactionList() {
    const container = document.getElementById("transactionList");
    container.innerHTML = ""; // clear (initial static items removed)
    if (!transactions.length) {
      container.innerHTML = `<div class="p-4 text-center text-gray-500">No transactions yet</div>`;
      return;
    }

    // render all (or limit to N latest if you prefer)
    transactions.forEach(tx => {
      const div = document.createElement("div");
      div.className = "flex items-center justify-between p-4";
      div.innerHTML = `
        <div>
          <p class="font-medium text-gray-900">${tx.desc}</p>
          <p class="text-sm text-gray-500">${formatDate(tx.date)}${tx.note ? " - " + tx.note : ""}</p>
        </div>
        <div class="text-right">
          <p class="${tx.type === "Income" ? "text-green-600" : "text-red-600"} font-semibold">
            ${tx.type === "Income" ? "+" : "-"}${formatRupiah(tx.amount)}
          </p>
          <span class="inline-block text-xs px-2 py-0.5 rounded ${tx.type === "Income" ? "bg-teal-100 text-[#12B6D3]" : "bg-red-100 text-red-600"}">
            ${tx.type}
          </span>
        </div>
      `;
      container.appendChild(div);
    });
  }

  function updateSummary() {
    const income = transactions
      .filter(t => t.type === "Income")
      .reduce((s, t) => s + Number(t.amount || 0), 0);

    const expense = transactions
      .filter(t => t.type === "Expense")
      .reduce((s, t) => s + Number(t.amount || 0), 0);

    const profit = income - expense;

    document.getElementById("totalIncomeValue").innerText = formatRupiah(income);
    document.getElementById("totalExpensesValue").innerText = formatRupiah(expense);
    document.getElementById("netProfitValue").innerText = formatRupiah(profit);

    // optional small placeholders for change %
    document.getElementById("incomeChange").innerText = `—`;
    document.getElementById("expenseChange").innerText = `—`;
    document.getElementById("profitChange").innerText = `—`;
  }

  // ---------- Modal: Add Transaction ----------
  function addTransactionModal() {
    let type = document.getElementById("transType").value;
    let date = document.getElementById("transDate").value || new Date().toISOString().split("T")[0];
    let desc = document.getElementById("transDesc").value.trim();
    let amount = parseFloat(document.getElementById("transAmount").value);
    let note = document.getElementById("transNote").value.trim();

    if (!type || !date || !desc || isNaN(amount) || amount <= 0) {
      alert("Mohon isi semua field yang wajib (*) dengan benar");
      return;
    }

    pushTransaction({ type, date, desc, amount, note });

    // reset + close
    document.getElementById("transType").value = "";
    document.getElementById("transDate").value = "";
    document.getElementById("transDesc").value = "";
    document.getElementById("transAmount").value = 0;
    document.getElementById("transNote").value = "";
    closeModal("transactionModal");
  }

  // ---------- HPP: ingredient helpers (global as original) ----------
  function addIngredient() {
    const container = document.getElementById("ingredientsContainer");
    const div = document.createElement("div");
    div.className = "flex gap-2 items-center";
    div.innerHTML = `
      <input type="text" class="border rounded-md p-2 w-2/6" placeholder="Ingredient name">
      <input type="number" step="0.01" class="border rounded-md p-2 w-1/6" placeholder="Qty">
      <input type="text" class="border rounded-md p-2 w-1/6" placeholder="Unit">
      <input type="number" class="border rounded-md p-2 w-1/4" placeholder="Price">
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

    // Add transactions: expense (bahan) + estimated income (selling)
    const todayISO = new Date().toISOString().split("T")[0];
    // expense
    pushTransaction({
      type: "Expense",
      date: todayISO,
      desc: `Biaya bahan (HPP)`,
      amount: Math.round(totalCost),
      note: `HPP - ${portions} porsi`
    });
    // estimated income
    pushTransaction({
      type: "Income",
      date: todayISO,
      desc: `Estimasi penjualan`,
      amount: Math.round(sellingPriceTotal),
      note: `HPP - ${portions} porsi`
    });

    // show results (keep modal open so user can review) - optionally close modal:
    // closeModal('hppModal');
  }

  // initial render
  document.addEventListener("DOMContentLoaded", () => {
    renderTransactionList();
    updateSummary();
  });
</script>
</body>
</html>
