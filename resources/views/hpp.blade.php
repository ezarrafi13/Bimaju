<!DOCTYPE html>
</html>
  // ---- Formula Section ----
  // ---- Formula Section ----
  const formulaEl = document.getElementById("formulaDetails");
  if (formulaEl) formulaEl.remove();

  const formulaDiv = document.createElement("div");
  formulaDiv.id = "formulaDetails";
  formulaDiv.className = "mt-4 p-3 bg-white border rounded text-sm text-gray-700";
  formulaDiv.innerHTML = `
    <h4 class="font-semibold mb-2">{{ __("Calculation Formula") }}</h4>
    <p><strong>{{ __("Total Ingredient Cost") }}</strong> = S ({{ __("Unit Price") }} × {{ __("Quantity Used") }})</p>
    <p><strong>{{ __("Cost per Serving") }}</strong> = {{ __("Total Cost") }} ÷ {{ __("Number of Servings") }}</p>
    <p><strong>{{ __("Suggested Selling Price") }}</strong> = {{ __("Cost per Serving") }} × (1 + {{ __("Margin") }}/100)</p>
    <hr class="my-2">
    <p><strong>{{ __("Current Calculation") }}:</strong></p>
    <p>{{ __("Total Cost") }} = ${ingredients.map(ing => `${ing.name} (${formatRupiah(ing.pricePerUnit)} × ${ing.quantityUsed})`).join(" + ")} = <strong>${formatRupiah(totalCost)}</strong></p>
    <p>{{ __("Cost per Serving") }} = ${formatRupiah(totalCost)} ÷ ${portion} = <strong>${formatRupiah(costPerPortion)}</strong></p>
    <p>{{ __("Selling Price") }} = ${formatRupiah(costPerPortion)} × (1 + ${margin}%) = <strong>${formatRupiah(suggestedPrice)}</strong></p>
  `;
  resultCard.appendChild(formulaDiv);
  // ------------------------------

  resultCard.classList.remove("hidden");
  document.getElementById("exportPdf").disabled = false;
  document.getElementById("exportCsv").disabled = false;
});

  document.getElementById("exportPdf").addEventListener("click", () => {
    alert("Export PDF masih dummy ðŸš€");
  });
  document.getElementById("exportCsv").addEventListener("click", () => {
    alert("Export CSV masih dummy ðŸš€");
  });

  function formatRupiah(value) {
    return new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 0 }).format(value);
  }

  renderIngredients();
});
</script>
</body>
</html>
