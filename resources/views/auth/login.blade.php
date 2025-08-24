@extends('layouts.app')

@section('title', 'Iniciar sesión - Mi Booking')

@section('content')
    <div class="border border-[#003580] p-10 rounded-lg shadow-md max-w-md mx-auto mt-10">
        <h1 class=" text-[#003580] text-3xl font-bold mb-4 text-center">Iniciar sesión</h1>
        <p>Puedes iniciar sesión con tu cuenta de Booking.com para acceder a nuestros servicios</p>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#003580] shadow-sm focus:ring-[#003580]" name="remember">
                    <span class="ms-2 text-sm text-black">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-black hover:text-[#003580] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#003580]" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div>
                <x-primary-button class="w-full ">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
                        <!-- Divider -->
            <div class="flex items-center my-6">
                <hr class="flex-grow border-gray-300">
                <span class="px-2 text-gray-500 text-sm">o</span>
                <hr class="flex-grow border-gray-300">
            </div>

            <!-- Opciones alternativas de login -->
            <div class="flex items-center justify-center gap-6 my-6">
                <!-- Google -->
                <a href="/" class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-300 bg-white hover:bg-gray-100 transition">
                    <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="w-6 h-6">
                </a>
                <!-- Facebook -->
                <a href="/" class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-300 bg-white hover:bg-gray-100 transition">
                    <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" alt="Facebook" class="w-6 h-6">
                </a>
                <!-- Apple -->
                <a href="/" class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-300 bg-white hover:bg-gray-100 transition">
                    <img src="https://www.svgrepo.com/show/506383/apple.svg" alt="Apple" class="w-6 h-6">
                </a>
            </div>
        </form>
    </div>
@endsection
