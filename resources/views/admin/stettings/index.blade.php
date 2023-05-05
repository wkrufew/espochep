@extends('adminlte::page', ['iFrameEnabled' => false])

@section('title', 'ESPOCH EP')

@section('content_header')
    <h1>Datos de la empresa</h1>
@stop

@section('content')
    @livewire('administrador.setting-company')
@stop

@section('css')
   
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop