@extends('layouts.app')

@section('title', 'Regístrate - Mi Booking')

@section('content')
    <div class="border border-[#003580] p-10 rounded-lg shadow-md max-w-md mx-auto mt-10">
        <h1 class="text-[#003580] text-3xl font-bold mb-4 text-center">Regístrate</h1>
        <p class="text-lg mb-6 text-center">Crea tu cuenta para acceder a todos los servicios de Booking Clone</p>

        <form method="POST" action="{{ route('register') }}" class="space-y-6 bg-white text-black p-6 rounded-lg shadow-lg">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmar ontraseña')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-[#000000] hover:text-blue-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700" href="{{ route('login') }}">
                    {{ __('Ya tienes cuenta?') }}
                </a>
                <x-primary-button class="ms-4 w-full">
                    {{ __('Registrarse') }}
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
