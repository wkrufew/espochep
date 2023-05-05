@extends('adminlte::page')

@section('title', 'ESPOCH EP')

@section('content_header')
    <h1>Crear un Tipo de Compra</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.purchases.store']) !!}
            <div class="form-group">
                {!! Form::label('name_es', 'Nombre en Español: ') !!}
                {!! Form::text('name_es', null, ['class' => 'form-control' . ($errors->has('name_es') ? ' is-invalid' : ''), 'placeholder' => 'Escriba un tipo en español', 'autocomplete' => 'off']) !!}
                @error('name_es')
                    <div class="alert alert-danger mt-1" role="alert">
                    <strong>Ups!</strong>{{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('name_en', 'Nombre en Ingles: ') !!}
                {!! Form::text('name_en', null, ['class' => 'form-control' . ($errors->has('name_en') ? ' is-invalid' : ''), 'placeholder' => 'Escriba un tipo en ingles', 'autocomplete' => 'off']) !!}
                @error('name_en')
                    <div class="alert alert-danger mt-1" role="alert">
                    <strong>Ups!</strong>{{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            {!! Form::submit('Crear Tipo de Compra', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop