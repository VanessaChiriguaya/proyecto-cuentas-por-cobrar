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
    <title>Reporte por Ciudad - Facturación</title>

    <link rel="stylesheet" href="css/estilos_facturación.css">
</head>

<body>

    <header class="encabezado">
        <img src="logo.png" alt="Logo" class="logo">
        <h1>Facturación Grupo 6</h1>
    </header>

    <main class="contenedor">

        <h2>Pantalla Reporte 1: Ventas por ciudad</h2>

        <div class="filtro-reporte">
            <h3>Filtro de reporte</h3>

            <div class="filtro-campos">
                <div class="campo">
                    <label>Fecha desde:</label>
                    <input type="date">
                </div>

                <div class="campo">
                    <label>Fecha hasta:</label>
                    <input type="date">
                </div>

                <button class="buscar" onclick="mostrarMensaje('Reporte por ciudad generado según el rango de fechas seleccionado')">
                    Buscar por fecha
                </button>

                <button class="imprimir" onclick="window.print()">Imprimir</button>


                <button class="regresar" onclick="mostrarMensaje('Regresando al menú de facturación')">
                    Regresar
                </button>
            </div>
        </div>

        <table class="tabla">
            <thead>
                <tr>
                    <th>Ciudad</th>
                    <th>Valor</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Quito</td>
                    <td>$1,250.00</td>
                </tr>

                <tr>
                    <td>Guayaquil</td>
                    <td>$980.00</td>
                </tr>

                <tr>
                    <td>Cuenca</td>
                    <td>$720.00</td>
                </tr>

                <tr>
                    <td>Ambato</td>
                    <td>$410.00</td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <th>Total general</th>
                    <th>$3,360.00</th>
                </tr>
            </tfoot>
        </table>

    </main>

    <footer class="pie">
        Módulo Facturación - Reporte de Ventas por Ciudad - Luis Alejandro Sánchez Durán
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