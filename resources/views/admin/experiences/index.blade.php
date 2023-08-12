@extends('layouts.app_2')
@section('title', 'Experiencia Laboral')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Experia Laboral</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Experia Laboral</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span class="add-cofig-user" data-toggle="modal" data-target="#modalNewEducation"><i class="fa fa-plus float-right" aria-hidden="true"></i></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Cargo</th>
                                <th scope="col">Empresa</th>
                                <th scope="col">Color</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($experiences as $experience)
                                <tr>
                                    <td>{{$experience->cargo}}</td>
                                    <td>{{$experience->nombre_empresa}}</td>
                                    <td><div style="width: 40px!important; height: 40px!important; border-radius: 50%; background-color: {{$experience->color}};"></div></td>
                                    <td>
                                        <div class="btn-group">
                                            <a title="Editar" data-toggle="modal" data-target="#modalEditExperiences_{{ $loop->iteration }}" class="btn btn-warning">
                                                <svg class="edit-white" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <style>.edit-white{fill:#fafafa!important;}</style>
                                                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                                </svg>
                                            </a>
                                            <form method="post" action="{{route('admin.experiences.destroy', $experience)}}" id="eliminarExperiences_{{ $loop->iteration }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a title="Eliminar" onclick="document.getElementById('eliminarExperiences_{{ $loop->iteration }}').submit()" class="btn btn-danger space-icon-option-special">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            <a title="Detalle" data-toggle="modal" data-target="#modalShowExperiences_{{ $loop->iteration }}" class="btn btn-success space-icon-option-special">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modalEditExperiences_{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Educación</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{route('admin.experiences.update', $experience)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-12 col-md-12">
                                                            <div class="form-group">
                                                                <label for="cargo">Cargo:</label>
                                                                <input type="text" value="{{$experience->cargo}}" class="form-control form-control-border" name="cargo" id="cargo" placeholder="Escriba su cargo">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-12">
                                                            <div class="form-group">
                                                                <label for="tipo_empleo">Tipo de empleo</label>
                                                                <select class="custom-select form-control-border" name="tipo_empleo" id="tipo_empleo">
                                                                    <option value="{{$experience->tipo_empleo}}" selected >{{$experience->tipo_empleo}}</option>
                                                                    <option value=""  disabled>Selecciona una opción</option>
                                                                    <option value="Jornada completa">Jornada completa</option>
                                                                    <option value="Jornada parcial">Jornada parcial</option>
                                                                    <option value="Autónomo">Autónomo</option>
                                                                    <option value="Profesional independiente">Profesional independiente</option>
                                                                    <option value="Contrato temporal">Contrato temporal</option>
                                                                    <option value="Contrato de prácticas">Contrato de prácticas</option>
                                                                    <option value="Contrato de formación">Contrato de formación</option>
                                                                    <option value="Temporal">Temporal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-12">
                                                            <div class="form-group">
                                                                <label for="nombre_empresa">Nombre de la empresa:</label>
                                                                <input type="text" value="{{$experience->nombre_empresa}}" class="form-control form-control-border" name="nombre_empresa" id="nombre_empresa" placeholder="Escriba el nombre de la empresa">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="ubicacion">Ubicación</label>
                                                                <input type="text" value="{{$experience->ubicacion}}" class="form-control form-control-border" name="ubicacion" id="ubicacion" placeholder="Escriba la ubicación de la empresa">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="tipo_ubicacion">Tipo de ubicación:</label>
                                                                <select class="custom-select form-control-border" name="tipo_ubicacion" id="tipo_ubicacion">
                                                                    <option value="{{$experience->tipo_ubicacion}}">{{$experience->tipo_ubicacion}}</option>
                                                                    <option disabled>Seleccionar</option>
                                                                    <option value="Híbrido">Híbrido</option>
                                                                    <option value="Remoto">Remoto</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="date_init">Fecha de Incio:</label>
                                                                <input type="date" value="{{$experience->date_init}}" class="form-control form-control-border" name="date_init" id="date_init">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="date_finish">Fecha de Final:</label>
                                                                <input type="date" value="{{$experience->date_finish}}" class="form-control form-control-border" name="date_finish" id="date_finish">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="color">Color:</label>
                                                                <input type="color" value="{{$experience->color}}" class="form-control form-control-border" name="color" id="color">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-12">
                                                            <div class="form-group">
                                                                <label for="description_{{$loop->iteration}}">activity</label>
                                                                <textarea name="description" id="description_{{$loop->iteration}}" cols="30" rows="10">{{$experience->description}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-warning">Editar Experiencia Laboral</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalShowExperiences_{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
    <div class="modal fade" id="modalNewEducation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Experiencia Laboral</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.experiences.store')}}" method="post">
                        @csrf
                        @method('Post')
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="cargo">Cargo:</label>
                                    <input type="text" class="form-control form-control-border" name="cargo" id="cargo" placeholder="Escriba su cargo">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="tipo_empleo">Tipo de empleo</label>
                                    <select class="custom-select form-control-border" name="tipo_empleo" id="tipo_empleo">
                                        <option selected disabled>Selecciona una opción</option>
                                        <option value="Jornada completa">Jornada completa</option>
                                        <option value="Jornada parcial">Jornada parcial</option>
                                        <option value="Autónomo">Autónomo</option>
                                        <option value="Profesional independiente">Profesional independiente</option>
                                        <option value="Contrato temporal">Contrato temporal</option>
                                        <option value="Contrato de prácticas">Contrato de prácticas</option>
                                        <option value="Contrato de formación">Contrato de formación</option>
                                        <option value="Temporal">Temporal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombre_empresa">Nombre de la empresa:</label>
                                    <input type="text" class="form-control form-control-border" name="nombre_empresa" id="nombre_empresa" placeholder="Escriba el nombre de la empresa">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="ubicacion">Ubicación</label>
                                    <input type="text" class="form-control form-control-border" name="ubicacion" id="ubicacion" placeholder="Escriba la ubicación de la empresa">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="tipo_ubicacion">Tipo de ubicación:</label>
                                    <select class="custom-select form-control-border" name="tipo_ubicacion" id="tipo_ubicacion">
                                        <option value="Presencial">Presencial</option>
                                        <option value="Híbrido">Híbrido</option>
                                        <option value="Remoto">Remoto</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="date_init">Fecha de Incio:</label>
                                    <input type="date" class="form-control form-control-border" name="date_init" id="date_init">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="date_finish">Fecha de Final:</label>
                                    <input type="date" class="form-control form-control-border" name="date_finish" id="date_finish">
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
                                    <label for="description">activity</label>
                                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Crear Experiencia Laboral</button>
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
            placeholder: 'Descripcion...',
            tabsize: 2,
            height: 250
        });
        @foreach($experiences as $experience)
        $('#description_{{$loop->iteration}}').summernote({
            placeholder: 'Descripcion...',
            tabsize: 2,
            height: 250
        });
        @endforeach
    </script>
@endsection
