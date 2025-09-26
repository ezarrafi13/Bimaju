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
            <div class="flex items-center justify-between p-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Learning Modules</h1>
                    <p class="text-gray-500 mt-2">Grow your F&B business with expert knowledge</p>
                </div>
                <div class="flex items-center gap-2">
                    🏆
                    <span class="text-sm font-medium">Level 2 Entrepreneur</span>
                </div>
            </div>

            {{-- Grid Modules --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 p-6">

                {{-- Module 1 --}}
                <div class="border rounded-xl shadow-sm hover:shadow-md transition-shadow bg-white">
                    <div class="p-4 flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#12B6D320] rounded-lg flex items-center justify-center">💵</div>
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
                            <span class="flex items-center gap-1 text-gray-500">⏱ 2 hours</span>
                            <span class="text-green-600 font-medium">Completed</span>
                        </div>
                        <a href="#" class="w-full inline-flex items-center justify-center border rounded-lg py-1.5 text-sm hover:bg-gray-50">
                            ✅ Review
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
                            <span class="flex items-center gap-1 text-gray-500">⏱ 3 hours</span>
                            <span class="text-yellow-600 font-medium">In Progress</span>
                        </div>
                        <div>
                            <div class="w-full bg-gray-200 h-2 rounded">
                                <div class="bg-[#12B6D3] h-2 rounded" style="width: 60%"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">60% complete</p>
                        </div>
                        <a href="#" class="w-full inline-flex items-center justify-center bg-[#12B6D3] text-white rounded-lg py-1.5 text-sm">
                            ▶ Continue
                        </a>
                    </div>
                </div>

                {{-- Module 3 --}}
                <div class="border rounded-xl shadow-sm hover:shadow-md transition-shadow bg-white">
                    <div class="p-4 flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#12B6D320] rounded-lg flex items-center justify-center">👨‍🍳</div>
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
                            <span class="flex items-center gap-1 text-gray-500">⏱ 2.5 hours</span>
                            <span class="text-gray-400 font-medium">Not Started</span>
                        </div>
                        <a href="#" class="w-full inline-flex items-center justify-center border rounded-lg py-1.5 text-sm hover:bg-gray-50">
                            📖 Start
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
                            <span class="flex items-center gap-1 text-gray-500">⏱ 1.5 hours</span>
                            <span class="text-yellow-600 font-medium">In Progress</span>
                        </div>
                        <div>
                            <div class="w-full bg-gray-200 h-2 rounded">
                                <div class="bg-[#12B6D3] h-2 rounded" style="width: 30%"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">30% complete</p>
                        </div>
                        <a href="#" class="w-full inline-flex items-center justify-center bg-[#12B6D3] text-white rounded-lg py-1.5 text-sm">
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
                            <span class="flex items-center gap-1 text-gray-500">⏱ 4 hours</span>
                            <span class="text-gray-400 font-medium">Not Started</span>
                        </div>
                        <a href="#" class="w-full inline-flex items-center justify-center border rounded-lg py-1.5 text-sm hover:bg-gray-50">
                            📖 Start
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
                            <span class="flex items-center gap-1 text-gray-500">⏱ 3 hours</span>
                            <span class="text-gray-400 font-medium">Not Started</span>
                        </div>
                        <a href="#" class="w-full inline-flex items-center justify-center border rounded-lg py-1.5 text-sm hover:bg-gray-50">
                            📖 Start
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
