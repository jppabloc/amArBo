<?php
require 'db.php';
$usuario_creado = false;

//recaptchav2
$ip = $_SERVER['REMOTE_ADDR'];
$captcha = $_POST['g-recaptcha-response'];
$secret_key = "6Ldn2VwqAAAAAGOGxngGVYuWv2nrukSNIpxcjFaP";

$respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$captcha&remoteip=$ip");
$atributos = json_decode($respuesta, TRUE);

if (!empty($_POST['btnSignup'])) {
    //validar campos
    if (!empty($_POST['correo']) && !empty($_POST['contraseña'])) {
        $sql = "INSERT INTO artesano (nom, password, correo) VALUES (:nom, :password, :correo)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nom', $_POST['nom']);
        $stmt->bindParam(':correo', $_POST['correo']);
        $stmt->bindParam(':password', $_POST['contraseña']);
        $pasword = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $pasword);

        if ($atributos['success']) {
            if ($stmt->execute()) {
                echo "<script>console.log('usuario creado')</script>";
                $usuario_creado = true;
            }
        } else {
            $message = "Error en el recaptcha";
            // echo $message;
            $error_recaptcha = true;
            echo "<script>console.log('Error en recaptcha')</script>";
        }
    } else {
        // echo "\n campos vacios";
        $campo_vacio = true;
        echo "<script>console.log('campos vacios')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="/loginPHP/asset/css/estilos.css">
    <script src="https://kit.fontawesome.com/6125bfb80e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous" defer></script>

    <script src="js/main.js" defer></script>
</head>

<body>
    <div class="fondo-login">
        <div class="icon">
            <a href="index.php">
                <img src="image/logoA.png" alt="logo" style="width: 150px; height: 150px">
            </a>
        </div>
        <div class="titulo">
            Create una cuenta en amArBo
        </div>
        <form action="mail.php" method="POST" class="col-3 login" autocomplete="off">
            <div class="mb-3">
                <label for="exampleInputText1" class="form-label">nombres</label>
                <input type="text" name="nom" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">dirección de correo electrónico</label>
                <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">contraseña</label>
                <div class="box-eye">
                    <button type="button">
                        <i id="eyepassword" class="fa-solid fa-eye changePassword" style="font-size: 20px;"></i>
                    </button>
                </div>
                <input type="password" name="contraseña" class="form-control" id="password">
                <span id="campoOK" class="form-text"></span>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">repetir contraseña</label>
                <div class="box-eye">
                    <button type="button">
                        <i id="eyepassword2" class="fa-solid fa-eye changePassword" style="font-size: 20px;"></i>
                    </button>
                </div>
                <input type="password" name="confirmarContraseña" class="form-control" id="password2">
                <span id="campoOK2" class="form-text"></span>
            </div>
            <!-- captcha -->
            <div class='mb-3'>
                <div class="g-recaptcha" data-sitekey="6Ldn2VwqAAAAAMK3CzBnuKI7eCUMIZNsQKWyZiug">
                </div>
            </div>
            <div class="d-grid gap-2">
                <!-- <button type="submit" class="btn btn-primary" name="btnSignup2">CREAR CUENTA</button> -->
                <input type="submit" value="CREAR CUENTA" class="btn btn-primary" name="btnSignup">
            </div>
        </form>
        <div class="login col-3 mt-3">
            Tienes una cuenta? <a href="login.php" style="text-decoration: none;">Inicia Sesion</a>
        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>

</html>