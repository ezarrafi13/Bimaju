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

    <div class="flex-grow flex flex-col pl-64">

        {{-- Header Thread --}}
        <div class="mb-6">
            <a href="{{ route('community.index') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-gray-800">
                ← Kembali ke Forum
            </a>
            <h1 class="text-2xl font-bold mt-3">{{ $thread->title }}</h1>
            <div class="flex items-center gap-2 text-gray-500 text-sm">
                <span class="font-medium">{{ $thread->user->name }}</span>
                <span>•</span>
                <span>{{ $thread->created_at->diffForHumans() }}</span>
            </div>
            <div class="flex gap-2 mt-2">
                @foreach($thread->tags as $tag)
                    <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Konten & Diskusi --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Konten Thread --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="leading-relaxed text-gray-800">
                        {{ $thread->content }}
                    </p>
                </div>

                {{-- Box Diskusi / Komentar --}}
                <div class="bg-white rounded-lg shadow">
                    <div class="border-b px-6 py-4 flex items-center gap-2">
                        <i class="fa fa-comments text-gray-600"></i>
                        <h2 class="font-semibold text-lg">Diskusi ({{ $thread->comments->count() }})</h2>
                    </div>

                    <div class="p-6 space-y-6">
                        @forelse($thread->comments as $comment)
                            <div>
                                <div class="flex items-start gap-3">
                                    <div class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center text-xs font-bold">
                                        {{ strtoupper(substr($comment->user->name,0,2)) }}
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 text-sm">
                                            <span class="font-medium">{{ $comment->user->name }}</span>
                                            <span class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-sm text-gray-800 mt-1">{{ $comment->content }}</p>
                                    </div>
                                </div>
                                @if(!$loop->last)
                                    <hr class="my-3">
                                @endif
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm">Belum ada komentar. Jadilah yang pertama!</p>
                        @endforelse

                        {{-- Form Komentar --}}
                        <form method="POST" action="{{ route('community.comment', $thread->id) }}" class="space-y-3">
                            @csrf
                            <textarea name="content" rows="3" class="w-full border rounded-lg p-3" placeholder="Tulis komentar..."></textarea>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center gap-2">
                                <i class="fa fa-paper-plane"></i> Kirim Komentar
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
                        <span class="font-medium">{{ $thread->replies_count }}</span>
                    </div>
                    <div class="flex justify-between text-sm mt-2">
                        <span>Aktivitas Terakhir</span>
                        <span class="font-medium">{{ $thread->last_activity?->diffForHumans() }}</span>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="font-semibold mb-3">🔥 Thread Populer</h3>
                    <div class="space-y-2">
                        @foreach($popular as $pop)
                            <a href="{{ route('community.show', $pop->id) }}"
                               class="block p-2 hover:bg-gray-100 rounded">
                                <p class="font-medium text-sm">{{ $pop->title }}</p>
                                <p class="text-xs text-gray-500">{{ $pop->replies_count }} balasan</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
