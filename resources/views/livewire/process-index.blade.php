<div>
    <div class="max-w-6xl mx-auto space-x-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- FILTROS --}}
                <div class="w-full px-2">
                    <section class="h-auto rounded-lg bg-white p-6 shadow-sm sticky top-20 select-none">
                        <span class="text-center font-bold text-sm"><i class="fa-solid fa-filter pr-1"></i> {{ __('FILTROS') }}</span>
                        <div class="flex-col">
                            <div class="py-4">
                                <span class="text-sm font-semibold ">
                                    <i class="fa-solid fa-up-down pr-1"></i> {{ __('Orden') }}
                                </span>
                            <div class="pt-2 flex-col space-y-1">
                                    <div class="w-full flex justify-between items-center">
                                        <span class="text-xs">{{ __('Ascendente') }}</span>
                                        <input class="rounded-full checked:bg-red-700 checked:text-red-700 focus:none" type="radio" wire:model="orden" name="orden" id="" value="ASC">
                                    </div>
                                    <div class="first:w-full flex justify-between items-center">
                                        <span class="text-xs">{{ __('Descendente') }}</span>
                                        <input class="rounded-full checked:bg-red-700 checked:text-red-700" type="radio" wire:model="orden" name="orden" id="" value="DESC">
                                    </div>
                            </div>
                            </div>
                            <div class="py-2">
                                <span class="text-sm font-semibold">
                                    <i class="fa-solid fa-clone pr-1"></i> {{ __('Tipo de Compra') }}
                                </span>
                                <div class="pt-2 space-y-1">
                                    @forelse ($categories as $category)
                                        <div class="w-full flex justify-between items-center">
                                            <span class="text-xs">{{ $category->{'name_' . app()->getLocale()} }}</span>
                                            <input class="rounded-full checked:bg-red-700 checked:text-red-700" wire:model="purchase" type="checkbox" name="{{ $category->{'name_' . app()->getLocale()} }}" value="{{$category->id}}" id="">
                                        </div>
                                    @empty
                                        {{ __('No tiene opciones') }}
                                    @endforelse
                                </div>
                            </div>
                            <div>
                                <button wire:click="limpiar" class="bg-neutral-900 hover:bg-neutral-700 py-2 rounded-full w-full text-white text-xs mt-6 transition duration-500 ease-in-out transform hover:translate-y-0.5 hover:scale-105">
                                    <i class="fa-solid fa-trash-can pr-1"></i>{{ __('Borrar Filtros') }}
                                </button>
                            </div>
                        </div>
                    </section>
                </div>

            {{-- LISTADO DE  PROCESOS --}}
            <div class="col-span-1 md:col-span-2">
                <section class="flex-col rounded-lg space-y-8 w-full">
                    {{-- <div class="bg-white px-6 py-3 rounded-lg text-center font-bold text-sm shadow-sm">Listado de procesos</div> --}}
                    <div class="bg-white p-3 rounded-lg h-auto">
                        @forelse ($processes as $process)
                            <article class="border shadow-lg max-w-2xl mx-auto border-gray-300 my-5 rounded-lg bg-white py-4 px-1 md:p-4 space-y-4 hover:shadow-neutral-500 cursor-pointer transition transform hover:scale-105">
                                <a href="{{ Route('process.show', $process) }}">
                                    <div class="flex space-x-5">
                                        <div class="rounded-full bg-neutral-900 w-16 h-16 md:flex justify-center items-center hidden">
                                            <i class="fa-solid fa-gears text-2xl text-white"></i>
                                        </div>
                                        <div class="flex-col my-auto mx-auto space-y-1">
                                            <div class="flex justify-between"> 
                                                <div class="text-sm text-red-700 font-semibold"><i class="fa-solid fa-medal"></i>  {{Str::limit($process->{'title_' . app()->getLocale()}, 50)}}</div>
                                                {{-- <div class="text-xs absolute right-9"><span class="font-medium"><i class="fa-solid fa-calendar-days pr-1"></i> </span> {{$process->created_at->isoFormat('dddd D MMMM') }}</div> --}}
                                            </div>
                                            <div class="text-xs"><span class="font-bold"><i class="fa-solid fa-object-group pr-1"></i> {{ __('Objeto de Compra') }}: </span> {{Str::limit($process->{'object_' . app()->getLocale()}, 50)}}</div>
                                            <div class="text-xs font-medium"><span class="font-bold"><i class="fa-solid fa-barcode pr-1"></i> {{ __('Código') }}: </span> {{$process->code}}</div>
                                        </div>
                                    </div>
                                    <div class="flex justify-evenly text-xs font-medium pt-4">
                                        <div><span class="font-semibold"><i class="fa-solid fa-user test-red-700 pr-1"></i> <span class="hidden md:inline-flex">{{ __('Creado Por') }}: </span> </span>{{$process->moderador->name}}</div>
                                        <div class="font-semibold pr-2"><span><i class="fa-solid fa-users test-red-700 pr-1"></i> <span class="hidden md:inline-flex">{{ __('Proveedores') }}: </span> </span>{{$process->proveedores_count}}</div>
                                        <div class="text-xs pr-2"><span class="font-semibold"><i class="fa-solid fa-calendar-days pr-1"></i> <span class="hidden md:inline-flex">{{ __('Publicado') }}: </span> </span> {{$process->created_at->isoFormat('dddd D MMMM') }}</div>
                                    </div>
                                </a>
                            </article>
                        @empty
                            <span class="text-xs">{{ __('Lo sentimos no hemos encontrado resultados con los parametros de busqueda, vuelve a intentarlo.') }}</span>
                        @endforelse
                        <div class="w-full mx-auto">
                            @if ($processes)
                                {{ $processes->links() }}
                            @else
                                
                            @endif
                            
                        </div>
                    </div>
                    
                </section>
            </div>
        </div>
    </div>
{{--     <script>
        function dropdown(){
            return {
                open: false,
                show(){
                    if (this.open) {
                        this.open = false;
                        document.getElementsByTagName('html')[0].style.overflow = 'auto'
                    }else{
                        this.open = true;
                        document.getElementsByTagName('html')[0].style.overflow = 'hidden'
                    }
                },
                close(){
                    this.open = false;
                    document.getElementsByTagName('html')[0].style.overflow = 'auto'
                }
            }
        }
    </script> --}}
</div>




