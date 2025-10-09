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
            <div class="border-b border-gray-200 p-6 flex justify-between items-center">
                <div class="flex flex-col">
                    <h1 class="font-bold text-2xl">Welcome back, {{ auth()->user()->name ?? 'User' }}!</h1>
                    <p class="text-gray-500">Ready to grow your F&B business today?</p>
                </div>
                <div class="profile-wrapper">
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="{{ asset('assets/images/flower.jpg') }}" alt="" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
            <div class="max-w-6xl mx-auto p-6">
                <!-- Title -->
                <div class="mb-8">
                    <h1 class="text-2xl font-bold">Profil Pengguna</h1>
                    <p class="text-gray-600">Lihat dan kelola informasi pribadimu.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Informasi Profil -->
                    <div class="md:col-span-2 bg-white shadow rounded-lg p-6">
                        <h2 class="text-lg font-semibold flex items-center gap-2 mb-1">
                            <span>👤</span> Informasi Profil
                        </h2>
                        <p class="text-sm text-gray-500 mb-6">Perbarui informasi personal Anda</p>

                        <div class="flex flex-col items-center mb-6">
                            <div class="relative">
                                <div class="w-20 h-20 rounded-full bg-sky-100 flex items-center justify-center text-sky-600 font-bold text-lg">
                                    SW
                                </div>
                                <button class="absolute bottom-0 right-0 bg-sky-500 text-white p-1.5 rounded-full hover:bg-sky-600">
                                    📷
                                </button>
                            </div>
                            <span class="mt-2 inline-block px-3 py-1 text-xs font-medium text-white bg-sky-500 rounded-full">
                                Pro Plan
                            </span>
                        </div>

                       <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                            @csrf
                            <!-- Nama Lengkap -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                       class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500" />
                                @error('name')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">📧</span>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                           class="w-full pl-10 border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500" />
                                </div>
                                @error('email')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nomor HP -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">📞</span>
                                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                           class="w-full pl-10 border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500" />
                                </div>
                                @error('phone')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <button type="submit"
                                        class="px-4 py-2 bg-sky-500 text-white font-medium rounded-md hover:bg-sky-600">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Informasi Akun -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-lg font-semibold flex items-center gap-2 mb-4">
                            <span>🛡</span> Informasi Akun
                        </h2>
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-center gap-2">
                                📅 <span>Bergabung sejak</span>
                                <span class="ml-auto font-medium">
                                    {{ $user->created_at->translatedFormat('d F Y') }}
                                </span>
                            </li>
                            <li class="flex items-center gap-2">
                                ⏰ <span>Login terakhir</span>
                                <span class="ml-auto font-medium">
                                    {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Today' }}
                                </span>
                            </li>
                            <li class="flex items-center gap-2">
                                🛡 <span>Status</span>
                                <span class="ml-auto font-medium">{{ $user->status ?? 'Learner' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
