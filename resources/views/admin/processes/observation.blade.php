@extends('adminlte::page')

@section('title', 'ESPOCH EP')

@section('content_header')
    
@stop

@section('content')


    <div class="card">
        {!! Form::open(['route' => ['admin.process.reject', $process]]) !!}
        <div class="card-header">
            <h5>Observació del Proceso <strong>{{ $process->title_es }}</h5>
        </div>

        <div class="card-body table-responsive pt-4">
          
                {!! Form::label('body', 'Detalle: ') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''), 'placeholder' => 'Escriba la observacion de manera detallada', 'autocomplete' => 'off']) !!}
                @error('body')
                    <div class="alert alert-danger mt-1" role="alert">
                        <strong>Ups!</strong>{{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror

               
            
        </div>
        <div class="card-footer">
            {!! Form::submit('Reachazar Proceso', ['class' => 'btn btn-primary mt-3']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('css')

@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop
