@extends('adminlte::page')

@section('title', 'ESPOCH EP')

@section('content_header')
    <h1>Editar Datos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($slider, ['route' => ['admin.sliders.update',$slider], 'method' => 'put', 'files' => true, 'autocomplete' => 'off']) !!}
            <div class="form-group">
                {!! Form::label('title_es', 'Titulo (Es): ') !!}
                {!! Form::text('title_es', null, ['class' => 'form-control' . ($errors->has('title_es') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un titulo en español', 'autocomplete' => 'off']) !!}
                @error('title_es')
                    <div class="alert alert-danger mt-1" role="alert">
                    <strong>Ups!</strong>{{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('title_en', 'Titulo (En): ') !!}
                {!! Form::text('title_en', null, ['class' => 'form-control' . ($errors->has('title_en') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un titulo en ingles', 'autocomplete' => 'off']) !!}
                @error('title_en')
                    <div class="alert alert-danger mt-1" role="alert">
                    <strong>Ups!</strong>{{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('subtitle_es', 'Subtitulo (Es): ') !!}
                {!! Form::text('subtitle_es', null, ['class' => 'form-control' . ($errors->has('subtitle_es') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un subtitulo en español', 'autocomplete' => 'off']) !!}
                @error('subtitle_es')
                    <div class="alert alert-danger mt-1" role="alert">
                    <strong>Ups!</strong>{{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('subtitle_en', 'Subtitulo (En): ') !!}
                {!! Form::text('subtitle_en', null, ['class' => 'form-control' . ($errors->has('subtitle_en') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un subtitulo en ingles', 'autocomplete' => 'off']) !!}
                @error('subtitle_en')
                    <div class="alert alert-danger mt-1" role="alert">
                    <strong>Ups!</strong>{{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('url_button', 'Link Redireccion: ') !!}
                {!! Form::text('url_button', null, ['class' => 'form-control' . ($errors->has('url_button') ? ' is-invalid' : ''), 'placeholder' => 'Ingresar el link', 'autocomplete' => 'off']) !!}
                @error('url_button')
                    <div class="alert alert-danger mt-1" role="alert">
                        <strong>Ups!</strong>{{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <p class=""><b>Nota:</b> Seleccion una imagen de (1080x650)px</p>
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
                @if ($slider->url_img)
                    <img id="picture" style="border-radius: 8px;" src="{{Storage::url($slider->url_img)}}" width="100px" alt="">
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