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
    <title>Estado de Cuenta por Factura</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body { background-color: #f4f6f9; }
        .card-header { background-color: rgb(6, 154, 136); color: white; }
        .total-row { font-weight: bold; }
    </style>

    <div class="container mb-5 text-left">
         <img src="logo.png" alt="Logo" class="rounded-circle shadow" style="width: 150px; height: 150px; object-fit: cover;">
        <h2 class="mt-4 fw-bold"> REPORTE: ESTADO DE CUENTA POR FACTURA</h2>
    </div>
</head>
<body>


<div class="container mt-5">
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

    <div class="card shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"> Reporte: Estado de Cuenta por Factura</h5>
            

        </div>
        
        <div class="card-body p-0">
            <div class="p-3 bg-light border-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <strong>Cliente:</strong> Empresa XYZ S.A.
                    </div>
                    <div class="col-md-6 text-md-end text-muted small">
                        <strong>Fecha de reporte:</strong> 17 de mayo de 2026
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Número de Factura</th>
                            <th>Valor Factura ($)</th>
                            <th>Abonos ($)</th>
                            <th class="text-warning">Saldo por Cobrar ($)</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">FAC-2026-00890</td>
                            <td>$ 1,500.00</td>
                            <td>$ 500.00</td>
                            <td class="text-danger fw-bold">$ 1,000.00</td>
                            <td><span class="badge bg-warning text-dark">Abonado</span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">FAC-2026-00912</td>
                            <td>$ 850.00</td>
                            <td>$ 0.00</td>
                            <td class="text-danger fw-bold">$ 850.00</td>
                            <td><span class="badge bg-danger">Pendiente</span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">FAC-2026-00955</td>
                            <td>$ 2,100.00</td>
                            <td>$ 2,100.00</td>
                            <td class="text-success fw-bold">$ 0.00</td>
                            <td><span class="badge bg-success">Cancelado</span></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="total-row">
                            <td class="text-end">TOTALES:</td>
                            <td>$ 4,450.00</td>
                            <td>$ 2,600.00</td>
                            <td class="text-danger fs-5">$ 1,850.00</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
            <div class="d-flex justify-content-center mt-5 gap-2 pb-5">
                <button type="button" class="btn btn-success btn-lg" onclick="window.print()"> Imprimir</button>
               <button type="button" class="btn btn-lg text-white px-4" style="background-color: #26bfba;" onclick="abrirModalBusqueda()"> Buscar</button>
            </div>
</div>
 //Modal de búsqueda
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