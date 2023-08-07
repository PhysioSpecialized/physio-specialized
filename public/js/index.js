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

function ShowMessage(mensaje, tipo) {
    switch (tipo) {
      case 'success':
        Swal.fire({
          icon: 'success',
          title: 'Éxito',
          text: mensaje,
        });
        break;
      case 'error':
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: mensaje,
        });
        break;
      case 'warning':
        Swal.fire({
          icon: 'warning',
          title: 'Advertencia',
          text: mensaje,
        });
        break;
      default:
        Swal.fire({
          icon: 'info',
          title: 'Información',
          text: mensaje,
        });
    }
  }

  
  