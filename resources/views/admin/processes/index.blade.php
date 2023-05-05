@extends('adminlte::page')

@section('title', 'ESPOCH EP')

@section('content_header')
    <h1>Procesos de Aprobacion</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body table-responsive">
        @if(session('info'))   
            <div class="alert alert-success" role="alert">
            {{session('info')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif
        @if(session('rechazo'))   
            <div class="alert alert-danger" role="alert">
            {{session('rechazo')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif
        <table class="table table-striped table-hover table-sm">
            <thead class="thead-dark ">
                <tr>
                    <th>No.</th>
                    <th>Titulo</th>
                    <th>Codigo</th>
                    <th>Tipo<th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($processes as $key => $process)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$process->title_es}}</td>
                        <td>{{$process->code}}</td>
                        <td>{{$process->purchase->name_es}}</td>
                        <td colspan="2" class="flex justify-center">
                            <a class="btn btn-sm btn-primary" href="{{route('admin.process.show', $process)}}"><i class="fas fa-eye mr-2"></i>Revisar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No existen registros </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>
    <div class="card-footer">
        {{$processes->links('vendor/pagination/bootstrap-5')}}
    </div>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop