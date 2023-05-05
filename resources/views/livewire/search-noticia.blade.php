<div>
    <div class="flex justify-center items-center">
        <div class="flex-1">
            <!-- Settings Dropdown -->
            <div class="relative">
                <button class="flex text-white text-xs font-medium px-3 py-2  bg-neutral-900 rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                    {{ __('Buscar') }}
                </button>
            </div>
        </div>
        <div class="w-full relative pl-2">
            <form class="relative text-gray-700" autocomplete="off">
                <input wire:model.debounce.500ms="search"
                    class="rounded-full focus:bg-white border-2 border-red-700 focus:ring-red-700 focus:outline-none focus:border-red-700 focus:ring-1 w-full h-8 px-5 text-sm"
                    type="search" name="search" placeholder="{{ __('Busca una Noticia') }} ...">
                    @if ($search)
                        <ul
                            class="absolute left-0 w-full bg-white mt-1 overflow-hidden z-50 divide-y divide-gray-100 border border-red-700 rounded-lg">
                            @forelse ($this->results as $result)
                                <div wire:loading wire:target="search" class=" px-4 w-full mx-auto">
                                    <div class="animate-pulse flex space-x-4">
                                        <div class="flex-1 space-y-6 py-0.5">
                                            <div class="space-y-3">
                                                <div class="grid grid-cols-3 gap-x-1">
                                                    <div class="h-2 bg-gray-300 rounded col-span-1"></div>
                                                    <div class="h-2 bg-gray-300 rounded col-span-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <li wire:loading.remove class="leading-8 px-5 text-sm cursor-pointer hover:bg-red-700 hover:text-white rounded-lg">
                                    <a class="w-full block"
                                        href="{{ route('notice.show', $result) }}">{{ $result->{'title_' . app()->getLocale()} }}
                                    </a>
                                </li>
                            @empty
                                <li class="leading-8 px-5 text-sm cursor-pointer hover:bg-gray-100">
                                    {{ __('No se encontraron resultados') }}
                                </li>
                            @endforelse
                        </ul>
                    @endif
            </form>
        </div>
    </div>
</div>
