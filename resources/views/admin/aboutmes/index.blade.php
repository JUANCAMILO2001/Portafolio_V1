@extends('layouts.app_2')
@section('title','Qué Hago')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Qué Hago</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Qué Hago</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span class="add-cofig-user" data-toggle="modal" data-target="#modalQuehago"><i class="fa fa-plus float-right" aria-hidden="true"></i></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Logo</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Color</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($aboutmes as $aboutme)
                                <tr>
                                    <td>
                                        <img class="img-fluid" width="50px" src="{{asset('storage/'. $aboutme->logo_skill)}}" alt="{{$aboutme->title_skill}}">
                                    </td>
                                    <td>{{$aboutme->title_skill}}</td>
                                    <td>
                                        <div style="width: 50px; height: 25px; border-radius: 10px; background-color: {{$aboutme->color_skill}};"></div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a title="Editar" data-toggle="modal" data-target="#modalEditQuehago_{{ $loop->iteration }}" class="btn btn-warning">
                                                <svg class="edit-white" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <style>.edit-white{fill:#fafafa!important;}</style>
                                                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                                </svg>
                                            </a>
                                            <form method="post" action="{{route('admin.aboutmes.destroy', $aboutme)}}" id="eliminarAboutme_{{ $loop->iteration }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a title="Eliminar" onclick="document.getElementById('eliminarAboutme_{{ $loop->iteration }}').submit()" class="btn btn-danger space-icon-option-special">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            <a title="Detalle" data-toggle="modal" data-target="#modalShowQuehago_{{ $loop->iteration }}" class="btn btn-success space-icon-option-special">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Editar que hago-->
                                <form action="{{route('admin.aboutmes.update',$aboutme)}}" method="post" enctype="multipart/form-data">
                                    <div class="modal fade" id="modalEditQuehago_{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Editar Skill {{$aboutme->title_skill}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-12 col-md-12">
                                                            <div class="form-group">
                                                                <label for="logo_skill">Logo:</label>
                                                                <input type="file" value="{{$aboutme->logo_skill}}" class="form-control form-control-border" name="logo_skill" id="logo_skill">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="title_skill">Titulo:</label>
                                                                <input type="text" value="{{$aboutme->title_skill}}" class="form-control form-control-border" name="title_skill" id="title_skill" placeholder="Escriba el Titulo">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="color_skill">Color:</label>
                                                                <input type="color" value="{{$aboutme->color_skill}}" class="form-control form-control-border" name="color_skill" id="color_skill">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-12">
                                                            <div class="form-group">
                                                                <label for="summernote_{{ $loop->iteration }}">description_skill:</label>
                                                                <textarea cols="30" rows="30" name="description_skill" id="summernote_{{ $loop->iteration }}">{{$aboutme->description_skill}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Editar Skill</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- Modal Show que hago-->
                                <div class="modal fade" id="modalShowQuehago_{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detalles de Skill - {{$aboutme->title_skill}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img class="img-fluid"  src="{{asset('storage/'. $aboutme->logo_skill)}}" alt="">
                                                    </div>
                                                    <div class="col-9" >
                                                        <label >{{$aboutme->title_skill}}</label><br>
                                                        <div style="width: 50px; height: 25px; border-radius: 10px; background-color: {{$aboutme->color_skill}};"></div>
                                                        {!! $aboutme->description_skill !!}

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
    <!-- Modal new que hago-->
    <div class="modal fade" id="modalQuehago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Skill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('admin.aboutmes.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('Post')
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="logo_skill">Logo:</label>
                                    <input type="file" class="form-control form-control-border" name="logo_skill" id="logo_skill">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="title_skill">Titulo:</label>
                                    <input type="text" class="form-control form-control-border" name="title_skill" id="title_skill" placeholder="Escriba el Titulo">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="color_skill">Color:</label>
                                    <input type="color" class="form-control form-control-border" name="color_skill" id="color_skill">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="summernote">description_skill:</label>
                                    <textarea cols="30" rows="30" name="description_skill" id="summernote"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Crear Skill</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Descripcion...',
            tabsize: 2,
            height: 250
        });
    </script>
    @foreach($aboutmes as $aboutme)
    <script>

        $('#summernote_{{ $loop->iteration }}').summernote({
            placeholder: 'Sobre Mi',
            tabsize: 2,
            height: 250
        });

    </script>
    @endforeach
@endsection
