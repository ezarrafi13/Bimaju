<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Bimaju | HPP Calculator') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex w-full">
        @include('components.sidebar')
        <div class="flex-1 ml-64 space-y-6">
            <div class="border-b border-gray-200 p-6 flex justify-between items-center">
                <div class="flex flex-col">
                    <h1 class="font-bold text-2xl">
                        {{ __('Welcome back, :name!', ['name' => auth()->user()->name ?? __('User')]) }}
                    </h1>
                    <p class="text-gray-500">{{ __("Ready to grow your F&B business today?") }}</p>
                </div>
                <div class="profile-wrapper">
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="{{ asset('assets/images/flower.jpg') }}" alt="" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <div class="p-6 space-y-6 max-w-6xl mx-auto">
                <div class="text-center space-y-2">
                    <div class="flex items-center justify-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#12B6D3]" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12h6m-6 4h6M9 8h6m-6-4h6m2 0h-1a2 2 0 00-2-2H9a2 2 0 00-2 2H6a2 2 0 00-2 2v14a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2z"/>
                        </svg>
                        <h1 class="text-3xl font-bold text-gray-800">{{ __('HPP Calculator') }}</h1>
                    </div>
                    <p class="text-gray-500 text-lg">
                        {{ __('Calculate production cost and selling price with ease') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2 space-y-6">
                        <div class="bg-white shadow rounded-xl p-4">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="font-semibold text-lg">{{ __('Ingredient List') }}</h2>
                                <button id="addIngredientBtn"
                                        class="px-3 py-1 bg-[#12B6D3] text-white rounded-lg text-sm flex items-center gap-1">
                                    + {{ __('Add Ingredient') }}
                                </button>
                            </div>

                            <div id="ingredientsList" class="space-y-4"></div>
                        </div>

                        <div class="bg-white shadow rounded-xl p-4 space-y-4">
                            <div>
                                <label for="portionCount" class="block text-sm font-medium text-gray-700">
                                    {{ __('Number of Servings') }}
                                </label>
                                <input id="portionCount" type="number" value="10"
                                       class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-[#12B6D3] focus:border-[#12B6D3]">
                            </div>
                            <div>
                                <label for="margin" class="block text-sm font-medium text-gray-700">
                                    {{ __('Profit Margin (%)') }}
                                </label>
                                <input id="margin" type="number" value="30"
                                       class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-[#12B6D3] focus:border-[#12B6D3]">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div id="resultCard"
                             class="hidden bg-green-50 border border-green-200 rounded-xl p-4 space-y-3">
                            <h3 class="text-lg font-semibold text-green-700">{{ __('Calculation Result') }}</h3>
                            <div class="flex justify-between">
                                <span class="text-gray-600">{{ __('Total Ingredient Cost') }}:</span>
                                <span id="totalCost" class="font-medium">Rp 0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">{{ __('Cost per Serving') }}:</span>
                                <span id="costPerPortion" class="font-medium">Rp 0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-800 font-semibold">{{ __('Suggested Selling Price') }}:</span>
                                <span id="suggestedPrice" class="font-bold text-[#12B6D3]">Rp 0</span>
                            </div>
                        </div>

                        <div class="bg-white shadow rounded-xl p-4 space-y-3">
                            <button id="calculateBtn"
                                    class="w-full px-4 py-2 bg-[#12B6D3] text-white rounded-lg hover:bg-indigo-700">
                                {{ __('Calculate HPP') }}
                            </button>
                            <div class="grid grid-cols-2 gap-2">
                                <button id="exportPdf" disabled
                                        class="px-3 py-2 border rounded-lg text-sm hover:bg-gray-50 disabled:opacity-50">
                                    {{ __('Export PDF') }}
                                </button>
                                <button id="exportCsv" disabled
                                        class="px-3 py-2 border rounded-lg text-sm hover:bg-gray-50 disabled:opacity-50">
                                    {{ __('Export CSV') }}
                                </button>
                            </div>
                        </div>

                        <div class="bg-cyan-50 border border-cyan-200 rounded-xl p-4 space-y-2 text-sm">
                            <h3 class="font-semibold text-cyan-700">{{ __('Pricing Tips') }}</h3>
                            <p><span class="font-medium">{{ __('Typical F&B markup') }}:</span>
                                <span class="font-bold">30-50%</span></p>
                            <ul class="list-disc list-inside space-y-1 text-gray-700">
                                <li>{{ __('Light meals: 30-40%') }}</li>
                                <li>{{ __('Heavy meals: 40-50%') }}</li>
                                <li>{{ __('Beverages: 50-70%') }}</li>
                                <li>{{ __('Premium products: 70%+') }}</li>
                            </ul>
                            <div class="bg-white border border-yellow-200 rounded-lg p-2 text-xs text-yellow-600 flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z"/>
                                </svg>
                                {{ __('Adjust the margin to match your target market and business location') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const texts = {
                addIngredient: @json(__('Add Ingredient')),
                ingredientName: @json(__('Ingredient Name')),
                qty: @json(__('Qty')),
                unit: @json(__('Unit')),
                price: @json(__('Price')),
                calculationFormula: @json(__('Calculation Formula')),
                totalIngredientCost: @json(__('Total Ingredient Cost')),
                unitPrice: @json(__('Unit Price')),
                quantityUsed: @json(__('Quantity Used')),
                costPerServing: @json(__('Cost per Serving')),
                totalCost: @json(__('Total Cost')),
                numberOfServings: @json(__('Number of Servings')),
                suggestedSellingPrice: @json(__('Suggested Selling Price')),
                currentCalculation: @json(__('Current Calculation')),
                sellingPrice: @json(__('Selling Price')),
                margin: @json(__('Margin')),
                pdfNotReady: @json(__('Export PDF is not available yet')),
                csvNotReady: @json(__('Export CSV is not available yet')),
                minIngredientMsg: @json(__('Please add at least one ingredient!'))
            };

            const weightUnits = ["kg", "gram", "ons", "pon", "kuintal", "ton"];

            let ingredients = [
                { id: Date.now(), name: "", pricePerUnit: "", quantityUsed: "", unit: "" }
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
                ingredients.forEach((ing) => {
                    const unitOptions = weightUnits.map(unit => {
                        const label = unit.length === 2 ? unit.toUpperCase() : unit.charAt(0).toUpperCase() + unit.slice(1);
                        const selected = ing.unit === unit ? "selected" : "";
                        return `<option value="${unit}" ${selected}>${label}</option>`;
                    }).join("");

                    const row = document.createElement("div");
                    row.className = "grid grid-cols-12 gap-2 items-center";
                    row.innerHTML = `
                        <input type="text" value="${ing.name}" placeholder="${texts.ingredientName}"
                               class="col-span-3 border rounded px-2 py-1"
                               oninput="updateIngredient(${ing.id}, 'name', this.value)">
                        <input type="number" value="${ing.pricePerUnit}" placeholder="${texts.price}"
                               class="col-span-3 border rounded px-2 py-1"
                               oninput="updateIngredient(${ing.id}, 'pricePerUnit', this.value)">
                        <input type="number" step="0.1" value="${ing.quantityUsed}" placeholder="${texts.qty}"
                               class="col-span-2 border rounded px-2 py-1"
                               oninput="updateIngredient(${ing.id}, 'quantityUsed', this.value)">
                        <select class="col-span-2 border rounded px-3 pr-10 py-1 min-w-[130px]"
                                onchange="updateIngredient(${ing.id}, 'unit', this.value)">
                            <option value="" ${ing.unit ? "" : "selected"} disabled>${texts.unit}</option>
                            ${unitOptions}
                        </select>
                        <button onclick="removeIngredient(${ing.id})"
                                class="col-span-2 text-red-600 hover:underline text-sm">{{ __('Delete') }}</button>
                    `;
                    ingredientsList.appendChild(row);
                });
            }

            window.updateIngredient = (id, field, value) => {
                ingredients = ingredients.map(ing => ing.id === id
                    ? { ...ing, [field]: field.includes("price") || field.includes("quantity") ? parseFloat(value) || 0 : value }
                    : ing
                );
            };

            window.removeIngredient = (id) => {
                ingredients = ingredients.filter(ing => ing.id !== id);
                renderIngredients();
            };

            document.getElementById("addIngredientBtn").addEventListener("click", () => {
                ingredients.push({ id: Date.now(), name: "", pricePerUnit: "", quantityUsed: "", unit: "" });
                renderIngredients();
            });

            calculateBtn.addEventListener("click", () => {
                if (ingredients.length === 0) {
                    alert(texts.minIngredientMsg);
                    return;
                }

                const portion = parseInt(portionInput.value) || 1;
                const margin = parseInt(marginInput.value) || 0;

                const totalCost = ingredients.reduce((sum, ing) => sum + (ing.pricePerUnit * ing.quantityUsed), 0);
                const costPerPortion = totalCost / portion;
                const suggestedPrice = costPerPortion * (1 + margin / 100);

                totalCostEl.textContent = formatRupiah(totalCost);
                costPerPortionEl.textContent = formatRupiah(costPerPortion);
                suggestedPriceEl.textContent = formatRupiah(suggestedPrice);

                const formulaEl = document.getElementById("formulaDetails");
                if (formulaEl) formulaEl.remove();

                const formulaDiv = document.createElement("div");
                formulaDiv.id = "formulaDetails";
                formulaDiv.className = "mt-4 p-3 bg-white border rounded text-sm text-gray-700";
                formulaDiv.innerHTML = `
                    <h4 class="font-semibold mb-2">${texts.calculationFormula}</h4>
                    <p><strong>${texts.totalIngredientCost}</strong> = Σ (${texts.unitPrice} × ${texts.quantityUsed})</p>
                    <p><strong>${texts.costPerServing}</strong> = ${texts.totalCost} ÷ ${texts.numberOfServings}</p>
                    <p><strong>${texts.suggestedSellingPrice}</strong> = ${texts.costPerServing} × (1 + ${texts.margin}/100)</p>
                    <hr class="my-2">
                    <p><strong>${texts.currentCalculation}</strong>:</p>
                    <p>${texts.totalCost} = ${ingredients.map(ing => `${ing.name} (${formatRupiah(ing.pricePerUnit)} × ${ing.quantityUsed})`).join(" + ")} = <strong>${formatRupiah(totalCost)}</strong></p>
                    <p>${texts.costPerServing} = ${formatRupiah(totalCost)} ÷ ${portion} = <strong>${formatRupiah(costPerPortion)}</strong></p>
                    <p>${texts.sellingPrice} = ${formatRupiah(costPerPortion)} × (1 + ${margin}%) = <strong>${formatRupiah(suggestedPrice)}</strong></p>
                `;

                resultCard.appendChild(formulaDiv);
                resultCard.classList.remove("hidden");
                document.getElementById("exportPdf").disabled = false;
                document.getElementById("exportCsv").disabled = false;

            });

            document.getElementById("exportPdf").addEventListener("click", () => {
                alert(texts.pdfNotReady);
            });

            document.getElementById("exportCsv").addEventListener("click", () => {
                alert(texts.csvNotReady);
            });

            function formatRupiah(value) {
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                    minimumFractionDigits: 0
                }).format(value);
            }

            renderIngredients();
        });
    </script>
</body>
</html>
