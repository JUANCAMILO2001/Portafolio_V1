@extends('layouts.app_2')
@section('title', 'Inicio')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Inicio</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Usuario</h3>
                </div>
                <div class="icon">
                    <i class="fa fa-user nav-icon" aria-hidden="true"></i>
                </div>
                <a href="{{route('admin.users.index')}}" class="small-box-footer">Ir ¡Ahora! <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Redes Sociales</h3>
                </div>
                <div class="icon">
                    <i class="fa fa-heart nav-icon"></i>
                </div>
                <a href="{{route('admin.socialnetworks.index')}}" class="small-box-footer">Ir ¡Ahora! <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>Resumen</h3>
                </div>
                <div class="icon">
                    <i class="fa fa-file nav-icon" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">Ir ¡Ahora! <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 class="text-white">Portafolio</h3>
                </div>
                <div class="icon">
                    <i class="fas fa-briefcase nav-icon "></i>
                </div>
                <a href="#" class="small-box-footer " style="color: #fff!important; ">Ir ¡Ahora! <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Contactos</h3>
                </div>
                <div class="icon">
                    <i class="nav-icon far fa-envelope"></i>
                </div>
                <a href="#" class="small-box-footer">Ir ¡Ahora! <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
@endsection
