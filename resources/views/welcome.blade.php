<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (para estilos rápidos y bonitos) -->
    <style>
        /* Importar los estilos de TailwindCSS */
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>
</head>
<body class="min-h-screen bg-gradient-to-r from-pink-500 to-yellow-500 flex items-center justify-center">
    <div class="bg-white shadow-xl rounded-full p-6 max-w-lg w-full">
        <h1 class="text-2xl font-semibold text-center text-gray-800 mb-4">Bienvenido a BrunellaWeb</h1>
        <p class="text-center text-gray-600 mb-6">Esta es una versión preliminar de la Mejor Pagina del IPV. Venta de productos e insumos de cualquier</p>
        
        <div class="flex justify-center space-x-4 mb-6">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">Ir al Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-300">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition duration-300">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>
