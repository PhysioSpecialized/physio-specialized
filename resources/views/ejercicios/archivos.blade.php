@extends('layouts.app')
@section('title', 'Archivos')
@section('card-title', 'Gestion de archivos para ejercicios')
@section('content')

    <!-- MODAL BUTTON -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addArchivoModal">
        <i class="fas fa-plus"></i>
        Agregar archivos
    </button>

    <!-- TABLE CONTENT -->
    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered text-center rounded-2 mb-3 mt-3" id="tabla">
            <thead class="text-white" style="background-color: rgb(98, 98, 101)">
                <tr>
                    <th>#</th>
                    <th>Ejercicio</th>
                    <th>Total de archivos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center align-middle">
                @foreach ($ejercicios as $ejercicio)
                    <tr>
                        <td>{{ $ejercicio->id_ejercicio }}</td>
                        <td>{{ $ejercicio->nombre }}</td>
                        <td>{{ $ejercicio->getTotalArchivos() }}</td>
                        <td>
                            <button class="btn btn-info text-white" data-bs-toggle="modal"
                                data-bs-target="#detalleModal{{ $ejercicio->id_ejercicio }}">
                                <i class="fas fa-circle-info me-1"></i> Detalle
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>







    <!-- Modal -->
    <div class="modal fade" id="addArchivoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ 'Agregar archivo' }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('subir-archivo') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <fieldset>
                                <label for="id_ejercicio">Ejercicio:</label>
                                <select name="id_ejercicio" id="id_ejercicio" class="form-control">
                                    @if ($ejercicioDisp->isEmpty())
                                        <option value="" disabled selected>
                                            No se encontraron ejercicios
                                        </option>
                                    @else
                                        @foreach ($ejercicioDisp as $id_ejercicio => $nombre)
                                            <option value="{{ $id_ejercicio }}">
                                                {{ $nombre }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-md-12 mt-4 mb-3">
                            <fieldset>
                                <label class="mb-1" for="files">Archivo: (mp4, jpeg, jpg, png, pdf)</label>
                                <input type="file" name="files" accept=".pdf, .mp4, .jpg, .png" class="form-control">
                            </fieldset>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Subir archivo</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ 'Cerrar' }}</button>
                </div>
            </div>
        </div>
    </div>


    @if (!empty($ejercicios))
        @foreach ($ejercicios as $ejercicio)
            <div class="modal fade" id="detalleModal{{ $ejercicio->id_ejercicio }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detalle de Archivos - {{ $ejercicio->nombre }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            @if ($ejercicio->archivos->isNotEmpty())
                                <div class="row">
                                    @foreach ($ejercicio->archivos as $archivo)
                                        <div class="col-md-3 mb-3 ms-5">
                                            <p>
                                                <strong>Tipo de contenido:</strong> {{ $archivo->tipo_contenido }}
                                            </p>
                                            <button class="btn btn-danger"
                                                onclick="eliminarArchivo({{ $archivo->id_contenido }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>No hay archivos asociados a este ejercicio.</p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


@endsection


@section('afterScripts')


    <script>
        function eliminarArchivo(id_contenido) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminarlo'
            }).then((result) => {

                $('#detalleModal' + id_contenido).modal('hide');

                if (result.isConfirmed) {

                    $.ajax({
                        url: '/eliminar-archivo/' + id_contenido,
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
