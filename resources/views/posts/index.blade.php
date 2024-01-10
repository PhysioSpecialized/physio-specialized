@extends('layouts.app')
@section('title', 'Publicaciones sobre covid-19')
@section('card-title', 'Covid-19')
@section('content')

    <!-- MODAL BUTTON -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExcerciseModal">
        <i class="fas fa-plus"></i>
        Agregar publicación
    </button>

    <!-- TABLE CONTENT -->
    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered text-center rounded-2 mb-3 mt-3" id="tabla">
            <thead class="text-white" style="background-color: rgb(98, 98, 101)">
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center align-middle">
                @foreach ($publicaciones as $publicacion)
                    <tr>
                        <td>{{ $publicacion->id }}</td>
                        <td>{{ $publicacion->titulo }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editarModal{{ $publicacion->id }}">
                                    <i class="fas fa-pencil-alt me-1"></i> Editar
                                </button>
                                <button class="btn btn-danger" onclick="eliminarPublicacion({{ $publicacion->id }})">
                                    <i class="fas fa-trash me-1"></i> Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ADD MODAL -->
    <div class="modal fade" id="addExcerciseModal" tabindex="-1" aria-labelledby="addExcerciseModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ 'Agregar publicación' }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('posts.create') }}" method="post">
                        @csrf

                        <div class="row gy-2">
                            <!-- categoria -->
                            <div class="col-md-12">
                                <fieldset>
                                    <input type="hidden" readonly value="covid" name="categoria" class="form-control">
                                    <input type="hidden" readonly value="posts.covid" name="vista" class="form-control">
                                </fieldset>
                                <fieldset>
                                    <label for="titulo">Titulo:</label>
                                    <input type="text" name="titulo" id="titulo" class="form-control">
                                </fieldset>
                            </div>
                            <!-- descripcion  -->
                            <div class="col-md-12 mt-2 mb-2">
                                <fieldset>
                                    <label for="contenido">Contenido:</label>
                                    <textarea name="contenido" id="contenido" class="form-control" rows="9"></textarea>
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


    <!-- EDIT MODAL -->
    @if (!empty($publicaciones))
        @foreach ($publicaciones as $publicacion)
            <div class="modal fade" id="editarModal{{ $publicacion->id }}" tabindex="-1"
                aria-labelledby="editarModalLabel{{ $publicacion->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editarModalLabel{{ $publicacion->id }}">Editar
                                Publicación</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('ejercicio.update', $publicacion->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="row gy-2">
                                    <!-- categoria -->
                                    <div class="col-md-12">
                                        <fieldset>
                                            <input type="hidden" readonly value="covid" name="categoria"
                                                class="form-control">
                                            <input type="hidden" readonly value="posts.covid" name="vista"
                                                class="form-control">
                                        </fieldset>
                                        <fieldset>
                                            <label for="tituloEdit">Titulo:</label>
                                            <input type="text" name="tituloEdit" id="tituloEdit" class="form-control">
                                        </fieldset>
                                    </div>
                                    <!-- descripcion  -->
                                    <div class="col-md-12 mt-2 mb-2">
                                        <fieldset>
                                            <label for="contenidoEdit">Contenido:</label>
                                            <textarea name="contenidoEdit" id="contenidoEdit" class="form-control" rows="9">{{ $publicacion->contenido }}</textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">{{ 'Guardar' }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ 'Cerrar' }}</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection

@section('afterScripts')
    <script>
        InitSummerNote('contenido');
        InitSummerNote('contenidoEdit');

        function eliminarPublicacion(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: '/ejercicio/delete/' + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Eliminado',
                                    text: response.message,
                                    icon: 'success',
                                    timer: 3000,

                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: response.message,
                                    icon: 'error',
                                    timer: 3000,
                                });
                            }
                        },
                        error: function() {
                            Swal.fire('Error', 'Hubo un problema al procesar la solicitud.', 'error');
                        }
                    });

                }
            });
        }
    </script>
@endsection
