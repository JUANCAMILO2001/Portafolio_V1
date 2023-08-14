<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Portafolio Juan Camilo Ramirez</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/fontawesome-free-6.4.0-web/css/all.min.css')}}">
    @yield('style')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<form action="{{route('logout')}}" method="post" id="cerrar">
    @csrf
</form>
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{url('admin/dist/img/AdminLTELogo.png')}}" alt="PortafolioJC" height="60" width="60">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('dashboard')}}" class="nav-link">Inicio</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" title="Cerrar Sesión">
                    <i class="fa fa-power-off" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="card card-widget widget-user card-special">
                        <div class="widget-user-header text-white" style="background: url('{{asset('admin/dist/img/photo1.png')}}') center center;">
                        </div>
                        <div class="widget-user-image">
                            <div class="img-circle-special">
                                <img class="img-special-circle"  src="{{asset('storage/' . auth()->user()->profile_photo_path)}}" alt="User Avatar">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <h3 class="widget-user-username">{{auth()->user()->name}} {{auth()->user()->lastname}}</h3>
                                <h5 class="widget-user-desc">{{auth()->user()->email}}</h5>
                            </div>
                        </div>
                    </div>
                    <a class="dropdown-item dropdown-footer btn"  onclick="document.getElementById('cerrar').submit()">
                        <i class="fa fa-power-off" aria-hidden="true"></i> Cerrar Sesión
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('dashboard')}}" class="brand-link">
            <span class="brand-text font-weight-light">Portafolio JC</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <div class="aside-img-special">
                        <img class="aside-special-img" src="{{asset('storage/' . auth()->user()->profile_photo_path)}}"  alt="User Image">
                    </div>
                </div>
                <div class="info">
                    <a href="{{route('dashboard')}}" class="d-block">{{auth()->user()->name}} {{auth()->user()->lastname}}</a>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link @if($_SERVER['REQUEST_URI'] === "/dashboard") active @endif">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Inicio
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.index')}}" class="nav-link @if($_SERVER['REQUEST_URI'] === "/") active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Inicio Portafolio
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Opciones del sistema</li>
                    <!--Menu de Usuario-->
                    <li class="nav-item">
                        <a href="{{route('admin.users.index')}}" class="nav-link @if($_SERVER['REQUEST_URI'] === "/admin/users") active @endif">
                            <i class="fa fa-user nav-icon" aria-hidden="true"></i>
                            <p>
                                Usuario
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.socialnetworks.index')}}" class="nav-link @if($_SERVER['REQUEST_URI'] === "/admin/socialnetworks") active @endif">
                            <i class="fa fa-heart nav-icon"></i>
                            <p>
                                Redes Sociales
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.aboutmes.index')}}" class="nav-link @if($_SERVER['REQUEST_URI'] === "/admin/aboutmes") active @endif">
                            <i class="fa-solid fa-bolt nav-icon"></i>
                            <p>
                                Qué Hago
                            </p>
                        </a>
                    </li>
                    <!--Menu de Resumen-->
                    <li class="nav-item">
                        <a href="#" class="nav-link  @if($_SERVER['REQUEST_URI'] === "/admin/educations" || $_SERVER['REQUEST_URI'] === "/admin/experiences" || $_SERVER['REQUEST_URI'] === "/admin/workingskills" || $_SERVER['REQUEST_URI'] === "/admin/knowledges") active @endif ">
                            <i class="fa fa-file nav-icon" aria-hidden="true"></i>
                            <p>
                                Resumen
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item ">
                                <a href="{{route('admin.educations.index')}}" class="nav-link @if($_SERVER['REQUEST_URI'] === "/admin/educations") active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Educación</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.experiences.index')}}" class="nav-link @if($_SERVER['REQUEST_URI'] === "/admin/experiences") active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Experiencia Laboral</p>
                                </a>
                            </li>
                            <!--
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Cursos</p>
                                </a>
                            </li>
                            -->
                            <li class="nav-item">
                                <a href="{{route('admin.workingskills.index')}}" class="nav-link @if($_SERVER['REQUEST_URI'] === "/admin/workingskills") active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Working Skills</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.knowledges.index')}}" class="nav-link @if($_SERVER['REQUEST_URI'] === "/admin/knowledges") active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Conocimientos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--Menu de Portafolio-->
                    <li class="nav-item">
                        <a href="{{route('admin.jobs.index')}}" class="nav-link  @if($_SERVER['REQUEST_URI'] === "/admin/jobs") active @endif">
                            <i class="fas fa-briefcase nav-icon "></i>
                            <p>
                                Portafolio
                            </p>
                        </a>
                    </li>
                    <!--Menu de Contact-->
                    <li class="nav-item">
                        <a href="{{route('admin.contacts.index')}}" class="nav-link  @if($_SERVER['REQUEST_URI'] === "/admin/contacts") active @endif">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Contactos
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content ">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2023 <a href="https://adminlte.io">Portafolio JC</a>.</strong>
        Todos los derechos son reservados.
        <div class="float-right d-none d-sm-inline-block">
            <b>V</b> 1.0
        </div>
    </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('admin/dist/js/demo.js')}}"></script>
@yield('js')
</body>
</html>
