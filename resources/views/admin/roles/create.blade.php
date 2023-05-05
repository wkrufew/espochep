@extends('adminlte::page', ['iFrameEnabled' => false])

@section('title', 'ESPOCH EP')

@section('content_header')
    <h1>Crear un Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
            
                @include('admin.roles.partials.form')
            
                {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary mt-2']) !!}
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