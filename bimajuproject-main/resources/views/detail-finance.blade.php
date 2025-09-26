<div class="max-w-5xl mx-auto p-6 space-y-6">
  <!-- Back Button -->
  <a href="{{ route('questions.index') }}" class="flex items-center text-sm text-gray-500 hover:text-[#12B6D3]">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    Kembali ke Daftar Pertanyaan
  </a>

  <!-- Question Header -->
  <div>
    <h1 class="text-2xl font-bold text-gray-800 mb-2">
      Bagaimana cara menghitung harga jual yang tepat untuk produk minuman saya?
    </h1>
    <div class="flex items-center gap-4 text-sm text-gray-500">
      <span class="px-2 py-1 bg-gray-100 rounded-md">Finance</span>
      <span class="flex items-center gap-1 text-green-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        Answered
      </span>
      <span>2024-01-15 10:30</span>
    </div>
  </div>

  <!-- Chat Section -->
  <div class="space-y-6">
    <!-- User Question -->
    <div class="flex justify-end">
      <div class="max-w-lg bg-[#12B6D3] text-white rounded-xl px-4 py-3">
        <p>
          Saya memiliki bisnis minuman kekinian dan bingung menentukan harga jual. Modal untuk satu cup sekitar 8000,
          tapi saya tidak yakin berapa margin yang wajar. Mohon saran untuk strategi pricing yang tepat.
        </p>
        <span class="block text-xs text-gray-100 mt-2 text-right">2024-01-15 10:30</span>
      </div>
    </div>

    <!-- Advisor Answer -->
    <div class="flex justify-start">
      <div class="max-w-lg bg-gray-50 border rounded-xl px-4 py-3">
        <div class="font-semibold text-[#12B6D3] mb-1">Advisor</div>
        <p class="text-gray-700">
          Untuk menentukan harga jual minuman, Anda bisa menggunakan formula:
          <strong>Harga Jual = (Harga Pokok + Biaya Operasional) / (1 - % Margin)</strong>.
          Dengan modal 8000/cup, saya sarankan margin 40-60% untuk minuman kekinian.
          Jadi harga jual sekitar 15.000-20.000. Pertimbangkan juga harga kompetitor dan target market Anda.
        </p>
        <span class="block text-xs text-gray-400 mt-2">2024-01-15 10:30</span>
      </div>
    </div>

    <!-- Related Articles -->
    <div class="pl-12">
      <h3 class="text-sm font-medium text-gray-700 mb-2">Artikel terkait:</h3>
      <div class="space-y-2">
        <a href="#" class="block border rounded-lg p-3 hover:bg-gray-50">
          <h4 class="text-[#12B6D3] font-medium">Cara Menghitung HPP Minuman</h4>
          <p class="text-xs text-gray-500">Panduan lengkap menghitung harga pokok penjualan</p>
        </a>
        <a href="#" class="block border rounded-lg p-3 hover:bg-gray-50">
          <h4 class="text-[#12B6D3] font-medium">Strategi Pricing F&B</h4>
          <p class="text-xs text-gray-500">Tips menentukan harga jual yang kompetitif</p>
        </a>
      </div>
    </div>
  </div>
</div>
