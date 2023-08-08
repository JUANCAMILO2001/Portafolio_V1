@extends('layouts.app_2')
@section('title', 'Redes Sociales')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Redes Sociales</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                    <li class="breadcrumb-item active">Redes Sociales</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <span class="add-cofig-user" data-toggle="modal" data-target="#modalRedSocial"><i class="fa fa-plus float-right" aria-hidden="true"></i></span>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Icono</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Link</th>
                            <th scope="col">Color</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($socialnetworks as $socialnetwork)
                            <tr>
                                <td><i class="{{$socialnetwork->logo}}"></i></td>
                                <td>{{$socialnetwork->name}}</td>
                                <td>{{$socialnetwork->link}} <a href="{{$socialnetwork->link}}" target="_blank" class="float-right"><i class="fa-solid fa-eye"></i></a></td>
                                <td>
                                    <div style="background: {{$socialnetwork->color}}; width: 50px; height: 20px; border-radius: 4px;"></div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a title="Editar" data-toggle="modal" data-target="#modalEditRedSocial_{{ $loop->iteration }}" class="btn btn-warning">
                                            <svg class="edit-white" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                <style>.edit-white{fill:#fafafa!important;}</style>
                                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                            </svg>
                                        </a>
                                        <form method="post" action="{{route('admin.socialnetworks.destroy', $socialnetwork)}}" id="eliminarRedsocial_{{ $loop->iteration }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a title="Eliminar" onclick="document.getElementById('eliminarRedsocial_{{ $loop->iteration }}').submit()" class="btn btn-danger space-icon-option-special">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal edit Red social-->
                            <div class="modal fade" id="modalEditRedSocial_{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Red Social</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="{{route('admin.socialnetworks.update',$socialnetwork)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="logo">Icono <span class="cursor-pointer icon-show-special" data-toggle="modal" data-target="#modalShowIcons">Ver iconos Disponibles</span>:</label>
                                                            <input type="text" value="{{$socialnetwork->logo}}" class="form-control form-control-border" name="logo" id="logo" placeholder="Escriba el logo">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Nombre</label>
                                                            <input type="text" value="{{$socialnetwork->name}}" class="form-control form-control-border" name="name" id="name" placeholder="Escriba el Nombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="link">Link:</label>
                                                            <input type="url" value="{{$socialnetwork->link}}" class="form-control form-control-border" name="link" id="link" placeholder="Escriba el Link">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="color">Color:</label>
                                                            <input type="color" value="{{$socialnetwork->color}}" class="form-control form-control-border" name="color" id="color">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success">Editar Red Social</button>
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

<!-- Modal new Red social-->
<div class="modal fade" id="modalRedSocial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Red Social</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('admin.socialnetworks.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('Post')
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="logo">Icono <span class="cursor-pointer icon-show-special" data-toggle="modal" data-target="#modalShowIcons">Ver iconos Disponibles</span>:</label>
                                <input type="text" class="form-control form-control-border" name="logo" id="logo" placeholder="Escriba el logo">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control form-control-border" name="name" id="name" placeholder="Escriba el Nombre">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="link">Link:</label>
                                <input type="url" class="form-control form-control-border" name="link" id="link" placeholder="Escriba el Link">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="color">Color:</label>
                                <input type="color" class="form-control form-control-border" name="color" id="color">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Crear Red Social</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Show Icon-->
<div class="modal fade" id="modalShowIcons" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Iconos Disponible</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Copie el icono que necesite:</label>
                <div class="row">
                    <div class="col-2 text-center icon-container" data-class="fab fa-facebook">
                        <i class="fab fa-facebook"></i>
                        <p>Facebook</p>
                    </div>
                    <div class="col-2 text-center icon-container" data-class="fab fa-twitter">
                        <i class="fab fa-twitter"></i>
                        <p>Twitter</p>
                    </div>
                    <div class="col-2 text-center icon-container" data-class="fab fa-instagram">
                        <i class="fab fa-instagram"></i>
                        <p>Instagram</p>
                    </div>
                    <div class="col-2 text-center icon-container" data-class="fa-brands fa-tiktok">
                        <i class="fa-brands fa-tiktok"></i>
                        <p>Tik Tok</p>
                    </div>
                    <div class="col-2 text-center icon-container" data-class="fab fa-github">
                        <i class="fab fa-github"></i>
                        <p>Git</p>
                    </div>
                    <div class="col-2 text-center icon-container" data-class="fab fa-linkedin">
                        <i class="fab fa-linkedin"></i>
                        <p>Linkedin</p>
                    </div>
                    <div class="col-2 text-center icon-container" data-class="fa-brands fa-line">
                        <i class="fa-brands fa-line"></i>
                        <p>Line</p>
                    </div>
                    <div class="col-2 text-center icon-container" data-class="fa-brands fa-wix">
                        <i class="fa-brands fa-wix"></i>
                        <p>Wix</p>
                    </div>
                    <div class="col-2 text-center icon-container" data-class="fa-brands fa-pinterest">
                        <i class="fa-brands fa-pinterest"></i>
                        <p>Pinterest</p>
                    </div>
                    <div class="col-2 text-center icon-container" data-class="fa-brands fa-wikipedia-w">
                        <i class="fa-brands fa-wikipedia-w"></i>
                        <p>Wikipedia</p>
                    </div>
                    <div class="col-12 mt-3 d-flex justify-content-center">
                        <a href="{{route('admin.socialnetworks.index')}}" class="btn btn-success">Ver todos los Iconos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const iconContainers = document.querySelectorAll('.icon-container');

    iconContainers.forEach(container => {
        container.addEventListener('click', () => {
            const iconClass = container.getAttribute('data-class');
            copyToClipboard(iconClass);
            alert('Clase de icono copiada: ' + iconClass);
        });
    });

    async function copyToClipboard(text) {
        try {
            await navigator.clipboard.writeText(text);
        } catch (err) {
            console.error('No se pudo copiar al portapapeles: ', err);
        }
    }
</script>
@endsection
