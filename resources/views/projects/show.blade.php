<x-app-layout>
    {{-- DIV BANNER --}}
    <style>
        .fondo{
            background-color: #BD0000;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg stroke='%23000' stroke-width='66.7' stroke-opacity='0.05' %3E%3Ccircle fill='%23BD0000' cx='0' cy='0' r='1800'/%3E%3Ccircle fill='%23b7000e' cx='0' cy='0' r='1700'/%3E%3Ccircle fill='%23b10018' cx='0' cy='0' r='1600'/%3E%3Ccircle fill='%23a9001f' cx='0' cy='0' r='1500'/%3E%3Ccircle fill='%23a10025' cx='0' cy='0' r='1400'/%3E%3Ccircle fill='%23990029' cx='0' cy='0' r='1300'/%3E%3Ccircle fill='%238f002d' cx='0' cy='0' r='1200'/%3E%3Ccircle fill='%23860030' cx='0' cy='0' r='1100'/%3E%3Ccircle fill='%237c0033' cx='0' cy='0' r='1000'/%3E%3Ccircle fill='%23710034' cx='0' cy='0' r='900'/%3E%3Ccircle fill='%23670035' cx='0' cy='0' r='800'/%3E%3Ccircle fill='%235c0035' cx='0' cy='0' r='700'/%3E%3Ccircle fill='%23510034' cx='0' cy='0' r='600'/%3E%3Ccircle fill='%23470032' cx='0' cy='0' r='500'/%3E%3Ccircle fill='%233c0030' cx='0' cy='0' r='400'/%3E%3Ccircle fill='%2332022c' cx='0' cy='0' r='300'/%3E%3Ccircle fill='%23290228' cx='0' cy='0' r='200'/%3E%3Ccircle fill='%23210024' cx='0' cy='0' r='100'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
    @php
        $nuevotexto = strip_tags($project->description_es,120);
    @endphp
    @section('meta_tag')
    <title>project|{{ $notice->title_es }}</title>
        {{-- SEO --}}
            <meta name="robots" content="index, follow">
            <meta name="title" content="{{ $project->title_es }}">
            <meta name="description" content="{{ $nuevotexto }}">
            <meta name="author" content="{{ $project->moderador->name }}">
            <link rel="canonical" href="{{ route('project.show', $project) }}">
        <!-- Open Graph data -->
            <meta property="og:title" content="{{ $project->title_es }}">
            <meta property="og:type" content="article">
            {{-- <meta property="og:description" content="{{$project->description_es}}"> --}}
            <meta property="og:description" content="{{ $nuevotexto }}">
            <meta property="og:url" content="{{ route('project.show', $project) }}">
            @if ($project->image->url)
                <meta property="og:img" content="{{ Storage::url($project->image->url) }}">
            @else
                <meta property="og:img" content="{{ asset('../fotos/portada.webp') }}">
            @endif
            {{-- <meta property="og:img" content="{{ asset('/storage/{{$notice->image->url}}') }}"> --}}
    @endsection
    <div class="fondo max-w-6xl mx-4 md:mx-6 lg:mx-auto m-6 py-4 md:py-10 px-2 md:px-4 rounded-lg text-center text-white font-semibold text-xs md:text-base uppercase">
        {{ $project->{'title_' . app()->getLocale()} }}
    </div>

    <div class="max-w-6xl mx-4 pb-10 md:mx-6 p-3 lg:mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-7">
            {{-- autor --}}
            <div class="bg-white order-2 col-span-2 md:col-span-1 p-4 md:p-6 rounded-lg">
                <h1 class="text-center text-sm text-red-700 font-semibold uppercase">
                    {{ __('Autor') }}
                </h1>
                <div class="pt-4 space-y-1">
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-user  pr-2"></i>{{ __('Name') }}: </span><span>
                            {{ $project->moderador->name }}
                            {{-- {{app()->getLocale() == 'es' ? $process->title_es : $process->title_en}} --}}
                        </span>
                    </h2>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-calendar-days pr-2"></i>{{ __('Publicado') }}: </span><span>{{ $project->created_at->diffForHumans() }}</span>
                    </h2>
                </div>
            </div>
            {{-- portada --}}
            <div class="bg-white order-1 col-span-2 md:col-span-1 p-0 md:p-6 row-span-2 rounded-lg">
                <h1 class="hidden md:block text-center text-sm text-red-700 font-semibold pb-2">
                    {{ __('PORTADA') }}
                </h1>
                <figure>
                    @if ($project->image)
                        <img class="h-64 w-full object-cover object-center rounded-lg" src="{{ Storage::url($project->image->url) }}" alt="{{ $project->title_es }}">
                    @endif
                </figure>
            </div>
            {{-- datos de l proyecto --}}
            <div class="bg-white order-3 p-4 md:p-6 col-span-2 md:col-span-1 row-span-1 rounded-lg">
                <h1 class="text-center text-sm text-red-700 font-semibold">
                    {{ __('DATOS DEL PROYECTO') }}
                </h1>
                <div class="pt-4 space-y-2">
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-calendar-days pr-2"></i>{{ __('Fecha de Inicio') }}: </span><span>{{ $project->fecha_inicio }}</span>
                    </h2>
                    <div class="text-xs font-semibold"><i class="fa-solid fa-arrows-spin pr-2"></i>
                        {{ __('Estado del Proyecto') }}:
                            @if ($project->status == 2)
                                <span class="bg-green-600 rounded-full px-3 py-1 ml-2 text-white font-medium">{{ __('Proceso') }}</span>
                            @elseif($project->status == 3)
                                <span class="bg-neutral-700 rounded-full px-3 py-1 ml-2 text-white font-medium">{{ __('Terminado') }}</span>
                            @endif
                    </div>
                </div>
            </div>
            {{-- detalle del proyecto --}}
            <div class="bg-white order-4 p-4 md:p-6 col-span-2 rounded-lg">
                <h1 class="text-center text-sm text-red-700 font-semibold">
                    {{ __('DETALLE DEL PROYECTO') }}
                </h1>
                <div class="pt-4">
                    <h2 class="text-sm">
                        <span class="text-justify">
                            {!! $project->{'description_' . app()->getLocale()} !!}
                        </span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="bg-white mt-7 p-6 col-span-2 rounded-lg">
            <h1 class="text-center text-sm text-red-700 font-semibold">
                {{ __('ETAPAS DEL PROYECTO') }}
            </h1>
            <div class="pt-4">
                @forelse ($project->fases as $key => $etapa)
                    <article class="my-2" @if ($loop->first) x-data="{ open: true }" @else x-data="{ open: false }" @endif>
                        <header class="px-4 py-3 cursor-pointer bg-white flex justify-between border-spacing-y-1 border border-neutral-500 rounded-lg" x-on:click=" open = !open ">
                            <h1 class="font-semibold text-xs md:text-xs text-neutral-900">{{$key+1}}. {{ $etapa->{'name_' . app()->getLocale()} }}</h1>
                                <i 
                                    :class="{'transform rotate-0 text-gray-500 fa-plus': ! open, 'transform rotate-180 text-gray-500 fa-minus': open }" 
                                    {{-- :class="open ? 'transform rotate-180 text-gray-500 fa-minus': 'transform rotate-0 text-gray-500 fa-plus'" --}}                         
                                    class="fas transition ease-in-out duration-500 mr-2 "></i>
                        </header>
                        <div class="bg-white py-2 px-4" x-show="open"
                                        x-transition:enter="transition-all duration-500"
                                        x-transition:enter-start="opacity-0 scale-90"
                                        x-transition:enter-end="opacity-100 scale-100" 
                                        x-transition:leave="transition-all duration-300"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="bg-opacity-0 scale-90"
                                        {{-- x-collapse.duration.1000ms --}}>
                            <ul class="grid grid-cols-1 gap-2">
                                <div class="w-44 ml-4 bg-red-700 py-2 px-3 text-white rounded-full">
                                    @if ($etapa->url_file)
                                        <a target="_blank" href="{{$etapa->url_file}}" class="flex justify-center items-center">
                                            <span class="font-medium text-xs pr-2">{{ __('Descargar Archivos') }}</span><i class="fa-solid fa-file-lines"></i>
                                        </a>
                                    @endif
                                </div>
                               @if ($etapa->description_es)
                                    <li class="text-neutral-900 font-semibold text-xs md:text-xs">
                                        <i class="fa-solid fa-circle-check text-red-700 pl-4 pr-1"></i>
                                        {{ $etapa->{'description_' . app()->getLocale()} }}
                                    </li>
                               @endif
                            </ul>
                        </div>
                    </article>
                @empty
                    {{ __('No se encuentras registradas estapas por el momento') }}
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>




