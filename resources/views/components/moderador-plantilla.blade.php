<div class="w-full mx-auto py-6 px-6">
    <div class="grid grid-cols-4 gap-8">
        {{-- MENU --}}
        <div class="">
            <section class="h-auto rounded-lg bg-white p-6 shadow-sm sticky top-20">
                <span class="text-center font-bold text-sm cursor-pointer"><i class="fa-solid fa-bars pr-1"></i> MENU</span>
                <div class="flex-col space-y-2 pt-4">
                    <div class="">
                        <a href="{{ route('moderador.dashboard.index') }}">
                            <span class="text-sm block font-semibold @routeIs('moderador.dashboard.index') bg-neutral-900 text-white @else @endif hover:bg-neutral-900 hover:text-white cursor-pointer px-4 py-2 rounded-lg">
                                <i class="fa-solid fa-chart-pie pr-1"></i> Dashboard
                            </span>
                        </a>
                    </div>
                    @can('Listar Procesos')
                        <div class="">
                            <a href="{{ route('moderador.processes.index') }}">
                                <span class="text-sm block font-semibold @routeIs('moderador.processes.index') bg-neutral-900 text-white @else @endif hover:bg-neutral-900 hover:text-white cursor-pointer px-4 py-2 rounded-lg">
                                    <i class="fa-solid fa-sitemap pr-1"></i> Procesos
                                </span>
                            </a>
                        </div>
                    @endcan
                    @can('Listar Noticias')
                        <div class="">
                            <a href="{{ route('moderador.notices.index') }}">
                                <span class="text-sm block font-semibold @routeIs('moderador.notices.index') bg-neutral-900 text-white @else @endif hover:bg-neutral-900 hover:text-white cursor-pointer px-4 py-2 rounded-lg">
                                    <i class="fa-regular fa-newspaper pr-1"></i> Noticias
                                </span>
                            </a>
                        </div>
                    @endcan
                    
                    @can('Listar Proyectos')
                        <div class="">
                            <a href="{{ route('moderador.projects.index') }}">
                                <span class="text-sm block font-semibold @routeIs('moderador.projects.index') bg-neutral-900 text-white @else @endif hover:bg-neutral-900 hover:text-white cursor-pointer px-4 py-2 rounded-lg">
                                    <i class="fa-solid fa-diagram-project pr-1"></i> Proyectos
                                </span>
                            </a>
                        </div>
                    @endcan

                    @can('Ver Transparencia')
                        <div class="">
                            <a href="{{ route('moderador.transparencies.index') }}">
                                <span class="text-sm block font-semibold @routeIs('moderador.transparencies.index') bg-neutral-900 text-white @else @endif hover:bg-neutral-900 hover:text-white cursor-pointer px-4 py-2 rounded-lg">
                                    <i class="fa-solid fa-file-invoice pr-1"></i> Transparencia
                                </span>
                            </a>
                        </div>
                    @endcan

                    @can('Ver Rendicion')
                        <div class="">
                            <a href="{{ route('moderador.surrenders.index') }}">
                                <span class="text-sm block font-semibold @routeIs('moderador.surrenders.index') bg-neutral-900 text-white @else @endif hover:bg-neutral-900 hover:text-white cursor-pointer px-4 py-2 rounded-lg">
                                    <i class="fa-solid fa-file-invoice pr-1"></i> Rendición de Cuentas
                                </span>
                            </a>
                        </div>
                    @endcan
                </div>
            </section>
        </div>
        {{-- MAIN CONTENIDO DINAMICO --}}
        <div class="col-span-3">
            <section class="flex-col rounded-lg w-full">
                {{ $slot }}
            </section>
        </div>
    </div>
</div>