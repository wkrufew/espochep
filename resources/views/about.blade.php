<x-app-layout>  
    @section('meta_tag')
    <title>ESPOCHEP|ABOUT</title>
        {{-- SEO --}}
        <meta name="robots" content="index, follow">
        <meta name="title" content="ESPOCHEP|ABOUT">
        <meta name="description" content="ESPOCHEP, es una empresa dedicada a las compras publicas">
        <!-- Open Graph data -->
        <meta property="og:title" content="ESPOCH EP|ABOUT">
        <meta property="og:type" content="article">
        <meta property="og:description" content="ESPOCHEP, es una empresa dedicada a las compras publicas">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:img" content="{{ asset('../fotos/portada.webp') }}">
        <meta property="og:site_name" content="ESPOCHEP"/>
    @endsection
    <section class="relative overflow-hidden bg-white pt-6">
        <div class="h-auto md:h-auto  max-w-5xl mx-4 bg-center object-cover top-0 left-0 z-0 md:mx-6 lg:mx-auto">
            <img src="{{ Storage::url($settings->url_nosotros) }}" alt="portada" class="object-cover fotoportada w-full rounded-lg">
            {{-- <img src="https://cdn.pixabay.com/photo/2015/07/28/22/01/office-865091_960_720.jpg" alt="portada"
                class="object-cover fotoportada w-full"> --}}{{-- https://cdn.pixabay.com/photo/2015/01/08/18/27/startup-593341_960_720.jpg --}}
                {{-- https://cdn.pixabay.com/photo/2015/07/28/22/01/office-865091_960_720.jpg --}}
        </div>
    </section>
    <section class=" relative bg-white pt-1 md:pt-4">
        <div class="max-w-2xl mx-auto mt-6">
            <div class="grid grid-cols-1 lg:grid-cols-1">
                <P class="text-center font-semibold text-base md:text-lg text-red-700 px-2">
                    {{ __('NUESTRA HISTORIA') }}
                </P>
            </div>
            <p class="py-4 px-6 text-justify text-gray-800 text-sm">
                {{ __('Mediante resolución 272.CP.2018 el Consejo Politécnico en sesión ordinaria realizada el día martes 22 de mayo de 2018 resuelve') }}:
                <strong> {{ __('Aprobar la creación de la EMPRESA PÚBLICA ESPOCH (ESPOCH EP)') }}.</strong>
            </p>
        </div>
    </section>
    <section class=" relative bg-white py-5">
        <div class="max-w-6xl mx-auto  grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-x-28">
            <div class="text-center text-gray-800">
                <b class="text-red-700 text-center font-semibold text-base md:text-lg"> {{ __('Misión') }}</b><br>
                <p class="px-6 text-justify mt-2 py-2 text-sm">
                    {{ __('Brindar alternativas innovadoras de solución a las diversas necesidades del país, mediante la oferta de servicios de asesoría, consultoría, ejecución o administración de proyectos de inversión, producción, investigación, capacitación y otros; con sujeción a la Ley Orgánica de Empresas Públicas, con máxima calidad para que contribuyan al desarrollo económico, humano, científico-tecnológico y sustentable.') }}
                </p>
            </div>
            <div class="text-center text-gray-800">
                <b class="text-red-700 text-center font-semibold text-base md:text-lg"> {{ __('Visión') }}</b><br>
                <p class="px-6 text-justify py-2 text-sm">
                     {{ __('Ser la empresa pública líder a nivel nacional y estar proyectados a nivel internacional en la prestación de servicios y proyectos innovadores de calidad que contribuyen, de manera sostenida, al desarrollo económico, humano, científico-tecnológico y sustentable.') }}
                </p>
            </div>
        </div>
    </section>
</x-app-layout>
