const showFilesModal = (id) =>{
    renderFiles(id);
}

const Ajax = (url  , cbSuccess) =>{
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            cbSuccess(response);
        },
        error: function(error) {
            console.error('Error en la petición AJAX:', error);
        }
    });
}

const eliminarArchivo = (id , categoriaId) => {

    csrfToken = $('meta[name="csrf-token"]').attr('content');

    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede revertir. ¿Quieres continuar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {

        if (result.isConfirmed) {
            $.ajax({
                url: '/pdfs/' + id,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Éxito',
                            text: response.message,
                            icon: 'success',
                            timer: 3000
                        });

                        renderFiles(categoriaId);
                    } else {
                       // Mostrar SweetAlert de error
                       Swal.fire({
                        title: 'Error',
                        text: response.message,
                        icon: 'error',
                        timer: 3000
                    });
                    }
                },
                error: function(error) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un error al procesar la solicitud.',
                        icon: 'error',
                        timer: 3000
                    });
        
                }
            });
        }


    });


}

const renderFiles = (id) => {
    Ajax(`/pdfs/${id}` , ({data})=>{


        const tbody = document.getElementById(`table-publicacion${id}`);

        let contenido = '';

        if(data.length == 0){
            contenido = `
            <tr>
                <td colspan="2">No hay archivos para esta publicación</td>
            </tr>
            `
        }

        data.forEach(archivo => {

            contenido += `
                        <tr class="align-middle">
                            <td>
                                ${archivo.nombre_archivo}
                            </td>
                            <td class="text-center fs-2" >
                                <a href="/storage/pdfs/${archivo.nombre_archivo}" class="text-danger"  target="_blank" download="${archivo.nombre_archivo}">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-danger  btn-sm"
                                    onclick="eliminarArchivo(${archivo.id} , ${archivo.post_id})">
                                    <i class="fas fa-trash me-1"></i> Eliminar
                                </button>
                            </td>
                        </tr>`          
        });

        tbody.innerHTML = contenido;

    })
}

const subirArchivo = (idCategoria) =>{
    
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    Swal.fire({
        title: 'Subir PDF',
        html: `
            <form id="formularioSubirPDF" enctype="multipart/form-data">
                <input type="file" name="pdf" class="form-control" accept=".pdf">
            </form>
        `,
        showCancelButton: true,
        showConfirmButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Enviar',
        preConfirm: () => {
            // Aquí puedes agregar lógica de validación antes de enviar el formulario
            return new Promise(() => {

                // Obtener datos del formulario
                let formData = new FormData($('#formularioSubirPDF')[0]);

                 // Agregar el token CSRF al formulario
                 formData.append('_token', csrfToken);


                // Realizar la solicitud AJAX para cargar el PDF
                $.ajax({
                    url: '/pdfs/' + idCategoria,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Mostrar SweetAlert de éxito

                        console.log( response.message);

                        Swal.fire({
                            title: 'Éxito',
                            text: response.message,
                            icon: 'success',
                            timer: 3000
                        });

                        renderFiles(idCategoria);
                    },
                    error: function(error) {

                        console.log('====================================');
                        console.log(error);
                        console.log('====================================');

                        // Mostrar SweetAlert de error
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un error al procesar la solicitud.',
                            icon: 'error',
                            timer: 3000
                        });
                    }
                });
            });
        }
    });
}