<div>
    @if (session('notificacion'))
        <div class="alert alert-success" role="alert">
            <strong>Success! </strong>{{ session('notificacion') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <input wire.keydown="limpiar_page" wire:model="search" class="form-control w-100"
                placeholder="Escribir el nombre de un usuario ...">
        </div>


        @if ($users->count())
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover table-sm">
                    <thead class="thead-dark ">
                        <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th> Correo</th>
                            <th> Roles</th>
                            <th> </th>
                            <th> Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            @if ($user->status == 1)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @forelse ($user->roles as $item)
                                            <label class="text-md">{{ $item->name }}</label>
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @empty
                                            <label class="text-md"></label>
                                        @endforelse
                                    </td>
                                    <td width="10px">
                                        @if ($user->roles_count > 0)
                                        {{-- BORRAR CUANDO YA SE TENGAN TODOS LOS PERMISOS DEFINIDOS --}}
                                            <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $user) }}"><i
                                                class="fas fa-edit"></i></a>
                                        @else
                                            <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $user) }}"><i
                                            class="fas fa-edit"></i></a>
                                        @endif
                                        
                                    </td>
                                    <td>
                                        @if ($user->hasRole(['Administrador']))
                                            <label class="bg-success text-white px-3 py-1 ">Administrador</label>
                                        @elseif($user->hasRole(['Moderador']))
                                            <label class="bg-primary text-white px-3 py-1 ">Moderador</label>
                                        @elseif($user->hasRole(['Gerencia']))
                                            <label class="bg-yellow text-white px-3 py-1 ">Gerencia</label>
                                        @else
                                            <button wire:click="destroy({{ $user->id }})" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        @endif
                                    </td>

                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="4">No se encuentran registros</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>There are no records</strong>
            </div>
        @endif



    </div>
</div>