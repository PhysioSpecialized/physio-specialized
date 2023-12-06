<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Physio-Specialized | Ejercicios</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <!-- Bootstrap V5.2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Sweat Alert V2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- PERSONAL STYLES -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <style>
        #home {
            background: linear-gradient(rgba(0, 0, 0, 0.343), rgba(0, 0, 0, 0.408)),
                url("{{ asset('storage/img/' . $categoria->img_path) }}");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 60vh !important;
        }
    </style>
</head>


<body>

    <!-- INICIO CONTENIDO -->
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-blue fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('principal') }}">
                Physio <span>Specialized</span>
            </a>
        </div>
    </nav>
    <!-- Navbar end -->

    <section class="section home__section" id="home">
        <div class="container text-center">
            <h3 class="home__title">
                {{ $categoria->nombre_categoria }}
            </h3>
        </div>
    </section>

    <section id="categorias" class="mt-2 mb-5">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="fs-1" style="color: #193c94">EJERCICIOS</h2>
                    <div class="row row-cols-1 row-cols-md-2 mt-5">
                        @forelse ($ejercicios as $ejercicio)
                            <div class="col mb-5">
                                <div class="card">
                                    <div class="card-header text-white text-uppercase text-center fs-3"
                                        style="background-color: #193c94">
                                        {{ $ejercicio->nombre }}
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $ejercicio->descripcion }}</p>

                                        @foreach ($ejercicio->archivos as $contenido)
                                            <a href="{{ url('storage/' . $contenido->contenido_path) }}"
                                                class="fs-6 text-decoration-none mt-5 mb-0" style="color: #2b62cb;"
                                                download>Descargar ({{ $contenido->tipo_contenido }})</a>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        @empty
                            <p>No hay ejercicios disponibles para esta categoría.</p>
                        @endforelse
                    </div>

                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-secondary" href="{{ route('principal') }}">Regresar</a>
                </div>


            </div>
        </div>
    </section>



    <!-- FIN CONTENIDO -->


    <!-- Scripts -->
    <footer class="py-3" style="background-color: #193c94">
        <div class="container px-4">
            <p class="m-0 text-center text-white fs-5">Copyright &copy; Physio - Specialized</p>

        </div>
    </footer>
    <!-- Bootstrap V5.2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <!-- SweatAlert V2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>

    <!-- INDEX JS -->
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>
