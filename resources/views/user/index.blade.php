
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio template</title>
    <link rel="icon" href="{{asset('logo_portafolio.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/fontawesome-free-6.4.0-web/css/all.min.css')}}">
    <style>
        :root{
            --porcent: 180deg;
            --porcent-n: -180deg;
            --title-porcent: "Laravel";
            --number-porcent: "100%";
            --porcent-2: 30deg;
            --porcent-n-2: -30deg;
            --title-porcent-2: "Angular";
            --number-porcent-2: "20%";
        }
        .circular-progress {
        &,
        &::before,
        &::after {
             width: 10rem;
             height: 10rem;
             border-radius: 50%;
         }
        margin: auto;
        position: relative;
        transform: rotate(var(--porcent));
        background: linear-gradient(0deg, #fff 50%, #5f5f5f 50%);
        &::before,
        &::after {
             position: absolute;
             top: 0;
             left: 0;
             text-align: center;
             color: #fff;
         }
        &::before {
             content: var(--title-porcent);
             background: #1d1d1d content-box;
             border-radius: 50%;
             padding: 0.5em;
             box-sizing: border-box;
             font-size: 1.5rem;
             line-height: 7rem;
             transform: rotate(var(--porcent-n));
         }
        &::after {
             content: var(--number-porcent);
             background: linear-gradient(transparent 50%, #1d1d1d 50%);
             transform: scale(1.1) rotate(var(--porcent-n));
             line-height: 11rem;
         }
        }
        .circular-progress-2 {
        &,
        &::before,
        &::after {
             width: 10rem;
             height: 10rem;
             border-radius: 50%;
         }
        margin: auto;
        position: relative;
        transform: rotate(var(--porcent-2));
        background: linear-gradient(0deg, red 50%, #5f5f5f 50%);
        &::before,
        &::after {
             position: absolute;
             top: 0;
             left: 0;
             text-align: center;
             color: #fff;
         }
        &::before {
             content: var(--title-porcent-2);
             background: #1d1d1d content-box;
             border-radius: 50%;
             padding: 0.5em;
             box-sizing: border-box;
             font-size: 1.5rem;
             line-height: 7rem;
             transform: rotate(var(--porcent-n-2));
         }
        &::after {
             content: var(--number-porcent-2);
             background: linear-gradient(transparent 50%, #1d1d1d 50%);
             transform: scale(1.1) rotate(var(--porcent-n-2));
             line-height: 11rem;
         }
        }
        @foreach($socialnetworks as $socialnetwork)
            #color-icon-user-{{$socialnetwork->id}}{
                color: {{$socialnetwork->color}};
            }
            .profile-details .intro .social #color-icon-user-{{$socialnetwork->id}}:hover{
                background-color: {{$socialnetwork->color}};
                color: #ddd;
            }
        @endforeach
        #prueba-12 span{
            color: #555!important;
        }

        #work-special p{
            color: #555!important;
        }
        #work-special p span{
            color: #555!important;
        }
        #work-special ul li span{
            color: #555!important;
        }

    </style>
</head>
<body>
<div class="container">
    @foreach($users as $user)
        <div class="profile-p1">
        <div class="profile-card">
            <div class="profile-pic">
                <img src="{{asset('storage/'.$user->profile_photo_path)}}" alt="user avatar">
            </div>
            <div class="profile-details">
                <div class="intro">
                    <h2>{{$user->name}} {{$user->lastname}}</h2>
                    <h4>{{$user->descriptionprofesional}}</h4>
                        <div class="social">
                            @foreach($socialnetworks as $socialnetwork)
                                <a href="{{$socialnetwork->link}}" title="{{$socialnetwork->name}}">
                                    <i class="{{$socialnetwork->logo}} " id="color-icon-user-{{$socialnetwork->id}}"></i>
                                </a>
                            @endforeach
                        </div>
                </div>
                <div class="contact-info">
                    <div class="row">
                        <div class="icon">
                            <i class="fa-solid fa-mobile-screen-button color-user-cont-1"></i>
                        </div>
                        <div class="content">
                            <span>Teléfono:</span>
                            <h5>{{$user->phone}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icon">
                            <i class="fa-solid fa-envelope color-user-cont-2"></i>
                        </div>
                        <div class="content">
                            <span>Correo eléctronico:</span>
                            <h5>{{$user->email}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icon">
                            <i class="fa-solid fa-location-dot color-user-cont-3"></i>
                        </div>
                        <div class="content">
                            <span>Dirección:</span>
                            <h5>{{$user->address}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icon">
                            <i class="fa-solid fa-calendar-days color-user-cont-4"></i>
                        </div>
                        <div class="content">
                            <span>Año de nacimiento:</span>
                            <h5>{{$user->birthdate}}</h5>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="{{asset('storage/' . $user->cv)}}" download="" class="download-btn"><i class="fa fa-download"></i> Descargar CV</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div>
        <nav class="asidebar">
            <ul>
                <li>
                    <a href="#about-me-link" class="dot dot-active" data-scroll="about-me-link">
                        <span>Sobre mi</span>
                    </a>
                </li>
                <li>
                    <a href="#resumen-link" class="dot" data-scroll="resumen-link">
                        <span>Resumen</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="content-principal" >
        <!-- Navbar section -->
        <div class="nav">
            <div class="navbar">
                <a href="#about-me-link">
                    <div class="link-nav link-nav-2 active"  id="nav-icon-color-1">
                        <i class="fa-regular fa-user"></i>
                        <h4>Sobre Mi</h4>
                    </div>
                </a>
                <a href="#resumen-link">
                    <div class="link-nav link-nav-2"  id="nav-icon-color-2">
                        <i class="fa-regular fa-file-lines"></i>
                        <h4>Resumen</h4>
                    </div>
                </a>
                <a href="#portafolio">
                    <div class="link-nav link-nav-2"  id="nav-icon-color-3">
                        <i class="fas fa-briefcase"></i>
                        <h4>Portafolio</h4>
                    </div>
                </a>
                <a href="#contact">
                    <div class="link-nav link-nav-2"  id="nav-icon-color-4">
                        <i class="fa-solid fa-address-book"></i>
                        <h4>Contacto</h4>
                    </div>
                </a>
            </div>
        </div>
        <!-- About section -->
        <div class="about sec" id="about-me-link">
            <h1>Sobre Mi</h1>
            @foreach($users as $user)

                <div id="prueba-12">
                    {!!$user->descriptionAboutme!!}
                </div>
            @endforeach

            <h2>¿Qué hago?</h2>
            <div class="work" id="work-special">
                @foreach($aboutmes as $aboutme)
                    <div class="workbox">
                    <div class="icon">
                        <img src="{{asset('storage/'. $aboutme->logo_skill)}}" alt="ui">
                    </div>
                    <div class="desc">
                        <h3>{{$aboutme->title_skill}}</h3>
                        {!! $aboutme->description_skill !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="special-section sec" id="resumen-link">
        <!-- Resumen section -->
        <div class="about-2">
            <h1>Resumen</h1>
            <div class="work-2" style="display: grid;">
                <div>
                    <h3 style="color: #fff;"><i class="fa-solid fa-user-graduate resumen-icon-special"></i> Educación</h3>
                    <div class="workbox-2">
                        <div class="desc-2">
                            <p >
                                Sena
                            </p>
                            <p >
                                23-05-2023
                            </p>
                            <p>Finalizado</p>
                            <p>
                                Tecnologo analisis y desarrollo sistemas de informacion
                            </p>
                        </div>
                    </div>
                    <div class="workbox-2">
                        <div class="desc-2">
                            <p>
                                Instituto Tecnico industrial Piloto
                            </p>
                            <p >
                                23-05-2023
                            </p>
                            <p>Finalizado</p>
                            <p >
                                Bachiller Tecnico Industial
                            </p>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 style="color: #fff;"><i class="fa-solid fa-briefcase resumen-icon-special"></i> Experiencia</h3>
                    <div class="workbox-2">
                        <div class="desc-2 ">
                            <p >
                                Universidad de los andes
                            </p>
                            <p >
                                23-05-2023
                            </p>
                            <p >
                                Finalizado
                            </p>
                            <div class="prueba-lineTime">
                                <p >
                                    Desarrollador de software
                                </p>

                            </div>
                            <div class="prueba-lineTime">
                                <p>
                                    Técnico en soporte
                                </p>
                            </div>


                        </div>
                    </div>
                    <div class="workbox-2">
                        <div class="desc-2">
                            <p >
                                Ferreteria caball
                            </p>
                            <p >
                                23-05-2023
                            </p>
                            <p >
                                Finalizado
                            </p>
                            <p>
                                Auxiliar de Bodega
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 100%; background-color: #1d1d1d; padding: 1rem; border-radius: 10px;">
                <div class="work-2" style="display: grid;">
                    <div style="width: 100%;">
                        <h3 style="color: #fff; margin-bottom: 20px;">Working Skills</h3>
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="width: 50%;">
                                <div class="circular-progress"></div>
                            </div>
                            <div style="width: 50%;">
                                <div class="circular-progress-2"></div>
                            </div>
                        </div>
                    </div>
                    <div style="width: 100%;">
                        <h3 style="color: #fff; margin-bottom: 20px;">Conocimientos</h3>
                        <div style="width:100%; display: flex; flex-wrap: wrap;">
                            <div style="margin-bottom: 10px; margin-right: 5px; min-height: 35px; padding: 0.5rem; min-width: 60px; background: #302e2e; display: flex; justify-content: center; align-items: center; border-radius: 10px;">
                                <span style="font-weight: bold; letter-spacing: 2px; color: #fff;" >C#</span>
                            </div>
                            <div style="margin-bottom: 10px; margin-right: 5px; min-height: 35px; padding: 0.5rem; min-width: 60px; background: #302e2e; display: flex; justify-content: center; align-items: center; border-radius: 10px;">
                                <span style="font-weight: bold; letter-spacing: 2px; color: #fff;" >Docker</span>
                            </div>
                            <div style="margin-bottom: 10px; margin-right: 5px; min-height: 35px; padding: 0.5rem; min-width: 60px; background: #302e2e; display: flex; justify-content: center; align-items: center; border-radius: 10px;">
                                <span style="font-weight: bold; letter-spacing: 2px; color: #fff;" >Mysql</span>
                            </div>
                            <div style="margin-bottom: 10px; margin-right: 5px; min-height: 35px; padding: 0.5rem; min-width: 60px; background: #302e2e; display: flex; justify-content: center; align-items: center; border-radius: 10px;">
                                <span style="font-weight: bold; letter-spacing: 2px; color: #fff;" >Posgres</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $(window).on('scroll', function(){

            var link = $('.asidebar a.dot');
            var top = $(window).scrollTop();

            $('.sec').each(function(){
                var id = $(this).attr('id');
                var height = $(this).height();
                var offset = $(this).offset().top - 150;
                if(top >= offset && top < offset + height){
                    link.removeClass('dot-active');
                    $('.asidebar').find('[data-scroll="' + id + '"]').addClass('dot-active');
                }
            });
        });


    });
</script>
</body>
</html>