@extends('layouts.app_2')
@section('title', 'Conocimientos')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Conocimientos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Conocimientos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span class="add-cofig-user" data-toggle="modal" data-target="#modalNewKnowledge"><i class="fa fa-plus float-right" aria-hidden="true"></i></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($knowledges as $knowledge)
                                <tr>
                                    <td>{{$knowledge->name}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a title="Editar" data-toggle="modal" data-target="#modalEditKnowledge_{{ $loop->iteration }}" class="btn btn-warning">
                                                <svg class="edit-white" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <style>.edit-white{fill:#fafafa!important;}</style>
                                                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                                </svg>
                                            </a>
                                            <form method="post" action="{{route('admin.knowledges.destroy', $knowledge)}}" id="eliminarKnowledge_{{ $loop->iteration }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a title="Eliminar" onclick="document.getElementById('eliminarKnowledge_{{ $loop->iteration }}').submit()" class="btn btn-danger space-icon-option-special">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modalEditKnowledge_{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Conocimiento</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{route('admin.knowledges.update',$knowledge)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-12 col-md-12">
                                                            <div class="form-group">
                                                                <label for="name">Nombre:</label>
                                                                <input value="{{$knowledge->name}}" type="text" class="form-control form-control-border" name="name" id="name" placeholder="Escriba el nombre">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-warning">Editar Conocimiento</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalNewKnowledge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Conocimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('admin.knowledges.store')}}" method="post">
                        @csrf
                        @method('Post')
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <input type="text" class="form-control form-control-border" name="name" id="name" placeholder="Escriba el nombre">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Crear Conocimiento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
