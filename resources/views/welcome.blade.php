{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bimaju</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800">

    {{-- Navbar --}}
    <header class="flex items-center justify-between px-32 py-6">
        <div class="text-2xl font-bold text-cyan-600">Bimaju</div>

        <nav class="hidden md:flex space-x-8 font-medium">
            <a href="#" class="hover:text-cyan-600">Features</a>
            <a href="#" class="hover:text-cyan-600">Pricing</a>
            <a href="#" class="hover:text-cyan-600">FAQ</a>
            <a href="#" class="hover:text-cyan-600">Contact</a>
        </nav>

        <div class="flex space-x-4">
            <a href="/login" class="px-5 py-2 border border-cyan-500 rounded-full text-cyan-500 hover:bg-cyan-500 hover:text-white transition">Login</a>
            <a href="/register" class="px-5 py-2 bg-cyan-500 text-white rounded-full hover:bg-cyan-600 transition">Get Started</a>
        </div>
    </header>

    {{-- Hero Section --}}
    <section class="flex flex-col-reverse md:flex-row items-center justify-between px-32 py-16">
        {{-- Left Side --}}
        <div class="max-w-xl space-y-6">
            <h1 class="text-5xl font-bold leading-tight">
                Grow your F&B <br> business with
                <span class="text-cyan-600">Bimaju</span>
            </h1>
            <p class="text-lg text-gray-600">
                All-in-one assistant for UMKM: learning, finance, recipes,
                and consultation with experts.
            </p>

            <div class="flex space-x-4">
                <a href="#" class="px-6 py-3 bg-cyan-500 text-white font-medium rounded-full shadow hover:bg-cyan-600 transition">Start Free</a>
                <a href="#" class="px-6 py-3 border border-cyan-500 text-cyan-500 font-medium rounded-full hover:bg-cyan-500 hover:text-white transition">See Plans</a>
            </div>

            <div class="flex items-center space-x-6 pt-6 text-gray-500">
                <span class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.105.895-2 2-2s2 .895 2 2-.895 2-2 2-2-.895-2-2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12c0 4.97-4.03 9-9 9S3 16.97 3 12 7.03 3 12 3s9 4.03 9 9z" />
                    </svg>
                    <span>Secure payments</span>
                </span>

                <span class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Trusted by UMKM</span>
                </span>
            </div>
        </div>

        {{-- Right Side (Dashboard Image) --}}
        <div class="mb-10 md:mb-0 w-1/2">
            <img src="{{ asset('/assets/images/dashboard.png') }}" alt="Dashboard Preview" class="w-full rounded-xl shadow-lg">
        </div>
    </section>
    {{-- Section 2: Features --}}
<section class="px-10 py-20 bg-white text-center">
    {{-- Heading --}}
    <div class="max-w-3xl mx-auto mb-12">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Everything you need to grow your F&B business
        </h2>
        <p class="text-gray-600 text-lg">
            Powerful tools and expert guidance in one comprehensive platform <br>
            designed for Indonesian UMKM.
        </p>
    </div>

    {{-- Feature Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">

        {{-- Card 1 --}}
        <div class="bg-white rounded-xl shadow-md p-6 text-left hover:shadow-lg transition">
            <div class="w-12 h-12 flex items-center justify-center bg-cyan-500 text-white rounded-lg mb-4">
                📖
            </div>
            <h3 class="text-xl font-semibold mb-2">Learning Modules</h3>
            <p class="text-gray-600">
                Comprehensive F&B business education with interactive modules and practical insights.
            </p>
        </div>

        {{-- Card 2 --}}
        <div class="bg-white rounded-xl shadow-md p-6 text-left hover:shadow-lg transition">
            <div class="w-12 h-12 flex items-center justify-center bg-cyan-500 text-white rounded-lg mb-4">
                🧮
            </div>
            <h3 class="text-xl font-semibold mb-2">Finance & HPP Calculator</h3>
            <p class="text-gray-600">
                Advanced cost calculation tools and financial analytics to optimize your pricing strategy.
            </p>
        </div>

        {{-- Card 3 --}}
        <div class="bg-white rounded-xl shadow-md p-6 text-left hover:shadow-lg transition">
            <div class="w-12 h-12 flex items-center justify-center bg-cyan-500 text-white rounded-lg mb-4">
                🍲
            </div>
            <h3 class="text-xl font-semibold mb-2">Premium Recipes</h3>
            <p class="text-gray-600">
                Access exclusive recipes with detailed instructions and cost breakdowns.
            </p>
        </div>

        {{-- Card 4 --}}
        <div class="bg-white rounded-xl shadow-md p-6 text-left hover:shadow-lg transition">
            <div class="w-12 h-12 flex items-center justify-center bg-cyan-500 text-white rounded-lg mb-4">
                💬
            </div>
            <h3 class="text-xl font-semibold mb-2">Ask Consultant</h3>
            <p class="text-gray-600">
                Get expert advice from F&B consultants to grow your business effectively.
            </p>
        </div>

    </div>
</section>
{{-- Section 3: How It Works --}}
<section class="px-10 py-20 bg-gray-50 text-center">
    {{-- Heading --}}
    <div class="max-w-2xl mx-auto mb-16">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">How It Works</h2>
        <p class="text-gray-600 text-lg">
            Get started with Bimaju in three simple steps and transform your F&B business.
        </p>
    </div>

    {{-- Steps --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 max-w-6xl mx-auto">

        {{-- Step 1 --}}
        <div class="flex flex-col items-center">
            <div class="relative mb-6">
                <div class="w-12 h-12 flex items-center justify-center bg-cyan-500 text-white font-bold rounded-full shadow-md">
                    1
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md flex flex-col items-center">
                <div class="w-12 h-12 flex items-center justify-center bg-cyan-100 text-cyan-600 rounded-lg mb-4">
                    👤
                </div>
                <h3 class="text-lg font-semibold mb-2">Register</h3>
                <p class="text-gray-600 text-center">
                    Create your account and get instant access to our F&B business tools.
                </p>
            </div>
        </div>

        {{-- Step 2 --}}
        <div class="flex flex-col items-center relative">
            <div class="relative mb-6">
                <div class="w-12 h-12 flex items-center justify-center bg-cyan-500 text-white font-bold rounded-full shadow-md">
                    2
                </div>
                {{-- Line connector kiri-kanan --}}
                <div class="absolute top-1/2 left-[-150%] w-[150%] h-[2px] bg-cyan-400 hidden md:block"></div>
                <div class="absolute top-1/2 right-[-150%] w-[150%] h-[2px] bg-cyan-400 hidden md:block"></div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md flex flex-col items-center">
                <div class="w-12 h-12 flex items-center justify-center bg-cyan-100 text-cyan-600 rounded-lg mb-4">
                    📊
                </div>
                <h3 class="text-lg font-semibold mb-2">Learn & Manage Finances</h3>
                <p class="text-gray-600 text-center">
                    Use our learning modules and financial calculators to optimize your business.
                </p>
            </div>
        </div>

        {{-- Step 3 --}}
        <div class="flex flex-col items-center">
            <div class="relative mb-6">
                <div class="w-12 h-12 flex items-center justify-center bg-cyan-500 text-white font-bold rounded-full shadow-md">
                    3
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md flex flex-col items-center">
                <div class="w-12 h-12 flex items-center justify-center bg-cyan-100 text-cyan-600 rounded-lg mb-4">
                    📈
                </div>
                <h3 class="text-lg font-semibold mb-2">Grow Your Business</h3>
                <p class="text-gray-600 text-center">
                    Implement strategies and get expert consultation to scale your F&B business.
                </p>
            </div>
        </div>

    </div>
</section>
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Choose Your Plan</h2>
        <p class="text-gray-500 mb-12">
            Start free and scale as your F&amp;B business grows. No hidden fees, cancel anytime.
        </p>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Basic Plan -->
            <div class="rounded-2xl shadow-lg border border-gray-200 p-8 flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Basic</h3>
                    <p class="text-gray-500 mb-4">Untuk memulai bisnis F&amp;B</p>
                    <p class="text-4xl font-bold text-gray-900">Rp0</p>
                    <p class="text-gray-500 mb-6">Gratis selamanya</p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Dashboard dasar
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Kalkulator HPP sederhana
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> 5 resep gratis
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Konsultasi terbatas
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Support email
                        </li>
                    </ul>
                </div>
                <a href="#"
                   class="mt-4 inline-block rounded-full border border-cyan-500 text-cyan-500 px-6 py-2 font-medium hover:bg-cyan-50 transition">
                    Choose Basic
                </a>
            </div>

            <!-- Pro Plan -->
            <div class="rounded-2xl shadow-xl border-2 border-cyan-500 p-8 flex flex-col justify-between relative">
                <span class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-cyan-500 text-white text-sm px-4 py-1 rounded-full">Populer</span>
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Pro</h3>
                    <p class="text-gray-500 mb-4">Untuk bisnis yang berkembang</p>
                    <p class="text-4xl font-bold text-gray-900">Rp99.000<span class="text-base font-medium">/bulan</span></p>
                    <ul class="text-left space-y-2 mb-6 mt-6">
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Semua fitur Basic
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Kalkulator HPP advanced
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Resep unlimited
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Analytics lengkap
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Konsultasi prioritas
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Support 24/7
                        </li>
                    </ul>
                </div>
                <a href="#"
                   class="mt-4 inline-block rounded-full bg-cyan-500 text-white px-6 py-2 font-medium hover:bg-cyan-600 transition">
                    Choose Pro
                </a>
            </div>

            <!-- Premium Plan -->
            <div class="rounded-2xl shadow-lg border border-gray-200 p-8 flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Premium</h3>
                    <p class="text-gray-500 mb-4">Untuk bisnis skala besar</p>
                    <p class="text-4xl font-bold text-gray-900">Rp199.000<span class="text-base font-medium">/bulan</span></p>
                    <ul class="text-left space-y-2 mb-6 mt-6">
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Semua fitur Pro
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Multi-outlet management
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Custom branding
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> API access
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Dedicated account manager
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-cyan-500">✔</span> Training &amp; onboarding
                        </li>
                    </ul>
                </div>
                <a href="#"
                   class="mt-4 inline-block rounded-full border border-cyan-500 text-cyan-500 px-6 py-2 font-medium hover:bg-cyan-50 transition">
                    Choose Premium
                </a>
            </div>
        </div>

        <p class="text-gray-400 text-sm mt-8">
            All plans include secure payment processing and data protection <br>
            <a href="#" class="text-cyan-500 underline">Need a custom solution? Contact us</a>
        </p>
    </div>
</section>
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">What Our Users Say</h2>
        <p class="text-gray-500 mb-12">
            Join thousands of successful UMKM owners who trust Bimaju to grow their business.
        </p>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Testimoni 1 -->
            <div class="bg-white rounded-2xl shadow-md p-6 text-left">
                <!-- Rating -->
                <div class="flex text-cyan-500 mb-4">
                    @for($i = 0; $i < 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    @endfor
                </div>
                <p class="italic text-gray-600 mb-4">
                    "Bimaju membantu saya memahami cara menghitung HPP dengan benar. Sekarang keuntungan warung saya meningkat 30%!"
                </p>
                <hr class="my-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-gray-200 mr-3"></div>
                    <div>
                        <p class="font-semibold text-gray-800">Sari Dewi</p>
                        <p class="text-gray-500 text-sm">Owner, Warung Sederhana</p>
                    </div>
                </div>
            </div>

            <!-- Testimoni 2 -->
            <div class="bg-white rounded-2xl shadow-md p-6 text-left">
                <div class="flex text-cyan-500 mb-4">
                    @for($i = 0; $i < 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    @endfor
                </div>
                <p class="italic text-gray-600 mb-4">
                    "Fitur konsultasi sangat membantu. Saya mendapat saran langsung dari ahli F&amp;B untuk mengembangkan menu kopi saya."
                </p>
                <hr class="my-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-gray-200 mr-3"></div>
                    <div>
                        <p class="font-semibold text-gray-800">Ahmad Rizki</p>
                        <p class="text-gray-500 text-sm">Owner, Kedai Kopi Hangat</p>
                    </div>
                </div>
            </div>

            <!-- Testimoni 3 -->
            <div class="bg-white rounded-2xl shadow-md p-6 text-left">
                <div class="flex text-cyan-500 mb-4">
                    @for($i = 0; $i < 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    @endfor
                </div>
                <p class="italic text-gray-600 mb-4">
                    "Learning modules di Bimaju sangat praktis. Saya belajar marketing digital dan penjualan online meningkat drastis."
                </p>
                <hr class="my-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-gray-200 mr-3"></div>
                    <div>
                        <p class="font-semibold text-gray-800">Maya Putri</p>
                        <p class="text-gray-500 text-sm">Owner, Bakery Corner</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
