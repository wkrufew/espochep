<div class="max-w-7xl mx-auto rounded-lg bg-white py-2">
    <div class="text-center font-semibold text-red-700 py-4">
        LISTADO DE MIS NOTICIAS
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="pb-4 flex">
                    <input wire:keydown="limpiar_page" wire:model.debounce.500ms="search" type="search"
                        class="form-input flex-1 shadow-lg rounded-full"
                        placeholder="Escribir el titulo de una noticia ...">
                    <a class="px-2 py-1 text-sm bg-blue-700 ml-4 text-white rounded-full flex justify-center items-center"
                        href="{{ route('moderador.notices.create') }}">Nueva Noticia
                    </a>
                </div>
                @if (session('notificacion'))
                    <div x-data="{ open: true }" class="py-2">
                        <div x-show="open"
                            class="bg-blue-500 border border-blue-600 text-blue-100 px-4 py-1 rounded relative"
                            role="alert">
                            <strong class="font-bold">Ok!</strong>
                            <span class="block sm:inline">{{ session('notificacion') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg x-on:click="open = false" class="fill-current h-6 w-6 text-white" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                @endif
                <div class="overflow-hidden">
                    <table class="min-w-full rounded-lg table-auto overflow-hidden">
                        <thead class="bg-neutral-900">
                            <tr>
                                <th class="text-sm text-center font-semibold text-white px-6 py-4">
                                    #
                                </th>
                                <th class="text-sm font-semibold text-white px-6 py-4 text-left">
                                    Imagen
                                </th>
                                <th class="text-sm font-semibold text-white px-6 py-4 text-left">
                                    Titulo
                                </th>
                                <th class="text-sm text-center font-semibold text-white px-6 py-4">
                                    Publicacion
                                </th>
                                <th class="text-sm text-center font-semibold text-white px-6 py-4">
                                    Estado
                                </th>
                                <th class="text-sm text-center font-semibold text-white px-6 py-4">
                                    Opciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="rounded-full">
                            @forelse ($notices as $key => $notice)
                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td class="px-6 py-2 whitespace-nowrap text-xs font-medium text-gray-900">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                @isset($notice->image)
                                                    <img class="h-10 w-10 rounded-full object-cover object-center"
                                                        src="{{ Storage::url($notice->image->url) }}"
                                                        alt="{{ $notice->title_es }}">
                                                @else
                                                    <img id="picture"
                                                        class="h-10 w-10 rounded-full object-cover object-center"
                                                        src="https://images.pexels.com/photos/4325451/pexels-photo-4325451.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                                        alt="">
                                                @endisset
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-xs text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                                        {{ $notice->title_es }}
                                    </td>
                                    <td class="text-xs text-gray-900 font-semibold px-6 py-4 text-center">
                                        {{ $notice->created_at->isoFormat('dddd, D MMMM, Y') }}
                                    </td>
                                    <td class="text-xs text-white h-full text-center">
                                        @if ($notice->status == 1)
                                            <span class="rounded-full py-1 px-3 bg-red-500">Borrador</span>
                                        @elseif($notice->status == 2)
                                            <span class="rounded-full py-1 px-3 bg-green-500">Publicado</span>
                                        @endif
                                    </td>
                                    <td class="text-base">
                                        <a title="Editar/Ver" href="{{ route('moderador.notices.edit', $notice) }}" class="rounded-full text-blue-600 px-2 py-2">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form class="inline noticia-eliminar" action="{{ route('moderador.notices.status', $notice) }}" method="POST">
                                            @csrf
                                            <button title="Eliminar" type="submit">
                                                <i class="fa-solid fa-trash-can text-red-500"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td class="px-6 py-2 whitespace-nowrap text-xs font-medium text-gray-900">
                                        No se encontraron resultados
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="w-full mx-auto pt-6">
                        {{ $notices->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('js')
        <script src="{{ asset('//cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @if (session('eliminarnoticia') == 'ok')
            <script>
                Swal.fire(
                        'Eliminado!',
                        'La noticia ha sido eliminada con éxito.',
                        'success'
                    )
            </script>
        @endif
        <script>
            $('.noticia-eliminar').submit(function(e){
                e.preventDefault();

                Swal.fire({
                    title: 'Estas seguro de eliminar esta noticia?',
                    text: "La noticia será eliminada de manera permanente!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar esto!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            });
        </script>
    @endpush
</div>
