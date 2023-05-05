@extends('adminlte::page')

@section('title', 'ESPOCH EP')

@section('content_header')
    <h1>Listado de Categorias</h1>
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
            <a class="btn btn-primary" href="{{ route('admin.integrantes.create') }}">Ingresar Integrante</a>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-striped table-hover table-sm text-center">
                <thead class="thead-dark ">
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody id="integrantes">
                    @forelse ($integrantes as $key=>$integrante)
                        <tr data-id="{{$integrante->id}}">
                            <td>{{ $key + 1 }}</td>
                            <td class="handler"><img class="cursor" style="border-radius: 50%" src="{{ Storage::url($integrante->url) }}" height="40px;"
                                    width="40px;" alt=""></td>
                            <td>{{ $integrante->nombre }}</td>
                            <td>{{ $integrante->cargo }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.integrantes.edit', $integrante) }}"><i
                                        class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.integrantes.destroy', $integrante) }}" method="POST">
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
      {{--   <div class="card-footer">
            {{ $integrantes->links('vendor/pagination/bootstrap-5') }}
        </div> --}}
    </div>
@stop

@section('css')
    <style>
        .cursor{
            cursor: grab;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.3/axios.min.js" integrity="sha512-L4lHq2JI/GoKsERT8KYa72iCwfSrKYWEyaBxzJeeITM9Lub5vlTj8tufqYk056exhjo2QDEipJrg6zen/DDtoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        new Sortable(integrantes, {
            handle: '.handler',
            animation: 150,
            ghostClass: 'bg-secondary',
            store: {
                set: function (sortable) {
                    const sorts = sortable.toArray();
                    
                    axios.post("{{ route('api.sort.integrantes') }}", {
                        sorts: sorts
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            }
        });
    </script>
@stop
