<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi Detail</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex">
        @include('components.sidebar')

        <div class="flex-grow flex flex-col pl-64">
            {{-- Header --}}
            {{-- Header atas --}}
            <div class="border-b border-gray-200 bg-white p-6 flex justify-between items-center fixed z-10 w-full pr-72">
                <div class="flex flex-col">
                    <h1 class="font-bold text-2xl">Welcome back,  {{ auth()->user()->name ?? 'User' }}!</h1>
                    <p class="text-gray-500">Ready to grow your F&B business today?</p>
                </div>
                <div class="profile-wrapper">
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="{{ asset('assets/images/flower.jpg') }}" alt="" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <div class="container mx-auto p-6 pt-32">
                {{-- Back link --}}
                <a href="{{ route('consultations.index') }}" class="text-[#12B6D3] text-sm flex items-center gap-1 mb-4 hover:underline">
                    ← Kembali ke Daftar Pertanyaan
                </a>

                {{-- Title --}}
                <h1 class="text-2xl font-bold mb-2">{{ $question->message }}</h1>
                <div class="flex items-center gap-3 text-sm text-gray-600 mb-6">
                    <span class="px-2 py-1 border rounded">{{ $question->category }}</span>
                    <span class="px-2 py-1 rounded bg-green-100 text-green-800">{{ $question->status }}</span>
                    <span>{{ $question->created_at->format('d M Y H:i') }}</span>
                </div>

                {{-- Chat Section --}}
                <div class="space-y-6">

                    {{-- User Question --}}
                    <div class="flex justify-end">
                        <div class="max-w-md bg-blue-500 text-white p-3 rounded-lg shadow">
                            <p>{{ $question->message }}</p>
                            <p class="text-xs text-white/80 mt-1 text-right">{{ $question->created_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>

                    {{-- Status Info --}}
                    <div class="flex justify-center">
                        <span class="bg-green-50 text-green-700 px-4 py-2 rounded-full text-sm">
                            Pertanyaan terkirim ke advisor
                        </span>
                    </div>

                    {{-- Advisor Answer --}}
                    @if($question->answer)
                        <div class="flex items-start gap-2">
                            <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-200 font-semibold text-sm">A</div>
                            <div class="max-w-md bg-white border p-3 rounded-lg shadow">
                                <p class="font-semibold text-gray-700 mb-1">Advisor</p>
                                <p class="text-gray-700">{{ $question->answer }}</p>
                                <p class="text-xs text-gray-400 mt-2">{{ $question->updated_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <span class="bg-purple-50 text-purple-700 px-4 py-2 rounded-full text-sm">
                                Advisor telah membalas pertanyaan Anda
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>
