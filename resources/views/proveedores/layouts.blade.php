<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind sin build (necesario porque usas clases bg-*, text-*, etc.) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine (opcional) -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tus assets planos (opcional) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/axios@1.x/dist/axios.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('proveedores.index') }}" class="text-xl font-semibold text-blue-600">ProveedoresApp</a>

            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-gray-600 hover:text-gray-900">Cerrar sesión</button>
            </form>
            @endauth
        </div>
    </nav>

    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>
</body>

</html>