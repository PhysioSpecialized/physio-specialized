<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Physio-Specialized | Covid-19</title>

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

    <div class="container mt-5 pt-5">
        <h2 class="section__title">PUBLICACIONES COVID-19</h2>

        <div class="card-container " style=" justify-content: start;align-items: center;">
            @forelse ($publicaciones as $publicacion)
                <div class="card__categoria">
                    <div class="card__title text-start" style="background-color: #193c94;">
                        {{ ucfirst($publicacion->titulo) }}
                    </div>
                    <div class="card__body p-2 fw-light" style="height: 136px !important">
                        {{ Str::limit($publicacion->descripcion, 200, ' ...') }}
                    </div>
                    <div class="card__footer text-end">
                        <a href="{{ route('posts.ver', $publicacion->id) }}" class="btn btn-primary"
                            style="background-color: #193c94;">
                            Ver publicación
                        </a>
                    </div>
                </div>
            @empty
                <p class="ms-3 fw-bold">No se encontraron publicaciones!
                </p>
            @endforelse
        </div>
    </div>

    <div class="container p-2">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-secondary" href="{{ route('principal') }}">Regresar</a>
        </div>
    </div>


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
