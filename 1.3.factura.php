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
    <title>Factura - Facturación</title>

    <link rel="stylesheet" href="css/estilos_facturación.css">
</head>

<body>

    <header class="encabezado">
        <img src="logo.png" alt="Logo" class="logo">
        <h1>Facturación Grupo 6</h1>
    </header>

    <main class="contenedor">

        <h2>Pantalla Compleja: Cabecera y Detalle de Factura</h2>

        <h3>Cabecera de factura</h3>

        <form class="formulario">
            <div class="campo">
                <label>Número de factura:</label>
                <input type="text" placeholder="Ej: F001">
            </div>

            <div class="campo">
                <label>Fecha:</label>
                <input type="date">
            </div>

            <div class="campo">
                <label>Ciudad de entrega:</label>
                <select>
                    <option>Seleccione ciudad</option>
                    <option>Quito</option>
                    <option>Guayaquil</option>
                    <option>Cuenca</option>
                    <option>Ambato</option>
                </select>
            </div>

            <div class="campo">
                <label>Cliente:</label>
                <select>
                    <option>Seleccione cliente</option>
                    <option>Vanessa Chiriguaya</option>
                    <option>Abigail Quillupangui</option>
                    <option>Emerson Coro</option>
                </select>
            </div>
        </form>

        <h3>Detalle de factura</h3>

        <form class="formulario">
            <div class="campo">
                <label>Artículo:</label>
                <input type="text" placeholder="Ingrese artículo">
            </div>

            <div class="campo">
                <label>Cantidad:</label>
                <input type="number" placeholder="Ingrese cantidad">
            </div>

            <div class="campo">
                <label>Precio:</label>
                <input type="number" placeholder="Ingrese precio">
            </div>
        </form>

        <div class="botones">
            <button class="guardar" onclick="mostrarMensaje('Detalle agregado correctamente')">Agregar detalle</button>
            <button class="modificar" onclick="mostrarMensaje('Detalle modificado correctamente')">Modificar detalle</button>
            <button class="eliminar" onclick="mostrarMensaje('Detalle eliminado correctamente')">Eliminar detalle</button>
            <button class="guardar" onclick="mostrarMensaje('Factura guardada correctamente')">Guardar factura</button>
            <button class="imprimir" onclick="window.print()">Imprimir</button>
            <button class="regresar" onclick="mostrarMensaje('Regresando al menú de facturación')">Regresar</button>
        </div>

        <table class="tabla">
            <thead>
                <tr>
                    <th>Artículo</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Chocolate artesanal</td>
                    <td>2</td>
                    <td>$5.00</td>
                    <td>$10.00</td>
                </tr>

                <tr>
                    <td>Café molido</td>
                    <td>1</td>
                    <td>$8.00</td>
                    <td>$8.00</td>
                </tr>

                <tr>
                    <td>Galletas integrales</td>
                    <td>3</td>
                    <td>$2.00</td>
                    <td>$6.00</td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th>$24.00</th>
                </tr>
            </tfoot>
        </table>

    </main>

    <footer class="pie">
        Módulo Facturación - Pantalla Compleja de Factura - Luis Alejandro Sánchez Durán
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