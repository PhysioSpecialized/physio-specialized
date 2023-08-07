window.addEventListener("DOMContentLoaded", (event) => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
});

$(document).ready(function() {
  $('#tabla').DataTable({
      dom: '<"top"lf>rt<"bottom"ipB>',
      buttons: [
          'excelHtml5', // Botón para exportar a Excel
          'csvHtml5', // Botón para exportar a CSV
      ],
      language: {
          search: "Filtrar:",
          searchPlaceholder: "Ingrese el término de búsqueda",
      },
      lengthMenu: [5, 10, 25, 50], // Mostrar opciones de paginación: 5, 10, 25, 50 filas por página
      pageLength: 5, // Establecer el valor predeterminado de 5 filas por página
  }).columns().every(function () {
      var column = this;
      var input = $('<input type="text" placeholder="Filtrar...">')
          .appendTo($(column.footer()).empty())
          .on('keyup change', function () {
              if (column.search() !== this.value) {
                  column.search(this.value).draw();
              }
          });
  });
});