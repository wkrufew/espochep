<x-app-layout>
    <x-moderador-plantilla>
        <div class="bg-white rounded-lg py-10">
            <h1 class="text-center pb-10 font-bold text-red-700">DASHBOARD DEL MODERADOR</h1>
            <div class="flex justify-around">
                
                @can('Listar Procesos')
                    <div class="flex w-auto p-3 h-16 bg-neutral-800 rounded-lg text-white  items-center">
                        <div>
                            <i class="fa-solid fa-sitemap pr-3 text-2xl text-red-700"></i>
                        </div>
                        <div>
                            <span class="text-sm font-medium">
                                Procesos
                            </span>
                            <div class="text-center text-xs pt-1">
                                {{$processes ? : 'Sin Procesos'}}
                            </div>
                        </div>
                    </div>
                @endcan

                @can('Listar Noticias')
                    <div class="flex w-auto h-16 bg-neutral-800 rounded-lg text-white p-3 items-center">
                        <div>
                            <i class="fa-regular fa-newspaper pr-3 text-2xl text-red-700"></i>
                        </div>
                        <div>
                            <span class="text-sm font-medium">
                                Noticias
                            </span>
                            <div class="text-center text-xs pt-1">
                                {{$notices ? : 'Sin Noticias'}}
                            </div>
                        </div>
                    </div>
                @endcan

                @can('Listar Proyectos')
                    <div class="flex w-auto h-16 bg-neutral-800 rounded-lg text-white p-3 items-center">
                        <div>
                            <i class="fa-solid fa-diagram-project pr-3 text-2xl text-red-700"></i>
                        </div>
                        <div>
                            <span class="text-sm font-medium">
                                Proyectos
                            </span>
                            <div class="text-center text-xs pt-1">
                                {{$projects ? : 'Sin Proyectos'}}
                            </div>
                        </div>
                    </div>
                @endcan                
            </div>
        </div>
    </x-moderador-plantilla>
</x-app-layout>