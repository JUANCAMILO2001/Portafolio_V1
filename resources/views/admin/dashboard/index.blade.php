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
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Qué Hago</h3>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-bolt nav-icon"></i>
                </div>
                <a href="{{route('admin.aboutmes.index')}}" class="small-box-footer">Ir ¡Ahora! <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <h2 class="col-12">Resumen</h2>
        <div class="col-md-3 col-sm-6 col-12">
            <a href="{{route('admin.educations.index')}}">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa-solid fa-user-graduate"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Educación</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <a href="{{route('admin.experiences.index')}}">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa-solid fa-briefcase"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Expercia Laboral</span>
                    </div>
                </div>
            </a>
        </div>
        <!--
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa-solid fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Cursos</span>
                </div>
            </div>
        </div>
        -->
        <div class="col-md-3 col-sm-6 col-12">
            <a href="{{route('admin.workingskills.index')}}">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa-solid fa-fire"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Working Skill</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <a href="{{route('admin.knowledges.index')}}">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa-solid fa-paper-plane"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Conocimientos</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 class="text-white">Portafolio</h3>
                </div>
                <div class="icon">
                    <i class="fas fa-briefcase nav-icon "></i>
                </div>
                <a href="{{route('admin.jobs.index')}}" class="small-box-footer " style="color: #fff!important; ">Ir ¡Ahora! <i class="fas fa-arrow-circle-right"></i></a>
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
