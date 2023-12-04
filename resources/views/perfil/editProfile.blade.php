@extends('layouts.app')
@section('title', 'Perfil')
@section('card-title', "Información Personal")
@section('content')
  
        <form action="{{ route('perfil.update', $usuario->id) }}" method="post" class="row needs-validation"
            novalidate>
            @csrf
            @method('PUT')

            <div class="form-group col-md-6 mt-2">
                <label for="nombre_opcion">Nombre: </label>
                <input type="text" class="form-control {{ $errors->has('nombre_opcion') ? 'is-invalid' : '' }}"
                    name="nombre_opcion" id="nombre_opcion" value="{{ $usuario->name }}" required>
                @if ($errors->has('nombre_opcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_opcion') }}
                    </div>
                @endif
            </div>


            <div class="form-group col-md-6 mt-2">
                <label for="email_opcion">Email: </label>
                <input type="text" class="form-control {{ $errors->has('email_opcion') ? 'is-invalid' : '' }}"
                    name="email_opcion" id="email_opcion" value="{{ $usuario->email }}" required>
                @if ($errors->has('email_opcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_opcion') }}
                    </div>
                @endif
            </div>

            <h5 class="text-primary mt-5">Seguridad</h5>
            <hr>



            <div class="form-group col-md-4">
                <label for="contrasenia_antigua">Contraseña actual: </label>
                <input type="password"
                    class="form-control {{ $errors->has('contrasenia_antigua') ? 'is-invalid' : '' }}"
                    name="contrasenia_antigua" id="contrasenia_antigua" required>
                @if ($errors->has('contrasenia_antigua'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contrasenia_antigua') }}
                    </div>
                @endif
            </div>

            <div class="form-group col-md-4">
                <label for="contrasenia_nueva">Contraseña nueva: </label>
                <input type="password" class="form-control {{ $errors->has('contrasenia_nueva') ? 'is-invalid' : '' }}"
                    name="contrasenia_nueva" id="contrasenia_nueva">
                @if ($errors->has('contrasenia_nueva'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contrasenia_nueva') }}
                    </div>
                @endif
            </div>

            <div class="form-group col-md-4">
                <label for="comprobar_contrasenia">Confirmar contraseña: </label>
                <input type="password"
                    class="form-control {{ $errors->has('comprobar_contrasenia') ? 'is-invalid' : '' }}"
                    name="comprobar_contrasenia" id="comprobar_contrasenia">
                @if ($errors->has('comprobar_contrasenia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comprobar_contrasenia') }}
                    </div>
                @endif
            </div>



            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                <input type="submit" class="btn btn-primary" value="Actualizar">
                <a href="{{ route('dashboard') }}" class="btn btn-dark">Regresar</a>
            </div>
        </form>


@endsection