<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" sizes="76x76" href="{{ asset('/img/logo-almacen.png') }}" />

    <title>Almacén QR</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/adapter.min.js') }}"></script>
    <script src="{{ asset('js/vue.min.js') }}"></script>
    <script src="{{ asset('js/instascan.min.js') }}"></script>






    {{-- style --}}
    <style>
        .header-links li span {
            position: relative;
            z-index: 0;
        }

        .header-links li span::before {
            content: '';
            position: absolute;
            z-index: -1;
            bottom: 2px;
            left: -4px;
            right: -4px;
            display: block;
            height: 6px;
        }

        .header-links li a.active span::before {
            background-color: #1958A6;
        }

        .header-links li a:not(.active):hover span::before {
            background-color: #ccc;
        }

        .header-links li a.active:hover span::before {
            background-color: #296ec2;
            transform: scale(115%);
        }
    </style>
</head>

<body class="font-sans antialiased">
    @if (Session::has('message'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-start',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ Session::get('message') }}'
            })
        </script>
    @endif
    @if (Session::has('messageAlert'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-start',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: '{{ Session::get('messageAlert') }}'
            })
        </script>
    @endif
    @if (Session::has('messageAlertAsistencia'))
        <script>
            Swal.fire({
                title: '{{ Session::get('messageAlertAsistencia') }}',
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 2000,
                timerProgressBar: true
            })
        </script>
    @endif
    @if (Session::has('messageAsistencia'))
        <script>
            Swal.fire({
                title: '{{ Session::get('messageAsistencia') }}',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 2000,
                timerProgressBar: true
            })
        </script>
    @endif
    <main>
        <header class="bg-white shadow-lg h-24 flex">
            <a href="" class="w-36 sm:w-44 flex-shrink-0 flex items-center justify-center px-4 lg:px-6 xl:px-8">
                {{-- <img class="" src="{{ asset('/img/logo-almacen.png') }}" alt="" /> --}}
                <span class="font-extrabold text-xl text-center">Almacén QR</span>
            </a>
            <nav class="header-links md:contents font-semibold text-base lg:text-lg hidden">
                <ul class="flex items-center ml-4 xl:ml-8 mr-auto">
                    <li class="p-3 xl:p-6">
                        <x-admin-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                            <span>Inicio</span>
                        </x-admin-link>
                    </li>
                    @role('admin')
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center">
                                <span>Gestión de usuarios</span>
                                <svg class="h-3 opacity-30 ml-2" aria-hidden="true" focusable="false" data-prefix="far"
                                    data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512" class="svg-inline--fa fa-chevron-down fa-w-14 fa-7x">
                                    <path fill="currentColor"
                                        d="M441.9 167.3l-19.8-19.8c-4.7-4.7-12.3-4.7-17 0L224 328.2 42.9 147.5c-4.7-4.7-12.3-4.7-17 0L6.1 167.3c-4.7 4.7-4.7 12.3 0 17l209.4 209.4c4.7 4.7 12.3 4.7 17 0l209.4-209.4c4.7-4.7 4.7-12.3 0-17z">
                                    </path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar"
                                class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow-2xl my-4 w-44">
                                <ul class="py-1" aria-labelledby="dropdownLargeButton">
                                    <li class="p-2">
                                        <x-admin-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.index')">
                                            <span>Roles</span>
                                        </x-admin-link>
                                    </li>
                                    <li class="p-2">
                                        <x-admin-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')">
                                            <span>Usuarios</span>
                                        </x-admin-link>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endrole
                    @role('admin|almacenero')
                        <li class="p-3 xl:p-6">
                            <x-admin-link :href="route('categorias.index')" :active="request()->routeIs('categorias.index')">
                                <span>Categorias</span>
                            </x-admin-link>
                        </li>
                        <li class="p-3 xl:p-6">
                            <x-admin-link :href="route('proveedors.index')" :active="request()->routeIs('proveedors.index')">
                                <span>Proveedor</span>
                            </x-admin-link>
                        </li>
                        <li class="p-3 xl:p-6">
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbars"
                                class="flex items-center">
                                <span>Ingresos</span>
                                <svg class="h-3 opacity-30 ml-2" aria-hidden="true" focusable="false" data-prefix="far"
                                    data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512" class="svg-inline--fa fa-chevron-down fa-w-14 fa-7x">
                                    <path fill="currentColor"
                                        d="M441.9 167.3l-19.8-19.8c-4.7-4.7-12.3-4.7-17 0L224 328.2 42.9 147.5c-4.7-4.7-12.3-4.7-17 0L6.1 167.3c-4.7 4.7-4.7 12.3 0 17l209.4 209.4c4.7 4.7 12.3 4.7 17 0l209.4-209.4c4.7-4.7 4.7-12.3 0-17z">
                                    </path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbars"
                                class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow-2xl my-4 w-44">
                                <ul class="py-1" aria-labelledby="dropdownLargeButton">
                                    <li class="p-2">
                                        <x-admin-link :href="route('articulos.index')" :active="request()->routeIs('articulos.index')">
                                            <span>Productos</span>
                                        </x-admin-link>
                                    </li>
                                    <li class="p-2">
                                        <x-admin-link :href="route('articulos.reporte')" :active="request()->routeIs('articulos.reporte')">
                                            <span>Reporte Ingresos</span>
                                        </x-admin-link>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endrole
                    @role('admin|vendedor')
                        <li class="p-3 xl:p-6">
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarss"
                                class="flex items-center">
                                <span>Ventas</span>
                                <svg class="h-3 opacity-30 ml-2" aria-hidden="true" focusable="false" data-prefix="far"
                                    data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512" class="svg-inline--fa fa-chevron-down fa-w-14 fa-7x">
                                    <path fill="currentColor"
                                        d="M441.9 167.3l-19.8-19.8c-4.7-4.7-12.3-4.7-17 0L224 328.2 42.9 147.5c-4.7-4.7-12.3-4.7-17 0L6.1 167.3c-4.7 4.7-4.7 12.3 0 17l209.4 209.4c4.7 4.7 12.3 4.7 17 0l209.4-209.4c4.7-4.7 4.7-12.3 0-17z">
                                    </path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbarss"
                                class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow-2xl my-4 w-44">
                                <ul class="py-1" aria-labelledby="dropdownLargeButton">
                                    <li class="p-2">
                                    <li class="p-2">
                                        <x-admin-link :href="route('ventas.index')" :active="request()->routeIs('ventas.index')">
                                            <span>Ventas</span>
                                        </x-admin-link>
                                    </li>
                                    <li class="p-2">
                                        <x-admin-link :href="route('reporte.index')" :active="request()->routeIs('reporte.index')">
                                            <span>Reportes Ventas</span>
                                        </x-admin-link>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endrole
                </ul>
            </nav>
            <div class="flex w-full sm:w-fit justify-end">
                <div x-data="{ open: false }" class="flex items-center">
                    <!-- Sidebar Overlay -->
                    <div x-show="open" class="fixed inset-0 z-50 overflow-hidden">
                        <div x-show="open" x-transition:enter="transition-opacity ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition-opacity ease-in duration-300"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                        <!-- Sidebar Content -->
                        <section class="absolute inset-y-0 right-0 pl-10 max-w-full flex">
                            <div x-show="open" x-transition:enter="transition-transform ease-out duration-300"
                                x-transition:enter-start="transform translate-x-full"
                                x-transition:enter-end="transform translate-x-0"
                                x-transition:leave="transition-transform ease-in duration-300"
                                x-transition:leave-start="transform translate-x-0"
                                x-transition:leave-end="transform translate-x-full" class="w-screen max-w-md">
                                <div class="h-full flex flex-col py-6 bg-white shadow-xl">
                                    <!-- Sidebar Header -->
                                    <div class="flex items-center justify-between px-4">
                                        <h2 class="text-xl font-semibold text-black">Navegación</h2>
                                        <button x-on:click="open = false" class="text-gray-500 hover:text-gray-700">
                                            <svg class="h-6 w-6" x-description="Heroicon name: x"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Sidebar Content -->
                                    <div class="mt-4 px-4 h-full overflow-auto">
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                            <nav class="header-links contents font-semibold text-base lg:text-lg">
                                                <ul class="flex flex-col items-start">
                                                    <li class="p-3 xl:p-6">
                                                        <x-admin-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                                                            <span>Inicio</span>
                                                        </x-admin-link>
                                                    </li>
                                                    @role('admin')
                                                        <li class="p-3 xl:p-6">
                                                            <button id="dropdownNavbarLink"
                                                                data-dropdown-toggle="dropdownNavbarMobile"
                                                                class="flex items-center">
                                                                <span>Gestión de usuarios</span>
                                                                <svg class="h-3 opacity-30 ml-2" aria-hidden="true"
                                                                    focusable="false" data-prefix="far"
                                                                    data-icon="chevron-down" role="img"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 448 512"
                                                                    class="svg-inline--fa fa-chevron-down fa-w-14 fa-7x">
                                                                    <path fill="currentColor"
                                                                        d="M441.9 167.3l-19.8-19.8c-4.7-4.7-12.3-4.7-17 0L224 328.2 42.9 147.5c-4.7-4.7-12.3-4.7-17 0L6.1 167.3c-4.7 4.7-4.7 12.3 0 17l209.4 209.4c4.7 4.7 12.3 4.7 17 0l209.4-209.4c4.7-4.7 4.7-12.3 0-17z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                            <!-- Dropdown menu -->
                                                            <div id="dropdownNavbarMobile"
                                                                class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow-2xl my-4 w-44">
                                                                <ul class="py-1" aria-labelledby="dropdownLargeButton">
                                                                    <li class="p-2">
                                                                        <x-admin-link :href="route('admin.roles.index')" :active="request()->routeIs(
                                                                            'admin.roles.index',
                                                                        )">
                                                                            <span>Roles</span>
                                                                        </x-admin-link>
                                                                    </li>
                                                                    <li class="p-2">
                                                                        <x-admin-link :href="route('admin.users.index')" :active="request()->routeIs(
                                                                            'admin.users.index',
                                                                        )">
                                                                            <span>Usuarios</span>
                                                                        </x-admin-link>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    @endrole
                                                    @role('admin|almacenero')
                                                        <li class="p-3 xl:p-6">
                                                            <x-admin-link :href="route('categorias.index')" :active="request()->routeIs('categorias.index')">
                                                                <span>Categorias</span>
                                                            </x-admin-link>
                                                        </li>
                                                        <li class="p-3 xl:p-6">
                                                            <x-admin-link :href="route('proveedors.index')" :active="request()->routeIs('proveedors.index')">
                                                                <span>Proveedor</span>
                                                            </x-admin-link>
                                                        </li>
                                                        <li class="p-3 xl:p-6">
                                                            <button id="dropdownNavbarLink"
                                                                data-dropdown-toggle="dropdownNavbarsMobile"
                                                                class="flex items-center">
                                                                <span>Ingresos</span>
                                                                <svg class="h-3 opacity-30 ml-2" aria-hidden="true"
                                                                    focusable="false" data-prefix="far"
                                                                    data-icon="chevron-down" role="img"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 448 512"
                                                                    class="svg-inline--fa fa-chevron-down fa-w-14 fa-7x">
                                                                    <path fill="currentColor"
                                                                        d="M441.9 167.3l-19.8-19.8c-4.7-4.7-12.3-4.7-17 0L224 328.2 42.9 147.5c-4.7-4.7-12.3-4.7-17 0L6.1 167.3c-4.7 4.7-4.7 12.3 0 17l209.4 209.4c4.7 4.7 12.3 4.7 17 0l209.4-209.4c4.7-4.7 4.7-12.3 0-17z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                            <!-- Dropdown menu -->
                                                            <div id="dropdownNavbarsMobile"
                                                                class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow-2xl my-4 w-44">
                                                                <ul class="py-1" aria-labelledby="dropdownLargeButton">
                                                                    <li class="p-2">
                                                                        <x-admin-link :href="route('articulos.index')" :active="request()->routeIs(
                                                                            'articulos.index',
                                                                        )">
                                                                            <span>Productos</span>
                                                                        </x-admin-link>
                                                                    </li>
                                                                    <li class="p-2">
                                                                        <x-admin-link :href="route('articulos.reporte')" :active="request()->routeIs(
                                                                            'articulos.reporte',
                                                                        )">
                                                                            <span>Reporte Ingresos</span>
                                                                        </x-admin-link>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    @endrole
                                                    @role('admin|vendedor')
                                                        <li class="p-3 xl:p-6">
                                                            <button id="dropdownNavbarLink"
                                                                data-dropdown-toggle="dropdownNavbarssMobile"
                                                                class="flex items-center">
                                                                <span>Ventas</span>
                                                                <svg class="h-3 opacity-30 ml-2" aria-hidden="true"
                                                                    focusable="false" data-prefix="far"
                                                                    data-icon="chevron-down" role="img"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 448 512"
                                                                    class="svg-inline--fa fa-chevron-down fa-w-14 fa-7x">
                                                                    <path fill="currentColor"
                                                                        d="M441.9 167.3l-19.8-19.8c-4.7-4.7-12.3-4.7-17 0L224 328.2 42.9 147.5c-4.7-4.7-12.3-4.7-17 0L6.1 167.3c-4.7 4.7-4.7 12.3 0 17l209.4 209.4c4.7 4.7 12.3 4.7 17 0l209.4-209.4c4.7-4.7 4.7-12.3 0-17z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                            <!-- Dropdown menu -->
                                                            <div id="dropdownNavbarssMobile"
                                                                class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow-2xl my-4 w-44">
                                                                <ul class="py-1" aria-labelledby="dropdownLargeButton">
                                                                    <li class="p-2">
                                                                    <li class="p-2">
                                                                        <x-admin-link :href="route('ventas.index')" :active="request()->routeIs('ventas.index')">
                                                                            <span>Ventas</span>
                                                                        </x-admin-link>
                                                                    </li>
                                                                    <li class="p-2">
                                                                        <x-admin-link :href="route('reporte.index')" :active="request()->routeIs('reporte.index')">
                                                                            <span>Reportes Ventas</span>
                                                                        </x-admin-link>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    @endrole
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <x-dropdown-link x-on:click="open = true"
                        class="flex md:hidden items-center font-semibold text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16"
                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-black hover:text-blue-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                        </svg>

                    </x-dropdown-link>
                </div>
                <div class="flex items-center font-semibold">
                    <form method="POST" class="mr-4 lg:mr-6 xl:mr-8 " action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-box-arrow-left h-8 text-black hover:text-red-600" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                            </svg>
                        </x-dropdown-link>
                    </form>

                </div>
            </div>
        </header>
        <div class="flex w-full">
            {{ $slot }}
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" async>
        $('.boton-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás recuperar esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 197 94)',
                cancelButtonColor: 'rgb(239 68 68)',
                confirmButtonText: '¡Sí, bórralo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
</body>

</html>
