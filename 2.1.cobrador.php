<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CUENTAS POR COBRAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body class="bg-light">

    <div class="container mt-5 pb-5">
        <div class="text-left mb-4">
            <img src="logo.png" alt="Logo" class="rounded-circle shadow" style="width: 150px; height: 150px; object-fit: cover;">
            <h2 class="mt-4 fw-bold">COBRADOR</h2>
        </div>   
            
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Datos de la cuenta</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="ruc" class="form-label">RUC</label>
                            <input type="text" class="form-control" id="ruc" placeholder="Ingrese el RUC">
                        </div>
                        <div class="col-md-4">
                            <label for="Nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="Nombre" placeholder="Ingrese el Nombre">
                        </div>
                        <div class="col-md-4">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" placeholder="Ingrese la Dirección">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="factura" class="form-label">Número de Factura</label>
                            <input type="text" class="form-control" id="factura" placeholder="Ingrese el Número de Factura">
                        </div>
                        <div class="col-md-4">
                            <label for="monto" class="form-label">Monto</label>
                            <input type="text" class="form-control" id="monto" placeholder="Ingrese el Monto">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center gap-2">
                        <button type="button" class="btn btn-primary" onclick="mostrarMensaje('insertar')">Guardar</button>
                        <button type="button" class="btn btn-danger" onclick="mostrarMensaje('eliminar')">Eliminar</button>
                        <button type="button" class="btn btn-secondary" onclick="mostrarMensaje('modificar')">Modificar</button>
                        <button type="button" class="btn btn-warning" onclick="mostrarMensaje('buscar')">Buscar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>RUC</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Número de Factura</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>12345678901</td>
                            <td>John Doe</td>
                            <td>123 Main St</td>
                            <td>INV-001</td>
                            <td>$1,000.00</td>
                        </tr>
                        <tr>
                            <td>12345678902</td>
                            <td>Jane Smith</td>
                            <td>456 Oak Ave</td>
                            <td>INV-002</td>
                            <td>$2,500.00</td>
                        </tr>
                        <tr>
                            <td>12345678903</td>
                            <td>Bob Johnson</td>
                            <td>789 Pine Rd</td>
                            <td>INV-003</td>
                            <td>$750.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #26bfba;">
                        <h5 class="modal-title" id="modalLabel">Notificación del sistema</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center" id="textoMensajeModal">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>        
    <script>
        function mostrarMensaje(accion) {
        let mensaje = "";
        if(accion === 'insertar') mensaje = 'Datos guardados correctamente';
        else if(accion === 'modificar') mensaje = 'Datos actualizados correctamente';
        else if(accion === 'eliminar') mensaje = 'Datos eliminados correctamente';
        else if(accion === 'buscar') mensaje = 'Búsqueda completada';

        document.getElementById('textoMensajeModal').innerHTML = "<strong>" + mensaje + "</strong>";
        var mensajeModal = new bootstrap.Modal(document.getElementById('mensajeModal'));
        mensajeModal.show();
        }
    </script>
</body>
</html>