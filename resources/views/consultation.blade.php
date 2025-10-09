<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="flex w-full">
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

        {{-- Main Content --}}
        <div class="p-6 pt-32">
            <div class="mb-8">
                <h1 class="text-3xl font-bold">Tanya Advisor</h1>
                <p class="text-gray-600">Dapatkan jawaban dari mentor bisnis F&B</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- Form Ajukan Pertanyaan --}}
                <div class="bg-white rounded-2xl shadow p-6">
                    <h2 class="text-xl font-semibold mb-4">Ajukan Pertanyaan</h2>
                    <form method="POST" action="{{ route('consultations.store') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium mb-2">Pertanyaan Anda</label>
                            <textarea name="message" rows="4" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-cyan-500" placeholder="Tuliskan pertanyaan Anda..." required></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Kategori</label>
                            <select name="category" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-cyan-500" required>
                                <option value="">Pilih kategori</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}">{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Lampiran (Opsional)</label>
                            <input type="file" name="attachment" accept="image/*,audio/*" class="w-full border rounded-lg p-2">
                        </div>

                        <button type="submit" class="w-full bg-[#12B6D3] text-white py-2 px-4 rounded-lg hover:bg-cyan-700 transition">
                            Kirim Pertanyaan
                        </button>
                    </form>
                </div>

                {{-- Daftar Pertanyaan --}}
                <div class="space-y-4">
                    <h2 class="text-xl font-semibold">Pertanyaan Saya</h2>
                    <div>
                        @forelse($consultations as $c)
                            <div class="bg-white rounded-2xl shadow p-4 hover:shadow-md transition">
                                <div class="flex items-start gap-3">
                                    <div class="p-2 bg-blue-100 rounded-full">
                                        <svg class="h-4 w-4 text-[#12B6D3]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M8 10h8M8 14h6M21 12c0 4.97-4.03 9-9 9-1.84 0-3.55-.56-4.97-1.52L3 21l1.52-4.03C3.56 15.55 3 13.84 3 12c0-4.97 4.03 9 9 9s9 4.03 9 9z"/></svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-medium text-sm mb-1">{{ Str::limit($c->message, 80) }}</p>
                                        <div class="flex flex-wrap items-center gap-2 text-xs text-gray-500 mb-2">
                                            <span class="px-2 py-1 border rounded">{{ $c->category }}</span>
                                            <span class="px-2 py-1 rounded bg-green-100 text-green-800">{{ $c->status }}</span>
                                        </div>
                                        <p class="text-xs text-gray-400">{{ $c->created_at->format('d M Y H:i') }}</p>
                                    </div>
                                    <a href="{{ route('consultations.show', $c->id) }}" class="text-[#12B6D3] text-sm hover:underline">View Detail</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500">Belum ada pertanyaan</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
