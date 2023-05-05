<div>
    <div class="text-center pb-4 font-bold text-lg uppercase">
        SECCIONES DEL PROCESO: {{ $process->title_es }}
    </div>
    <hr class="mt-2 mb-6">
    
    @foreach ($process->sections as $item)
        <article class="mb-6" x-data="{open: false}">
            <div class="bg-white border border-blue-400 p-3 rounded-lg">
                @if ($section->id == $item->id)
                    <form wire:submit.prevent = "update" class="space-y-2">
                        <input wire:model="section.title_es" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Escriba el nombre de la seccion...">
                        @error('section.title_es')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 text-sm rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
	                    @enderror
                        <input wire:model="section.title_en" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Escriba el nombre de la seccion...">
                        @error('section.title_en')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 text-sm rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
	                    @enderror
                        <input wire:model="section.url_file" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Escriba el nombre de la seccion...">
                        <button class="hidden" type="submit"></button>
                       {{--  @error('section.url_file')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 text-sm rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
	                    @enderror --}}
                    </form>
                @else
                    <header class="flex justify-between items-center ">
                        <div x-on:click="open = !open" class="text-sm space-y-1">
                            <h1 class="cursor-pointer text-neutral-800"> <span class="font-semibold">Titulo (Es):</span> {{$item->title_es}}</h1>
                            <h1 class="cursor-pointer text-neutral-800"> <span class="font-semibold">Titulo (En):</span> {{$item->title_en}}</h1>
                            <h1 class="cursor-pointer text-blue-600 underline"> <span class="font-semibold"><a href="{{$item->url_file}}"><i class="fa-solid fa-link pr-2"></i></span> {{$item->url_file}}</a></h1>
                        </div>
                        <div>
                            <button wire:click="edit({{$item}})"><i class="fas fa-edit cursor-pointer mr-4 text-blue-600" ></i></button>
                            <button wire:click="destroy({{$item}})"><i class="fas fa-trash cursor-pointer text-red-600" ></i></button>
                        </div>
                    </header>
                    <!--ESTO LLAMA AL COMPONENTE COURSES LESSON DE LIVEWIRE-->
                    <div x-show="open">
                        @livewire('moderador.processes.processes-details', ['section' => $item], key($item->id))
                        
                    </div>

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
                <h1 class="text-base font-bold text-blue-500">Agregar nueva seccion</h1>
                <div>
                    <input wire:model="title_es" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ingresa nombre de la seccion en Español">
                    @error('title_es')   
                        <div class="bg-red-100 border text-sm border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                    <input wire:model="title_en" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ingresa nombre de la seccion en Ingles">
                    @error('title_en')   
                        <div class="bg-red-100 border text-sm border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                    <input wire:model="url_file" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ingresar el link de descarga de archivos">
                   {{--  @error('url_file')   
                        <div class="bg-red-100 border text-sm border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror --}}
                </div>
                <div class="flex justify-center mt-4">
                    <button x-on:click="open = false" class="px-3 py-1 rounded-full bg-neutral-800 text-white text-sm">Cancelar</button>
                    <button wire:click="store" class="px-3 py-1 rounded-full bg-blue-600 ml-4 text-white text-sm">Agregar</button>
                </div>
            </div>
        </article>
    </div>

</div>
