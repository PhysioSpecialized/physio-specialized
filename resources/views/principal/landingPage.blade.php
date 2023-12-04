<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Physio-Specialized | Principal</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <!-- PERSONAL STYLES -->
     <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  </head>
  <body id="inicio">
   <!-- Navigation-->
   <nav class="navbar navbar-expand-lg navbar-dark navbar-blue fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#inicio">
                Physio <span>Specialized</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#categorias">Categorias</a></li>
                    <li class="nav-item"><a class="nav-link" href="#acercaDe">Acerca de</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="mt-5 d-flex justify-content-center align-items-center">
        <div class="position-relative text-left">
            <img src="{{ asset('img/principal.jpeg') }}" class="img-fluid mb-5" alt="..."
                style="width: 100vw; max-height: 80vh; object-fit: cover;" />
    
            
            <div class="image-text mb-2">
                <h1 class="display-1 text-white position-absolute top-50 start-0 translate-middle-y ms-5" style="font-size: 6rem;">
                    <span class="fw-bold">MENS SANA</span><br>
                    <span class="fw-light">IN CORPORE</span><br>
                    <span class="fw-light">SANO</span>
                </h1>
            </div>
        </div>
    </div>
    


       <!-- Categorias section-->
       <section id="categorias" class="mt-5 mb-5">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="fs-1 ms-3" style="color: #193c94">CATEGORIAS</h2>



                    <h4 class="fw-light fs-5 mt-3 mb-5 ms-4 text-secondary">Espacio diseñado especialmente para que tengas acceso a guias de ejercicios terapéuticos,infovideos y mas. Pensando siempre en lo mejor para ti.</h4>

                    <div class="container mt-3 mb-5">
                        <div class="row row-cols-2">
                            @forelse ($categorias as $categoria)
                                <div class="col mb-4">
                                    <div class="card p-0">
                                        <div class="card-header fs-3 fw-bold text-white text-center" style="background-color: {{ $categoria->color_encabezado }}">
                                            {{ $categoria->nombre_categoria }}
                                        </div>
                                        <div class="card-body m-0 p-0">
                                            <div style="height: 200px; overflow: hidden;">
                                                <img src="{{ asset('storage/img/' . $categoria->img_path) }}" class="w-100 border-0" style="object-fit: cover; height: 100%;">
                                            </div>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <a href="{{ route('ejercicios', $categoria->id_categoria) }}" class="fs-5 mt-3 me-3 mb-3 text-decoration-none" style="cursor: pointer; color:cornflowerblue">Ver ejercicios</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="ms-3 fw-bold">No se encontraron categorías, nos encontramos en mantenimiento!</p>
                            @endforelse
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </section>


<!-- acerca de section-->
<section id="acercaDe" class="mt-5 mb-5">
    <div class="text-white mb-5" style="background-color: #193c94">
        <div class="container px-4 text-center">
            <div class="row">
                <div class="col-md-6 mt-5">
                    <p class="lead mt-5 text-start mb-3 mt-5">
                        Physio Specialized ofrece servicios de terapia física y ocupacional personalizado para cada diagnóstico.<br><br>
                        Como clínica de rehabilitación, nos capacitamos y actualizamos constantemente para ofrecerte las mejores opciones para tu rehabilitación.<br><br>
                        Nuestra meta esencial es llevar tu recuperación al siguiente nivel para que vuelvas a tus actividades de la vida laboral, deportiva o escolar con calidad.
                    </p>
                    
                </div>
                
                <div class="col-md-6 text-center">
                    <h2 class="fs-1 mt-5">ACERCA DE</h2>
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid">
                </div>
            </div>
            
        </div>
    </div>
    
</section>   


<!-- Contacto section -->
<section id="contacto" class="mt-5 mb-5">
    <div class="container px-4">
        <div class="card">
            <div class="card-body">

                <h2 class="fs-1 mt-3" style="color: #193c94">CONTACTO</h2>
                <hr class="text-secondary mb-5">

                <div class="row">
                    <div class="col-md-6">  
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30972.612385811!2d-89.58342103036325!3d13.983792431673358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f62e8a88f74c611%3A0x334dedcda18267cd!2sSanta%20Ana!5e0!3m2!1sen!2ssv!4v1701665991352!5m2!1sen!2ssv" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                     
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                          
                            <li class="mb-3 mt-4 ms-5">
                            <p class="fs-3 mb-3" style="color: #193c94"><i class="fas fa-map-marker-alt me-4" style="color: #193c94"></i>Santa Ana, El Salvador</p>
                            <p class="fs-3 mb-3" style="color: #193c94"><i class="fas fa-phone-alt me-4" style="color: #193c94"></i>7777-7777</p>
                            <p class="fs-3 mb-3" style="color: #193c94"><i class="fab fa-whatsapp me-4" style="color: #193c94"></i>7777-7777</p>

                            <p class="fs-3 mb-3" style="color: #193c94"><i class="fab fa-facebook me-3" style="color: #193c94"></i> <a class="text-decoration-none" style="cursor: pointer; color:#193c94" href="#" target="_blank">Phisio Specialized</a></p>
                            
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    

<footer class="py-3" style="background-color: #193c94">
    <div class="container px-4">
        <p class="m-0 text-center text-white fs-5">Copyright &copy; Physio -  <a href="{{ route('acceder') }}" class="text-white text-decoration-none"  style="cursor: pointer">Specialized</a></p>
       
    </div>
</footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>