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
                <span class="add-cofig-user" data-toggle="modal" data-target="#modalUserConfig"><i class="fa fa-plus float-right" aria-hidden="true"></i></span>
            </div>

            <div class="card-body">
                @foreach($users as $user)
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header text-white" style="background: url('{{asset('admin/dist/img/photo1.png')}}') center center;">
                            <h3 class="widget-user-username text-right">
                                {{$user->name}} {{$user->lastname}}
                                <span class="cursor-pointer"  data-toggle="modal" data-target="#modalConfigHeader">
                                    <svg class="edit-white" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <style>.edit-white{fill:#fafafa!important;}</style>
                                        <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                    </svg>
                                </span>
                            </h3>
                            <h5 class="widget-user-desc text-right">{{$user->descriptionprofesional}}</h5>
                        </div>
                        <div class="widget-user-image">
                            <div class="img-circle-special">
                                <img class="img-special-circle" src="{{asset('storage/' .$user->profile_photo_path )}}" alt="User Avatar">
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="float-right cursor-pointer"  data-toggle="modal" data-target="#modalConfigFooter">
                                <svg class="edit-black" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <style>.edit-black{fill: #282828 !important;}</style>
                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                            </svg>
                            </span>
                            <div class="row text-center">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="user_email">Correo Eléctronico:</label><br>
                                    <p id="user_email">{{$user->email}}</p>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="user_email">Célular:</label><br>
                                    <p id="user_email">{{$user->phone}}</p>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="user_email">Fecha Nacimiento:</label><br>
                                    <p id="user_email">{{$user->birthdate}}</p>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <label for="user_email">Dirección:</label><br>
                                    <p id="user_email">{{$user->address}}</p>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <label for="user_email">Ver CV:</label><br>
                                    <!-- Hoja de vida-->
                                    <a href="{{asset('storage/'. $user->cv)}}" target="_blank" class="btn btn-primary">Ver Hoja de Vida</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="aboutMe">Sobre mi</label>
                                    <p id="aboutMe">{{$user->descriptionAboutme}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Modal new usuario-->
<div class="modal fade" id="modalUserConfig" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('Post')
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="profile_photo_path">Foto Perfil</label>
                                <input type="file" class="form-control form-control-border" name="profile_photo_path" id="profile_photo_path" placeholder="Descripción Profesional">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control form-control-border" name="name" id="name" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="lastname">Apellido</label>
                                <input type="text" class="form-control form-control-border" name="lastname" id="lastname" placeholder="Apellido">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="descriptionprofesional">Descripción Profesional</label>
                                <input type="text" class="form-control form-control-border" name="descriptionprofesional" id="descriptionprofesional" placeholder="Descripción Profesional">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="email">Correo Eléctronico:</label>
                                <input type="email"  class="form-control form-control-border" name="email" id="email" placeholder="Correo Eléctronico">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="phone">Célular:</label>
                                <input type="text"  class="form-control form-control-border" name="phone" id="phone" placeholder="Célular">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="address">Dirección:</label>
                                <input type="text" class="form-control form-control-border" name="address" id="address" placeholder="Dirección">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password"  class="form-control form-control-border" name="password" id="password" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="password_confirm">Confirmar Contraseña:</label>
                                <input type="password" class="form-control form-control-border" id="password_confirm" placeholder="Confirmar Contraseña">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="birthdate">Fecha Nacimiento:</label>
                                <input type="date" class="form-control form-control-border" name="birthdate" id="birthdate">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="cv">Hoja vida</label>
                                <input type="file" class="form-control form-control-border" name="cv" id="cv">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="descriptionAboutme">Sobre mi</label>
                                <textarea class="form-control form-control-border" name="descriptionAboutme" id="descriptionAboutme">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Crear Usuario</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal config header usuario-->
<div class="modal fade" id="modalConfigHeader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.users.update',$user)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{$user->email}}" class="form-control form-control-border" name="email" id="email" placeholder="Correo Eléctronico">
                    <input type="hidden" value="{{$user->phone}}" class="form-control form-control-border" name="phone" id="phone" placeholder="Célular">
                    <input type="hidden"  class="form-control form-control-border" name="password" id="password" placeholder="Contraseña">
                    <input type="hidden" value="{{$user->birthdate}}" class="form-control form-control-border" name="birthdate" id="birthdate">
                    <input type="hidden" value="{{$user->address}}" class="form-control form-control-border" name="address" id="address" placeholder="Dirección">
                    <input type="hidden" value="{{$user->cv}}" class="form-control form-control-border" name="cv" id="cv">

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" value="{{$user->name}}" class="form-control form-control-border" name="name" id="name" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="lastname">Apellido</label>
                                <input type="text" value="{{$user->lastname}}" class="form-control form-control-border" name="lastname" id="lastname" placeholder="Apellido">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="descriptionprofesional">Descripción Profesional</label>
                                <input type="text" value="{{$user->descriptionprofesional}}" class="form-control form-control-border" name="descriptionprofesional" id="descriptionprofesional" placeholder="Descripción Profesional">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="profile_photo_path">Foto Perfil</label>
                                <input type="file" value="{{$user->profile_photo_path}}" class="form-control form-control-border" name="profile_photo_path" id="profile_photo_path" placeholder="Descripción Profesional">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">
                        <svg class="edit-black" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                            <style>.edit-black{fill: #282828 !important;}</style>
                            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                        </svg> Editar
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal config Footer usuario-->
<div class="modal fade" id="modalConfigFooter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.users.update',$user)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{$user->name}}" class="form-control form-control-border" name="name" id="name" placeholder="Nombre">
                    <input type="hidden" value="{{$user->lastname}}" class="form-control form-control-border" name="lastname" id="lastname" placeholder="Apellido">
                    <input type="hidden" value="{{$user->descriptionprofesional}}" class="form-control form-control-border" name="descriptionprofesional" id="descriptionprofesional" placeholder="Descripción Profesional">
                    <input type="hidden" value="{{$user->profile_photo_path}}" class="form-control form-control-border" name="profile_photo_path" id="profile_photo_path" placeholder="Descripción Profesional">

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="email">Correo Eléctronico:</label>
                                <input type="email" value="{{$user->email}}" class="form-control form-control-border" name="email" id="email" placeholder="Correo Eléctronico">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="phone">Célular:</label>
                                <input type="text" value="{{$user->phone}}" class="form-control form-control-border" name="phone" id="phone" placeholder="Célular">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password"  class="form-control form-control-border" name="password" id="password" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="password_confirm">Confirmar Contraseña:</label>
                                <input type="password" class="form-control form-control-border" id="password_confirm" placeholder="Confirmar Contraseña">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="birthdate">Fecha Nacimiento:</label>
                                <input type="date" value="{{$user->birthdate}}" class="form-control form-control-border" name="birthdate" id="birthdate">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="address">Dirección:</label>
                                <input type="text" value="{{$user->address}}" class="form-control form-control-border" name="address" id="address" placeholder="Dirección">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="cv">Hoja vida</label>
                                <input type="file" value="{{$user->cv}}" class="form-control form-control-border" name="cv" id="cv">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="descriptionAboutme">Sobre Mi</label>
                                <textarea class="form-control form-control-border" name="descriptionAboutme" id="descriptionAboutme">
                                    {{$user->descriptionAboutme}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">
                        <svg class="edit-black" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                            <style>.edit-black{fill: #282828 !important;}</style>
                            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                        </svg> Editar
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
