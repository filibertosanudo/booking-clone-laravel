<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Booking')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    {{-- Header estilo Booking --}}
    <header class="bg-[#003580] text-white p-4">
        <div name="header-bar" class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-[28px] font-bold pl-4">
                <a href="/">Booking Clone</a>
            </h1>

            <nav class="flex items-center space-x-4">
                <button type="button" class="flex items-center space-x-2 px-3 py-2 rounded-full bg-blue-800 hover:bg-blue-700 transition">Divisa</button>
                <button type="button" class="flex items-center space-x-2 px-3 py-2 rounded-full bg-blue-800 hover:bg-blue-700 transition">Idioma</button>

                <a href="/#" class="flex items-center space-x-2 px-3 py-2 rounded-full bg-blue-800 hover:bg-blue-700 transition">
                    <iconify-icon icon="mdi:support" width="20" height="20"></iconify-icon>
                </a> <!-- /support -->
                <a href="/#"
                    class="flex items-center space-x-2 px-3 py-2 rounded-full bg-blue-800 hover:bg-blue-700 transition">
                    Registra tu propiedad
                </a> <!-- /register-property -->

                @guest
                    <!-- Usuario invitado -->
                    <a href="{{ route('register') }}"
                        class="bg-white text-[#003580] px-4 py-2 rounded-md hover:bg-gray-200">
                        Regístrate
                    </a>
                    <a href="{{ route('login') }}"
                        class="bg-white text-[#003580] px-4 py-2 rounded-md hover:bg-gray-200">
                        Iniciar sesión
                    </a>
                @else
                    <!-- Usuario autenticado -->
                    <div class="relative" x-data="{ open: false }">
                        <button
                            @click="open = !open"
                            class="bg-white text-[#003580] px-4 py-2 rounded-md hover:bg-gray-200"
                        >
                            {{ Auth::user()->name }}
                        </button>

                        <div
                            x-show="open"
                            @click.outside="open = false"
                            class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50"
                        >
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Mi perfil
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Cerrar sesión
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </nav>
        </div>

        <nav>
            <div class="max-w-6xl mx-auto flex items-center space-x-6 py-4">
                <ul class="flex items-center space-x-6 text-white">
                    <li>
                        <a href="/listings" class="flex items-center space-x-2 px-3 py-2 rounded-full bg-blue-800 hover:bg-blue-700 transition">
                            <iconify-icon icon="mdi:home-city" width="20" height="20"></iconify-icon>
                            <span>Listings</span>
                        </a>
                    </li>
                    <li>
                        <a href="/#" class="flex items-center space-x-2 px-3 py-2 rounded-full bg-blue-800 hover:bg-blue-700 transition">
                            <iconify-icon icon="mdi:airplane" width="20" height="20"></iconify-icon>
                            <span>Vuelos</span>
                        </a>
                    </li>
                    <li>
                        <a href="/#" class="flex items-center space-x-2 px-3 py-2 rounded-full bg-blue-800 hover:bg-blue-700 transition">
                            <iconify-icon icon="mdi:bag-suitcase" width="20" height="20"></iconify-icon>
                            <span>Vuelo + Hotel</span>
                        </a>
                    </li>
                    <li>
                        <a href="/#" class="flex items-center space-x-2 px-3 py-2 rounded-full bg-blue-800 hover:bg-blue-700 transition">
                            <iconify-icon icon="mdi:car" width="20" height="20"></iconify-icon>
                            <span>Renta de autos</span>
                        </a>
                    </li>
                    <li>
                        <a href="/#" class="flex items-center space-x-2 px-3 py-2 rounded-full bg-blue-800 hover:bg-blue-700 transition">
                            <iconify-icon icon="mdi:ferris-wheel" width="20" height="20"></iconify-icon>
                            <span>Atracciones</span>
                        </a>
                    </li>
                    <li>
                        <a href="/#" class="flex items-center space-x-2 px-3 py-2 rounded-full bg-blue-800 hover:bg-blue-700 transition">
                            <iconify-icon icon="mdi:airport-taxi" width="20" height="20"></iconify-icon>
                            <span>Taxis aeropuerto</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    {{-- Contenido dinámico --}}
    <main class="container mx-auto py-8">
        @yield('content')
    </main>

</body>
</html>
