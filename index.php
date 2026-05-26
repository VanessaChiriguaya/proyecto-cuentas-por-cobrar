<?php
session_start();
$usuario_guardado = "grupo6";
$clave_guardada = "admin";
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    if ($usuario == $usuario_guardado && $clave == $clave_guardada) {
        $_SESSION["usuario"] = $usuario;
        header("Location: menu.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body class="bg-white">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-10 col-sm-6 col-md-4 col-lg-3 border border-secondary p-1">
                    <div class="bg-primary text-white text-center font-weight-bold py-2" style="font-size: 22px;">
                        PROYECTO P1
                    </div>
                    <div class="p-4">
                        <div class="text-center mb-4">
                            <img src="logo.png" class="rounded-circle img-fluid w-65" alt="Logo Banco">
                        </div>
                        <form method="POST" action="index.php">
                            <div class="form-group">
                                <label>Usuario:</label>
                                <input type="text" name="usuario" class="form-control form-control-sm" placeholder="Ingrese su usuario" required>
                            </div>
                            <div class="form-group">
                                <label>Contraseña:</label>
                                <input type="password" name="clave" class="form-control form-control-sm" placeholder="Ingrese su contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm btn-block">Login</button>

                            <?php if ($error != "") { ?>
                                <div class="alert alert-danger mt-3 py-2 text-center">
                                    <?php echo $error; ?>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>