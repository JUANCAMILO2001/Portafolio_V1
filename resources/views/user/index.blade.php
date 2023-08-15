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
        @foreach($workingskills as $workingskill)
        :root{
            --porcent_{{$workingskill->id}}: {{$workingskill->porcentage . 'deg'}};
            --porcent-n_{{$workingskill->id}}: {{'-'.$workingskill->porcentage . 'deg'}};
            --title-porcent_{{$workingskill->id}}: "{{$workingskill->title}}";
            --color-porcent_{{$workingskill->id}}: {{$workingskill->color}};
            --number-porcent_{{$workingskill->id}}: "{{ round(($workingskill->porcentage / 180) * 100) }}%";
        }
        .circular-progress_{{$workingskill->id}} {
        &,
        &::before,
        &::after {
             width: 10rem;
             height: 10rem;
             border-radius: 50%;
         }
        margin: auto;
        position: relative;
        transform: rotate(var(--porcent_{{$workingskill->id}}));
        background: linear-gradient(0deg, var(--color-porcent_{{$workingskill->id}}) 50%, #5f5f5f 50%);
        &::before,
        &::after {
             position: absolute;
             top: 0;
             left: 0;
             text-align: center;
             color: #fff;
         }
        &::before {
             content: var(--title-porcent_{{$workingskill->id}});
             background: #1d1d1d content-box;
             border-radius: 50%;
             padding: 0.5em;
             box-sizing: border-box;
             font-size: 1.5rem;
             line-height: 7rem;
             transform: rotate(var(--porcent-n_{{$workingskill->id}}));
         }
        &::after {
             content: var(--number-porcent_{{$workingskill->id}});
             background: linear-gradient(transparent 50%, #1d1d1d 50%);
             transform: scale(1.1) rotate(var(--porcent-n_{{$workingskill->id}}));
             line-height: 11rem;
         }
        }
        @endforeach
        @foreach($socialnetworks as $socialnetwork)
            #color-icon-user-{{$socialnetwork->id}}{
                color: {{$socialnetwork->color}};
            }
            .profile-details .intro .social #color-icon-user-{{$socialnetwork->id}}:hover{
                background-color: {{$socialnetwork->color}};
                color: #ddd;
            }
        @endforeach
        @foreach($educations as $education)
            .modal_{{ $loop->iteration }} {
                --transform: translateY(-100vh);
                --transition: transform .8s;
            }
            .modal--show_{{ $loop->iteration }}{
                opacity: 1;
                pointer-events: unset;
                transition: opacity .6s;
                --transform: translateY(0);
                --transition: transform .8s .8s;
                z-index: 100;
            }
        @endforeach
        @foreach($experiences as $experience)
            .modalExperiences_{{ $loop->iteration }} {
                --transform: translateY(-100vh);
                --transition: transform .8s;
            }
            .modal--showExperiences_{{ $loop->iteration }}{
                opacity: 1;
                pointer-events: unset;
                transition: opacity .6s;
                --transform: translateY(0);
                --transition: transform .8s .8s;
                z-index: 100;
            }
        @endforeach

         @foreach($jobs as $job)
            .modalJobs_{{ $loop->iteration }} {
            --transform: translateY(-100vh);
            --transition: transform .8s;
        }
        .modal--showJobs_{{ $loop->iteration }}{
            opacity: 1;
            pointer-events: unset;
            transition: opacity .6s;
            --transform: translateY(0);
            --transition: transform .8s .8s;
            z-index: 100;
        }
        @endforeach

    </style>
</head>
<body>
<div class="cursor"></div>
<div class="container">
    <div id="whatsapp">
        <a href="https://wa.link/c6d6sz" target="_blank" id="toggle1" class="wtsapp">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>
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
                            <h5>{{\Carbon\Carbon::parse($user->birthdate)->format('d, M, Y')}}</h5>
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
                <li>
                    <a href="#portafolio-link" class="dot" data-scroll="portafolio-link">
                        <span>Portafolio</span>
                    </a>
                </li>
                <li>
                    <a href="#contacto-link" class="dot" data-scroll="contacto-link">
                        <span>Contacto</span>
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
                <a href="#portafolio-link">
                    <div class="link-nav link-nav-2"  id="nav-icon-color-3">
                        <i class="fas fa-briefcase"></i>
                        <h4>Portafolio</h4>
                    </div>
                </a>
                <a href="#contacto-link">
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
            <div class="work-2 work-2-about-special">
                <div>
                    <h3 class="title-work-2-about-special">
                        <i class="fa-solid fa-user-graduate resumen-icon-special"></i> Educación
                    </h3>
                    @foreach($educations as $education)
                        <div class="workbox-2 hero__cta hero__cta_{{ $loop->iteration }}">
                            <div class="desc-2">
                                <p class="title-education-special">
                                    {{$education->institution}}
                                </p>
                                <p class="descriptions-education-special">
                                    {{$education->title}}
                                </p>
                                <p class="descriptions-education-special">
                                    <span title="Fecha de inicio">{{\Carbon\Carbon::parse($education->date_init)->format('M, Y')}}</span> • <span title="Fecha Final">{{\Carbon\Carbon::parse($education->date_finish)->format('M, Y')}}</span>
                                </p>
                                <p class="descriptions-education-special shows-education-special">
                                    Ver más
                                </p>
                            </div>
                        </div>
                        <section class="modal modal_{{ $loop->iteration }}">
                            <div class="modal__container">
                                <div class="close-modal-special">
                                    <a href="#" class="modal__close modal__close_{{ $loop->iteration }}">X</a>
                                </div>
                                <h2>{{$education->institution}}</h2>
                                <p class="p-special-model-content-1">{{$education->title}}</p>
                                <p class="p-special-model-content">
                                    <?php
                                        $startDate = \Carbon\Carbon::parse($education->date_init);
                                        $endDate = \Carbon\Carbon::parse($education->date_finish);

                                        $monthsDifference = $startDate->diffInMonths($endDate);
                                        $yearsDifference = $startDate->diffInYears($endDate);
                                    ?>
                                    <span title="Fecha de inicio">{{\Carbon\Carbon::parse($education->date_init)->format('M, Y')}}</span> • <span title="Fecha Final">{{\Carbon\Carbon::parse($education->date_finish)->format('M, Y')}}</span> • <span>{{$monthsDifference . ' meses'}} @if($yearsDifference > 0) {{' y'. $yearsDifference .'años' }} @endif</span>
                                </p>

                                <div class="modal-content-special">
                                    <label>Actividades:</label>
                                    <style>
                                        .special-div-content-education span{
                                            font-weight: 500;
                                        }
                                    </style>
                                    <div class="special-div-content-education">
                                        {!! $education->activity !!}
                                    </div>
                                    <label>Descripción:</label>
                                    <div class="special-div-content-education">
                                        {!! $education->description !!}
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endforeach
                </div>
                <div>
                    <h3 class="title-work-2-about-special">
                        <i class="fa-solid fa-briefcase resumen-icon-special"></i> Experiencia
                    </h3>
                    <!--

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


                    -->
                    @foreach($experiences as $experience)
                        <div class="workbox-2 hero__cta hero__ctaExperiences_{{ $loop->iteration }}">
                            <div class="desc-2 ">
                                <p title="Cargo" class="title-education-special">
                                    {{$experience->cargo}}
                                </p>
                                <p title="Empresa" class="descriptions-education-special">
                                    {{$experience->nombre_empresa}}
                                </p>
                                <p title="Tipo Contrato" class="descriptions-education-special">
                                    {{$experience->tipo_empleo}}
                                </p>
                                <p title="Modalidad" class="descriptions-education-special">
                                    {{$experience->tipo_ubicacion}}
                                </p>
                                <p class="descriptions-education-special shows-education-special">
                                    Ver más
                                </p>
                            </div>
                        </div>
                        <section class="modal modalExperiences_{{ $loop->iteration }}">
                            <div class="modal__container">
                                <div class="close-modal-special">
                                    <a href="#" class="modal__close modal__closeExperiences_{{ $loop->iteration }}">X</a>
                                </div>
                                <h2>{{$experience->cargo}}</h2>
                                <p class="p-special-model-content-1">{{$experience->nombre_empresa}}</p>
                                <p class="p-special-model-content-1">{{$experience->tipo_empleo}} • {{$experience->tipo_ubicacion}}</p>
                                <p class="p-special-model-content-1">{{$experience->ubicacion}}</p>
                                <p class="p-special-model-content">
                                    <?php
                                    $startDateExperience = \Carbon\Carbon::parse($experience->date_init);
                                    $endDateExperience = \Carbon\Carbon::parse($experience->date_finish);

                                    $monthsDifferenceExperience = $startDateExperience->diffInMonths($endDateExperience);
                                    $yearsDifferenceExperience = $startDateExperience->diffInYears($endDateExperience);
                                    ?>
                                    <span title="Fecha de inicio">{{\Carbon\Carbon::parse($experience->date_init)->format('M, Y')}}</span> - <span title="Fecha Final">{{\Carbon\Carbon::parse($experience->date_finish)->format('M, Y')}}</span> • <span>{{$monthsDifferenceExperience . ' meses'}} @if($yearsDifferenceExperience > 0) {{' y'. $yearsDifferenceExperience .'años' }} @endif</span>
                                </p>
                                <div class="modal-content-special expiences-content-scroll">
                                    <label>Descripcion del cargo:</label>
                                    <div class="special-div-content-education">
                                        {!! $experience->description !!}
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endforeach
                </div>
            </div>
            <div class="div-skills-about-special">
                <div class="work-2 work-2-about-special">
                    <div class="skills-content-about-special">
                        <h3>Working Skills</h3>
                        <div class="skills-about-info-special">
                            @foreach($workingskills as $workingskill)
                                <div class="skills-about-info-special-woking">
                                    <div class="circular-progress_{{$workingskill->id}}"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="skills-content-about-special">
                        <h3>Conocimientos</h3>
                        <div class="skills-about-info-special">
                            @foreach($knowledges as $knowledge)
                                <div class="skills-conocimientos-about-special">
                                    <span>{{$knowledge->name}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="special-section sec" id="portafolio-link">
        <!-- Resumen section -->
        <div class="about-2">
            <h1>Portafolio</h1>
            <div class="container-portafolio">
                @foreach($jobs as $job)
                    <div class="card-portafolio" style="--clr:{{$job->color}};">
                        <div class="imgBX-Portafolio">
                            <img src="{{asset('storage/' . $job->imagen)}}" alt="">
                        </div>
                        <div class="content-portafolio">
                            <h2>{{$job->title}} <i class="fa-solid fa-arrow-left"></i> <i class="fa-solid fa-arrow-down"></i> </h2>
                            <?php
                            $description = $job->description;
                            $maxWords = 42; // Número máximo de palabras que deseas mostrar
                            $words = explode(' ', strip_tags($description));
                            $limitedDescription = implode(' ', array_slice($words, 0, $maxWords));
                            if (count($words) > $maxWords) {
                                $limitedDescription .= '...';
                            }
                            ?>
                            <p>{{$limitedDescription}}</p>
                            <div class="hero__ctaJobs_{{ $loop->iteration }}">
                                <a href="#">Ver</a>
                            </div>
                        </div>
                    </div>
                    <section class="modal modalJobs modalJobs_{{ $loop->iteration }}">
                        <div class="modal__container">
                            <div class="close-modal-special">
                                <a href="#" class="modal__close modal__closeJobs_{{ $loop->iteration }}">X</a>
                            </div>
                            <h2>{{$job->tag}}</h2>
                            <div class="content-modal-jobs-special">
                                <p class="p-special-model-content-Jobs">
                                    <i class="fa-regular fa-file-lines"></i> Proyecto: <span>{{$job->title}}</span>
                                </p>
                                <p class="p-special-model-content-Jobs">
                                    <i class="fa-regular fa-user"></i> Cliente: <span>{{$job->client}}</span>
                                </p>
                                <p class="p-special-model-content-Jobs">
                                    <i class="fa-solid fa-code"></i> Lenguaje: <span>{{$job->lenguajes}}</span>
                                </p>
                                <p class="p-special-model-content-Jobs" title="{{$job->url}}">
                                    <i class="fa-solid fa-up-right-from-square"></i> Ver: <span>{{substr($job->url,0,19)}}...</span> <a
                                        href="{{$job->url}}" target="_blank"><span class="ir-span" title="Ir al sitio"><i class="fa-regular fa-eye"></i></span></a>
                                </p>
                            </div>
                            <div class="content-job-special-scroll">
                                <div class="spcial-content-job-modal">
                                    {!! $job->description !!}
                                </div>
                                <div class="modal-img-jobs-special">
                                    <img src="{{asset('storage/' . $job->imagen)}}" alt="{{$job->title}}">
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
        </div>
    </div>
    <div class="special-section sec" id="contacto-link">
        <div class="about-2">
            <h1>Contacto</h1>
            <div class="content-principal-form-contact">
                <form class="form-box" action="{{route('user.send')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="form-contant">
                        <div class="input-box">
                            <input type="text" name="name" required class="valid-input">
                            <label>Nombre Completo:</label>
                        </div>
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="input-box">
                            <input type="email" name="email" required class="valid-input">
                            <label>Correo Eléctronico:</label>
                        </div>
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="input-box">
                            <input type="text" name="asunto" required class="valid-input">
                            <label>Asunto:</label>
                        </div>
                        @error('asunto')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="input-box">
                            <textarea name="message" required class="valid-input"></textarea>
                            <label>Mensaje:</label>
                        </div>
                        @error('message')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <button type="submit" class="send-btn">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('user/js/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(Session('success'))
    <script>
        Swal.fire(
            '¡Enviado!',
            '¡Hemos recibido tu mensaje, pronto estaremos en contacto con usted!',
            'success'
        )
    </script>
@endif

<script>
    $(document).ready(function() {
        var $cursor = $('.cursor');

        $(window).on('mousemove', function(e) {
            var mouseX = e.clientX;
            var mouseY = e.clientY;

            // Actualiza la posición del cursor personalizado
            $cursor.css({
                transform: `translate(${mouseX}px, ${mouseY}px)`
            });
        });
    });
</script>
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
<script>
    const validatableInputs = document.querySelectorAll('.valid-input');

    validatableInputs.forEach(input => {
        input.addEventListener('input', function () {
            if (input.value !== '') {
                input.classList.add('has-content');
            } else {
                input.classList.remove('has-content');
            }
        });
    });
</script>
@foreach($educations as $education)
    <script>
        const openModal_{{ $loop->iteration }} = document.querySelector('.hero__cta_{{ $loop->iteration }}');
        const modal_{{ $loop->iteration }} = document.querySelector('.modal_{{ $loop->iteration }}');
        const closeModal_{{ $loop->iteration }} = document.querySelector('.modal__close_{{ $loop->iteration }}');

        openModal_{{ $loop->iteration }}.addEventListener('click', (e)=>{
            e.preventDefault();
            modal_{{ $loop->iteration }}.classList.add('modal--show_{{ $loop->iteration }}');
        });

        closeModal_{{ $loop->iteration }}.addEventListener('click', (e)=>{
            e.preventDefault();
            modal_{{ $loop->iteration }}.classList.remove('modal--show_{{ $loop->iteration }}');
        });
    </script>
@endforeach
@foreach($experiences as $experience)
    <script>
        const openModalExperiences_{{ $loop->iteration }} = document.querySelector('.hero__ctaExperiences_{{ $loop->iteration }}');
        const modalExperiences_{{ $loop->iteration }} = document.querySelector('.modalExperiences_{{ $loop->iteration }}');
        const closeModalExperiences_{{ $loop->iteration }} = document.querySelector('.modal__closeExperiences_{{ $loop->iteration }}');

        openModalExperiences_{{ $loop->iteration }}.addEventListener('click', (e)=>{
            e.preventDefault();
            modalExperiences_{{ $loop->iteration }}.classList.add('modal--showExperiences_{{ $loop->iteration }}');
        });

        closeModalExperiences_{{ $loop->iteration }}.addEventListener('click', (e)=>{
            e.preventDefault();
            modalExperiences_{{ $loop->iteration }}.classList.remove('modal--showExperiences_{{ $loop->iteration }}');
        });
    </script>
@endforeach
@foreach($jobs as $job)
    <script>
        const openModalJobs_{{ $loop->iteration }} = document.querySelector('.hero__ctaJobs_{{ $loop->iteration }}');
        const modalJobs_{{ $loop->iteration }} = document.querySelector('.modalJobs_{{ $loop->iteration }}');
        const closeModalJobs_{{ $loop->iteration }} = document.querySelector('.modal__closeJobs_{{ $loop->iteration }}');

        openModalJobs_{{ $loop->iteration }}.addEventListener('click', (e)=>{
            e.preventDefault();
            modalJobs_{{ $loop->iteration }}.classList.add('modal--showJobs_{{ $loop->iteration }}');
        });

        closeModalJobs_{{ $loop->iteration }}.addEventListener('click', (e)=>{
            e.preventDefault();
            modalJobs_{{ $loop->iteration }}.classList.remove('modal--showJobs_{{ $loop->iteration }}');
        });
    </script>
@endforeach
</body>
</html>
