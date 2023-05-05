<div>
    {{-- <x-slot name="process">
        {{ $process->slug }}
    </x-slot> --}}
    <div class="text-center pb-4 font-bold text-lg">
        {{ $process->title_es }}
    </div>
    <hr class="mt-2 mb-6">
    <div class="max-w-6xl mx-auto">
       
        <div class="grid grid-cols-2 grid-rows-2 gap-7">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h1 class="text-sm text-red-700 font-semibold">
                    PROVEEDOR
                </h1>
                <div class="pt-4 space-y-2">
                    <div class="shrink-0 pb-2">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ $proveedor->profile_photo_url }}" alt="{{ $proveedor->name }}" />
                    </div>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-user  pr-2"></i>Nombre: </span>
                        <span class=" font-medium">
                            {{ $proveedor->name ?: 'Sin dato' }}
                        </span>
                    </h2>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-envelope  pr-2"></i>Correo: </span>
                        <span class=" font-medium">
                            <a href="mailto:{{$proveedor->email}}">{{ $proveedor->email ?: 'Sin dato' }}</a>
                        </span>
                    </h2>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-phone  pr-2"></i>Celular: </span>
                        <span class=" font-medium">
                            <a href="tel:+{{ $proveedor->profile->phone }}">{{ $proveedor->profile->phone ?: 'Sin dato' }}</a>
                        </span>
                    </h2>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h1 class="text-sm text-red-700 font-semibold">
                    DATOS DE LA PROFORMA
                </h1>
                <div class="pt-4 space-y-2">
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-city pr-2"></i>Compañia: </span>
                        <span class=" font-medium">
                            {{ $proveedor->profile->company ?: 'Sin dato'}}
                        </span>
                    </h2>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-address-card pr-2"></i>RUC/CI: </span>
                        <span class=" font-medium">
                            {{ $proveedor->profile->ruc ?: 'Sin dato'}}
                        </span>
                    </h2>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-location-dot pr-2"></i>Direccion: </span>
                        <span class=" font-medium">
                            {{ $proveedor->profile->direction ?: 'Sin dato' }}
                        </span>
                    </h2>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-globe  pr-2"></i>Sitio Web: </span>
                        <span class=" font-medium">
                            <a href="{{ $proveedor->profile->website}}" target="_blank" rel="noopener noreferrer">{{ $proveedor->profile->website ?: 'Sin dato'}}</a>
                        </span>
                    </h2>
                    <hr>
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-sack-dollar pr-2"></i>Monto: </span>
                        <span class=" font-medium"> ${{ $prov->pivot->monto ?: 'Sin dato' }}</span>
                    </h2>

                    <div class="bg-white rounded-lg">
                        @if ($prov->pivot->cantidad)
                            <div class="mt-1 bg-red-700 py-2 px-3 text-white rounded-full">
                                <a  href="{{ Storage::url($prov->pivot->cantidad) }}" target="_blank" class="flex justify-center items-center">
                                    <span class="font-medium text-xs pr-2">{{ __('Ver Proforma') }}</span><i class="fa-solid fa-cloud-arrow-down"></i>
                                </a>
                            </div>
                        @elseif($prov->pivot->url)
                            <div class="mt-1 bg-red-700 py-2 px-3 text-white rounded-full">
                                <a  href="{{ $prov->pivot->url }}" target="_blank" class="flex justify-center items-center">
                                    <span class="font-medium text-xs pr-2">{{ __('Descargar Archivos') }}</span><i class="fa-solid fa-cloud-arrow-down"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg col-span-2 text-center">
                <h1 class="text-sm text-red-700 font-semibold">
                    DETALLE
                </h1>
                <div class="pt-4 space-y-2">
                    <h2 class="text-xs">
                        <span class=" font-semibold"><i class="fa-solid fa-sitemap pr-2"></i>ESTADO DEL PROCESO: </span>
                        @if ($process->status == 2)
                                <span class="bg-green-600 rounded-full px-3 py-1 ml-2 text-white font-medium">Ejecución</span>
                            @elseif($process->status == 3)
                                <span class="bg-red-700 rounded-full px-3 py-1 ml-2 text-white font-medium">Terminado</span>
                            @elseif($process->status == 4)
                                <span class="bg-yellow-600 rounded-full px-3 py-1 ml-2 text-white font-medium">Desierto</span>
                            @endif
                    </h2>
                    @if ($prov->pivot->status == 1)
                        <h2 class="text-xs pt-4">
                            <span class=" font-semibold"><i class="fa-solid fa-user pr-2"></i>ESTADO DEL PROVEEDOR: </span>
                            <span class="font-medium text-white px-2 py-1 rounded-full bg-yellow-500 ml-2">Concursando</span>
                        </h2>
                    @else
                        <h2 class="text-xs pt-4">
                            <span class=" font-semibold"><i class="fa-solid fa-user pr-2"></i>ESTADO DEL PROVEEDOR: </span>
                            <span class="font-medium text-white px-2 py-1 rounded-full bg-green-600 ml-2">Aprobado</span>
                        </h2>
                    @endif
                    <div>
                        <hr class="my-6">
                    </div>
                        @if ($prov->pivot->status == 1)
                            <button title="Aprobar" class="bg-blue-600 rounded-full px-3 py-2 text-white text-xs font-semibold" wire:click="status({{$prov->pivot->status}})">Aprobar<i class="pl-2 fa-solid fa-circle-check"></i></button>
                        @else
                            <button title="Rechazar" class="bg-red-600 rounded-full px-3 py-2 text-white text-xs font-semibold" wire:click="status({{$prov->pivot->status}})">Rechazar &nbsp; X</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
