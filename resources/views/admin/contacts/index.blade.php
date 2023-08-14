@extends('layouts.app_2')
@section('title', 'Contactos')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Contactos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Contactos</li>
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
                                <th scope="col">Correo</th>
                                <th scope="col">Asunto</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->asunto}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a title="Detalle" data-toggle="modal" data-target="#modalShowContacts_{{ $loop->iteration }}" class="btn btn-success space-icon-option-special">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modalShowContacts_{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Mensaje del Contacto: {{$contact->name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="name">Nombre:</label>
                                                            <input disabled value="{{$contact->name}}" type="text" class="form-control form-control-border" id="name" placeholder="Nombre del contacto">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="email">Correo Eléctronico:</label>
                                                            <input disabled value="{{$contact->email}}" type="email" class="form-control form-control-border" id="email" placeholder="Correo eléctronico del contacto">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="asunto">Asunto:</label>
                                                            <input disabled value="{{$contact->asunto}}" type="text" class="form-control form-control-border" id="asunto" placeholder="Asunto del contacto">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="message">Mensaje:</label>
                                                            <p id="message">{{$contact->message}}</p>
                                                        </div>
                                                    </div>
                                                </div>
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

@endsection
