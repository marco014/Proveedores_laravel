<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Proveedores</title>

    <!-- Tailwind CSS desde Vite (Laravel 10 usa esto por defecto) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
