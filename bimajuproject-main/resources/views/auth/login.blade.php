<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-50">
        <!-- Logo / Judul -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-cyan-600">Bimaju</h1>
            <p class="text-gray-500">F&amp;B UMKM Assistant</p>
        </div>

        <!-- Card Login -->
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">
            <!-- Title -->
            <h2 class="text-xl font-bold text-gray-900 mb-2">Welcome to Bimaju</h2>
            <p class="text-sm text-gray-600 mb-6">Enter your credentials to access your account</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700" style="color: gray" />
                    <x-text-input id="email"
                        class="mt-1 block w-full rounded-md border-gray-300 focus:border-cyan-500 focus:ring-cyan-500"
                        type="email"
                        name="email"
                        style="background-color: white; color: black;"
                        :value="old('email')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700" style="color: gray" />
                    <x-text-input id="password"
                        class="mt-1 block w-full rounded-md border-gray-300 focus:border-cyan-500 focus:ring-cyan-500"
                        type="password"
                        name="password"
                        style="background-color: white; color: black;"
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Button -->
                <div class="mb-4">
                    <button type="submit"
                        class="w-full bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded-md transition">
                        {{ __('Login') }}
                    </button>
                </div>

                <!-- Forgot Password -->
                @if (Route::has('password.request'))
                    <div class="text-center mb-4">
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-cyan-600 hover:underline">
                            {{ __('Forgot Password?') }}
                        </a>
                    </div>
                @endif

                <!-- Register Link -->
                <div class="text-center text-sm text-gray-600">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" class="text-cyan-600 hover:underline">
                        {{ __('Register here') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
