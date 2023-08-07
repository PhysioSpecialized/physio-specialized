@extends('layouts.app')
@section('title', 'Categorias')
@section('card-title', 'Categorias')
@section('content')

    <!-- MODAL BUTTON -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
        <i class="fas fa-plus"></i>
        Agregar categoria
    </button>

    <div class="status-container mt-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- TABLE CONTENT -->
    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered text-center rounded-2" id="tabla">
            <thead class="bg-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Categoria</th>
                    <th>Color encabezado</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody class="text-center align-middle">
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id_categoria }}</td>
                        <td>{{ $categoria->nombre_categoria }}</td>
                        <td>{{ $categoria->color_encabezado }}</td>
                        <td><img src="{{ asset('storage/img/' . $categoria->img_path) }}" class="img-thumnail"
                                alt="Imagen" style="max-width:100px"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ADD MODAL -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ 'Agregar categoria' }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categoria.create') }}" method="post" enctype="multipart/form-data">
                        <!-- TOKEN PARA EL ENVIO DE DATOS -->
                        @csrf

                        <div class="row gy-2">
                            <!-- Nombre categoria -->
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="nombre_categoria">Nombre categoria:</label>
                                    <input type="text" name="nombre_categoria" id="nombre_categoria" class="form-control"
                                        required>
                                </fieldset>
                            </div>
                            <!-- Color del encabezado -->
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="color_encabezado">Color encabezado:</label>
                                    <input type="color" name="color_encabezado" id="color_encabezado"
                                        class="form-control">
                                </fieldset>
                            </div>
                            <!-- Imagen de la categoria -->
                            <div class="col-md-12">
                                <fieldset>
                                    <label for="img_path">Imagen categoria:</label>
                                    <input type="file" accept="image/*" name="img_path" id="img_path"
                                        class="form-control">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">{{ 'Guardar' }}</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ 'Cerrar' }}</button>
                </div>
            </div>
        </div>
    </div>

@endsection
