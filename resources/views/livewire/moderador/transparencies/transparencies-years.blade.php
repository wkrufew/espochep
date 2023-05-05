<div>
    <div class="text-center pb-4 font-bold text-lg uppercase">
        AÑO {{$transparency->anio}}
    </div>
    <hr class="mt-2 mb-6">
    
    @foreach ($transparency->years as $item)
        <article class="mb-6" x-data="{open: false}">
            <div class="bg-white border border-blue-400 p-3 rounded-lg">
                @if ($year->id == $item->id)
                    <form wire:submit.prevent = "update" class="space-y-2">
                        <input wire:model="year.mes" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ingrese un mes...">
                        @error('year.mes')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 text-sm rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
	                    @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center ">
                        <div x-on:click="open = !open" class="text-sm space-y-1">
                            <h1 class="cursor-pointer text-neutral-800 font-semibold"> {{$item->mes}}</h1>
                        </div>
                        <div>
                            <button wire:click="edit({{$item}})"><i class="fas fa-edit cursor-pointer mr-4 text-blue-600" ></i></button>
                            <button wire:click="destroy({{$item}})"><i class="fas fa-trash cursor-pointer text-red-600" ></i></button>
                        </div>
                    </header>
                    <!--ESTO LLAMA AL COMPONENTE COURSES LESSON DE LIVEWIRE-->
                    <div x-show="open">
                        @livewire('moderador.transparencies.transparencies-months', ['year' => $item], key($item->id))
                    </div>

                @endif
            </div>
        </article>
    @endforeach

    <div x-data = "{ open : false}">
        <a x-show="!open" x-on:click="open = true" class="text-blue-500 flex items-center cursor-pointer font-bold transition duration-500 ease-in-out transform hover:-translate-y-0 hover:scale-x-95">
            <i class="far fa-plus-square text-xl text-blue-500 mr-2 "></i>
            Agregar Mes
        </a>
        <article x-show="open" class="bg-gray-100 mt-3 p-3 rounded-lg">
            <div class="card-body">
                <h1 class="text-base font-bold text-blue-500">Nuevo Mes</h1>
                <div>
                    <input wire:model="mes" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ingrese un mes valido">
                    @error('mes')   
                        <div class="bg-red-100 border text-sm border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="flex justify-center mt-4">
                    <button x-on:click="open = false" class="px-3 py-1 rounded-full bg-neutral-800 text-white text-sm">Cancelar</button>
                    <button wire:click="store" class="px-3 py-1 rounded-full bg-blue-600 ml-4 text-white text-sm">Agregar</button>
                </div>
            </div>
        </article>
    </div>

</div>
