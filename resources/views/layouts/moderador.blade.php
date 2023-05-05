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
        {{-- BANNER 1 --}}
        <header class="bg-neutral-900 z-50 shadow text-white text-xs relative hidden sm:-my-px lg:block scree">
            <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <!-- Logo -->
                    <div class="flex items-center">
                    </div>
                    <div class="flex space-x-8">
                        <div class="flex space-x-4">
                            <div class="flex items-center justify-center">
                                <i class="fa-solid fa-at h-6 w-6 text-red-700"></i>
                            </div>
                            <div class="w-full my-auto">
                                <div>soporte@espochep.com.ec</div>
                                <p class="text-neutral-400">{{ __('Nuestro correo corporativo') }}</p class="text-gray-700">
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex items-center justify-center">
                                <i class="fa-solid fa-phone h-6 w-6 text-red-700"></i>
                            </div>
                            <div class="w-full my-auto">
                                <div>098395029</div>
                                <p class="text-neutral-400">{{ __('Nuestro teléfono') }}</p class="text-gray-700">
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex items-center justify-center">
                                <i class="fa-solid fa-location-dot h-6 w-6 text-red-700"></i>
                            </div>
                            <div class="w-full my-auto">
                                <div>KM 1 1/2 Av. Panamericana Sur</div>
                                <p class="text-neutral-400">{{ __('Nuestra Dirección') }}</p class="text-gray-700">
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex items-center justify-center">
                                <i class="fa-solid fa-globe h-6 w-6 text-red-700"></i>
                            </div>
                            <div class="w-full my-auto">
                                <div>
                                    @foreach (config('app.available_locales') as $locale)
                                        <a href="{{ request()->url() }}?lang={{ $locale }}"
                                            class="@if (app()->getLocale() == $locale) text-red-700 font-semibold @endif hover:text-red-700 inline-flex px-2 items-center leading-5 focus:outline-none transition duration-150 ease-in-out">
                                            <span class="text-xs">
                                                [{{ strtoupper($locale) }}]
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="text-neutral-400">
                                    {{ __('Idioma') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        {{-- MENU PRINCIPAL --}}
        @livewire('navigation-menu')
        <!-- CONTENIDO PRINCIPAL DEL A PLANTILLA DE MODERADORES -->
            <div class="max-w-7xl mx-auto rounded-lg px-6 py-4 grid grid-cols-1 lg:grid-cols-5 lg:gap-4">
                <aside class="mb-4">
                    <h1 class="font-bold mx-2 py-2 rounded-lg text-sm mt-2  mb-4 text-center bg-neutral-900 text-white">DETALLES DEl PROCESO</h1>
                    <ul class="overflow-hidden bg-white text-sm p-3 rounded-lg shadow-lg text-neutral-900 mb-10 ml-2 mr-2">
                        <li class="my-1 leading-7 rounded-lg pl-2 @routeIs('moderador.processes.edit', $process) bg-neutral-900 text-white @else  @endif hover:bg-red-700 hover:text-neutral-50">
                            <a href="{{ route('moderador.processes.edit', $process) }}">Informacion del Proceso</a>
                        </li>
                        <hr>
                        <li class="my-1 leading-7 rounded-lg pl-2 @routeIs('moderador.processes.curriculum', $process) bg-neutral-900 text-white @else @endif hover:bg-red-700 hover:text-neutral-50">
                            <a href="{{ route('moderador.processes.curriculum', $process) }}">Etapas del Proceso</a>
                        </li>
                        <hr>
                        <li class="my-1 leading-7 rounded-lg pl-2 @routeIs('moderador.processes.proveedor', $process) bg-neutral-900 text-white @else @endif hover:bg-red-700 hover:text-neutral-50">
                            <a href="{{ route('moderador.processes.proveedor', $process) }}">Proveedores del Proceso</a>
                        </li>
                        <hr>
                        <li class="my-1 leading-7 rounded-lg pl-2 hover:bg-red-700 hover:text-neutral-50 ">
                            <a href="{{ route('moderador.processes.index') }}">Listado de Procesos</a>
                        </li>
                        @if ($process->observation)
                            <li class="my-1 leading-7 rounded-lg pl-2 @routeIs('moderador.processes.observation', $process) bg-neutral-900 text-white @else @endif hover:bg-red-700 hover:text-neutral-50">
                                <a href="{{ route('moderador.processes.observation', $process) }}">Observaciones</a>
                            </li>
                        @endif
                    </ul>
        

                    @switch($process->status)
                        @case(1)
                            <form class="text-center bg-white p-4 rounded-lg" action="{{ route('moderador.processes.status', $process) }}" method="POST">
                                @csrf
                                <button class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm" type="submit">Solicitar Aprobación</button>
                            </form>
                            @break
                        @case(2)
                            <div class="text-center bg-white p-4 rounded-lg">
                                <div class="bg-green-600 text-gray-50 rounded-lg">
                                    <p class="text-sm text-center px-3 py-1">Proceso Publicado</p>
                                </div>
                            </div>
                            @break
                        @case(3)
                            <div class="text-center bg-white p-4 rounded-lg">
                                <div class="bg-blue-600 text-gray-50 rounded-lg">
                                    <p class="text-sm text-center px-3 py-1">Proceso Adjudicado</p>
                                </div>
                            </div>
                            @break
                        @case(4)
                            <div class="text-center bg-white p-4 rounded-lg">
                                <div class=" bg-neutral-700 text-gray-50 rounded-lg">
                                    <p class="text-sm text-center px-3 py-1">Proceso Desierto</p>
                                </div>
                            </div>
                            @break
                        @case(5)
                            <div class="text-center bg-white p-4 rounded-lg">
                                <div class=" bg-yellow-500 text-gray-50 rounded-lg">
                                    <p class="text-sm text-center px-3 py-1">Proceso en Revisión</p>
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
                            <div x-show="open" class="bg-green-500 border border-green-600 text-green-100 px-4 py-3 rounded relative"
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @isset($js)
        {{$js}}
    @endisset
</body>

</html>
