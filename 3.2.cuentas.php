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
        <div class="container">
            <img src="logo.png" class="rounded-circle" alt="Cinque Terre" width="100" height="100">
            <h4 class="mt-3">CUENTA BANCARIA</h4>
            <div class="bg-info p-3">
                <div class="form-group">
                    <label>Número de cuenta: </label>
                    <input type="text" class="form-control" placeholder="Ingrese el numero de cuenta">
                </div>
                <div class="form-group">
                    <label>Cliente: </label>
                    <input type="text" class="form-control" placeholder="Ingrese el cliente">
                </div>
                <div class="form-group">
                    <label>Descripción: </label>
                    <input type="text" class="form-control" placeholder="Ingrese la descripción">
                </div>
            </div>   
            <div class="mt-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInsertar">Insertar</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar">Eliminar</button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalModificar">Modificar</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalBuscar">Buscar</button>
            </div>
            <h4 class="mt-3">Tabla resumen</h4>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                    <th>Número de cuenta</th>
                    <th>Cliente</th>
                    <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2200484815</td>
                        <td>Juan Caceres</td>
                        <td>Ahorros</td>
                    </tr>
                    <tr>
                        <td>1500085852</td>
                        <td>María Pérez</td>
                        <td>Corriente</td>
                    </tr>
                    <tr>
                        <td>2000047870</td>
                        <td>Carlos Fuentes</td>
                        <td>Gana dólar</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal" id="modalInsertar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h4>Mensaje</h4></div>
                        <div class="modal-body">Insertado correctamente</div>
                        <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="modalEliminar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h4>Mensaje</h4></div>
                        <div class="modal-body">Eliminado correctamente</div>
                        <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="modalModificar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h4>Mensaje</h4></div>
                        <div class="modal-body">Modificado correctamente</div>
                        <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="modalBuscar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h4>Mensaje</h4></div>
                        <div class="modal-body">Encontrado correctamente</div>
                        <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
