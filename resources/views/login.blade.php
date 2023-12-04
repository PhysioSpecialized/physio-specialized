<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Physio-Specialized | Inicio de sesion</title>

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
            <a class="navbar-brand" href="">
                Physio <span>Specialized</span>
            </a>
        </div>
    </nav>
    <!-- Navbar end -->

    <div class="form-container mt-5">
        <form action="{{ route('login') }}" method="POST" class="form login-form">
            @csrf
            <h1 class="form-title">Iniciar sesion</h1>
            <!-- EMAIL INPUT START -->
            <div class="form-group">
                <label for="user">Email</label>
                <input type="email" name="email" id="email" required class="form-control mt-1"
                    placeholder="Ingresar usuario">
            </div>
            <!-- PASSWORD INPUT START-->
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required class="form-control mt-1"
                    placeholder="********">
            </div>

            <!-- SUBMIT BUTTON START-->
            <div class="form-group">
                <input type="submit" value="Iniciar sesion" name="submit-btn" class="btn btn-success">
            </div>
        </form>
    </div>
    <!-- FIN CONTENIDO -->
    

    <!-- Scripts -->
    <footer class="py-4 bg-light mt-auto fixed-bottom text-center">
        <div class="container-fluid px-4">
            <div class="text-muted text-center">Copyright &copy; Physio - Specialized</div>
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