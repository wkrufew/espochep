<x-app-layout>
    @section('meta_tag')
    <title>ESPOCHEP|CONTACT</title>
        {{-- SEO --}}
        <meta name="robots" content="index, follow">
        <meta name="title" content="ESPOCHEP|CONTACT">
        <meta name="description" content="ESPOCHEP, es una empresa dedicada a las compras publicas">
        <!-- Open Graph data -->
        <meta property="og:title" content="ESPOCH EP|CONTACT">
        <meta property="og:type" content="article">
        <meta property="og:description" content="ESPOCHEP, es una empresa dedicada a las compras publicas">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:img" content="{{ asset('../fotos/portada.webp') }}">
    @endsection

    @push('css')
        <link rel="stylesheet" href="{{ asset('https://unpkg.com/leaflet@1.9.3/dist/leaflet.css') }}" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    @endpush

    <div class="max-w-7xl mx-auto px-3 md:px-6 py-6 rounded-lg">
        <div class="flex-col space-y-2 bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-center font-bold text-red-700">
                {{ __('CONTACTANOS') }}
            </h1>
            <p class="text-center max-w-xl mx-auto">
                {{ __('En la ESPOCHEP nos interesa mantenerte informado y ayudarte en todas tus dudas dantote a disposicion la opcion de podernos escribir acerca de cualquier duda sobre nosotros.') }}
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 justify-center pt-6 gap-2 md:gap-6">

            <div class="space-y-6 bg-white rounded-lg shadow-lg py-4 md:py-6 px-6 md:px-10">
                <h1 class="text-center font-semibold text-base text-red-700"> {{ __('DATOS DE LA EMPRESA') }}</h1>
                <div class="flex space-x-5">
                    <div class="rounded-full bg-neutral-800 w-10 h-10 flex justify-center items-center">
                        <i class="fa-solid fa-landmark text-xl text-white"></i>
                    </div>
                    <div class="flex-col my-auto mx-auto space-y-1">
                        <div>
                            <span class="font-semibold text-red-700">{{ __('Institución') }}</span>
                            <div class="text-sm"> ESPOCH EP</div>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="rounded-full bg-neutral-800 w-10 h-10 flex justify-center items-center">
                        <i class="fa-solid fa-phone text-xl text-white"></i>
                    </div>
                    <div class="flex-col my-auto mx-auto space-y-1">
                        <div>
                            <span class="font-semibold text-red-700">{{ __('Teléfono') }}</span>
                            <div class="text-sm"> {{ $settings['phone1']}}</div>
                            <div class="text-sm"> {{ $settings['phone2']}}</div>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="rounded-full bg-neutral-800 w-10 h-10 flex justify-center items-center">
                        <i class="fa-solid fa-envelope text-xl text-white"></i>
                    </div>
                    <div class="flex-col my-auto mx-auto space-y-1">
                        <div>
                            <span class="font-semibold text-red-700">{{ __('Email') }}</span>
                            <div class="text-sm"> {{ $settings['email1']}}</div>
                            <div class="text-sm"> {{ $settings['email2']}}</div>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="rounded-full bg-neutral-800 w-10 h-10 flex justify-center items-center">
                        <i class="fa-solid fa-location-dot text-xl text-white"></i>
                    </div>
                    <div class="flex-col my-auto mx-auto space-y-1">
                        <div>
                            <span class="font-semibold text-red-700">{{ __('Ubicación') }}</span>
                            <div class="text-sm"> Chimborazo</div>
                            <div class="text-sm"> Riobamba</div>
                            <div class="text-sm"> Lizarzaburu</div>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="rounded-full bg-neutral-800 w-10 h-10 flex justify-center items-center">
                        <i class="fa-solid fa-location-crosshairs text-xl text-white"></i>
                    </div>
                    <div class="flex-col my-auto mx-auto space-y-1">
                        <div>
                            <span class="font-semibold text-red-700">{{ __('Dirección') }}</span>
                            <div class="text-sm">{{ $settings['direction']}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6 bg-white rounded-lg shadow-lg p-3 md:p-6 mt-4 md:mt-0">
                <div class="text-center font-semibold text-base text-red-700">{{ __('FORMULARIO DE CONTACTO') }}</div>
                @livewire('contact-component')
            </div>
        </div>
        <div class="my-6 rounded-lg shadow-lg bg-white overflow-hidden">
            <div class="text-sm font-semibold text-red-700 text-center py-2">
                {{ __('UBICACIÓN DE LA EMPRESA') }}
            </div>
            <div id="map" class="w-full h-80 map">
                {{-- MAPA --}}
            </div>   
        </div>
    </div>

    @push('js')
        <script src="{{ asset('https://unpkg.com/leaflet@1.9.3/dist/leaflet.js') }}" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
        <script>
            var greenIcon = L.icon({
                iconUrl: '{{ asset('fotos/favicon.webp') }}',

                iconSize: [20, 20], // size of the icon
                iconAnchor: [17, 60], // point of the icon which will correspond to marker's location
                popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
            });
            var map = L.map('map').setView([-1.6604366518801568, -78.67703942469952], 17);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://goo.gl/maps/KmMVuSAfvyBY653k9">ESPOCHEP</a>'
            }).addTo(map);

            L.marker([-1.6604366518801568, -78.67703942469952], {
                    icon: greenIcon
                }).addTo(map)
                .bindPopup('<b>ESPOCH EP</b>')
                .openPopup();
        </script>
    @endpush
</x-app-layout>
