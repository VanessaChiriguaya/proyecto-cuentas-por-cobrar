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
    <title>Reporte de Recaudación</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        .title { color:#f4f6f9 }
        .bg-aguamarina {
            background-color: #26bfba !important;
            color: white !important;
        }

        .bg-aguamarina-claro {
            background-color: #e0f7f6 !important;
        }

        .border-aguamarina {
            border-color: #26bfba !important;
        }

        .total-row {
            background-color: #d1f2f1; /* Un tono un poquito más oscuro para los totales */
            font-weight: bold;
        }

        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    
    <div class="container mt-5 text-left">
         <img src="logo.png" alt="Logo" class="rounded-circle shadow" style="width: 150px; height: 150px; object-fit: cover;">
        <h2 class="mb-5 mt-4 fw-bold"> REPORTE DE VALORES RECAUDADOS</h2>
    </div>

<div class="container">

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header text-white" style="background-color: #26bfba;">
            <h6 class="mb-0 fw-bold">Periodo del Reporte</h6>
        </div>
        
        <div class="card-body" style="background-color: #e0f7f6;">
            <div class="row justify-content-center py-2">
                <div class="col-md-10"> <div class="mb-3">
                        <label for="fechaInicio" class="form-label fw-bold text-dark">Fecha de inicio:</label>
                        <input type="date" class="form-control shadow-sm" id="fechaInicio">
                    </div>

                    <div class="mb-2">
                        <label for="fechaFinal" class="form-label fw-bold text-dark">Fecha final:</label>
                        <input type="date" class="form-control shadow-sm" id="fechaFinal">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow border-aguamarina mb-5">
        
        <div class="card-header bg-aguamarina text-center py-3">
            <h4 class="mb-0">Matriz de Recaudación</h4>
        </div>

        <div class="card-body bg-aguamarina-claro">
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle bg-white shadow-sm">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="py-3">Cobrador</th>
                            <th class="py-3">Efectivo ($)</th>
                            <th class="py-3">Transferencia ($)</th>
                            <th class="py-3">Cheque ($)</th>
                            <th class="py-3 text-success">Total Cobrador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold text-start ps-4">Juan Pérez</td>
                            <td>$ 450.00</td>
                            <td>$ 1,200.00</td>
                            <td>$ 300.00</td>
                            <td class="fw-bold">$ 1,950.00</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-start ps-4">María López</td>
                            <td>$ 800.00</td>
                            <td>$ 500.00</td>
                            <td>$ 1,500.00</td>
                            <td class="fw-bold">$ 2,800.00</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-start ps-4">Carlos Ruiz</td>
                            <td>$ 200.00</td>
                            <td>$ 3,450.00</td>
                            <td>$ 0.00</td>
                            <td class="fw-bold">$ 3,650.00</td>
                        </tr>
                    </tbody>
                    
                    <tfoot class="total-row">
                        <tr>
                            <td class="text-end pe-4 text-uppercase">Totales Finales:</td>
                            <td>$ 1,450.00</td>
                            <td>$ 5,150.00</td>
                            <td>$ 1,800.00</td>
                            <td class="bg-aguamarina text-white fw-bold fs-5">$ 8,400.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-5 gap-2 pb-5">
        <button type="button" class="btn btn-success btn-lg" onclick="window.print()"> Imprimir</button>
        <button type="button" class="btn btn-lg text-white px-4" style="background-color: #26bfba;" onclick="abrirModalBusqueda()">Buscar</button>
     </div>
</div>
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

<div class="modal fade" id="modalBusqueda" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header text-white" style="background-color: #26bfba;">
                <h5 class="modal-title">Notificación del Sistema</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-5">
           <h4 class="fw-bold">Datos encontrados</h4>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function abrirModalBusqueda() {
        var miModal = new bootstrap.Modal(document.getElementById('modalBusqueda'));
        miModal.show();   
    }
</script>
</body>
</html>