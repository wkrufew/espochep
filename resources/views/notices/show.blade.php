<x-app-layout>
    {{-- DIV BANNER --}}
    @php
        $nuevotextos = strip_tags($notice->description_es,120);
    @endphp
    @section('meta_tag')
    <title>ESPOCHEP|{{ $notice->title_es }}</title>
        {{-- SEO --}}
            <meta name="robots" content="index, follow">
            <meta name="title" content="{{ $notice->title_es }}">
            <meta name="description" content="{{$nuevotextos}}" >
            <meta name="author" content="{{ $notice->moderador->name }}">
            <link rel="canonical" href="{{ route('notice.show', $notice) }}">
        <!-- Open Graph data -->
            <meta property="og:title" content="{{ $notice->title_es }}">
            <meta property="og:type" content="article">
            <meta property="og:description" content="{{$nuevotextos}}">
            <meta property="og:url" content="{{ route('notice.show', $notice) }}">
            <meta property="og:img" content="{{ Storage::url($notice->image->url) }}">
            {{-- <meta property="og:img" content="{{ asset('/storage/{{$notice->image->url}}') }}"> --}}
    @endsection
    <style>
        .fondo{
            background-color: #BD0000;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg stroke='%23000' stroke-width='66.7' stroke-opacity='0.05' %3E%3Ccircle fill='%23BD0000' cx='0' cy='0' r='1800'/%3E%3Ccircle fill='%23b7000e' cx='0' cy='0' r='1700'/%3E%3Ccircle fill='%23b10018' cx='0' cy='0' r='1600'/%3E%3Ccircle fill='%23a9001f' cx='0' cy='0' r='1500'/%3E%3Ccircle fill='%23a10025' cx='0' cy='0' r='1400'/%3E%3Ccircle fill='%23990029' cx='0' cy='0' r='1300'/%3E%3Ccircle fill='%238f002d' cx='0' cy='0' r='1200'/%3E%3Ccircle fill='%23860030' cx='0' cy='0' r='1100'/%3E%3Ccircle fill='%237c0033' cx='0' cy='0' r='1000'/%3E%3Ccircle fill='%23710034' cx='0' cy='0' r='900'/%3E%3Ccircle fill='%23670035' cx='0' cy='0' r='800'/%3E%3Ccircle fill='%235c0035' cx='0' cy='0' r='700'/%3E%3Ccircle fill='%23510034' cx='0' cy='0' r='600'/%3E%3Ccircle fill='%23470032' cx='0' cy='0' r='500'/%3E%3Ccircle fill='%233c0030' cx='0' cy='0' r='400'/%3E%3Ccircle fill='%2332022c' cx='0' cy='0' r='300'/%3E%3Ccircle fill='%23290228' cx='0' cy='0' r='200'/%3E%3Ccircle fill='%23210024' cx='0' cy='0' r='100'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
    <div class="fondo max-w-6xl mx-4 md:mx-6 lg:mx-auto m-6 py-4 md:py-10 px-2 md:px-4 rounded-lg text-center text-white font-semibold text-xs md:text-base uppercase">
        {{ $notice->category->{'name_' . app()->getLocale()} }}
    </div>
    <div class="max-w-6xl mx-4 pb-10 md:mx-6 p-3 lg:mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-7">
            {{-- autor --}}
            <div class="bg-white order-2 col-span-2 md:col-span-1 p-4 md:p-6 rounded-lg">
                <h1 class="text-center text-sm text-red-700 font-semibold uppercase">
                    {{ __('Autor') }}
                </h1>
                <div class="pt-4 space-y-2">
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-user  pr-2"></i>{{ __('Name') }}: </span><span>
                            {{ $notice->moderador->name }}
                        </span>
                    </h2>
                    <div class="text-xs font-semibold"><i class="fa-solid fa-arrows-spin pr-2"></i>
                        {{ __('Estado de la Noticia') }}:
                        @if ($notice->status == 2)
                            <span class="bg-green-600 rounded-full px-3 py-1 ml-2 text-white">{{ __('Activo') }}</span>
                        @endif
                    </div>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-calendar-days pr-2"></i>{{ __('Publicado') }}: </span><span class="">{{ $notice->created_at->diffForHumans() }}</span>
                    </h2>
                </div>
            </div>
            {{-- portada --}}
            <div class="bg-white order-1 col-span-2 md:col-span-1 p-0 md:p-6 row-span-2 rounded-lg">
                <h1 class="hidden md:block text-center text-sm text-red-700 font-semibold pb-4">
                    {{ __('PORTADA') }}
                </h1>
                <figure>
                    @if ($notice->image)
                        <img class="h-64 w-full object-cover object-center rounded-lg" src="{{ Storage::url($notice->image->url) }}" alt="{{ $notice->title_es }}">
                    @endif
                </figure>
            </div>
            {{-- datos de la noticia --}}
            <div class="bg-white order-3 p-4 md:p-6 col-span-2 md:col-span-1 row-span-1 rounded-lg">
                <h1 class="text-center text-sm text-red-700 font-semibold">
                    {{ __('DATOS DE LA NOTICIA') }}
                </h1>
                <div class="pt-4 space-y-2">
                    <h2 class="text-sm">
                        <span class=" font-semibold"><i class="fa-solid fa-calendar-days pr-2"></i>{{ __('Título') }}: </span>
                        <span>
                            {{ $notice->{'title_' . app()->getLocale()} }}
                        </span>
                    </h2>
                    <h2 class="text-sm">
                        <span class=" font-semibold"><i class="fa-solid fa-calendar-days pr-2"></i>{{ __('Subtítulo') }}: </span>
                        <span>
                            {{ $notice->{'subtitle_' . app()->getLocale()} }}
                        </span>
                    </h2>
                    @if ($notice->url_file)
                        <h2 class="text-sm">
                            <span class=" font-semibold"><i class="fa-solid fa-calendar-days pr-2"></i>{{ __('Referencia') }}:  &nbsp;</span>
                            <span>
                                <a href="{{$notice->url_file}}" target="_blank" rel="noopener noreferrer" class="px-2 py-1 rounded-full bg-green-600 text-white text-xs">Ver</a>
                            </span>
                        </h2>
                    @endif
                </div>
            </div>
            {{-- descripcion --}}
            <div class="bg-white order-4 p-4 md:p-6 col-span-2 rounded-lg">
                <h1 class="text-center text-sm text-red-700 font-semibold">
                    {{ __('DESCRIPCIÓN DE LA NOTICIA') }}
                </h1>
                <div class="pt-4">
                    <h2 class="text-sm">
                        <p class="text-justify">
                            {!! $notice->{'description_' . app()->getLocale()} !!}
                        </p>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




