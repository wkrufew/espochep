<div>
    @foreach ($section->details as $item)
    
    <article class="card bg-gray-100 rounded-lg py-2 mt-4" x-data="{open: false}">
        <div class="card-body">

            @if ($detail->id == $item->id)
                <form wire:submit.prevent="update" class="px-4">
                    <div class="flex-col items-center">
                        <label class="w-32 text-xs font-semibold">Detalle (Es): </label>
                        <input wire:model="detail.name_es"  class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <label class="w-32 text-xs font-semibold">Detail (En): </label>
                        <input wire:model="detail.name_en"  class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('detail.name_es')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                    <!--BOTONES PARA EDITAR Y ELIMINAR UNA LECCION-->
                    <div class="flex justify-center mt-4">
                        <button type="button" class="rounded-full px-3 py-1 text-white bg-red-600 text-xs" wire:click="cancel">Cancelar</button>
                        <button type="submit" class="rounded-full px-3 py-1 text-white bg-blue-600 text-xs ml-4">Actualizar</button>
                    </div>
                </form>
            @else
                <header>
                    <h1 x-on:click="open = !open" class="cursor-pointer text-sm ml-10"><i class="fa-solid fa-comment-dots text-blue-600 mr-2"></i> <span class="font-semibold">Detalle (Es):</span> {{$item->name_es}}</h1>
                    <h1 x-on:click="open = !open" class="cursor-pointer text-sm ml-10"><i class="fa-solid fa-comment-dots text-blue-600 mr-2"></i> <span class="font-semibold">Detalle (En):</span> {{$item->name_en}}</h1>
                </header>
                <div x-show=open>
                    <hr class="my-2">
                    <div class="my-2 text-center">
                        <button class="rounded-full px-3 py-1 text-white bg-blue-600 text-xs" wire:click="edit({{$item}})">Editar</button>
                        <button class="rounded-full px-3 py-1 text-white bg-red-600 text-xs ml-3" wire:click="destroy({{$item}})">Eliminar</button>
                    </div>
                </div>   
            @endif

        </div>
    </article>

    @endforeach

    <div x-data = "{ open : false}">
        <a x-show="!open" x-on:click="open = true" class="mt-4 text-sm flex items-center cursor-pointer font-bold transition duration-500 ease-in-out transform hover:-translate-y-0 hover:scale-x-95">
            <i class="far fa-plus-square text-lg text-red-500 mr-2 "></i>
            Agregar nuevo detalle
        </a> 
        <article x-show="open" class="card mt-3">
            <div class="card-body bg-white">
                <h1 class="text-sm font-bold text-blue-600 py-2">Registro de nuevo detalle</h1>
                <div class="space-y-1">
                    <div class="flex items-center">
                        <label class="w-20 text-xs font-semibold">Detalle (Es): </label>
                        <input wire:model="name_es"  class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('name_es')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 text-sm rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                    <div class="flex items-center">
                        <label class="w-20 text-xs font-semibold">Detalle (En): </label>
                        <input wire:model="name_en"  class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('name_en')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 text-sm rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="flex justify-center mt-4">
                    <button x-on:click="open = false" class="px-2 py-1 text-xs text-white rounded-full bg-neutral-800">Cancelar</button>
                    <button wire:click="store" class="px-2 py-1 text-xs text-white rounded-full bg-blue-600 ml-4">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
