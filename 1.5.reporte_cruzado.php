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
    <title>Reporte Cruzado - Facturación</title>

    <link rel="stylesheet" href="css/estilos_facturación.css">
</head>

<body>

    <header class="encabezado">
        <img src="logo.png" alt="Logo" class="logo">
        <h1>Facturación Grupo 6</h1>
    </header>

    <main class="contenedor">

        <h2>Pantalla Reporte 2: Reporte por cliente y artículo</h2>

        <p>
            Reporte cruzado donde las filas representan a los clientes, las columnas a los artículos
            y los valores centrales muestran el valor de las ventas.
        </p>

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

                <button class="buscar" onclick="mostrarMensaje('Reporte cruzado generado según el rango de fechas seleccionado')">
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
                    <th>Cliente / Artículo</th>
                    <th>Chocolate artesanal</th>
                    <th>Café molido</th>
                    <th>Galletas integrales</th>
                    <th>Total cliente</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Vanessa Chiriguaya</td>
                    <td>$150.00</td>
                    <td>$80.00</td>
                    <td>$40.00</td>
                    <td>$270.00</td>
                </tr>

                <tr>
                    <td>Abigail Quillupangui</td>
                    <td>$200.00</td>
                    <td>$120.00</td>
                    <td>$60.00</td>
                    <td>$380.00</td>
                </tr>

                <tr>
                    <td>Emerson Coro</td>
                    <td>$90.00</td>
                    <td>$70.00</td>
                    <td>$30.00</td>
                    <td>$190.00</td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <th>Total artículo</th>
                    <th>$440.00</th>
                    <th>$270.00</th>
                    <th>$130.00</th>
                    <th>$840.00</th>
                </tr>
            </tfoot>
        </table>

    </main>

    <footer class="pie">
        Módulo Facturación - Reporte Cruzado Cliente / Artículo - Luis Alejandro Sánchez Durán
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