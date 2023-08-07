@extends('layouts.guest')
@section('title', 'Inicio de sesion')
@section('content')
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
@endsection
