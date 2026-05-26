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
        <title>Usuarios</title>
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
            <h4 class="mt-3">USUARIOS</h4>
            <div class="bg-info p-3 mt-3">
                <div class="form-group">
                    <label>Código:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el código">
                </div>
                <div class="form-group">
                    <label>Usuario:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el nombre de usuario">
                </div>
                <div class="form-group">
                    <label>Clave:</label>
                    <input type="password" class="form-control" placeholder="Ingrese la clave">
                </div>
            </div>
            <table class="table table-bordered table-hover text-center mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>Código</th>
                        <th>Usuario</th>
                        <th>Clave</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>grupo6</td>
                        <td>admin</td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>admin</td>
                        <td>12345</td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>supervisor</td>
                        <td>super</td>
                    </tr>
                </tbody>
            </table>
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
                        Usuario insertado correctamente
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
                        Usuario eliminado correctamente
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
                        Usuario modificado correctamente
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
                        Usuario encontrado correctamente
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
        </div>
    </body>
</html>
