<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabecera de facturas</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body { background-color: #f4f6f9; }
        .card-header { background-color: #26bfba; color: white; }
        #asientoContable { display: none; } /* Oculto por defecto hasta que se guarde el pago */
    </style>
</head>
<body>

    <div class="container justify-content-left">
        <img src="logo.png" alt="Logo" class="rounded-circle shadow" style="width: 150px; height: 150px; object-fit: cover;">
        <h2 class="mb-5 mt-4 fw-bold">CABECERA DE FACTURAS</h2>
    </div>


<div class="container mt-5">
    <div class="row">
        
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Datos de Factura</h5>
                </div>
                <div class="card-body bg-light">
                    <p class="text-muted small mb-3"><em>* Esta información proviene desde facturación</em></p>
                    
                    <div class="mb-2">
                        <label class="form-label fw-bold">Número de Factura</label>
                        <input type="text" class="form-control" value="FAC-2026-00890" readonly>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-bold">Fecha de Emisión</label>
                        <input type="date" class="form-control" value="2026-05-10" readonly>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-bold">Cliente</label>
                        <input type="text" class="form-control" value="Empresa XYZ S.A." readonly>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-bold text-danger">Valor Total Adeudado ($)</label>
                        <input type="number" class="form-control fw-bold" value="1500.00" id="valorFactura" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success">
                    <h5 class="mb-0"> Registro de Pago</h5>
                </div>
                <div class="card-body">
                    <form id="formPago" onsubmit="procesarPago(event)">
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Fecha del Pago</label>
                                <input type="date" class="form-control" id="fechaPago" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Forma de Pago</label>
                                <select class="form-select" id="formaPago" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Transferencia">Transferencia Bancaria</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Efectivo">Efectivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Valor a Pagar ($)</label>
                                <input type="number" step="0.01" class="form-control" id="valorPago" placeholder="Ej: 1500.00" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Cobrador</label>
                                <input type="text" class="form-control" id="cobrador" placeholder="Nombre del responsable" required>
                            </div>
                        </div>

    <div class="d-flex justify-content-center mt-3 mb-3 gap-2">
        <button type="button" class="btn btn-primary" onclick="mostrarMensaje('insertar')">Guardar</button>
        <button type="button" class="btn btn-danger" onclick="mostrarMensaje('eliminar')">Eliminar</button>
        <button type="button" class="btn btn-secondary" onclick="mostrarMensaje('modificar')">Modificar</button>
        <button type="button" class="btn btn-warning" onclick="mostrarMensaje('buscar')">Buscar</button>
    </div>
                        <hr>
                        <button type="submit" class="btn btn-success w-100 fw-bold">
                            <p>Generar Asiento</p>
                        </button>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm mt-4 border-info" id="asientoContable">
                <div class="card-header bg-info text-dark">
                    <h5 class="mb-0">Asiento contable</h5>
                </div>
                <div class="card-body">
                    <p class="text-success fw-bold">El pago fue registrado y enviado al módulo de Contabilidad.</p>
                    <table class="table table-bordered table-striped text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Cuenta Contable</th>
                                <th>Ref. Pago</th>
                                <th>Debe</th>
                                <th>Haber</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start">Bancos (Ingreso)</td>
                                <td id="refFormaPago">-</td>
                                <td class="text-success fw-bold" id="montoDebe">$0.00</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">Cuentas por Cobrar (CxC)</td>
                                <td>FAC-2026-00890</td>
                                <td></td>
                                <td class="text-danger fw-bold" id="montoHaber">$0.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 
<div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
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

<script>
    function procesarPago(event) {
        event.preventDefault(); // Evita que la página se recargue
        
        // Obtener los datos del formulario
        let valorPago = parseFloat(document.getElementById("valorPago").value).toFixed(2);
        let formaPago = document.getElementById("formaPago").value;

        // Actualizar la tabla del asiento contable con los datos ingresados
        document.getElementById("refFormaPago").innerText = formaPago;
        document.getElementById("montoDebe").innerText = "$" + valorPago;
        document.getElementById("montoHaber").innerText = "$" + valorPago;

        // Mostrar la alerta de Bootstrap y el cuadro del asiento
        alert("Integración Exitosa: El cobro ha sido aplicado a la factura y el asiento contable fue generado.");
        document.getElementById("asientoContable").style.display = "block";
    }
</script>

</body>
</html>