<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Physio-Specialized | Principal</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- PERSONAL STYLES -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">

</head>

<body id="inicio">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-blue fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#inicio">
                Physio <span>Specialized</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
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


    <section class="section home__section" id="home">
        <div class="container">
            <div class="row justify-content-md-center text-center">
                <div class="col-lg-6 ">
                    <h3 class="home__title">
                        MENS SANA
                        <span>IN CORPORE</span>
                        SANO
                    </h3>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="categorias">
        <div class="container">
            <h2 class="section__title">CATEGORIAS</h2>
            <p class="categoria__p">
                Espacio diseñado especialmente para que tengas acceso a guias de ejercicio terapéutico. Pensando siempre
                en lo mejor para ti.
            </p>

            <div class="card-container">
                @forelse ($categorias as $categoria)
                    <div class="card__categoria">
                        <div class="card__title" style="background-color:{{ $categoria->color_encabezado }};">
                            {{ $categoria->nombre_categoria }}
                        </div>
                        <div class="card__body">
                            <img class="card-img" src="{{ asset('storage/img/' . $categoria->img_path) }}"
                                alt="{{ $categoria->nombre_categoria }}-IMG">
                        </div>
                        <div class="card__footer text-end">
                            <a href="{{ route('ejercicios', $categoria->id_categoria) }}" class="btn btn-link">Ver
                                ejercicios</a>
                        </div>
                    </div>
                @empty
                    <p class="ms-3 fw-bold">No se encontraron categorías, nos encontramos en mantenimiento!
                    </p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section about__section" id="acercaDe">
        <div class="container">
            <h2 class="section__title">ACERCA DE</h2>
            <div class="row about_content">
                <div class="col-lg-5">
                    <p>
                        Physio Specialized ofrece servicios de Terapia física y Ocupacional personalizado para cada
                        diagnóstico.
                    </p>
                    <p>
                        Como clínica de rehabilitación nos capacitamos y actualizamos constante para ofrecerte las
                        mejores opciones para tu rehabilitación.
                    </p>
                    <p>
                        Nuestra meta escencial llevar tu recuperación al siguiente nivel para que vuelvas a tu
                        actividades de la vida laboral, deportiva o escolar con calidad.
                    </p>

                </div>
                <div class="col-lg-7">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Contacto section -->
    <section class="section" id="contacto">
        <div class="container contact-container">

            <div class="row">
                <div class="col-md-6">
                    <h2 class="section__title">CONTACTO</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d815.2540800166212!2d-89.7082249388522!3d13.975991675482803!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6295d6e3135891%3A0x5ac43df933c49844!2sPhysio%20Specialized%20Clinic!5e1!3m2!1sen!2ssv!4v1701831418348!5m2!1sen!2ssv"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6">
                    <div class="contact-container-info">
                        <div class="contact-info ">
                            <ul>
                                <li>
                                    <a href="https://maps.app.goo.gl/h2FdrvFhHGyzdq1j6">
                                        <i class="fa-solid fa-location-pin"></i>
                                        El Refugio, El Salvador
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:+50360571557">
                                        <i class="fa-solid fa-phone"></i> +503 6057-1557
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wa.me/+50360571557">
                                        <i class="fa-brands fa-whatsapp"></i> +503 6057-1557
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa-brands fa-facebook"></i> Physio <span>Specialized</span>
                                    </a>
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
            <p class="m-0 text-center text-white fs-5">Copyright &copy; Physio - <a href="{{ route('acceder') }}"
                    class="text-white text-decoration-none" style="cursor: pointer">Specialized</a></p>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
