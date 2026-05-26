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
    <title>Ciudad de Entrega - Facturación</title>

    <link rel="stylesheet" href="css/estilos_facturación.css">
</head>

<body>

    <header class="encabezado">
        <img src="logo.png" alt="Logo" class="logo">
        <h1>Facturación Grupo 6</h1>
    </header>

    <main class="contenedor">

        <h2>Pantalla Simple 2: Ciudad de Entrega</h2>

        <form class="formulario">

            <div class="campo">
                <label>Código:</label>
                <input type="text" placeholder="Ingrese código">
            </div>

            <div class="campo">
                <label>Nombre de ciudad:</label>
                <input type="text" placeholder="Ingrese ciudad">
            </div>

        </form>

        <div class="botones">
            <button class="guardar" onclick="mostrarMensaje('Ciudad guardada correctamente')">Guardar</button>
            <button class="modificar" onclick="mostrarMensaje('Ciudad modificada correctamente')">Modificar</button>
            <button class="eliminar" onclick="mostrarMensaje('Ciudad eliminada correctamente')">Eliminar</button>
            <button class="buscar" onclick="mostrarMensaje('Búsqueda de ciudad finalizada')">Buscar</button>
            <button class="regresar" onclick="mostrarMensaje('Regresando al menú de facturación')">Regresar</button>
        </div>

        <table class="tabla">

            <thead>
                <tr>
                    <th>Código</th>
                    <th>Ciudad</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>C001</td>
                    <td>Quito</td>
                </tr>

                <tr>
                    <td>C002</td>
                    <td>Guayaquil</td>
                </tr>

                <tr>
                    <td>C003</td>
                    <td>Cuenca</td>
                </tr>

                <tr>
                    <td>C004</td>
                    <td>Ambato</td>
                </tr>
            </tbody>

        </table>

    </main>

    <footer class="pie">
        Módulo Facturación - Pantalla Ciudad de Entrega - Luis Alejandro Sánchez Durán
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