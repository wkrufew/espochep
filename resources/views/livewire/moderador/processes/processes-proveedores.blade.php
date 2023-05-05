<div>
    {{-- <x-slot name="process">
        {{ $process->slug }}
    </x-slot> --}}
        <div class="text-center pb-4 font-bold text-lg">
            {{ $process->title_es }}
        </div>
    <div class="flex flex-col shadow-lg">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="py-4 px-6 bg-gray-50">
                    <input wire:model="search" type="search" class="w-full form-input  text-sm flex-1 shadow-lg  rounded-md"
                        placeholder="Buscar por nombre del proveedor ...">
                </div>
                @if (session('errores'))
                    <div x-data="{ open: true }">
                        <div x-show="open" class="bg-red-500 border border-red-600 text-red-50 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ session('errores') }}</span>
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
        
                @if ($proveedores->count())
                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Valor
                                </th>
        
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Opciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($proveedores as $key => $persona)
                                <tr @if ($persona->pivot->created_at >= now()->toDateString()) class="bg-green-200" @endif>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-xs  text-left  font-medium text-gray-900">
                                                    {{ $key + 1 }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-xs font-medium text-gray-900">
                                                    {{ $persona->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td class="px-2 py-2 flex justify-center">
                                        <div class="text-xs text-gray-900">
                                            {{$persona->pivot->cantidad ? : 'Sin monto'}}                                            
                                        </div>
                                    </td> --}}
                                    <td class="px-2 py-2 whitespace-nowrap">
                                        <div class="text-xs text-gray-900">
                                            ${{$persona->pivot->monto ? : '00.00'}}                                            
                                        </div>
                                    </td>
                                    <td class="px-2 py-2 whitespace-nowrap">
                                        <div class="text-xs text-gray-900">
                                            {{-- {{ $persona->pivot->created_at->isoFormat('dddd, D MMMM, Y') }} --}}
                                            {{ $persona->pivot->created_at->isoFormat('dddd, D MMMM, Y') }}
                                        </div>
                                    </td>

                                    <td class="px-2 py-2 whitespace-nowrap text-xs font-medium">
                                       @if ($persona->pivot->status == 1)
                                           <span class="px-2 py-1 rounded-full bg-yellow-500 text-white">Concursando</span>
                                       @else
                                            <span class="px-2 py-1 rounded-full bg-green-600 text-white">Aceptado</span>
                                       @endif
                                    </td>
                                    <td class="flex justify-center text-base font-medium">
                                        <a title="Ver Proveedor" class="bg-blue-500 rounded-full px-2 py-1 text-white" href="{{ route('moderador.processes.proveedorperfil',['process' => $process ,'proveedor' => $persona]) }}"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
        
                        </tbody>
                    </table>
                    <div class="px-6 py-4">
                        {{ $proveedores->links() }}
                    </div>
                @else
                    <div class="px-6 py-4">
                        No records found
                    </div>
        
                @endif
            </div>
        </div>
      </div>
    </div>
</div>
