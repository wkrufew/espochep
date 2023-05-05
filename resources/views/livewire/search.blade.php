<div>
    <div class="flex justify-center items-center">
        <div class="flex">
                <!-- Settings Dropdown -->
                <div class="relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                                <button class="flex text-white text-xs font-medium px-3 py-2  bg-neutral-900 rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    {{ __('Buscar por') }} {{$tipo1 ? :'Buscar Por'}}
                                    <svg class="ml-2 -mr-0.5 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Tipo de busqueda') }}
                            </div>
                            <x-jet-dropdown-link class="cursor-pointer text-xs" wire:click="$set('tipo', 'title_')">
                                {{ __('Título del proceso') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link class="cursor-pointer text-xs" wire:click="$set('tipo', 'code')">
                                {{ __('Código del proceso') }}
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
        </div>
        <div class="w-full relative pl-2 flex-1">
            <form class="relative text-gray-700" autocomplete="off">
                <input wire:model.debounce.500ms="search" class="rounded-full focus:bg-white border-2 border-red-700 focus:ring-red-700 focus:outline-none focus:border-red-700 focus:ring-1 w-full h-8 px-5 text-sm"
                    type="search" name="search" placeholder="{{ __('Busca un proceso ...') }}">
                @if ($search)
                    <ul class="absolute left-0 w-full bg-white mt-1 overflow-hidden z-50 divide-y divide-gray-100 border border-red-700 rounded-lg">
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
                               <a class="w-full block" href="{{ route('process.show', $result) }}">{{ $result->{'title_'.app()->getLocale()} }}</a>
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




