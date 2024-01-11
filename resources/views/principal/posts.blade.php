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

    <section class="section">
        <div class="container text-start">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="display-3 text-muted">
                        {{ ucfirst($publicacion->titulo) }}
                    </h3>
                    <hr>
                </div>

                <div class="col-md-12 p-2 m-2" style="background: #d3d3d3; border-radius: 5px">
                    <p class="fw-light">
                        <span class="fw-bold">Descripción:</span> {{ $publicacion->descripcion }}
                    </p>
                </div>

                <div class="col-md-9">
                    {!! $publicacion->contenido !!}
                </div>
                <div class="col-md-3 text-center p-2" style="background: #efefef; border-radius: 5px">
                    <h2 style="color: #2a50af;" class="fw-light">Material educativo</h2>
                    <hr>
                    @if ($publicacion->pdfs->isEmpty())
                        <p>No hay archivos PDF asociados a esta publicación.</p>
                    @else
                        <ul>
                            @foreach ($publicacion->pdfs as $pdf)
                                <li style="list-style: none" class="text-start">
                                    <a href="{{ asset('storage/pdfs/' . $pdf->nombre_archivo) }}" target="_blank"
                                        class="text-danger fs-2" style="text-decoration: none">
                                        <i class="fas fa-file-pdf"></i>
                                        <span class="text-muted fs-5">Descargar</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="col-md-12">
                    <a class="btn btn-secondary" href="{{ route('covid') }}">Regresar</a>
                </div>
            </div>
        </div>
    </section>


    <!-- FIN CONTENIDO -->


    <!-- Scripts -->
    <footer class="py-3 fixed-bottom p-3" style="background-color: #193c94;">
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
