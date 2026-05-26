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
    <title>Clientes - Facturación</title>

    <link rel="stylesheet" href="css/estilos_facturación.css">
</head>

<body>

    <header class="encabezado">
        <img src="logo.png" alt="Logo" class="logo">
        <h1>Facturación Grupo 6</h1>
    </header>

    <main class="contenedor">
        <h2>Pantalla simple 1: Clientes</h2>

        <form class="formulario">
            <div class="campo">
                <label>RUC:</label>
                <input type="text" placeholder="Ingrese RUC">
            </div>

            <div class="campo">
                <label>Nombre:</label>
                <input type="text" placeholder="Ingrese nombre">
            </div>

            <div class="campo">
                <label>Dirección:</label>
                <input type="text" placeholder="Ingrese dirección">
            </div>
        </form>

        <div class="botones">
            <button class="guardar" onclick="mostrarMensaje('Cliente guardado correctamente')">Guardar</button>
            <button class="modificar" onclick="mostrarMensaje('Cliente modificado correctamente')">Modificar</button>
            <button class="eliminar" onclick="mostrarMensaje('Cliente eliminado correctamente')">Eliminar</button>
            <button class="buscar" onclick="mostrarMensaje('Búsqueda de cliente finalizada')">Buscar</button>
            <button class="regresar" onclick="mostrarMensaje('Regresando al menú de facturación')">Regresar</button>
        </div>

        <table class="tabla">
            <thead>
                <tr>
                    <th>RUC</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1723456789001</td>
                    <td>Vanessa Chiriguaya</td>
                    <td>Quito</td>
                </tr>
                <tr>
                    <td>0912345678001</td>
                    <td>Abigail Quillupangui</td>
                    <td>Guayaquil</td>
                </tr>
                <tr>
                    <td>0609876543001</td>
                    <td>Emerson Coro</td>
                    <td>Cuenca</td>
                </tr>
            </tbody>
        </table>
    </main>

    <footer class="pie">
        Módulo Facturación - Pantalla Clientes - Luis Alejandro Sánchez Durán
    </footer>

    <div class="modal" id="modal">
        <div class="modal-contenido">
            <h3>Mensaje del sistema</h3>
            <p id="mensajeModal"></p>
            <button type="button" onclick="cerrarModal()">Aceptar</button>
        </div>
    </div>

    <script>
        function mostrarMensaje(mensaje) {
            document.getElementById("mensajeModal").innerText = mensaje;
            document.getElementById("modal").style.display = "flex";
        }

        function cerrarModal() {
            document.getElementById("modal").style.display = "none";
        }
    </script>
</body>
</html>