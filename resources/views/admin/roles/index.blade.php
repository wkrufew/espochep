@extends('adminlte::page')

@section('title', 'ESPOCH EP')

@section('content_header')
    <h1>Listado de Roles</h1>
@stop

@section('content')
@if (session('notificacion'))
    <div class="alert alert-success" role="alert">
        <strong>Exito! </strong> {{ session('notificacion') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card">
<div class="card-header">
    <a class="btn btn-primary mt-2" href="{{ route('admin.roles.create') }}">Crear Role</a>
</div>

<div class="card-body table-responsive">
    <table class="table table-striped table-hover">
        <thead class="thead-dark ">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th colspan="1"> </th>
                <th>Opcion</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td width="10px">
                        <a class="btn btn-primary" href="{{ route('admin.roles.edit', $role) }}"><i
                                class="fas fa-edit"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No se encuentran registros</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop