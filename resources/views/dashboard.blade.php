<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Bimaju | Dashboard') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex w-full">
        @include('components.sidebar')
        <div class="flex-grow flex flex-col pl-64">
            <div class="border-b border-gray-200 bg-white p-6 flex justify-between items-center fixed z-10 w-full pr-72">
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
            <div class="p-6 pt-32">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                {{-- Learning Progress --}}
                <div class="bg-white p-4 rounded-2xl border border-gray-200 space-y-4">
                    <div class="flex items-start justify-between">
                        <h3 class="text-lg font-semibold">{{ __('Learning Progress') }}</h3>
                        <p class="text-sm text-gray-500">{{ __('Your journey to success') }}</p>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-[#12B6D3]">
                                {{ $learningCompletedModules ?? 0 }}/{{ $learningTotalModules ?? 0 }}
                            </span>
                            {{-- Icon BookOpen --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#12B6D3]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 0a9 9 0 00-9 9v7h18v-7a9 9 0 00-9-9z" /></svg>
                        </div>
                        <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                            <div class="bg-[#12B6D3] h-2" style="width: {{ $learningProgressPercent ?? 0 }}%"></div>
                        </div>
                        <p class="text-sm text-gray-500">
                            {{ __(':count modules remaining to complete', ['count' => $learningRemainingModules ?? 0]) }}
                        </p>
                        <button class="w-full py-2 text-white bg-[#12B6D3] rounded-lg text-sm">
                            <a href="/learning">{{ __('Continue Learning') }}</a>
                        </button>
                    </div>
                </div>

                {{-- Finance Summary --}}
                <div class="bg-white p-4 rounded-2xl border border-gray-200 space-y-4">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-lg font-semibold">{{ __('Finance Summary') }}</h3>
                            <p class="text-sm text-gray-500">
                                {{ __('Summary for :month', ['month' => isset($currentDate) ? $currentDate->translatedFormat('F Y') : now()->translatedFormat('F Y')]) }}
                            </p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <div class="space-y-1">
                                <p class="text-sm text-gray-500">{{ __('Income') }}</p>
                                <p class="text-lg font-semibold text-green-600">
                                    Rp {{ number_format($financeIncome ?? 0, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="space-y-1 text-right">
                                <p class="text-sm text-gray-500">{{ __('Expenses') }}</p>
                                <p class="text-lg font-semibold text-red-600">
                                    Rp {{ number_format($financeExpense ?? 0, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                        <div class="pt-2 border-t">
                            <p class="text-sm text-gray-500">{{ __('Net Profit') }}</p>
                            <p class="text-xl font-bold {{ ($financeProfit ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                Rp {{ number_format($financeProfit ?? 0, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Recipe Collection --}}
                <div class="bg-white p-4 rounded-2xl border border-gray-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold">Recipe Collection</h3>
                        <p class="text-sm text-gray-500">Your culinary arsenal</p>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-[#12B6D3]">24</span>
                            {{-- Icon ChefHat --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#12B6D3]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 3a5 5 0 00-5 5 5 5 0 0010 0 5 5 0 00-5-5z" /><path d="M6 21h12v-6H6v6z" /></svg>
                        </div>
                        <p class="text-sm text-gray-500">Recipes purchased</p>
                        <div class="flex gap-2">
                            <button class="flex-1 py-2 text-white bg-[#12B6D3] rounded-lg text-sm">
                                <a href="/recipes">Buy More</a>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Consultation --}}
                <div class="bg-white p-4 rounded-2xl border border-gray-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold">{{ __('Consultation') }}</h3>
                        <p class="text-sm text-gray-500">{{ __('Expert support status') }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-yellow-500">2</p>
                            <p class="text-sm text-gray-500">{{ __('Open') }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-green-600">8</p>
                            <p class="text-sm text-gray-500">{{ __('Resolved') }}</p>
                        </div>
                    </div>
                    <button class="w-full py-2 text-white bg-[#12B6D3] rounded-lg text-sm flex items-center justify-center gap-2">
                        <a href="/consultation">{{ __('Ask Expert') }}</a>
                    </button>
                </div>

                {{-- Community --}}
                <div class="bg-white p-4 rounded-2xl border border-gray-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold">{{ __('Community') }}</h3>
                        <p class="text-sm text-gray-500">{{ __('Latest discussions') }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-[#12B6D3]">156</span>
                        👥
                    </div>
                    <div class="space-y-2 text-sm">
                        <div>
                            <p class="font-medium">{{ __('Tips Pemasaran Digital') }}</p>
                            <p class="text-gray-500">{{ __(':count new replies', ['count' => 5]) }}</p>
                        </div>
                        <div>
                            <p class="font-medium">{{ __('Resep Makanan Trending') }}</p>
                            <p class="text-gray-500">{{ __(':count new replies', ['count' => 12]) }}</p>
                        </div>
                    </div>
                    <button class="w-full py-2 border rounded-lg text-sm">
                        <a href="/community">{{ __('Join Discussions') }}</a>
                    </button>
                </div>

                {{-- Quick Actions (sementara placeholder) --}}
                <div class="bg-white p-4 rounded-2xl border border-gray-200 flex flex-col">
  <!-- Header -->
  <h3 class="text-lg font-semibold">{{ __('Quick Actions') }}</h3>
  <p class="text-sm text-gray-500">{{ __('Common tasks to boost your business') }}</p>

  <!-- Action buttons -->
  <div class="grid grid-cols-2 gap-4 mt-4">
    <!-- Add Transaction -->
    <a href="{{ route('finance.index') }}" class="border rounded-lg p-4 flex flex-col items-center justify-center text-center bg-cyan-500 text-white hover:bg-cyan-600 transition">
      <span class="text-2xl">+</span>
      <h4 class="font-semibold">{{ __('Add Transaction') }}</h4>
      <p class="text-sm opacity-90">{{ __('Record income or expense') }}</p>
    </a>

    <!-- Ask Advisor -->
    <a href="{{ route('consultations.index') }}" class="border rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-100 transition">
      <span class="text-xl">💬</span>
      <h4 class="font-semibold">{{ __('Ask Advisor') }}</h4>
      <p class="text-sm text-gray-500">{{ __('Get business advice') }}</p>
    </a>

    <!-- Buy Recipe -->
    <a href="{{ route('recipes.index') }}" class="border rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-100 transition">
      <span class="text-xl">🛒</span>
      <h4 class="font-semibold">{{ __('Buy Recipe') }}</h4>
      <p class="text-sm text-gray-500">{{ __('Discover new recipes') }}</p>
    </a>

    <!-- Join Discussion -->
    <a href="{{ route('community.index') }}" class="border rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-100 transition">
      <span class="text-xl">👥</span>
      <h4 class="font-semibold">{{ __('Join Discussion') }}</h4>
      <p class="text-sm text-gray-500">{{ __('Connect with community') }}</p>
    </a>
  </div>
</div>

            </div>

            {{-- Recent Activity Section --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6  ">
                {{-- Recent Transactions --}}
                <div class="bg-white p-4 rounded-2xl border border-gray-200 space-y-3">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold">{{ __('Recent Transactions') }}</h3>
                        <p class="text-sm text-gray-500">{{ __('Your latest financial activities') }}</p>
                    </div>
                    @forelse(($recentTransactions ?? collect()) as $trx)
                        <div class="flex items-center justify-between py-2 border-b last:border-b-0">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full {{ $trx->type === 'Income' ? 'bg-green-600' : 'bg-red-600' }}"></div>
                                <div>
                                    <p class="font-medium text-sm">{{ $trx->desc }}</p>
                                    <p class="text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($trx->date)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            <span class="font-semibold {{ $trx->type === 'Income' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $trx->type === 'Income' ? '+' : '-' }}Rp {{ number_format($trx->amount, 0, ',', '.') }}
                            </span>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">{{ __('No transactions yet. Add one from the Finance page.') }}</p>
                    @endforelse
                    <button class="w-full py-2 border rounded-lg text-sm mt-3">
                        <a href="/finance">{{ __('View All Transactions') }}</a>
                    </button>
                </div>

                {{-- Learning Recommendations --}}
                <div class="bg-white p-4 rounded-2xl border border-gray-200 space-y-3">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold">{{ __('Learning Recommendations') }}</h3>
                        <p class="text-sm text-gray-500">{{ __('Suggested modules for you') }}</p>
                    </div>
                    @php
                        $courses = [
                            ['title' => __('Digital Marketing Basics'), 'progress' => 0, 'difficulty' => __('Beginner')],
                            ['title' => __('Food Cost Management'), 'progress' => 25, 'difficulty' => __('Intermediate')],
                            ['title' => __('Customer Service Excellence'), 'progress' => 0, 'difficulty' => __('Beginner')],
                        ];
                    @endphp
                    @foreach($courses as $course)
                    <div class="p-3 border rounded-lg space-y-2">
                        <div class="flex justify-between items-start">
                            <h4 class="font-medium text-sm">{{ $course['title'] }}</h4>
                            <span class="text-xs bg-gray-200 px-2 py-1 rounded">{{ $course['difficulty'] }}</span>
                        </div>
                        @if($course['progress'] > 0)
                        <div class="w-full bg-gray-200 h-1 rounded-full overflow-hidden">
                            <div class="bg-[#12B6D3] h-1" style="width: {{ $course['progress'] }}%"></div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                    <button class="w-full py-2 border rounded-lg text-sm mt-3">
                        <a href="/learning">{{ __('Explore All Courses') }}</a>
                    </button>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
