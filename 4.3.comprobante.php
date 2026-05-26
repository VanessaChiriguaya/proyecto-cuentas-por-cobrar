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
    <title>Contabilidad - Comprobante Complejo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    <div class="text-center mt-4">
        <img src="logo.png" class="rounded-circle" width="120">
        <h2 class="mt-3">Comprobante Contable</h2>
    </div>

        
        <div class="card p-3 my-3 bg-light">
            <h5 class="fw-bold">Cabecera de Comprobante</h5>
            <div class="row g-3">
                <div class="col-md-3">
                    <input type="text" id="comp_numero" class="form-control" placeholder="Número de Asiento" value="001">
                </div>
                <div class="col-md-3">
                    <input type="date" id="comp_fecha" class="form-control" value="2026-05-18">
                </div>
                <div class="col-md-6">
                    <input type="text" id="comp_obs" class="form-control" placeholder="Observaciones" value="Asiento de diario de prueba">
                </div>
            </div>
        </div>

        <div class="card p-3 my-3">
            <h5 class="fw-bold">Detalle de Comprobante</h5>
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label">Cuenta</label>
                    <select id="det_cuenta" class="form-select">
                        <option value="1.1.1 Caja General">1.1.1 Caja General</option>
                        <option value="2.1.1 Proveedores Locales">2.1.1 Proveedores Locales</option>
                        <option value="3.1.1 Capital Social">3.1.1 Capital Social</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Cantidad Debe ($)</label>
                    <input type="number" id="det_debe" class="form-control" value="0">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Cantidad Haber ($)</label>
                    <input type="number" id="det_haber" class="form-control" value="0">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary w-100" onclick="agregarFilaDetalle()">Agregar a Tabla</button>
                </div>
            </div>

            <table class="table table-bordered mt-3">
                <thead class="table-secondary">
                    <tr>
                        <th>Cuenta</th>
                        <th>Debe</th>
                        <th>Haber</th>
                    </tr>
                </thead>
                <tbody id="tablaDetalles">
                    <tr>
                        <td>1.1.1 Caja General</td>
                        <td class="val-debe">500.00</td>
                        <td class="val-haber">0.00</td>
                    </tr>
                    <tr>
                        <td>3.1.1 Capital Social</td>
                        <td class="val-debe">0.00</td>
                        <td class="val-haber">500.00</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="table-info fw-bold">
                        <td>TOTALES:</td>
                        <td id="totalDebe">500.00</td>
                        <td id="totalHaber">500.00</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="text-center mt-4">
            <button type="button" class="btn btn-success btn-lg mx-1" onclick="ejecutarAccion('insertar')" data-bs-toggle="modal" data-bs-target="#miModal">Insertar</button>
            <button type="button" class="btn btn-warning btn-lg mx-1" onclick="ejecutarAccion('modificar')" data-bs-toggle="modal" data-bs-target="#miModal">Modificar</button>
            <button type="button" class="btn btn-danger btn-lg mx-1" onclick="ejecutarAccion('eliminar')" data-bs-toggle="modal" data-bs-target="#miModal">Eliminar</button>
            <button type="button" class="btn btn-primary btn-lg mx-1" onclick="buscarComprobante()" data-bs-toggle="modal" data-bs-target="#miModal">Buscar</button>
        </div>
    </div>
</div>

<div class="modal fade" id="miModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title">Operación del Sistema</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center fs-5" id="mensajeModal">...</div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function agregarFilaDetalle() {
    let cuenta = document.getElementById("det_cuenta").value;
    let debe = parseFloat(document.getElementById("det_debe").value) || 0;
    let haber = parseFloat(document.getElementById("det_haber").value) || 0;

    if (debe === 0 && haber === 0) {
        alert("Asigne un valor al Debe o al Haber.");
        return;
    }

    let tabla = document.getElementById("tablaDetalles");
    let fila = tabla.insertRow();
    fila.innerHTML = `
        <td>${cuenta}</td>
        <td class="val-debe">${debe.toFixed(2)}</td>
        <td class="val-haber">${haber.toFixed(2)}</td>
        <td><button class="btn btn-sm btn-danger" onclick="eliminarDetalle(this)">X</button></td>
    `;
    calcularTotales();
    document.getElementById("det_debe").value = 0;
    document.getElementById("det_haber").value = 0;
}

function eliminarDetalle(boton) {
    boton.closest('tr').remove();
    calcularTotales();
}

function calcularTotales() {
    let filasDebe = document.querySelectorAll(".val-debe");
    let filasHaber = document.querySelectorAll(".val-haber");
    let tDebe = 0, tHaber = 0;

    filasDebe.forEach(td => tDebe += parseFloat(td.innerText) || 0);
    filasHaber.forEach(td => tHaber += parseFloat(td.innerText) || 0);

    document.getElementById("totalDebe").innerText = tDebe.toFixed(2);
    document.getElementById("totalHaber").innerText = tHaber.toFixed(2);
}

function ejecutarAccion(tipoAccion) {
    let num = document.getElementById("comp_numero").value;
    let tDebe = parseFloat(document.getElementById("totalDebe").innerText);
    let tHaber = parseFloat(document.getElementById("totalHaber").innerText);

    if(!num) {
        document.getElementById("mensajeModal").innerText = "Por favor ingrese el número de comprobante.";
        return;
    }

    if (tDebe !== tHaber || tDebe === 0) {
        document.getElementById("mensajeModal").innerHTML = `
            <b class="text-danger">ACCIÓN RECHAZADA: El asiento está descuadrado.</b><br>
            Totales actuales: Debe $${tDebe.toFixed(2)} | Haber $${tHaber.toFixed(2)}.<br>
            ¡Revise los registros del detalle!`;
        return;
    }

    if(tipoAccion === 'insertar') {
        document.getElementById("mensajeModal").innerHTML = `<b class="text-success">ÉXITO:</b> Comprobante N° ${num} insertado y guardado localmente (Asiento cuadrado).`;
    } else if(tipoAccion === 'modificar') {
        document.getElementById("mensajeModal").innerHTML = `<b class="text-success">ÉXITO:</b> Comprobante N° ${num} modificado y actualizado correctamente.`;
    } else if(tipoAccion === 'eliminar') {
        document.getElementById("mensajeModal").innerHTML = `<b class="text-danger">ELIMINADO:</b> El comprobante N° ${num} fue removido del registro local.`;
        document.getElementById("tablaDetalles").innerHTML = "";
        calcularTotales();
    }
}
function buscarComprobante() {
    let num = document.getElementById("comp_numero").value;
    if(num === "001") {
        document.getElementById("comp_obs").value = "Asiento de diario de prueba (Encontrado)";
        document.getElementById("mensajeModal").innerHTML = `<b class="text-primary">BUSCADO:</b> Comprobante N° 001 encontrado. Datos cargados en pantalla.`;
    } else {
        document.getElementById("mensajeModal").innerText = "Comprobante no encontrado.";
    }
}
</script>
</body>
</html>