<div class="">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 px-2">
        <div class="">
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
                                <input class="rounded-full checked:bg-red-700 checked:text-red-700" type="radio" wire:model="orden" name="orden" id="" value="ASC">
                            </div>
                            <div class="first:w-full flex justify-between items-center">
                                <span class="text-xs">{{ __('Descendente') }}</span>
                                <input class="rounded-full checked:bg-red-700 checked:text-red-700" type="radio" wire:model="orden" name="orden" id="" value="DESC">
                            </div>
                       </div>
                    </div>
                    <div class="py-2">
                        <span class="text-sm font-semibold">
                            <i class="fa-solid fa-clone pr-1"></i> {{ __('Categoria') }}
                        </span>
                        <div class="pt-2 space-y-1">
                            @forelse ($categories as $category)
                                <div class="w-full flex justify-between items-center">
                                    <span class="text-xs">{{ $category->{'name_' . app()->getLocale()} }}</span>
                                    <input class="rounded-full checked:bg-red-700 checked:text-red-700" wire:model="categoria" type="checkbox" name="{{ $category->{'name_' . app()->getLocale()} }}" value="{{$category->id}}" id="">
                                </div>
                            @empty
                                {{ __('No tiene opciones') }}
                            @endforelse
                        </div>
                    </div>
                    <div>
                        <button wire:click="limpiar" class="bg-neutral-900  py-2 rounded-full w-full text-white text-xs mt-6 hover:bg-neutral-700 transition duration-500 ease-in-out transform hover:translate-y-0.5 hover:scale-105">
                            <i class="fa-solid fa-trash-can pr-1"></i> {{ __('Borrar Filtros') }}
                        </button>
                    </div>
                </div>
            </section>
        </div>
        <div class="md:col-span-2 lg:col-span-4">
            {{-- <h1 class="rounded-lg  py-3 bg-white text-center mb-4 text-base font-semibold shadow-md">Noticias</h1> --}}
            <ul class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6 p-5 rounded-lg bg-white">
                @forelse ($notices as $notice)
                    <li class="shadow-lg rounded-lg bg-white transition overflow-hidden ease-in-out hover:scale-105 duration-300 hover:shadow-neutral-500">
                        <article class="flex-1 flex flex-col justify-between h-full">
                            <figure>
                                @if ($notice->image)
                                    <img class="h-40 w-full object-cover object-center" src="{{ Storage::url($notice->image->url) }}" alt="{{ $notice->title_es }}">
                                @endif
                            </figure>
                            <div class="">
                                <div class="py-3 px-4">
                                    <h1 class="font-semibold">
                                        <a class="text-sm" href="{{ route('notice.show', $notice) }}">
                                            {{ $notice->{'title_' . app()->getLocale()} }}
                                        </a>
                                    </h1>
                                    <p class="font-medium text-xs text-neutral-700 pt-2">
                                        {{ Str::limit($notice->{'subtitle_' . app()->getLocale()}, 80) }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-1 md:mt-auto py-2 w-full mx-auto ">
                                <div class="pb-2 px-3 flex justify-between">
                                    <div class="text-xs text-neutral-700"><i class="fa-solid fa-user"></i> {{-- <span class="font-semibold"> {{ __('Autor') }}: </span> --}}{{ $notice->moderador->name }}</div>
                                    <div class="text-xs text-neutral-700"><i class="fa-solid fa-clock  font-semibold"></i> {{ $notice->created_at->diffForHumans() }}</div>
                                </div>
                                <a class="px-4 py-2 mx-2 bg-neutral-800 text-white text-sm font-medium rounded-lg flex justify-center" href="{{ route('notice.show', $notice) }}">
                                    {{ __('Más información') }}
                                </a>
                            </div>
                        </article>
                    </li>
                @empty
                    <li class="col-span-3">
                        <span class="block sm:inline text-xs">{{ __('Lo sentimos no hemos encontrado resultados con los parametros de busqueda, vuelve a intentarlo.') }}</span>
                    </li>
                @endforelse
            </ul>
            @if ($notices->hasPages())
                <div class="mt-4 rounded-lg px-6 py-3 bg-white text-center mb-4 text-base shadow-md">
                    {{ $notices->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
