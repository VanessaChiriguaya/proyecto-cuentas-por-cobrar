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
    <body class="bg-white">
        <div class="text-white p-5" style="background-color: #4B5320;">
            <h2 class="text-white text-shadow">MENÚ PRINCIPAL</h2>
            <style>
            .text-shadow {
            text-shadow: 1px 1px 3px rgba(0,0,0,0.6);
            }
            </style>
        </div>
        <div class="container-fluid mt-3">
            <div class="row align-items-start">
                <div class="col-3 text-left">
                    <img src="logo.png" class="rounded-circle border border-dark img-fluid" width="120" height="120" alt="Logo">
                </div>
                <div class="col-6 text-center">
                    <h3 class="font-weight-bold mt-5">GRUPO #6</h3>
                </div>
                <div class="col-3 text-right">
                    <a href="logout.php" class="btn btn-outline-info font-weight-bold">Cerrar Sesión</a>
                </div>
            </div>
            <div class="row justify-content-center text-center mt-4" id="menuOpciones">
                <div class="col-md-2 mb-3">
                    <button class="btn btn-outline-dark font-weight-bold btn-block" type="button" data-toggle="collapse" data-target="#facturacion">Facturacion</button>
                    <div class="collapse mt-3" id="facturacion" data-parent="#menuOpciones">
                        <a href="facturacion/1.1.clientes.php" class="btn btn-outline-info font-weight-bold btn-block mb-2">Clientes</a>
                        <a href="facturacion/1.2.ciudad_entrega.php" class="btn btn-outline-info font-weight-bold btn-block mb-2">Ciudad de entrega</a>
                        <a href="facturacion/1.3.factura.php" class="btn btn-outline-info font-weight-bold btn-block mb-2">Factura</a>
                        <a href="facturacion/1.4.reporte_ciudad.php" class="btn btn-outline-info font-weight-bold btn-block mb-2">Reporte por ciudad</a>
                        <a href="facturacion/1.5.reporte_cruzado.php" class="btn btn-outline-info font-weight-bold btn-block mb-2">Reporte cruzado</a>
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <button class="btn btn-outline-dark font-weight-bold btn-block" type="button" data-toggle="collapse" data-target="#cuentasCobrar">Cuentas x Cobrar</button>
                    <div class="collapse mt-3" id="cuentasCobrar" data-parent="#menuOpciones">
                        <a href="cuentasxcobrar/2.1.cobrador.php" class="btn btn-outline-success font-weight-bold btn-block mb-2">Cobrador</a>
                        <a href="cuentasxcobrar/2.2.formas_pago.php" class="btn btn-outline-success font-weight-bold btn-block mb-2">Formas de pago</a>
                        <a href="cuentasxcobrar/2.3.cabecera_facturas.php" class="btn btn-outline-success font-weight-bold btn-block mb-2">Cabecera de facturas</a>
                        <a href="cuentasxcobrar/2.4.estado_cuenta.php" class="btn btn-outline-success font-weight-bold btn-block mb-2">Estados de cuenta</a>
                        <a href="cuentasxcobrar/2.5.valores_recaudados.php" class="btn btn-outline-success font-weight-bold btn-block mb-2">Valores recaudados</a>
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <button class="btn btn-outline-dark font-weight-bold btn-block" type="button" data-toggle="collapse" data-target="#bancos">Bancos</button>
                    <div class="collapse mt-3" id="bancos" data-parent="#menuOpciones">
                        <a href="bancos/3.1.tipos_transaccion.php" class="btn btn-outline-info font-weight-bold btn-block mb-2">Tipos de transacción</a>
                        <a href="bancos/3.2.cuentas.php" class="btn btn-outline-info font-weight-bold btn-block mb-2">Cuenta bancaria</a>
                        <a href="bancos/3.3.transacciones.php" class="btn btn-outline-info font-weight-bold btn-block mb-2">Cabecera/Detalle Transacción</a>
                        <a href="bancos/3.4.saldos.php" class="btn btn-outline-info font-weight-bold btn-block mb-2">Reporte saldo</a>
                        <a href="bancos/3.5.reportes.php" class="btn btn-outline-info font-weight-bold btn-block mb-2">Reporte cruzado</a>
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <button class="btn btn-outline-dark font-weight-bold btn-block" type="button" data-toggle="collapse" data-target="#contabilidad">Contabilidad</button>
                    <div class="collapse mt-3" id="contabilidad" data-parent="#menuOpciones">
                        <a href="contabilidad/4.1.tipo_cuenta.php" class="btn btn-outline-success font-weight-bold btn-block mb-2">Tipo de cuenta</a>
                        <a href="contabilidad/4.2.cuenta.php" class="btn btn-outline-success font-weight-bold btn-block mb-2">Cuenta</a>
                        <a href="contabilidad/4.3.comprobante.php" class="btn btn-outline-success font-weight-bold btn-block mb-2">Comprobante</a>
                        <a href="contabilidad/4.4.balance_general.php" class="btn btn-outline-success font-weight-bold btn-block mb-2">Balance general</a>
                        <a href="contabilidad/4.5.estado_resultados.php" class="btn btn-outline-success font-weight-bold btn-block mb-2">Estados de resultados</a>
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <a href="usuarios.php" class="btn btn-outline-dark font-weight-bold btn-block">Usuarios</a>
                </div>
            </div>
        </div>
    </body>
</html>