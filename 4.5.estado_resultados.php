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
    <title>Reporte - Estado de Resultados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print { .no-print { display: none; } }
    </style>
</head>
<body class="bg-light">

<div class="container">
    <div class="text-center mt-4">
        <img src="logo.png" class="rounded-circle" width="120">
        <h2 class="mt-3">Estado de Resultados</h2>
    </div>
        
        <div class="row g-2 mb-4 no-print bg-light p-3 rounded border">
            <div class="col-md-4">
                <select id="periodo" class="form-select">
                    <option>Mes Actual</option>
                    <option>Año Fiscal 2026</option>
                </select>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary w-100" onclick="buscarReporte()" data-bs-toggle="modal" data-bs-target="#miModal">Buscar</button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-dark w-100" onclick="window.print()">Imprimir Reporte</button>
            </div>
        </div>

        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Cuentas de Resultados</th>
                    <th>Monto ($)</th>
                </tr>
            </thead>
            <tbody>
                <tr class="fw-bold"><td>4 INGRESO</td><td>8,000.00</td></tr>
                <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;4.1 Ingresos Operacionales</td><td></td></tr>
                <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.1.1 Ventas de Servicios</td><td>8,000.00</td></tr>
                
                <tr class="fw-bold text-danger"><td>5 EGRESO</td><td>5,200.00</td></tr>
                <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;5.1 Gastos Operacionales</td><td></td></tr>
                <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.1.1 Gasto Sueldos</td><td>4,000.00</td></tr>
                <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.1.2 Gasto Arriendos</td><td>1,200.00</td></tr>
            </tbody>
            <tfoot class="table-warning fw-bold text-dark fs-5">
                <tr>
                    <td>UTILIDAD</td>
                    <td>2,800.00</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="modal fade" id="miModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Búsqueda</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center fs-5">Datos del Estado de Resultados actualizados localmente.</div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function buscarReporte() {
}
</script>
</body>
</html>