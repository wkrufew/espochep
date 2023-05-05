<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#a33e3e" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('../fotos/favicon.webp') }}">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css') }}"integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css"> --}}
    @stack('css')
    <!-- Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            font-display: optional;
        }

        ::-webkit-scrollbar {
            width: 13px;
        }

        ::-webkit-scrollbar-track {
            border: 5px;
            box-shadow: inset 0 0 15px #aaaaaa;
        }

        ::-webkit-scrollbar-thumb {
            background: #a51515;
            border-radius: 15px;
        }

        .scrollTop {
            bottom: 800px;
            z-index: 9999;
            visibility: hidden;
            transition: 1s;
        }

        .scrollTop.active {
            bottom: 100px;
            visibility: visible;
            opacity: 1;
        }

        .popup {
            position: absolute;
            left: 50%;
            top: -25%;
            visibility: hidden;
            width: 490px;
            border-radius: 5px;
            padding: 13px 17px 20px;
            background: #fff;
            display: flex;
            border-top: 3px solid #EA4D67;
            transform: translateX(-50%);
            box-shadow: 0 10px 25px rgba(52, 87, 220, 0.1);
            transition: all 0.25s ease;
            z-index: 99999;
        }

        .popup.show {
            top: 0;
            visibility: visible;
        }

        .popup.online {
            border-color: #2ECC71;
        }

        .popup .icon i {
            width: 40px;
            height: 40px;
            display: flex;
            color: #fff;
            margin-right: 15px;
            font-size: 1.2rem;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #EA4D67;
        }

        .popup.online .icon i {
            background: #2ECC71;
        }

        .popup .title {
            font-size: 1.2rem;
        }

        .popup .desc {
            color: #474747;
            margin: 3px 0 10px;
            font-size: 1.04rem;
        }

        .popup .reconnect {
            border: none;
            outline: none;
            color: #fff;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 8px 13px;
            border-radius: 4px;
            background: #5372F0;
        }

        .popup.online .reconnect {
            background: #bfbfbf;
            pointer-events: none;
        }

        @media screen and (max-width: 550px) {
            .popup {
                width: 100%;
                padding: 10px 15px 17px;
            }
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles

    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js') }}"
        integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>

    <meta name="keywords"
        content="ESPOCHEP, ESPOCH EP, empresa pública de la ESPOCH, compras públicas, empresa pública, procesos de licitaciones, procesos de infima cuantía, subasta inversa, licitación internacional">
    @yield('meta_tag')
</head>

<body class="Roboto antialiased selection:bg-neutral-300 selection:text-neutral-900">
    <x-jet-banner />
    {{-- ALERTA DE INTERNET --}}
    <div class="popup">
        <div class="icon"><i class=""></i></div>
        <div class="details">
            <h2 class="title"></h2>
            <p class="desc"></p>
            <button class="reconnect">Reconectar Ahora</button>
        </div>
    </div>
    {{-- FIN DE LA ALERTA DE INTERNET --}}
    {{-- BOTONES FLOTANTES --}}
    <div>
        <a aria-label="scroll" rel="noopener noreferrer" href="#inicio"
            class="hidden md:block scrollTop transform p-1 fixed right-9 w-10 h-10 bg-neutral-600/80 shadow-2xl rounded-full cursor-pointer z-30 opacity-0 rotate-180 hover:scale-110">
            <svg class=" z-30 w-full h-full mx-auto text-white cursor-pointer" fill="#FFFFFF" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </a>
        <div class="fixed z-30 right-3 bottom-3 md:right-7 md:bottom-6">
            <a href="https://wa.me/{{ $settings['phone2'] }}?text=Hola%20ESPOCH%20EP" rel="noopener noreferrer"
                aria-label="whatsapp" class="" target=" _blank">
                {{-- <img alt="whatsapp"
                        class="h-14 w-14 transition duration-500 ease-in-out bg-transparent transform hover:-translate-y-1 hover:scale-110"
                        src="{{ asset('fotos/whatsap.webp') }}"> --}}
                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 116 116" width="116"
                    height="116">
                    <title>whatsap</title>
                    <defs>
                        <image width="107" height="107" id="img1"
                            href="data:image/png;base64,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" />
                    </defs>
                    <style>
                    </style>
                    <use id="Background" href="#img1" x="3" y="5" />
                </svg>
            </a>
        </div>
    </div>
    <div class="min-h-screen bg-gray-100">
        {{-- BANNER 1 --}}

        <header class="bg-neutral-900 z-40 shadow text-white text-xs relative hidden sm:-my-px lg:block scree"
            id="inicio">
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
                                <a href="mailto:{{ $settings['email1'] }}"> {{ $settings['email1'] }}</a>
                                <p class="text-neutral-400">{{ __('Nuestro correo corporativo') }}</p
                                    class="text-gray-700">
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex items-center justify-center">
                                <i class="fa-solid fa-phone h-6 w-6 text-red-700"></i>
                                {{-- <i class="fa-solid fa-user-headset "></i> --}}
                            </div>
                            <div class="w-full my-auto">
                                <a href="tel:{{ $settings['phone1'] }}">{{ $settings['phone1'] }}</a>
                                <p class="text-neutral-400">{{ __('Nuestro teléfono') }}</p class="text-gray-700">
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex items-center justify-center">
                                <i class="fa-solid fa-location-dot h-6 w-6 text-red-700"></i>
                            </div>
                            <div class="w-full my-auto">
                                <a href="https://goo.gl/maps/Hfbic2fnH4ygAckh7" target="_blank"
                                    rel="noopener noreferrer">{{ $settings['direction'] }}</a>
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
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <x-footer />
    </div>
    @stack('modals')
    @livewireScripts

    @stack('js')
    @isset($js)
        {{ $js }}
    @endisset

    <script src="{{ asset('//cdn.jsdelivr.net/npm/sweetalert2@11') }}" defer></script>
    <script src="{{ asset('js/widgets.js') }}" defer></script>
</body>

</html>
