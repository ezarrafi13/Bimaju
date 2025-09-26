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
    <div class="flex space-x-6">
        @include('components.sidebar')
<div class="flex-1 p-6">
    @php
        $threads = [
            [
                "id" => 1,
                "title" => "Tips Pemasaran Digital untuk UMKM F&B Pemula",
                "content" => "Halo teman-teman! Saya baru memulai usaha warung makan kecil ...",
                "author" => "Sari Wulandari",
                "tags" => ["Marketing", "Digital", "Pemula"],
                "repliesCount" => 12,
                "lastActivity" => "2 jam yang lalu",
                "timestamp" => "1 hari yang lalu"
            ],
            [
                "id" => 2,
                "title" => "Cara Menghitung HPP yang Tepat untuk Makanan",
                "content" => "Mohon bantuan untuk menghitung HPP makanan ...",
                "author" => "Budi Santoso",
                "tags" => ["Finance", "HPP", "Pricing"],
                "repliesCount" => 8,
                "lastActivity" => "4 jam yang lalu",
                "timestamp" => "2 hari yang lalu"
            ],
            [
                "id" => 3,
                "title" => "Resep Ayam Geprek yang Laris Manis",
                "content" => "Sharing resep ayam geprek yang sudah terbukti laku keras ...",
                "author" => "Chef Andi",
                "tags" => ["Recipes", "Ayam", "Bestseller"],
                "repliesCount" => 25,
                "lastActivity" => "1 jam yang lalu",
                "timestamp" => "3 hari yang lalu"
            ]
        ];

        $comments = [
            [
                "id" => 1,
                "author" => "Expert Marketing",
                "content" => "Untuk pemasaran digital dengan budget terbatas ...",
                "timestamp" => "2 jam yang lalu",
                "likes" => 8
            ],
            [
                "id" => 2,
                "author" => "Pengusaha Veteran",
                "content" => "Setuju dengan komentar di atas. Tambahan: jangan lupa manfaatkan Google My Business ...",
                "timestamp" => "1 jam yang lalu",
                "likes" => 5
            ]
        ];

        // misal kalau ada query param ?thread=1
        $selectedThread = request('thread');
        $threadData = collect($threads)->firstWhere('id', $selectedThread);
    @endphp

    {{-- Jika thread dipilih --}}
    @if($selectedThread && $threadData)
        <div class="mb-6">
            <a href="{{ url('community') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-gray-800">
                ← Kembali ke Forum
            </a>
            <h1 class="text-2xl font-bold mt-3">{{ $threadData['title'] }}</h1>
            <div class="flex items-center gap-2 text-gray-500 text-sm">
                <span class="font-medium">{{ $threadData['author'] }}</span>
                <span>•</span>
                <span>{{ $threadData['timestamp'] }}</span>
            </div>
            <div class="flex gap-2 mt-2">
                @foreach($threadData['tags'] as $tag)
                    <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">{{ $tag }}</span>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Konten & Komentar --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="leading-relaxed text-gray-800">
                        {{ $threadData['content'] }}
                    </p>
                </div>

                <div class="bg-white rounded-lg shadow">
                    <div class="border-b px-6 py-4">
                        <h2 class="font-semibold text-lg">💬 Diskusi ({{ count($comments) }})</h2>
                    </div>
                    <div class="p-6 space-y-4">
                        @foreach($comments as $comment)
                            <div>
                                <div class="flex items-start gap-3">
                                    <div class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center text-xs font-bold">
                                        {{ substr($comment['author'],0,1) }}
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 text-sm">
                                            <span class="font-medium">{{ $comment['author'] }}</span>
                                            <span class="text-gray-500">{{ $comment['timestamp'] }}</span>
                                        </div>
                                        <p class="text-sm text-gray-800 mt-1">{{ $comment['content'] }}</p>
                                    </div>
                                </div>
                                <hr class="my-3">
                            </div>
                        @endforeach

                        {{-- Form Komentar --}}
                        <form id="commentForm" class="space-y-3">
                            @csrf
                            <textarea id="commentInput" rows="3" class="w-full border rounded-lg p-3" placeholder="Tulis komentar..."></textarea>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded" style="background-color: #12B6D3">
                                Kirim Komentar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="font-semibold mb-3">📊 Statistik Thread</h3>
                    <div class="flex justify-between text-sm">
                        <span>Total Balasan</span>
                        <span class="font-medium">{{ $threadData['repliesCount'] }}</span>
                    </div>
                    <div class="flex justify-between text-sm mt-2">
                        <span>Aktivitas Terakhir</span>
                        <span class="font-medium">{{ $threadData['lastActivity'] }}</span>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="font-semibold mb-3">🔥 Thread Populer</h3>
                    <div class="space-y-2">
                        @foreach(array_slice($threads,0,3) as $pop)
                            <a href="{{ url('community?thread='.$pop['id']) }}"
                               class="block p-2 hover:bg-gray-100 rounded">
                                <p class="font-medium text-sm">{{ $pop['title'] }}</p>
                                <p class="text-xs text-gray-500">{{ $pop['repliesCount'] }} balasan</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- Tampilan List Forum --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold">Forum Komunitas</h1>
            <p class="text-gray-500">Diskusi dan berbagi ide antar pelaku UMKM F&B</p>
        </div>

        <div class="mb-6 flex justify-between items-center">
            <input type="text" placeholder="Cari diskusi..." class="border rounded-lg p-2 w-1/2">
            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center gap-2">
                ➕ Buat Thread Baru
            </a>
        </div>

        <div class="space-y-4">
            @forelse($threads as $thread)
                <a href="{{ url('community?thread='.$thread['id']) }}"
                   class="block bg-white rounded-lg shadow p-6 hover:shadow-md transition">
                    <h3 class="text-lg font-semibold mb-2">{{ $thread['title'] }}</h3>
                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $thread['content'] }}</p>
                    <div class="flex flex-wrap gap-2 mb-3">
                        @foreach($thread['tags'] as $tag)
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <div class="flex justify-between text-xs text-gray-500">
                        <span>{{ $thread['author'] }} • {{ $thread['timestamp'] }}</span>
                        <span>{{ $thread['repliesCount'] }} balasan • {{ $thread['lastActivity'] }}</span>
                    </div>
                </a>
            @empty
                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <p class="text-gray-600">Belum ada diskusi. Yuk mulai thread pertama!</p>
                </div>
            @endforelse
        </div>
    @endif
</div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const form = document.getElementById("commentForm");
        const input = document.getElementById("commentInput");
        const commentsContainer = form.parentElement; // parent .p-6

        form.addEventListener("submit", (e) => {
            e.preventDefault();
            const text = input.value.trim();
            if (!text) return;

            // buat elemen komentar baru
            const commentEl = document.createElement("div");
            commentEl.innerHTML = `
                <div class="flex items-start gap-3">
                    <div class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center text-xs font-bold">
                        Y
                    </div>
                    <div>
                        <div class="flex items-center gap-2 text-sm">
                            <span class="font-medium">You</span>
                            <span class="text-gray-500">baru saja</span>
                        </div>
                        <p class="text-sm text-gray-800 mt-1">${text}</p>
                    </div>
                </div>
                <hr class="my-3">
            `;

            // sisipkan sebelum form
            commentsContainer.insertBefore(commentEl, form);

            // reset textarea
            input.value = "";
        });
    });
</script>

</body>
</html>
