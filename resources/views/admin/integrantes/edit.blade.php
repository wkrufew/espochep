@extends('adminlte::page')

@section('title', 'ESPOCH EP')

@section('content_header')
    <h1>Editar Datos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($integrante, ['route' => ['admin.integrantes.update',$integrante], 'method' => 'put', 'files' => true, 'autocomplete' => 'off']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre del Integrante: ') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Escriba un nombre', 'autocomplete' => 'off']) !!}
                @error('nombre')
                    <div class="alert alert-danger mt-1" role="alert">
                    <strong>Ups!</strong>{{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('cargo', 'Cargo: ') !!}
                {!! Form::text('cargo', null, ['class' => 'form-control' . ($errors->has('cargo') ? ' is-invalid' : ''), 'placeholder' => 'Escriba un cargo', 'autocomplete' => 'off']) !!}
                @error('cargo')
                    <div class="alert alert-danger mt-1" role="alert">
                        <strong>Ups!</strong>{{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <p class=""><b>Nota:</b> Seleccion una imagen de (200x400)px</p>
                {!! Form::file('file', ['class' => 'form-input', 'accept' => 'image/*', 'id' => 'file']) !!}
                @error('file')
                    <div class="alert alert-danger mt-1" role="alert">
                        <strong>Ups!</strong>{{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            <div class="text-center">
                @if ($integrante->url)
                    <img id="picture" style="border-radius: 8px;" src="{{Storage::url($integrante->url)}}" width="100px" alt="">
                @else
                    <img id="picture" style="border-radius: 8px;" src="https://cdn.pixabay.com/photo/2020/04/06/13/37/coffee-5009730_960_720.png" width="100px" alt="">
                @endif              
            </div>
            {!! Form::submit('Actualizar Datos', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    document.getElementById("file").addEventListener('change', cambiarImagen);

    function cambiarImagen(event) {
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("picture").setAttribute('src', event.target.result);
        };

        reader.readAsDataURL(file);
    }
</script>
@stop