
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio template</title>
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
    </style>
</head>
<body>
<div class="container">
    <div class="profile-p1">
        <div class="profile-card">
            <div class="profile-pic">
                <img src="{{asset('user/imagen/user.jpeg')}}" alt="user avatar">
            </div>
            <div class="profile-details">
                <div class="intro">
                    <h2>Juan Camilo Rodriguez Ramirez</h2>
                    <h4>Software Developer</h4>
                    <div class="social">
                        <a href="#"><i class="fab fa-facebook " id="color-icon-user-1"></i></a>
                        <a href="#"><i class="fab fa-twitter" id="color-icon-user-2"></i></a>
                        <a href="#"><i class="fa-brands fa-github" id="color-icon-user-3"></i></a>
                        <a href="#"><i class="fab fa-linkedin" id="color-icon-user-4"></i></a>
                    </div>
                </div>
                <div class="contact-info">
                    <div class="row">
                        <div class="icon">
                            <i class="fa-solid fa-mobile-screen-button color-user-cont-1"></i>
                        </div>
                        <div class="content">
                            <span>Teléfono:</span>
                            <h5>+57 304 268 65 88</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icon">
                            <i class="fa-solid fa-envelope color-user-cont-2"></i>
                        </div>
                        <div class="content">
                            <span>Correo eléctronico:</span>
                            <h5>juan.camilorodrigez@gmail.com</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icon">
                            <i class="fa-solid fa-location-dot color-user-cont-3"></i>
                        </div>
                        <div class="content">
                            <span>Dirección:</span>
                            <h5>Calle falsa 12 #63-55</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icon">
                            <i class="fa-solid fa-calendar-days color-user-cont-4"></i>
                        </div>
                        <div class="content">
                            <span>Año de nacimiento:</span>
                            <h5>06 Apr, 2001</h5>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="download-btn"><i class="fa fa-download"></i> Descargar CV</button>
                </div>
            </div>
        </div>
    </div>
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
            <p>
                Lorem ipsum dolor sit amet consectetur adipiscing elit per cursus,
                facilisi est ligula nunc magnis parturient netus sapien. Lacus dignissim
                cras fringilla aenean sodales purus hendrerit metus ullamcorper, lacinia
                vehicula ultrices non nulla pellentesque tempor morbi. Turpis nam dictumst
                libero egestas faucibus luctus sollicitudin volutpat eget felis malesuada
                curae consequat, tempus quis ornare at iaculis quisque facilisis eu
                etiam penatibus sociosqu ridiculus. Taciti aptent magna donec
                tortor sociis rhoncus massa enim tincidunt sagittis himenaeos
                suscipit hac pulvinar neque, primis bibendum orci elementum inceptos
                justo vulputate fames ultricies vitae nibh eleifend suspendisse. Maecenas
                convallis lectus laoreet dui mi congue leo viverra nisl euismod posuere velit
                potenti, sem porta aliquet pretium mus placerat augue arcu nascetur eros tristique
                cubilia. Aliquam tellus litora duis id vivamus, et porttitor scelerisque fermentum
                dapibus, cum quam mauris nisi. Commodo interdum phasellus erat habitasse conubia in
                odio a varius semper, venenatis nostra platea sed ut nullam accumsan class auctor nec,
                feugiat curabitur mattis ante senectus dis torquent risus montes. Imperdiet blandit
                condimentum ad integer mollis vestibulum vel fusce pharetra natoque urna, praesent ac proin
                molestie rutrum lobortis diam habitant gravida dictum.
            </p>
            <h2>¿Qué hago?</h2>
            <div class="work">
                <div class="workbox">
                    <div class="icon">
                        <img src="{{asset('user/imagen/ui.svg')}}" alt="ui">
                    </div>
                    <div class="desc">
                        <h3>UI/UX Designer</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipiscing elit per cursus,
                            facilisi est ligula nunc magnis parturient netus sapien. Lacus dignissim
                            cras fringilla aenean sodales purus hendrerit metus ullamcorper, lacinia
                            vehicula ultrices non nulla pellentesque tempor morbi. Turpis nam dictumst
                            libero egestas faucibus luctus sollicitudin volutpat eget felis malesuada
                            curae consequat, tempus quis ornare at iaculis quisque facilisis eu
                        </p>
                    </div>
                </div>
                <div class="workbox">
                    <div class="icon">
                        <img src="{{asset('user/imagen/app.svg')}}" alt="ui">
                    </div>
                    <div class="desc">
                        <h3>App Developement</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipiscing elit per cursus,
                            facilisi est ligula nunc magnis parturient netus sapien. Lacus dignissim
                            cras fringilla aenean sodales purus hendrerit metus ullamcorper, lacinia
                            vehicula ultrices non nulla pellentesque tempor morbi. Turpis nam dictumst
                            libero egestas faucibus luctus sollicitudin volutpat eget felis malesuada
                            curae consequat, tempus quis ornare at iaculis quisque facilisis eu
                        </p>
                    </div>
                </div>
                <div class="workbox">
                    <div class="icon">
                        <img src="{{asset('user/imagen/api.svg')}}" alt="ui">
                    </div>
                    <div class="desc">
                        <h3>Api designer</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipiscing elit per cursus,
                            facilisi est ligula nunc magnis parturient netus sapien. Lacus dignissim
                            cras fringilla aenean sodales purus hendrerit metus ullamcorper, lacinia
                            vehicula ultrices non nulla pellentesque tempor morbi. Turpis nam dictumst
                            libero egestas faucibus luctus sollicitudin volutpat eget felis malesuada
                            curae consequat, tempus quis ornare at iaculis quisque facilisis eu
                        </p>
                    </div>
                </div>
                <div class="workbox">
                    <div class="icon">
                        <img src="{{asset('user/imagen/web.svg')}}" alt="ui">
                    </div>
                    <div class="desc">
                        <h3>Web Designer</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipiscing elit per cursus,
                            facilisi est ligula nunc magnis parturient netus sapien. Lacus dignissim
                            cras fringilla aenean sodales purus hendrerit metus ullamcorper, lacinia
                            vehicula ultrices non nulla pellentesque tempor morbi. Turpis nam dictumst
                            libero egestas faucibus luctus sollicitudin volutpat eget felis malesuada
                            curae consequat, tempus quis ornare at iaculis quisque facilisis eu
                        </p>
                    </div>
                </div>
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
