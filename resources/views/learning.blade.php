<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Bimaju | Learning') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex">
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
            <div class="p-6 pt-32 flex flex-col gap-4">
                {{-- Header --}}
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{ __('Learning Modules') }}</h1>
                        <p class="text-gray-500 mt-2">{{ __('Grow your F&B business with expert knowledge') }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                        </svg>
                        <span class="text-sm font-medium">{{ __('Level :level Entrepreneur', ['level' => 2]) }}</span>
                    </div>
                </div>

                <div class="space-y-6">

                    <!-- Learning Progress -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold mb-2">{{ __('Your Learning Progress') }}</h2>
                        <p class="text-sm text-gray-600 mb-4">{{ __('Track your educational journey') }}</p>

                        <div class="flex items-center justify-between mb-2">
                            <p class="text-2xl font-bold text-sky-600">{{ $completedModules }}/{{ $totalModules }}</p>
                            <p class="text-sm text-gray-500">{{ __('Modules Completed') }}</p>
                        </div>

                        <!-- Progress Bar -->
                        <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                            <div class="bg-sky-500 h-2 rounded-full" style="width: {{ $progressPercent }}%"></div>
                        </div>

                        <a href="#" class="text-sky-600 text-sm font-medium hover:underline">
                            {{ __('Complete :count more modules to unlock new tips!', ['count' => max(0, $totalModules - $completedModules)]) }}
                        </a>
                    </div>


                </div>
                {{-- Grid Modules --}}
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($modules as $module)
                        @php
                            $userProgress = $module->lessons->flatMap->progress;
                            $completedLessons = $userProgress->where('status', 'Completed')->count();
                            $totalLessons = $module->lessons->count();
                            $progress = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100) : 0;
                            if ($progress == 0) {
                                $status = __('Not Started');
                                $statusClass = 'text-gray-400';
                                $action = __('Start');
                                $btnClass = 'border hover:bg-[#12B6D3] hover:text-white';
                            } elseif ($progress == 100) {
                                $status = __('Completed');
                                $statusClass = 'text-green-600';
                                $action = __('Review');
                                $btnClass = 'border hover:bg-[#12B6D3] hover:text-white';
                            } else {
                                $status = __('In Progress');
                                $statusClass = 'text-yellow-600';
                                $action = __('Continue');
                                $btnClass = 'bg-[#12B6D3] text-white';
                            }
                        @endphp
                        <div class="border rounded-xl shadow-sm hover:shadow-md transition-shadow bg-white">
                            <div class="p-4 flex items-center gap-3">
                                <div class="w-10 h-10 bg-[#12B6D320] rounded-lg flex items-center justify-center text-[#12B6D3]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 text-base">{{ $module->title }}</h3>
                                    <div class="flex gap-2 mt-1">
                                        <span class="px-2 py-0.5 text-xs border rounded">{{ $module->category }}</span>
                                        <span class="px-2 py-0.5 text-xs bg-gray-100 rounded">{{ $module->level }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 pb-4 space-y-3">
                                <p class="text-sm text-gray-600">{{ $module->description }}</p>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="flex items-center gap-1 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        {{ $module->duration }}
                                    </span>
                                    <span class="{{ $statusClass }} font-medium">{{ $status }}</span>
                                </div>
                                @if($progress > 0 && $progress < 100)
                                    <div>
                                        <div class="w-full bg-gray-200 h-2 rounded">
                                            <div class="bg-[#12B6D3] h-2 rounded" style="width: {{ $progress }}%"></div>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">{{ __(':progress% complete', ['progress' => $progress]) }}</p>
                                    </div>
                                @endif
                                <a href="learning/{{ $module->id }}"
                                   class="w-full inline-flex items-center justify-center rounded-lg py-1.5 text-sm transition-all duration-150 {{ $btnClass }}">
                                   {{ $action }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
