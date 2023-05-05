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
        $nuevotextos = strip_tags($process->description_es,120);
    @endphp
    @section('meta_tag')
    <title>ESPOCHEP|{{ $process->title_es }}</title>
        {{-- SEO --}}
        <meta name="robots" content="index, follow">
        <meta name="title" content="{{ $process->title_es }}">
        <meta name="description" content="{{ $nuevotextos }}">
        <meta name="author" content="{{ $process->moderador->name }}">
        <link rel="canonical" href="{{ route('process.show', $process) }}">
        <!-- Open Graph data -->
        <meta property="og:title" content="{{ $process->title_es }}">
        <meta property="og:type" content="article">
        <meta property="og:description" content="{{ $nuevotextos }}">
        <meta property="og:url" content="{{ route('process.show', $process) }}">
        <meta property="og:img" content="{{ asset('../fotos/portada.webp') }}">
        <meta property="og:site_name" content="ESPOCHEP"/>
    @endsection

    <div class="fondo max-w-6xl mx-4 md:mx-6 lg:mx-auto m-6 py-4 md:py-6 px-2 md:px-4 rounded-lg text-center text-white font-semibold text-xs md:text-base uppercase">
        {{ $process->{'title_' . app()->getLocale()} }}
    </div>
    @if (session('exito'))
        <div x-data="{ open: true }" class="max-w-6xl mx-auto rounded-lg">
            <div x-show="open" class="bg-green-500 border border-green-600 text-green-100 my-6 px-4 py-2 rounded relative"
                role="alert">
                <strong class="font-bold">Ok!</strong>
                <span class="block sm:inline">{{ session('exito') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-2">
                    <svg x-on:click="open = false" class="fill-current h-6 w-6 text-white" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>{{ __('Cerrar') }}</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div x-data="{ open: true }" class="max-w-6xl mx-auto rounded-lg">
            <div x-show="open" class="bg-red-500 border border-red-600 text-red-100 my-6 px-4 py-2 rounded relative"
                role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }} 
                <a class="underline" href="{{ route('profile.show') }}"> {{ __('Ingresar aquí') }}</a>
                </span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-2">
                    <svg x-on:click="open = false" class="fill-current h-6 w-6 text-white" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>{{ __('Cerrar') }}</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        </div>
    @endif
    @if (session('errora'))
        <div x-data="{ open: true }" class="max-w-6xl mx-auto rounded-lg">
            <div x-show="open" class="bg-red-500 border border-red-600 text-red-100 my-6 px-4 py-2 rounded relative"
                role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('errora') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-2">
                    <svg x-on:click="open = false" class="fill-current h-6 w-6 text-white" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>{{ __('Cerrar') }}</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        </div>
    @endif
    @push('css')
        <link rel="stylesheet" href="{{ asset('https://unpkg.com/leaflet@1.9.3/dist/leaflet.css') }}" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    @endpush
    <div class="max-w-6xl mx-4 pb-10 md:mx-6 lg:mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-7">
            <div class="bg-white order-1 p-3 md:p-6 rounded-lg">
                <h1 class="text-center text-sm text-red-700 font-semibold">
                    {{ __('FUNCIONARIO') }}
                </h1>
                <div class="pt-4 space-y-1">
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-user  pr-2"></i>{{ __('Name') }}: </span><span class="">
                            {{ $process->moderador->name }}
                        </span>
                    </h2>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-envelope  pr-2"></i>{{ __('Email') }}: </span><span class="">{{ $process->moderador->email }}</span>
                    </h2>
                </div>
            </div>
            <div class="bg-white p-3 md:p-6 order-2 row-span-2 rounded-lg">
                <h1 class="text-center text-sm text-red-700 font-semibold">
                    {{ __('LUGAR DE ENTREGA') }}
                </h1>
                <div class="pt-4 space-y-2">
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-location-dot pr-2"></i>{{ __('Ubicación') }}: </span><span class="">Chimborazo, Riobamba</span>
                    </h2>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="ffa-sharp fa-solid fa-location-crosshairs pr-2"></i>{{ __('Dirección') }}: </span><span class="">Via a guayaquil panamerica sur KM1 1/2</span>
                    </h2>
                    {{-- <iframe class="h-32 w-full rounded-lg" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1994.9056073657796!2d-78.4699519!3d-0.1081339!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sec!4v1672013585881!5m2!1ses!2sec" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                    {{-- <iframe class="h-auto w-full rounded-lg" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3988.1424164944256!2d-78.67821998525822!3d-1.6607368504421378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sec!4v1676309422312!5m2!1ses-419!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                     --}}<div class="h-32 w-full rounded-lg z-10 relative" id="map">

                    </div>
                    <div id="map1" class="h-36 w-full rounded-lg">
                    </div> 
                </div>
            </div>
            <div class="bg-white p-3 md:p-6 order-3 col-span-1 row-span-2 rounded-lg">
                <h1 class="text-center text-sm text-red-700 font-semibold">
                    {{ __('DATOS DEL PROCESO') }}
                </h1>
                <div class="pt-4 space-y-2">
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-landmark pr-2"></i>{{ __('Nombre de la Entidad') }}: </span><span class="">ESPOCH EP</span>
                    </h2>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-sitemap pr-2"></i>{{ __('Tipo de Proceso') }}: </span><span class=""> {{ $process->purchase->{'name_' . app()->getLocale()} }}</span>
                    </h2>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-barcode pr-2"></i>{{ __('Código') }}: </span><span class="">{{ $process->code }} </span>
                    </h2>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-list pr-2"></i>{{ __('Objeto de la Oferta') }}: </span><span class="">{{ $process->{'object_' . app()->getLocale()} }}</span>
                    </h2>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-calendar-days pr-2"></i>{{ __('Fecha de Publicación') }}: </span><span class="">{{$process->created_at->isoFormat('dddd D MMMM Y') }}</span>
                    </h2>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-calendar-days pr-2"></i>{{ __('Fecha Limite') }}: </span><span class="">
                            @if ($process->date_end)
                                {{$process->date_end}} 
                            @else
                                {{ __('No Definido') }}
                            @endif
                        </span>
                    </h2>
                    <div class="text-xs font-semibold"><i class="fa-solid fa-arrows-spin pr-2"></i>
                        {{ __('Estado de la necesidad') }}:
                        @if ($process->status == 3 || $process->date_end < now()->toDateString())
                            <span class="bg-blue-700 rounded-full px-3 py-1 text-white font-medium"> {{ __('Adjudicado') }}</span>
                        @elseif ($process->status == 2)
                            <span class="bg-green-600 rounded-full px-3 py-1 text-white font-medium"> {{ __('Ejecución') }}</span>
                        @elseif($process->status == 4)
                            <span class="bg-yellow-600 rounded-full px-3 py-1 text-white font-medium"> {{ __('Desierto') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            @if($process->purchase->id === 3)
                <div class="bg-white order-4 p-3 md:p-6 rounded-lg">
                    <h1 class="text-center text-sm text-red-700 font-semibold">
                        {{ __('APLICAR AL PROCESO') }}
                    </h1>
                    <div class="mt-4 mx-auto">
                        @auth
                            @can('enrolled', $process)
                                <span class="w-72 flex justify-center items-center mx-auto px-6 py-2 text-xs rounded-full bg-green-600 text-white font-medium"> {{ __('Ya se encuentra aplicando al proceso') }}</span>
                            @else
                                @if ($process->status == 2 && $process->date_end >= now()->toDateString())
                                    <a href="{{ Route('process.apply', $process) }}" class="flex justify-center px-3 py-2 bg-neutral-900 items-center rounded-full w-24 mx-auto text-white">
                                        <span class="font-medium text-xs pr-2 ">{{ __('Aplicar') }}</span><i class="fa-solid fa-circle-right"></i>
                                    </a>
                                @else
                                    <span class="w-72 flex justify-center items-center mx-auto px-6 py-2 text-xs rounded-full bg-red-700 text-white font-medium"> {{ __('El proceso ya no se encuentra activo') }}</span>
                                @endif  
                            @endcan
                        @else
                            <a href="{{ Route('process.return', $process) }}" class="flex justify-center px-3 py-2 bg-neutral-900 items-center rounded-full w-24 mx-auto text-white">
                                <span class="font-medium text-xs pr-2">{{ __('Aplicar') }}</span><i class="fa-solid fa-circle-right"></i>
                            </a>
                        @endauth
                    </div>
                </div>
            @else
                <div class="bg-white order-4 p-3 md:p-6 rounded-lg text-center">
                    <span class="bg-yellow-600 px-4 py-2 rounded-full text-white text-xs inline-block">{{ __('Este proceso debe ser aplicado mediante el SERCOP') }},  
                        <a class="underline" href="{{ $process->link }}" target="_blank" rel="noopener noreferrer"> &nbsp; {{ __('Click Aquí') }}</a>
                    </span>
                </div>
            @endif
            <div class="bg-white order-5 p-3 md:p-6 col-span-1 md:col-span-2 rounded-lg">
                <h1 class="text-center text-sm text-red-700 font-semibold">
                    {{ __('DETALLE DEL OBJETO DE COMPRA') }}
                </h1>
                <div class="pt-4">
                    <h2 class="text-xs">
                        <span class="font-semibold"><i class="fa-solid fa-file-invoice-dollar pr-2"></i>{{ __('Detalle') }}: </span>
                        <span class="text-justify">
                            {!! $process->{'description_' . app()->getLocale()} !!}
                        </span>
                    </h2>
                </div>
            </div>
            <div class="bg-white p-3 md:p-6 order-6 rounded-lg">
                <h1 class="text-center text-sm text-red-700 font-semibold uppercase">
                    {{ __('Forma de Pago') }}
                </h1>
                <div class="pt-4">
                    <h2 class="text-xs">
                        <span class="font-semibold"><i class="fa-solid fa-hand-holding-dollar pr-2"></i>{{ __('Forma de Pago') }}: </span>
                        <span class="text-justify"> 
                            {{ $process->{'forma_pago_' . app()->getLocale()} }}
                        </span>
                    </h2>
                </div>
            </div>
            <div class="bg-white order-7 p-3 md:p-6 rounded-lg">
                <h1 class="text-center text-sm text-red-700 font-semibold">
                    {{ __('TÉRMINOS DE REFERENCIA/ESPECIFICACIONES') }}
                </h1>
                <div class="mt-4 w-44 mx-auto bg-red-700 py-2 px-3 text-white rounded-full">
                    @if ($process->url_file)
                        {{-- <a href="{{ route('process.download',$process) }}" class="flex justify-center items-center">
                            <span class="font-medium text-xs pr-2">{{ __('Descargar Archivos') }}</span><i class="fa-solid fa-cloud-arrow-down"></i>
                        </a> --}}
                        <a href="{{ $process->url_file }}" target="_blank" class="flex justify-center items-center">
                            <span class="font-medium text-xs pr-2">{{ __('Descargar Archivos') }}</span><i class="fa-solid fa-file-lines"></i>
                        </a>
                    @else
                        <span class="font-medium text-xs pr-2">Sin Documento</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="bg-white mt-7 order-8 p-3 md:p-6 col-span-1 md:col-span-2 rounded-lg">
            <h1 class="text-center text-sm text-red-700 font-semibold">
                {{ __('ETAPAS DEL PROCESO') }}
            </h1>
            <div class="pt-4">
                @forelse ($process->sections as $key => $etapa)
                    <article class="my-2" @if ($loop->first) x-data="{ open: true }" @else x-data="{ open: false }" @endif>
                        <header class="px-4 py-3 cursor-pointer bg-white flex justify-between border-spacing-y-1 border border-neutral-500 rounded-lg" x-on:click=" open = !open ">
                            <h1 class="font-semibold text-xs md:text-xs text-neutral-900">{{$key+1}}. {{ $etapa->{'title_' . app()->getLocale()} }}</h1>
                                <i 
                                    :class="{'transform rotate-0 text-gray-500 fa-plus': ! open, 'transform rotate-180 text-gray-500 fa-minus': open }" 
                                    {{-- :class="open ? 'transform rotate-180 text-gray-500 fa-minus': 'transform rotate-0 text-gray-500 fa-plus'" --}}                         
                                    class="fas transition ease-in-out duration-500 mr-2 "></i>
                        </header>
                        <div class="bg-white py-2 px-2 md:px-4" x-show="open"
                                        x-transition:enter="transition-all duration-500"
                                        x-transition:enter-start="opacity-0 scale-90"
                                        x-transition:enter-end="opacity-100 scale-100" 
                                        x-transition:leave="transition-all duration-300"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="bg-opacity-0 scale-90"
                                        {{-- x-collapse.duration.1000ms --}}>
                            <ul class="grid grid-cols-1 gap-2">
                                {{-- <a class="hover:text-red-700 bg-red-700 px-3 py-1 rounded-full block" href="{{$etapa->url_file}}" target="_blank" rel="noopener noreferrer"> <span class="pl-4 font-semibold"><i class="fa-solid fa-link text-red-700 pr-1"></i>
                                    Descarga de archivos: </span> {{$etapa->url_file}}</a> --}}
                                    @if ($etapa->url_file)
                                        <div class="w-44 ml-4 bg-red-700 py-2 px-3 text-white rounded-full">
                                            <a href="{{ $etapa->url_file }}" target="_blank" class="flex justify-center items-center">
                                                <span class="font-medium text-xs pr-2">{{ __('Descargar Archivos') }}</span><i class="fa-solid fa-file-lines"></i>
                                            </a>
                                        </div>
                                    @endif
                                @foreach ($etapa->details as $detalle)
                                    <li class="text-neutral-900 text-xs"><i class="font-semibold fa-solid fa-circle-check text-red-700 pl-0 md:pl-4 pr-1"></i>
                                            {{-- {{ $detalle->name_es ? $detalle->name_es : ''}} --}}
                                            {{ $detalle->{'name_' . app()->getLocale()}  }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @empty
                    {{ __('No se encuentras registradas estapas por el momento') }}
                @endforelse
            </div>
        </div>
        <div class="bg-white mt-7 col-span-1 md:col-span-2 rounded-lg">
            <h1 class="text-center text-sm text-red-700 font-semibold py-6">
                {{ __('PROVEEDORES') }}
            </h1>
            <div class="pt-4 flex justify-around items-center font-semibold text-xs py-3 md:py-6">
                <div class="flex flex-col w-full pb-10 px-2 md:px-10">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                          <table class="min-w-full">
                            <thead class="bg-white border-b">
                              <tr>
                                <th scope="col" class="text-xs font-semibold text-gray-900 px-6 py-4 text-left">
                                  No.
                                </th>
                                <th scope="col" class="text-xs font-semibold text-gray-900 px-6 py-4 text-left">
                                  {{ __('RUC/CI') }}
                                </th>
                                <th scope="col" class="text-xs font-semibold text-gray-900 px-6 py-4 text-left">
                                  {{ __('Razon Social') }}
                                </th>
                                <th scope="col" class="text-xs font-semibold text-gray-900 px-6 py-4 text-left">
                                    {{ __('Fecha') }}
                                </th>
                                <th scope="col" class="text-xs font-semibold text-gray-900 px-6 py-4 text-left">
                                    {{ __('Estado') }}
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                                @forelse ($process->proveedores as $key => $proveedor)
                                    <tr class="bg-gray-100 border-b text-xs font-medium">
                                        <td class="px-6 py-4 whitespace-nowrap  text-gray-900">
                                            {{$key + 1 }}
                                        </td>
                                        <td class="font-medium text-gray-900 px-6 py-4 whitespace-nowrap">
                                            {{$proveedor->profile->ruc ? : 'Sin datos'}}
                                        </td>
                                        <td class="font-medium text-gray-900 px-6 py-4 whitespace-nowrap">
                                            {{$proveedor->profile->company ? : $proveedor->name}}
                                        </td>
                                        <td class="font-medium text-gray-900 px-6 py-4 whitespace-nowrap">
                                            {{$proveedor->pivot->created_at ? : 'Sin datos'}}
                                        </td>
                                        <td class="font-medium text-gray-900 px-6 py-4 whitespace-nowrap">
                                            @if ($proveedor->pivot->status == 2)
                                                <span class="text-white bg-green-600 px-3 py-2 rounded-full">{{ __('Aceptado') }}</span>   
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <div class="bg-gray-100 border-b">
                                        <td scope="col-span-2" class="px-6 py-4 whitespace-nowrap text-xs md:text-sm font-medium text-gray-900">{{ __('No existen postulantes') }}</td>
                                    </div>
                                @endforelse
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
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
            var map = L.map('map1').setView([-1.6604366518801568, -78.67703942469952], 17);

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




