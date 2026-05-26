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
    <title>Contabilidad - Cuentas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    <div class="text-center mt-4">
        <img src="logo.png" class="rounded-circle" width="120">
        <h2 class="mt-3">Cuenta</h2>
    </div>

        
        <form class="row g-3">
            <div class="col-md-4">
                <input type="text" id="c_codigo" class="form-control" placeholder="Código (Ej: 1.1.1)">
            </div>
            <div class="col-md-4">
                <input type="text" id="c_nombre" class="form-control" placeholder="Nombre de la Cuenta">
            </div>
            <div class="col-md-4">
                <select id="c_tipo" class="form-select">
                    <option value="">Tipo de cuenta</option>
                    <option>Activo</option>
                    <option>Pasivo</option>
                    <option>Capital</option>
                    <option>Ingreso</option>
                    <option>Egreso</option>
                </select>
            </div>
            
            <div class="col-12 text-center mt-4">
                <button type="button" class="btn btn-success" onclick="insertarCuenta()" data-bs-toggle="modal" data-bs-target="#miModal">Insertar</button>
                <button type="button" class="btn btn-warning" onclick="modificarCuenta()" data-bs-toggle="modal" data-bs-target="#miModal">Modificar</button>
                <button type="button" class="btn btn-danger" onclick="eliminarCuenta()" data-bs-toggle="modal" data-bs-target="#miModal">Eliminar</button>
                <button type="button" class="btn btn-primary" onclick="buscarCuenta()" data-bs-toggle="modal" data-bs-target="#miModal">Buscar</button>
            </div>
        </form>

        <table class="table table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Nombre de Cuenta</th>
                    <th>Tipo de Cuenta</th>
                </tr>
            </thead>
            <tbody id="tablaCuentas">
                <tr><td>1.1.1</td><td>Caja General</td><td>Activo</td></tr>
                <tr><td>2.1.1</td><td>Proveedores Locales</td><td>Pasivo</td></tr>
                <tr><td>3.1.1</td><td>Capital Social</td><td>Capital</td></tr>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="miModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title">Mensaje</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center fs-5" id="mensajeModal">...</div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function insertarCuenta() {
    let cod = document.getElementById("c_codigo").value;
    let nom = document.getElementById("c_nombre").value;
    let tipo = document.getElementById("c_tipo").value;
    if(!cod || !nom || !tipo) {
        document.getElementById("mensajeModal").innerText = "Complete todos los campos";
        return;
    }
    let tabla = document.getElementById("tablaCuentas");
    let fila = tabla.insertRow();
    fila.insertCell(0).innerText = cod;
    fila.insertCell(1).innerText = nom;
    fila.insertCell(2).innerText = tipo;
    document.getElementById("mensajeModal").innerText = "Cuenta insertada correctamente";
}

function buscarCuenta() {
    let cod = document.getElementById("c_codigo").value;
    let tabla = document.getElementById("tablaCuentas");
    if(!cod) { document.getElementById("mensajeModal").innerText = "Ingrese un código para buscar"; return; }
    
    for(let i=0; i<tabla.rows.length; i++) {
        if(tabla.rows[i].cells[0].innerText === cod) {
            document.getElementById("c_nombre").value = tabla.rows[i].cells[1].innerText;
            document.getElementById("c_tipo").value = tabla.rows[i].cells[2].innerText;
            document.getElementById("mensajeModal").innerText = "Cuenta encontrada";
            return;
        }
    }
    document.getElementById("mensajeModal").innerText = "Cuenta no encontrada";
}

function modificarCuenta() {
    let cod = document.getElementById("c_codigo").value;
    let nom = document.getElementById("c_nombre").value;
    let tipo = document.getElementById("c_tipo").value;
    let tabla = document.getElementById("tablaCuentas");
    if(!cod) { document.getElementById("mensajeModal").innerText = "Ingrese el código a modificar"; return; }

    for(let i=0; i<tabla.rows.length; i++) {
        if(tabla.rows[i].cells[0].innerText === cod) {
            tabla.rows[i].cells[1].innerText = nom;
            tabla.rows[i].cells[2].innerText = tipo;
            document.getElementById("mensajeModal").innerText = "Cuenta modificada correctamente";
            return;
        }
    }
    document.getElementById("mensajeModal").innerText = "No se encontró el código";
}

function eliminarCuenta() {
    let cod = document.getElementById("c_codigo").value;
    let tabla = document.getElementById("tablaCuentas");
    if(!cod) { document.getElementById("mensajeModal").innerText = "Ingrese el código a eliminar"; return; }

    for(let i=0; i<tabla.rows.length; i++) {
        if(tabla.rows[i].cells[0].innerText === cod) {
            tabla.deleteRow(i);
            document.getElementById("mensajeModal").innerText = "Cuenta eliminada correctamente";
            return;
        }
    }
    document.getElementById("mensajeModal").innerText = "No se encontró la cuenta";
}
</script>
</body>
</html>