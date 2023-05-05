<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>ESPOCH EP</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-jet-banner />
    <div class="min-h-screen bg-gray-100">
        {{-- MENU PRINCIPAL --}}
        @livewire('navigation-menu')
        <!-- CONTENIDO PRINCIPAL DEL A PLANTILLA DE MODERADORES -->
        <div class="max-w-7xl mx-auto rounded-lg px-6 py-4 grid grid-cols-1 lg:grid-cols-5 lg:gap-4">
            <aside class="mb-4">
                <h1 class="font-bold mx-2 py-2 rounded-lg text-sm mt-2  mb-4 text-center bg-neutral-900 text-white">
                    TRANSPARENCIA</h1>
                <ul class="overflow-hidden bg-white text-sm p-3 rounded-lg shadow-lg text-neutral-900 mb-10 ml-2 mr-2">
                    <li class="my-1 leading-7 rounded-lg pl-2 @routeIs('moderador.transparencies.edit', $transparency) bg-neutral-900 text-white
                        @else
                        @endif hover:bg-red-700 hover:text-neutral-50">
                        <a href="{{ route('moderador.transparencies.edit', $transparency) }}">Año de la
                            Transparencia</a>
                    </li>
                    <hr>
                    <li class="my-1 leading-7 rounded-lg pl-2 @routeIs('moderador.transparencies.years', $transparency) bg-neutral-900 text-white
                        @else
                        @endif hover:bg-red-700 hover:text-neutral-50">
                        <a href="{{ route('moderador.transparencies.years', $transparency) }}">Mes de la Transparencia</a>
                    </li>
                    <hr>
                    {{-- <li class="my-1 leading-7 rounded-lg pl-2 @routeIs('moderador.transparencies.detalles', $transparency) bg-neutral-900 text-white @else @endif hover:bg-red-700 hover:text-neutral-50">
                            <a href="{{ route('moderador.transparencies.detalles', $transparency) }}">Informacion General</a>
                        </li> --}}
                    <hr>
                    <li class="my-1 leading-7 rounded-lg pl-2 hover:bg-red-700 hover:text-neutral-50 ">
                        <a href="{{ route('moderador.transparencies.index') }}">Volver al Listado</a>
                    </li>
                </ul>

                @switch($transparency->status)
                    @case(1)
                        <div class="text-center bg-white p-4 rounded-lg">
                            <div class="bg-red-500 text-gray-50 rounded-lg">
                                <p class="text-sm text-center px-3 py-1">Año en Borrador</p>
                            </div>
                        </div>
                    @break

                    @case(2)
                        <div class="text-center bg-white p-4 rounded-lg">
                            <div class="bg-green-600 text-gray-50 rounded-lg">
                                <p class="text-sm text-center px-3 py-1">Año Publicado</p>
                            </div>
                        </div>
                    @break

                    @default
                @endswitch
            </aside>
            <main class="col-span-4 bg-white px-8 py-4 rounded-lg">
                {{-- <h1 class="py-4 text-center">Informacion del proceso</h1> --}}
                @if (session('notificacion'))
                    <div x-data="{ open: true }">
                        <div x-show="open"
                            class="bg-green-500 border border-green-600 text-green-100 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Ok!</strong>
                            <span class="block sm:inline">{{ session('notificacion') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg x-on:click="open = false" class="fill-current h-6 w-6 text-white" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                @endif
                {{ $slot }}
            </main>
        </div>
    </div>
    @stack('modals')
    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"
        integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @isset($js)
        {{ $js }}
    @endisset
</body>

</html>
