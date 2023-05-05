@extends('adminlte::page')

@section('title', 'ESPOCH EP')

@section('content_header')
    <h1>Slider Portada</h1>
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
            <a class="btn btn-primary" href="{{ route('admin.sliders.create') }}">Crear Slider</a>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-striped table-hover table-sm text-center">
                <thead class="thead-dark ">
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Titulo</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody id="sliders">
                    @forelse ($sliders as $key=>$slider)
                        <tr data-id="{{$slider->id}}">
                            <td>{{ $key + 1 }}</td>
                            <td class="handler">
                                @if ($slider->url_img)
                                    <img class="cursor" style="border-radius: 50%" src="{{ Storage::url($slider->url_img) }}" height="40px;" width="40px;" alt="">
                                @else
                                    <span>Sin Imagen</span>
                                @endif
                            </td>
                            <td>{{ $slider->title_es }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.sliders.edit', $slider) }}"><i
                                        class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST">
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
        new Sortable(sliders, {
            handle: '.handler',
            animation: 150,
            ghostClass: 'bg-secondary',
            store: {
                set: function (sortable) {
                    const sorts = sortable.toArray();
                    
                    axios.post("{{ route('api.sort.sliders') }}", {
                        sorts: sorts
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            }
        });
    </script>
@stop
