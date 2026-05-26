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
            <h4 class="mt-4">CABECERA TRANSACCIÓN</h4>
            <div class="bg-info p-3">
                <div class="form-group">
                    <label>Código:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el código">
                </div>
                <div class="form-group">
                    <label>Fecha:</label>
                    <input type="date" class="form-control">
                </div>
                <div class="form-group">
                    <label>Descripción:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la descripción">
                </div>
                <div class="form-group">
                    <label>Cuenta:</label>
                    <select class="form-control">
                        <option value="" selected disabled>Seleccione la cuenta</option>
                        <option>A001</option>
                        <option>B002</option>
                        <option>C001</option>
                        <option>D001</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInsertar">Insertar</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar">Eliminar</button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalModificar">Modificar</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalBuscar">Buscar</button>
            </div>
            <h4 class="mt-5">DETALLE TRANSACCIÓN</h4>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Tipo de transacción</th>
                        <th>Fecha</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="form-control">
                                <option value="" selected disabled>Seleccione</option>
                                <option value="debito">Débito</option>
                                <option value="credito">Crédito</option>
                                <<option value="transferencia">Transferencia</option>
                            </select>
                        </td>
                        <td>
                            <input type="date" class="form-control">
                        </td>
                        <td>
                            <input type="number" class="form-control" placeholder="Ingrese el valor" min="0">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control">
                                <option value="" selected disabled>Seleccione</option>
                                <option value="debito">Débito</option>
                                <option value="credito">Crédito</option>
                                <<option value="transferencia">Transferencia</option>
                            </select>
                        </td>
                        <td>
                            <input type="date" class="form-control">
                        </td>
                        <td>
                            <input type="number" class="form-control" placeholder="Ingrese el valor" min="0">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control">
                                <option value="" selected disabled>Seleccione</option>
                                <option value="debito">Débito</option>
                                <option value="credito">Crédito</option>
                                <<option value="transferencia">Transferencia</option>
                            </select>
                        </td>
                        <td>
                            <input type="date" class="form-control">
                        </td>
                        <td>
                            <input type="number" class="form-control" placeholder="Ingrese el valor" min="0">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container mt-3">
            <div class="mt-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInsertar">Insertar</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar">Eliminar</button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalModificar">Modificar</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalBuscar">Buscar</button>
            </div>
        </div>
        <div class="modal" id="modalInsertar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Mensaje</h4>
                    </div>
                    <div class="modal-body">
                        Transacción insertada correctamente
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="modalEliminar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Mensaje</h4>
                    </div>
                    <div class="modal-body">
                        Transacción eliminada correctamente
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="modalModificar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Mensaje</h4>
                    </div>
                    <div class="modal-body">
                        Transacción modificada correctamente
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="modalBuscar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Mensaje</h4>
                    </div>
                    <div class="modal-body">
                        Búsqueda realizada correctamente
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