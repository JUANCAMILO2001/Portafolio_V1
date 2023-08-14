@extends('layouts.app_2')
@section('title', 'Portafolio')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Portafolio</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Portafolio</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span class="add-cofig-user" data-toggle="modal" data-target="#modalNewJobs"><i class="fa fa-plus float-right" aria-hidden="true"></i></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Url</th>
                                <th scope="col">Color</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job)
                                <tr>
                                    <td>
                                        <img style="width: 35px; height: 35px; border-radius: 50%;"
                                             src="{{asset('storage/'.$job->imagen)}}"
                                             alt="">
                                    </td>
                                    <td>{{$job->title}}</td>
                                    <td>{{$job->url}} <a target="_blank" href="{{$job->url}}"><span class="float-right btn btn-success"><i class="fa-solid fa-eye"></i></span></a></td>
                                    <td><div style="background: {{$job->color}}; width: 44px; height: 38px; border-radius: 6px"></div></td>
                                    <td>
                                        <div class="btn-group">
                                            <a title="Editar" data-toggle="modal" data-target="#modalEditJobs_{{ $loop->iteration }}" class="btn btn-warning">
                                                <svg class="edit-white" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <style>.edit-white{fill:#fafafa!important;}</style>
                                                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                                </svg>
                                            </a>
                                            <form method="post" action="{{route('admin.jobs.destroy', $job)}}" id="eliminarJobs_{{ $loop->iteration }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a title="Eliminar" onclick="document.getElementById('eliminarJobs_{{ $loop->iteration }}').submit()" class="btn btn-danger space-icon-option-special">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            <a title="Detalle" data-toggle="modal" data-target="#modalShowJobs_{{ $loop->iteration }}" class="btn btn-success space-icon-option-special">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modalEditJobs_{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Trabajo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{route('admin.jobs.update', $job)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-12 col-md-12">
                                                            <div class="form-group">
                                                                <label for="title">Nombre:</label>
                                                                <input value="{{$job->title}}" type="text" class="form-control form-control-border" name="title" id="title" placeholder="Escriba el nombre">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="imagen">Imagen:</label>
                                                                <input value="{{$job->imagen}}" type="file" class="form-control form-control-border" name="imagen" id="imagen">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="tag">Tag:</label>
                                                                <input value="{{$job->tag}}" type="text" class="form-control form-control-border" name="tag" id="tag" placeholder="Escriba el tag">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="client">Cliente:</label>
                                                                <input value="{{$job->client}}" type="text" class="form-control form-control-border" name="client" id="client" placeholder="Escriba el cliente">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="lenguajes">Lenguaje:</label>
                                                                <input value="{{$job->lenguajes}}" type="text" class="form-control form-control-border" name="lenguajes" id="lenguajes" placeholder="Escriba el lenguaje">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="color">Color:</label>
                                                                <input value="{{$job->color}}" type="color" class="form-control form-control-border" name="color" id="color">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-12">
                                                            <div class="form-group">
                                                                <label for="url">Url:</label>
                                                                <input value="{{$job->url}}" type="url" class="form-control form-control-border" name="url" id="url" placeholder="Escriba la url">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-12">
                                                            <div class="form-group">
                                                                <label for="descriptionEdit_{{$loop->iteration}}">Descripción:</label>
                                                                <textarea name="description" id="descriptionEdit_{{$loop->iteration}}" cols="30" rows="10">{{$job->description}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-warning">Editar Trabajo</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalShowJobs_{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detalle del Trabajo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12 col-md-12">
                                                        <img width="200px" src="{{asset('storage/'. $job->imagen)}}" alt="">
                                                    </div>
                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="title">Nombre:</label>
                                                            <input disabled value="{{$job->title}}" type="text" class="form-control form-control-border" name="title" id="title" placeholder="Escriba el nombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="tag">Tag:</label>
                                                            <input disabled value="{{$job->tag}}" type="text" class="form-control form-control-border" name="tag" id="tag" placeholder="Escriba el tag">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="client">Cliente:</label>
                                                            <input disabled value="{{$job->client}}" type="text" class="form-control form-control-border" name="client" id="client" placeholder="Escriba el cliente">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="lenguajes">Lenguaje:</label>
                                                            <input disabled value="{{$job->lenguajes}}" type="text" class="form-control form-control-border" name="lenguajes" id="lenguajes" placeholder="Escriba el lenguaje">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="color">Color:</label>
                                                            <input disabled value="{{$job->color}}" type="color" class="form-control form-control-border" name="color" id="color">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="url">Url:</label>
                                                            <input disabled value="{{$job->url}}" type="url" class="form-control form-control-border" name="url" id="url" placeholder="Escriba la url">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="descriptionEdit">Descripción:</label>
                                                            {!! $job->description !!}
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
    <div class="modal fade" id="modalNewJobs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Trabajo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('admin.jobs.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('Post')
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="title">Nombre:</label>
                                    <input type="text" class="form-control form-control-border" name="title" id="title" placeholder="Escriba el nombre">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="imagen">Imagen:</label>
                                    <input type="file" class="form-control form-control-border" name="imagen" id="imagen">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="tag">Tag:</label>
                                    <input type="text" class="form-control form-control-border" name="tag" id="tag" placeholder="Escriba el tag">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="client">Cliente:</label>
                                    <input type="text" class="form-control form-control-border" name="client" id="client" placeholder="Escriba el cliente">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="lenguajes">Lenguaje:</label>
                                    <input type="text" class="form-control form-control-border" name="lenguajes" id="lenguajes" placeholder="Escriba el lenguaje">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="color">Color:</label>
                                    <input type="color" class="form-control form-control-border" name="color" id="color">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="url">Url:</label>
                                    <input type="url" class="form-control form-control-border" name="url" id="url" placeholder="Escriba la url">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="description">Descripción:</label>
                                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Crear Trabajo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#description').summernote({
            placeholder: 'Descripcion del trabajo...',
            tabsize: 2,
            height: 250
        });
        @foreach($jobs as $job)
        $('#descriptionEdit_{{$loop->iteration}}').summernote({
            placeholder: 'Descripcion del trabajo...',
            tabsize: 2,
            height: 250
        });
        @endforeach
    </script>
@endsection
