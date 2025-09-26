<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-50">
        <!-- Logo / Judul -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-cyan-600">Bimaju</h1>
            <p class="text-gray-500">F&amp;B UMKM Assistant</p>
        </div>

        <!-- Card Register -->
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">
            <!-- Title -->
            <h2 class="text-xl font-bold text-gray-900 mb-2">Create your Bimaju account</h2>
            <p class="text-sm text-gray-600 mb-6">Join our community and start growing your F&amp;B business</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Full Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Full Name')" class="text-gray-700" style="color: gray" />
                    <x-text-input id="name"
                        class="mt-1 block w-full rounded-md border-gray-300 bg-white text-gray-900 focus:border-cyan-500 focus:ring-cyan-500"
                        type="text"
                        name="name"
                        style="background-color: white; color: black;"
                        :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700" style="color: gray" />
                    <x-text-input id="email"
                        class="mt-1 block w-full rounded-md border-gray-300 bg-white text-gray-900 focus:border-cyan-500 focus:ring-cyan-500"
                        type="email"
                        name="email"
                        style="background-color: white; color: black;"
                        :value="old('email')"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700" style="color: gray" />
                    <x-text-input id="password"
                        class="mt-1 block w-full rounded-md border-gray-300 bg-white text-gray-900 focus:border-cyan-500 focus:ring-cyan-500"
                        type="password"
                        name="password"
                        style="background-color: white; color: black;"
                        placeholder="Create a password (min. 6 characters)"
                        required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700" style="color: gray" />
                    <x-text-input id="password_confirmation"
                        class="mt-1 block w-full rounded-md border-gray-300 bg-white text-gray-900 focus:border-cyan-500 focus:ring-cyan-500"
                        type="password"
                        name="password_confirmation"
                        style="background-color: white; color: black;"
                        placeholder="Confirm your password"
                        required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Account Type Info -->
                <div class="mb-6 bg-gray-50 p-3 rounded-md border border-gray-200 text-sm text-gray-600">
                    <span class="font-medium">Account Type:</span>
                    <p>All new accounts are created as
                        <a href="#" class="text-cyan-600 font-medium hover:underline">User/Learner</a>
                        by default.
                    </p>
                </div>

                <!-- Button -->
                <div class="mb-4">
                    <button type="submit"
                        class="w-full bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded-md transition">
                        {{ __('Register') }}
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center text-sm text-gray-600">
                    {{ __("Already have an account?") }}
                    <a href="{{ route('login') }}" class="text-cyan-600 hover:underline">
                        {{ __('Login here') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
