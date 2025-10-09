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

        <div class="flex-grow flex flex-col pl-64">
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
            <div class="p-6 pt-32">
                <div class="mb-8">
                    <h1 class="text-3xl font-bold">Forum Komunitas</h1>
                    <p class="text-gray-500">Diskusi dan berbagi ide antar pelaku UMKM F&B</p>
                </div>

                <div class="mb-6 flex justify-between items-center">
                    <form method="GET" action="{{ route('community.index') }}" class="w-1/2">
                        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari diskusi..." class="border rounded-lg p-2 w-full">
                    </form>
                    <a href="{{ route('community.create') }}"  class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center gap-2">
                        ➕ Buat Thread Baru
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse($threads as $thread)
                        <a href="{{ route('community.show', $thread->id) }}"
                           class="block bg-white rounded-lg shadow p-6 hover:shadow-md transition">
                            <h3 class="text-lg font-semibold mb-2">{{ $thread->title }}</h3>
                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $thread->content }}</p>

                            <div class="flex flex-wrap gap-2 mb-3">
                                @foreach($thread->tags as $tag)
                                    <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">{{ $tag->name }}</span>
                                @endforeach
                            </div>

                            <div class="flex justify-between text-xs text-gray-500">
                                <span>{{ $thread->user->name }} • {{ $thread->created_at->diffForHumans() }}</span>
                                <span>{{ $thread->replies_count }} balasan • {{ $thread->last_activity?->diffForHumans() }}</span>
                            </div>
                        </a>
                    @empty
                        <div class="bg-white shadow rounded-lg p-6 text-center">
                            <p class="text-gray-600">Belum ada diskusi. Yuk mulai thread pertama!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</body>
</html>
