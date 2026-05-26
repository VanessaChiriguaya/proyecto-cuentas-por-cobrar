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
    <title>Tipo de Cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <div class="text-center mt-4">
        <img src="logo.png" class="rounded-circle" width="120">
        <h2 class="mt-3">Tipo de Cuenta</h2>
    </div>

    <form class="row g-3 mt-4">

        <div class="col-md-4">
                <input type="text" id="c_codigo" class="form-control" placeholder="Código (Ej: 1.1.1)">
            </div>
            <div class="col-md-4">
                <input type="text" id="c_nombre" class="form-control" placeholder="Nombre de la Cuenta">
            </div>


        <div class="col-12 text-center">
            <button type="button" class="btn btn-success"
            onclick="insertarDato()" data-bs-toggle="modal" data-bs-target="#miModal">
            Insertar
            </button>

            <button type="button" class="btn btn-warning"
            onclick="modificarDato()" data-bs-toggle="modal" data-bs-target="#miModal">
            Modificar
            </button>

            <button type="button" class="btn btn-danger"
            onclick="eliminarDato()" data-bs-toggle="modal" data-bs-target="#miModal">
            Eliminar
            </button>

            <button type="button" class="btn btn-primary"
            onclick="buscarDato()" data-bs-toggle="modal" data-bs-target="#miModal">
            Buscar
            </button>
        </div>

    </form>

    <table class="table table-hover mt-4">
        <thead class="table-dark">
            <tr>
                <th>Código</th>
                <th>Nombre</th>
            </tr>
        </thead>

        <tbody id="tablaDatos">
            <tr>
                <td>101</td>
                <td>Caja</td>
            </tr>
        </tbody>

        <tbody id="tablaDatos">
            <tr>
                <td>102</td>
                <td>Salario</td>
            </tr>
        </tbody>

        <tbody id="tablaDatos">
            <tr>
                <td>103</td>
                <td>Ventas</td>
            </tr>
        </tbody>
    </table>

</div>

<div class="modal fade" id="miModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5>Mensaje</h5>
      </div>

      <div class="modal-body" id="mensajeModal">
        ...
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

function insertarDato() {

    let codigo = document.getElementById("codigo").value;
    let nombre = document.getElementById("nombre").value;

    if(codigo === "" || nombre === ""){
        document.getElementById("mensajeModal").innerText = "Complete todos los campos";
        return;
    }

    let tabla = document.getElementById("tablaDatos");
    let fila = tabla.insertRow();

    fila.insertCell(0).innerText = codigo;
    fila.insertCell(1).innerText = nombre;
    document.getElementById("mensajeModal").innerText = "Dato insertado correctamente";
}

function buscarDato() {

    let codigo = document.getElementById("codigo").value;
    let tabla = document.getElementById("tablaDatos");

    if(codigo === ""){
        document.getElementById("mensajeModal").innerText = "Ingrese un código para buscar";
        return;
    }

    let encontrado = false;

    for(let i = 0; i < tabla.rows.length; i++){
        let fila = tabla.rows[i];

        if(fila.cells[0].innerText === codigo){
            document.getElementById("nombre").value = fila.cells[1].innerText;
            encontrado = true;
        }
    }

    if(encontrado){
        document.getElementById("mensajeModal").innerText = "Dato encontrado";
    } else {
        document.getElementById("mensajeModal").innerText = "Dato no encontrado";
    }
}

function modificarDato() {

    let codigo = document.getElementById("codigo").value;
    let nombre = document.getElementById("nombre").value;

    let tabla = document.getElementById("tablaDatos");

    if(codigo === ""){
        document.getElementById("mensajeModal").innerText = "Ingrese un código para modificar";
        return;
    }

    let modificado = false;

    for(let i = 0; i < tabla.rows.length; i++){
        let fila = tabla.rows[i];

        if(fila.cells[0].innerText === codigo){
            fila.cells[1].innerText = nombre;
            modificado = true;
        }
    }

    if(modificado){
        document.getElementById("mensajeModal").innerText = "Dato modificado correctamente";
    } else {
        document.getElementById("mensajeModal").innerText = "No se encontró el dato";
    }
}

function eliminarDato() {

    let codigo = document.getElementById("codigo").value;
    let tabla = document.getElementById("tablaDatos");

    if(codigo === ""){
        document.getElementById("mensajeModal").innerText = "Ingrese un código para eliminar";
        return;
    }

    let eliminado = false;

    for(let i = 0; i < tabla.rows.length; i++){
        let fila = tabla.rows[i];

        if(fila.cells[0].innerText === codigo){
            tabla.deleteRow(i);
            eliminado = true;
            break;
        }
    }

    if(eliminado){
        document.getElementById("mensajeModal").innerText = "Dato eliminado correctamente";
    } else {
        document.getElementById("mensajeModal").innerText = "No se encontró el dato";
    }
}

</script>


</body>
</html>