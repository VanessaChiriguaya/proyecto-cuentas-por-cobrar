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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container mt-3">
            <img src="logo.png" class="rounded-circle" alt="Logo" width="100" height="100">
            <h4 class="mt-3">REPORTE CRUZADO</h4>
            <div class="bg-info p-3 mt-3">
                <div class="form-group">
                    <label class="font-weight-bold">Fecha de inicio:</label>
                    <input type="date" class="form-control">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Fecha final:</label>
                    <input type="date" class="form-control">
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="button" class="btn btn-outline-dark font-weight-bold" data-toggle="modal" data-target="#modalBuscar">Buscar</button>
                <button type="button" class="btn btn-warning font-weight-bold" onclick="window.print()">Imprimir</button>
            </div>
            <h4 class="mt-4">Transacciones por cuenta</h4>
            <table class="table table-bordered table-hover text-center mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>Cuenta</th>
                        <th>Débito</th>
                        <th>Crédito</th>
                        <th>Transferencia</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A001</td>
                        <td>$ 500.00</td>
                        <td>$ 300.00</td>
                        <td>$ 200.00</td>
                    </tr>
                    <tr>
                        <td>B002</td>
                        <td>$ 250.00</td>
                        <td>$ 150.00</td>
                        <td>$ 100.00</td>
                    </tr>
                    <tr>
                        <td>C001</td>
                        <td>$ 800.00</td>
                        <td>$ 400.00</td>
                        <td>$ 300.00</td>
                    </tr>
                    <tr>
                        <td>D001</td>
                        <td>$ 100.00</td>
                        <td>$ 200.00</td>
                        <td>$ 150.00</td>
                    </tr>
                </tbody>
                <tfoot class="font-weight-bold">
                    <tr>
                        <td>Total</td>
                        <td>$ 1650.00</td>
                        <td>$ 1050.00</td>
                        <td>$ 750.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="modal" id="modalBuscar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Mensaje</h4>
                    </div>
                    <div class="modal-body">
                        Reporte generado correctamente
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
        </div>
        <footer class="text-white text-center py-2 mt-2" style="background-color: #223038;">
            Módulo Bancos - Emerson Coro
        </footer>
    </body>
</html>