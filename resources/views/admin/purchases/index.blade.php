@extends('adminlte::page')

@section('title', 'ESPOCH EP')

@section('content_header')
    <h1>Listado de Tipo de Compras</h1>
@stop

@section('content')
@if (session('notificacion'))
<div class="alert alert-success" role="alert">
    <strong>Exito!</strong>{{ session('notificacion') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card">
<div class="card-header">
    <a class="btn btn-primary" href="{{ route('admin.purchases.create') }}">Crear Tipo de Compra</a>
</div>

<div class="card-body table-responsive">
    <table class="table table-striped table-hover table-sm text-center">
        <thead class="thead-dark ">
            <tr>
                <th>No.</th>
                <th>Tipo de Compra (Es)</th>
                <th>Tipo de Compra (En)</th>
                <th colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($purchases as $key=>$purchase)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $purchase->name_es }}</td>
                    <td>{{ $purchase->name_en }}</td>
                    <td width="10px">
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.purchases.edit', $purchase) }}"><i
                                class="fas fa-edit"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{ route('admin.purchases.destroy', $purchase) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="4">No existen registros</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="card-footer">
    {{$purchases->links('vendor/pagination/bootstrap-5')}}
</div>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop