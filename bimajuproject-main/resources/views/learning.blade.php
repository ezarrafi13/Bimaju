<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bimaju | Learning Page</title>
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
                {{-- Header --}}
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Learning Modules</h1>
                        <p class="text-gray-500 mt-2">Grow your F&B business with expert knowledge</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                        </svg>
                        <span class="text-sm font-medium">Level 2 Entrepreneur</span>
                    </div>
                </div>

                <div class="space-y-6">

                    <!-- Learning Progress -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold mb-2">Your Learning Progress</h2>
                        <p class="text-sm text-gray-600 mb-4">Track your educational journey</p>

                        <div class="flex items-center justify-between mb-2">
                            <p class="text-2xl font-bold text-sky-600">1/6</p>
                            <p class="text-sm text-gray-500">Modules Completed</p>
                        </div>

                        <!-- Progress Bar -->
                        <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                            <div class="bg-sky-500 h-2 rounded-full" style="width: 17%"></div>
                        </div>

                        <a href="#" class="text-sky-600 text-sm font-medium hover:underline">
                            Complete 3 more modules to unlock new tips! 🎯
                        </a>
                    </div>

                    <!-- Recommended for You -->
                    <div class="bg-sky-50 p-6 rounded-lg shadow-md">
                        <div class="flex items-center mb-2">
                            <span class="text-sky-600 mr-2">⭐</span>
                            <h2 class="text-lg font-semibold">Recommended for You</h2>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Start here to grow faster</p>

                        <h3 class="text-base font-semibold">Food Costing & Pricing</h3>
                        <p class="text-sm text-gray-600 mb-4">
                            Calculate accurate food costs, set competitive prices, and maximize your profit margins effectively.
                        </p>

                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <span class="mr-4">⏱ 2.5 hours</span>
                            <span class="px-2 py-1 bg-gray-200 rounded text-xs font-medium">Intermediate</span>
                        </div>

                        <a href="#"
                           class="inline-flex items-center px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white text-sm font-medium rounded-md">
                            📘 Start Learning
                        </a>
                    </div>
                </div>


                {{-- Grid Modules --}}
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                    {{-- Module 1 --}}
                    <div class="border rounded-xl shadow-sm hover:shadow-md transition-shadow bg-white">
                        <div class="p-4 flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#12B6D320] rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#12B6D3]">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-base">Basic Finance Management</h3>
                                <div class="flex gap-2 mt-1">
                                    <span class="px-2 py-0.5 text-xs border rounded">Finance</span>
                                    <span class="px-2 py-0.5 text-xs bg-gray-100 rounded">Beginner</span>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 pb-4 space-y-3">
                            <p class="text-sm text-gray-600">
                                Learn fundamental financial concepts for your F&B business including budgeting, cash flow, and profit calculations.
                            </p>
                            <div class="flex items-center justify-between text-sm">
                                <span class="flex items-center gap-1 text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                2 hours</span>
                                <span class="text-green-600 font-medium">Completed</span>
                            </div>
                            <a href="/learning/detail" class="w-full inline-flex items-center justify-center border rounded-lg py-1.5 text-sm hover:bg-[#12B6D3] hover:text-white transition-all duration-150">
                                Review
                            </a>
                        </div>
                    </div>

                    {{-- Module 2 --}}
                    <div class="border rounded-xl shadow-sm hover:shadow-md transition-shadow bg-white">
                        <div class="p-4 flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#12B6D320] rounded-lg flex items-center justify-center">📈</div>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-base">Digital Marketing for F&B</h3>
                                <div class="flex gap-2 mt-1">
                                    <span class="px-2 py-0.5 text-xs border rounded">Marketing</span>
                                    <span class="px-2 py-0.5 text-xs bg-gray-100 rounded">Intermediate</span>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 pb-4 space-y-3">
                            <p class="text-sm text-gray-600">
                                Master social media marketing, online promotions, and digital customer engagement strategies.
                            </p>
                            <div class="flex items-center justify-between text-sm">
                                <span class="flex items-center gap-1 text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                3 hours</span>
                                <span class="text-yellow-600 font-medium">In Progress</span>
                            </div>
                            <div>
                                <div class="w-full bg-gray-200 h-2 rounded">
                                    <div class="bg-[#12B6D3] h-2 rounded" style="width: 60%"></div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">60% complete</p>
                            </div>
                            <a href="/learning/detail" class="w-full inline-flex items-center justify-center bg-[#12B6D3] text-white rounded-lg py-1.5 text-sm">
                                ▶ Continue
                            </a>
                        </div>
                    </div>

                    {{-- Module 3 --}}
                    <div class="border rounded-xl shadow-sm hover:shadow-md transition-shadow bg-white">
                        <div class="p-4 flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#12B6D320] rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#12B6D3]">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-base">Food Costing & Pricing</h3>
                                <div class="flex gap-2 mt-1">
                                    <span class="px-2 py-0.5 text-xs border rounded">Finance</span>
                                    <span class="px-2 py-0.5 text-xs bg-gray-100 rounded">Intermediate</span>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 pb-4 space-y-3">
                            <p class="text-sm text-gray-600">
                                Calculate accurate food costs, set competitive prices, and maximize your profit margins effectively.
                            </p>
                            <div class="flex items-center justify-between text-sm">
                                <span class="flex items-center gap-1 text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                2.5 hours</span>
                                <span class="text-gray-400 font-medium">Not Started</span>
                            </div>
                            <a href="/learning/detail" class="w-full inline-flex items-center justify-center border rounded-lg py-1.5 text-sm hover:bg-[#12B6D3] hover:text-white transition-all duration-150">
                                Start
                            </a>
                        </div>
                    </div>

                    {{-- Module 4 --}}
                    <div class="border rounded-xl shadow-sm hover:shadow-md transition-shadow bg-white">
                        <div class="p-4 flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#12B6D320] rounded-lg flex items-center justify-center">👥</div>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-base">Customer Service Excellence</h3>
                                <div class="flex gap-2 mt-1">
                                    <span class="px-2 py-0.5 text-xs border rounded">Operations</span>
                                    <span class="px-2 py-0.5 text-xs bg-gray-100 rounded">Beginner</span>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 pb-4 space-y-3">
                            <p class="text-sm text-gray-600">
                                Build strong customer relationships, handle complaints, and create memorable dining experiences.
                            </p>
                            <div class="flex items-center justify-between text-sm">
                                <span class="flex items-center gap-1 text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                     1.5 hours</span>
                                <span class="text-yellow-600 font-medium">In Progress</span>
                            </div>
                            <div>
                                <div class="w-full bg-gray-200 h-2 rounded">
                                    <div class="bg-[#12B6D3] h-2 rounded" style="width: 30%"></div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">30% complete</p>
                            </div>
                            <a href="/learning/detail" class="w-full inline-flex items-center justify-center bg-[#12B6D3] text-white rounded-lg py-1.5 text-sm">
                                ▶ Continue
                            </a>
                        </div>
                    </div>

                    {{-- Module 5 --}}
                    <div class="border rounded-xl shadow-sm hover:shadow-md transition-shadow bg-white">
                        <div class="p-4 flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#12B6D320] rounded-lg flex items-center justify-center">💡</div>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-base">Menu Innovation Strategies</h3>
                                <div class="flex gap-2 mt-1">
                                    <span class="px-2 py-0.5 text-xs border rounded">Innovation</span>
                                    <span class="px-2 py-0.5 text-xs bg-gray-100 rounded">Advanced</span>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 pb-4 space-y-3">
                            <p class="text-sm text-gray-600">
                                Develop creative menu items, seasonal offerings, and stay ahead of food trends in your market.
                            </p>
                            <div class="flex items-center justify-between text-sm">
                                <span class="flex items-center gap-1 text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                4 hours</span>
                                <span class="text-gray-400 font-medium">Not Started</span>
                            </div>
                            <a href="/learning/detail" class="w-full inline-flex items-center justify-center border rounded-lg py-1.5 text-sm hover:bg-[#12B6D3] hover:text-white transition-all duration-150">
                                Start
                            </a>
                        </div>
                    </div>

                    {{-- Module 6 --}}
                    <div class="border rounded-xl shadow-sm hover:shadow-md transition-shadow bg-white">
                        <div class="p-4 flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#12B6D320] rounded-lg flex items-center justify-center">📚</div>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-base">Supply Chain Management</h3>
                                <div class="flex gap-2 mt-1">
                                    <span class="px-2 py-0.5 text-xs border rounded">Operations</span>
                                    <span class="px-2 py-0.5 text-xs bg-gray-100 rounded">Intermediate</span>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 pb-4 space-y-3">
                            <p class="text-sm text-gray-600">
                                Optimize your ingredient sourcing, manage suppliers, and reduce operational costs effectively.
                            </p>
                            <div class="flex items-center justify-between text-sm">
                                <span class="flex items-center gap-1 text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                3 hours</span>
                                <span class="text-gray-400 font-medium">Not Started</span>
                            </div>
                            <a href="/learning/detail" class="w-full inline-flex items-center justify-center border rounded-lg py-1.5 text-sm hover:bg-[#12B6D3] hover:text-white transition-all duration-150">
                                Start
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
