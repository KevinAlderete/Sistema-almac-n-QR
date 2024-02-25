<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" sizes="76x76" href="{{ asset('/img/logo-almacen.png') }}" type="image/png" />

    <title>Almacén QR</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[url('/public/img/back.jpg')]">
        <div>
            <a href="#">
                {{-- <img class=" h-24 rounded-md shadow-lg fill-current text-gray-500" src="{{ asset('/img/logo.jpg') }}"
                    alt=""> --}}
                <span class="font-extrabold text-xl text-center bg-white px-6 py-4 rounded-md">Almacén QR</span>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-lg overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
