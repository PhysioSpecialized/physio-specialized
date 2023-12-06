@extends('layouts.app')
@section('title', 'Ejercicios')
@section('card-title', 'Ejercicios')
@section('content')

    <!-- MODAL BUTTON -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExcerciseModal">
        <i class="fas fa-plus"></i>
        Agregar ejercicio
    </button>

    <!-- TABLE CONTENT -->
    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered text-center rounded-2 mb-3 mt-3" id="tabla">
            <thead class="text-white" style="background-color: rgb(98, 98, 101)">
                <tr>
                    <th>#</th>
                    <th>Ejercicio</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center align-middle">
                @foreach ($ejercicios as $ejercicio)
                    <tr>
                        <td>{{ $ejercicio->id_ejercicio }}</td>
                        <td>{{ $ejercicio->nombre }}</td>
                        <td>{{ $ejercicio->categoria->nombre_categoria }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editarModal{{ $ejercicio->id_ejercicio }}">
                                    <i class="fas fa-pencil-alt me-1"></i> Editar
                                </button>
                                <button class="btn btn-danger" onclick="eliminarEjercicio({{ $ejercicio->id_ejercicio }})">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ 'Agregar ejercicio' }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ejercicio.create') }}" method="post">
                        @csrf

                        <div class="row gy-2">
                            <!-- categoria -->
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="id_categoria">Categoria:</label>
                                    <select name="id_categoria" id="id_categoria" class="form-control">
                                        @if ($categorias->isEmpty())
                                            <option value="" disabled selected>
                                                No se encontraron categorias
                                            </option>
                                        @else
                                            @foreach ($categorias as $id_categoria => $nombre_categoria)
                                                <option value="{{ $id_categoria }}">
                                                    {{ $nombre_categoria }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </fieldset>
                            </div>
                            <!-- ejercicio -->
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="nombre">Nombre ejercicio:</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control">
                                </fieldset>
                            </div>
                            <!-- descripcion  -->
                            <div class="col-md-12 mt-2 mb-2">
                                <fieldset>
                                    <label for="descripcion">Descripcion:</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control" rows="9"></textarea>
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
    @if (!empty($ejercicios))
        @foreach ($ejercicios as $ejercicio)
            <div class="modal fade" id="editarModal{{ $ejercicio->id_ejercicio }}" tabindex="-1"
                aria-labelledby="editarModalLabel{{ $ejercicio->id_ejercicio }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editarModalLabel{{ $ejercicio->id_ejercicio }}">Editar
                                Ejercicio</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('ejercicio.update', $ejercicio->id_ejercicio) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="row gy-2">
                                    <!-- Campo de categoría -->
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="id_categoria">Categoría:</label>
                                            <select name="id_categoria" id="id_categoria" class="form-control">
                                                @foreach ($categorias as $id_categoria => $nombre_categoria)
                                                    <option value="{{ $id_categoria }}"
                                                        {{ $ejercicio->id_categoria == $id_categoria ? 'selected' : '' }}>
                                                        {{ $nombre_categoria }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- Campo de nombre de ejercicio -->
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="nombre">Nombre del Ejercicio:</label>
                                            <input type="text" name="nombre" id="nombre" class="form-control"
                                                value="{{ $ejercicio->nombre }}">
                                        </fieldset>
                                    </div>

                                    <!-- Campo de descripción -->
                                    <div class="col-md-12 mt-2 mb-2">
                                        <fieldset>
                                            <label for="descripcion">Descripción:</label>
                                            <textarea name="descripcion" id="descripcion" class="form-control" rows="9">{{ $ejercicio->descripcion }}</textarea>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">{{ 'Guardar Cambios' }}</button>
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
        function eliminarEjercicio(id) {
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
