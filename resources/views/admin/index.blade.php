@extends('adminlte::page')

@section('title', 'ESPOCH EP')

@section('content_header')
    <h1>Dashboard ESPOCH EP</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$procesos}}</h3>
                            <p>Procesos</p>
                        </div>
                        <div class="icon">
                            {{-- <i class="ion ion-bag"></i> --}}
                            <i class="fa-solid fa-gears"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$noticias}}</h3>
                            <p>Noticias</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$proyectos}}</h3>
                            <p>Proyectos</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$usuariosrol}}</h3>
                            <p>Usuarios con Rol</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$usuarios}}</h3>
                            <p>Usuarios sin Rol</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-users"></i>
                        </div>
                       {{--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$roles}}</h3>
                            <p>Roles</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-network-wired"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$revision}}</h3>
                            <p>Procesos para Revisión</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-file-lines"></i>
                        </div>
                        <a href="{{route('admin.process.index')}}" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css') }}" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('js')
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js') }}" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stop
