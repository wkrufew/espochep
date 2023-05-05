<div>
    <div class="text-center pb-4 font-bold text-lg uppercase">
        SECCIONES DEL PROYECTO: {{ $project->title_es }}
    </div>
    <hr class="mt-2 mb-6">
    
    @foreach ($project->fases as $item)
        <article class="mb-6" x-data="{open: false}">
            <div class="bg-white border border-blue-400 p-3 rounded-lg">
                @if ($fase->id == $item->id)
                    <form wire:submit.prevent = "update" class="space-y-2">
                        <div>
                            <label for="" class="text-sm font-semibold">Nombre (Es)</label>
                            <input wire:model="fase.name_es" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Escriba el nombre de la seccion...">
                        </div>
                        @error('fase.name_es')   
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 text-sm rounded relative mt-1" role="alert">
                                <strong class="font-bold">Ups!</strong>
                                <span class="block sm:inline">{{ $message }}</span>
                            </div>
	                    @enderror
                        <div>
                            <label for="" class="text-sm font-semibold">Nombre (En)</label>
                            <input wire:model="fase.name_en" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Escriba el nombre de la seccion...">
                        </div>
                        @error('fase.name_en')   
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 text-sm rounded relative mt-1" role="alert">
                                <strong class="font-bold">Ups!</strong>
                                <span class="block sm:inline">{{ $message }}</span>
                            </div>
	                    @enderror
                        
                        <div>
                            <label for="" class="text-sm font-semibold">Descripcion (Es)</label>
                            <input wire:model="fase.description_es" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Escriba el nombre de la seccion...">
                        </div>
                        <div>
                            <label for="" class="text-sm font-semibold">Descripcion (En)</label>
                            <input wire:model="fase.description_en" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Escriba el nombre de la seccion...">
                        </div>
                        <div>
                            <label for="" class="text-sm font-semibold">Link</label>
                            <input wire:model="fase.url_file" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Escriba el nombre de la seccion...">    
                        </div>
                        <div class="flex justify-center">
                            <button x-on:click="open = false" class="py-1 px-3 bg-neutral-800 rounded-full text-sm my-2 text-white mr-2">Cancelar</button>
                            <button class="py-1 px-3 bg-blue-600 rounded-full text-sm my-2 text-white" type="submit">Actualizar</button>
                        </div>
                    </form>
                @else
                    <header class="flex justify-between items-center ">
                        <div x-on:click="open = !open" class="text-sm space-y-1">
                            <h1 class="cursor-pointer text-neutral-800"> <span class="font-semibold">Titulo (Es):</span> {{$item->name_es}}</h1>
                            <h1 class="cursor-pointer text-neutral-800"> <span class="font-semibold">Titulo (En):</span> {{$item->name_en}}</h1>
                            <hr>
                            <h1 class="cursor-pointer text-neutral-800"> <span class="font-semibold">Descripcion (Es):</span> {{$item->description_es}}</h1>
                            <h1 class="cursor-pointer text-neutral-800"> <span class="font-semibold">Descripcion (En):</span> {{$item->description_en}}</h1>
                            <h1 class="cursor-pointer text-blue-600 underline"> <span class="font-semibold"><a href="{{$item->url_file}}"><i class="fa-solid fa-link pr-2"></i></span> {{$item->url_file}}</a></h1>
                        </div>
                        <div>
                            <button wire:click="edit({{$item}})"><i class="fas fa-edit cursor-pointer mr-4 text-blue-600" ></i></button>
                            <button wire:click="destroy({{$item}})"><i class="fas fa-trash cursor-pointer text-red-600" ></i></button>
                        </div>
                    </header>
                    <!--ESTO LLAMA AL COMPONENTE COURSES LESSON DE LIVEWIRE-->
                    {{-- <div x-show="open">
                        @livewire('moderador.processes.processes-details', ['section' => $item], key($item->id))
                        
                    </div> --}}

                @endif
            </div>
        </article>
    @endforeach

    <div x-data = "{ open : false}">
        <a x-show="!open" x-on:click="open = true" class="text-blue-500 flex items-center cursor-pointer font-bold transition duration-500 ease-in-out transform hover:-translate-y-0 hover:scale-x-95">
            <i class="far fa-plus-square text-xl text-blue-500 mr-2 "></i>
            Agregar nueva sección
        </a>
        <article x-show="open" class="bg-gray-100 mt-3 p-3 rounded-lg">
            <div class="card-body">
                <h1 class="text-base font-bold text-blue-500">Nueva Seccion</h1>
                <div>
                    <div>
                        <label for="" class="text-sm font-semibold">Nombre (Es)</label>
                        <input wire:model="name_es" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ingrese el nombre de la seccion en Español">
                    </div>
                    @error('name_es')   
                        <div class="bg-red-100 border text-sm border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                    <div>
                        <label for="" class="text-sm font-semibold">Nombre (En)</label>
                        <input wire:model="name_en" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ingrese el nombre de la seccion en Ingles">
                    </div>
                    @error('name_en')   
                        <div class="bg-red-100 border text-sm border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                    <div>
                        <label for="" class="text-sm font-semibold">Descripcion (Es)</label>
                        <input wire:model="description_es" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ingrese la descripcion de la seccion en Español">
                    </div>
                    <div>
                        <label for="" class="text-sm font-semibold">Descripcion (En)</label>
                        <input wire:model="description_en" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ingrese la descripcion de la seccion en Ingles">
                    </div>
                    <div>
                        <label for="" class="text-sm font-semibold">Link</label>
                        <input wire:model="url_file" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ingresar el link de descarga de archivos">
                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <button x-on:click="open = false" class="px-3 py-1 rounded-full bg-neutral-800 text-white text-sm">Cancelar</button>
                    <button wire:click="store" class="px-3 py-1 rounded-full bg-blue-600 ml-4 text-white text-sm">Agregar</button>
                </div>
            </div>
        </article>
    </div>

</div>
