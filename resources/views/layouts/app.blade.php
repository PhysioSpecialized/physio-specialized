<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Physio-Specialized | @yield('title')</title>

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

    <!-- PERSONAL CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- DATATABLES -->
    <!-- Agrega las siguientes líneas en la sección head de tu vista -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>

    <!-- Summernote CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
        integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">Physio-Specialized</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#  !">
            <i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="#!">Ajustes</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li> -->
                    <li><a class="dropdown-item" href="{{ route('perfil.edit') }}">Perfil</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar Sesión</a></li>
                    <!-- Authentication -->

                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Administración</div>
                        <a class="nav-link" href="{{ route('categoria') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            Categorias
                        </a>
                        <a class="nav-link" href="{{ route('ejercicio') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-running"></i>
                            </div>
                            Ejercicios
                        </a>
                        <a class="nav-link" href="{{ route('archivos') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            Archivos de ejercicios
                        </a>
                        <a class="nav-link" href="{{ route('posts.covid') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-virus"></i>
                            </div>
                            Covid-19
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: {{ Auth::user()->name }}</div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main class="mt-3">
                <div class="container-fluid px-4">
                    <div class="card">
                        <div class="card-header fw-bold">
                            @yield('title')
                        </div>
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>

                </div>
            </main>
            <footer class="py-3 bg-light mt-auto text-center">
                <div class="container-fluid text-center">
                    <div class="text-muted w-100">Copyright &copy; Physio-Specialized</div>
                </div>
            </footer>
        </div>
    </div>

    <!-- SCRIPTS -->
    <!-- Bootstrap V5.2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <!-- SweatAlert V2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>

    <!-- INDEX JS -->
    <script src="{{ asset('js/index.js') }}"></script>


    <script>
        const AlertMessage = (mensaje, tipo) => {
            const tiposConfig = {
                'success': {
                    title: 'Éxito',
                    icon: 'success'
                },
                'error': {
                    title: 'Error',
                    icon: 'error'
                },
                'info': {
                    title: 'Información',
                    icon: 'info'
                }
            };

            const config = tiposConfig[tipo] || {
                title: tipo === 'success' ? 'Éxito' : 'Error',
                icon: tipo
            };

            Swal.fire({
                title: config.title,
                text: mensaje,
                icon: config.icon,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        }

        @if (session('success'))
            AlertMessage('{{ session('success') }}', 'success');
        @endif

        @if (session('error'))
            AlertMessage('{{ session('error') }}', 'error');
            console.log('{{ session('error') }}');
        @endif

        @if (session('info'))
            AlertMessage('{{ session('info') }}', 'info');
            console.log('{{ session('info') }}');
        @endif
    </script>

    <!-- Summernote JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"
        integrity="sha512-ZESy0bnJYbtgTNGlAD+C2hIZCt4jKGF41T5jZnIXy4oP8CQqcrBGWyxNP16z70z/5Xy6TS/nUZ026WmvOcjNIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        const InitSummerNote = (idElemento) => {
            $(document).ready(function() {
                $('#' + idElemento).summernote({
                    height: 300,
                    lang: 'es-ES', // Especifica el idioma español
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['insert', ['picture', 'link']],
                    ],
                    disableResizeEditor: true,
                });
            });
        }
    </script>

    @yield('afterScripts')


</body>

</html>
