@extends('layouts.app_2')
@section('title', 'Configuraciones del Usuario')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Configuraciones del usuario</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                    <li class="breadcrumb-item active">Configuraciones del Usuario</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Configuraciones del Usuario
            </div>
            <div class="card-body">
                info
            </div>
        </div>
    </div>
</div>
@endsection
