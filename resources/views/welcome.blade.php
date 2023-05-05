<x-app-layout>
    @section('meta_tag')
        <title>ESPOCHEP</title>
        {{-- SEO --}}
        <meta name="robots" content="index, follow">
        <meta name="title" content="ESPOCHEP">
        <meta name="author" content="ESPOCHEP">
        <meta name="description" content="ESPOCHEP, es una empresa publica dedicada a las compras publicas de la ESPOCH">
        <!-- Open Graph data -->
        <meta property="og:title" content="ESPOCHEP">
        <meta property="og:type" content="article">
        <meta property="og:description" content="ESPOCHEP, es una empresa dedicada a las compras publicas">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:img" content="{{ asset('../fotos/portada.webp') }}">
        <meta property="og:site_name" content="ESPOCHEP"/>
    @endsection
    {{-- PORTADA --}}
    <section class="relative z-20 bg-white">
        <h1 class="hidden">Empresa Publica ESPOCHEP</h1>
        <div class="portada" {{-- style=" background-repeat: no-repeat; background-image: url('{{ asset('../fotos/portada.webp') }}'); object-fit: cover;" --}}>
            {{-- <div class="absolute top-0 right-0 w-full h-full bg-black/10">
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-[226px] relative">
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <h1 class="font-bold text-3xl text-white">{{ __('APLICA A PROCESOS DE COMPRAS PUBLICAS') }}</h1>
                    <p class="py-2 text-xl text-neutral-100 tracking-wide">
                        {{ __('La ESPOCH, EP publica procesos para compras publicas deseas ver un proceso') }}</p>
                    <div class="max-w-xl py-2">
                        @livewire('search-process')
                    </div>
                </div>
            </div> --}}
            <a href="{{ route('process.index') }}">
                <img class="h-auto xl:h-[620px] w-full bg-cover object-cover" src="{{ asset('../fotos/portada.webp') }}" alt="portada">
            </a>     
        </div>
    </section>

    {{-- NUESTROS SERVICIOS --}}
    <section class="relative z-10 bg-white select-none">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 md:py-24">
            <div class="items-center flex flex-wrap">
                <div class="w-full md:w-1/2 lg:w-3/6 p-5">
                    <div class="w-full h-auto overflow-hidden rounded-3xl">
                        <img alt="empresa" loading="lazy" class="w-full h-auto shadow-lg transform hover:scale-105 overflow-hidden transition-all"
                            src="{{ asset('fotos/actividades.webp') }}">
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-2/4 px-6">
                    <div class="md:pr-12">
                        <div
                            class="p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-neutral-800">
                            <i class="fa-regular text-red-100 fa-building text-2xl"></i>
                        </div>
                        <h1 class="mt-2 text-lg font-bold text-red-700">{{ __('NUESTRAS ACTIVIDAES') }}</h1>
                        <p class="py-2 text-base leading-relaxed text-neutral-700 text-justify">
                            {{ __('Las actividades de la empresa son las siguientes:') }}
                        </p>
                        <ul class="list-none">
                            <li class="py-2">
                                <div class="flex items-center">
                                    <span
                                        class="text-xs font-semibold p-1 text-center inline-flex items-center justify-center w-8 h-8 uppercase rounded-full text-white bg-neutral-800 mr-3">
                                        <i class="fa-solid fa-check text-lg"></i>
                                    </span>
                                    <p class="text-neutral-600 text-base">
                                        {{ __('Servicios de asesorías, consultoría, administración y capacitación') }}
                                    </p>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="flex items-center">
                                    <span
                                        class="text-xs font-semibold p-1 text-center inline-flex items-center justify-center w-8 h-8 uppercase rounded-full text-white bg-neutral-800 mr-3">
                                        <i class="fa-solid fa-check text-lg"></i>
                                    </span>
                                    <p class="text-neutral-600 text-base">
                                        {{ __('Prestar servicios de asistencia técnica y asesoría especializada') }}
                                    </p>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="flex items-center">
                                    <span
                                        class="text-xs font-semibold p-1 text-center inline-flex items-center justify-center w-8 h-8 uppercase rounded-full text-white bg-neutral-800 mr-3">
                                        <i class="fa-solid fa-check text-lg"></i>
                                    </span>
                                    <p class="text-neutral-600 text-base">
                                        {{ __('Impulsar, crear y administrar programas, proyectos y servicios') }}
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    {{-- SEECION DE NOVEDADES --}}
    <section class="bg-white relative z-10 py-6 px-4 select-none pb-24">
        <div
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4 md:py-10 text-white bg-neutral-900 flex flex-wrap rounded-3xl">
            <div class="w-full text-center md:text-left md:w-2/3 my-auto p-4 md:p-0">
                <h1 class="text-red-700 font-bold">{{ __('NOVEDADES') }}</h1>
                <h2 class="text-lg md:text-2xl pr-0 md:pr-24 font-semibold py-4">
                    {{ __('¿DESEAS ENTERARTE DE LAS NUEVAS PUBLICACIONES DE LA EMPRESA?') }}
                </h2>
                <div class="pt-2">
                    <a aria-label="novedades" class="rounded-full uppercase bg-none border-2 border-red-700 text-red-700 px-4 py-3 font-medium text-xs hover:text-white hover:bg-red-700 transition-all"
                        href="{{ route('notice.index') }}">
                        {{ __('VER NOVEDADES') }}
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/3 hidden md:flex justify-center p-4">
                <img class="object-cover rounded-xl" loading="lazy"
                    src="{{ asset('fotos/novedades.webp') }}"
                    alt="novedades">
            </div>
        </div>
    </section>


    {{-- FRASE MOTIVADORA --}}
    <section class="relative z-0 overflow-hidden hidden md:block select-none">
        <div class="fixed bg-fixed h-full w-full bg-center bg-cover top-0 left-0 z-0">
            <img loading="lazy"
                src="{{ asset('fotos/frase.webp') }}"
                alt="reflexion" class="object-cover w-full h-full">{{-- https://images.pexels.com/photos/8386434/pexels-photo-8386434.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1 --}}
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-32 text-center relative">
            <span class="text-xl md:text-4xl font-extrabold text-white">
                {{ __('INVERTIMOS EN EL FUTURO') }}
            </span>
        </div>
    </section>

    {{-- NUESTROS VALORES --}}
    <section class="bg-white relative seccion z-20 -mt-1 md:mt-0 select-none">
        <div class="max-w-5xl mx-auto py-16 md:py-24">
            <div class="flex flex-wrap text-center justify-center">
                <div class="w-full lg:w-3/4">
                    <h1 class="text-base font-bold text-red-700 uppercase">
                        {{ __('Nuestros Valores') }}
                    </h1>
                    <p class="text-xl font-bold text-neutral-900 uppercase">
                        {{ __('EMPRESA PUBLICA ESPOCH EP') }}
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap mt-12 justify-center">
                <div class="w-full lg:w-1/3 px-4 text-center">
                    <div
                        class="bg-neutral-900 border-2 border-neutral-900 w-20 h-20 rounded-full flex justify-center items-center mx-auto">

                        <i class="fa-solid fa-landmark text-3xl text-white"></i>
                    </div>
                    <h1 class="pt-4 text-red-700 font-semibold">{{ __('TRANSPARENCIA') }}</h1>
                    <p class="text-neutral-700">
                        {{ __('Transparencia hacia nuestro equipo de trabajo y a la sociedad.') }}
                    </p>
                </div>
                <div class="w-full lg:w-1/3 px-4 text-center">
                    <div
                        class="bg-neutral-900 border-2 border-neutral-900 w-20 h-20 rounded-full flex justify-center items-center mx-auto">

                        <i class="fa-solid fa-landmark text-3xl text-white"></i>
                    </div>
                    <h1 class="pt-4 text-red-700 font-semibold">{{ __('EXCELENCIA') }}</h1>
                    <p class="text-neutral-700">
                        {{ __('Nos exigimos lo mejor y damos siempre lo mejor, brindando servicios de calidad.') }}
                    </p>
                </div>
                <div class="w-full lg:w-1/3 px-4 text-center">
                    <div
                        class="bg-neutral-900 border-2 border-neutral-900 w-20 h-20 rounded-full flex justify-center items-center mx-auto">

                        <i class="fa-solid fa-landmark text-3xl text-white"></i>
                    </div>
                    <h1 class="pt-4 text-red-700 font-semibold">{{ __('RESPONSABILIDAD') }}</h1>
                    <p class="text-neutral-700">
                        {{ __('Siempre demostramos ser responsbales con la sociedad y el medio ambiente, no solo en lo economico.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
