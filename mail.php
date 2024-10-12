<?php
require 'db.php';
$cod = random_int(1000, 9999);

//recaptchav2
$ip = $_SERVER['REMOTE_ADDR'];
$captcha = $_POST['g-recaptcha-response'];
$secret_key = "6Ldn2VwqAAAAAGOGxngGVYuWv2nrukSNIpxcjFaP";

$respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$captcha&remoteip=$ip");
$atributos = json_decode($respuesta, TRUE);

if (!empty($_POST['btnSignup'])) {
    //validar campos
    if (!empty($_POST['correo']) && !empty($_POST['contraseña'])) {
        $sql = "INSERT INTO artesano (nom, password, correo, token) VALUES (:nom, :password, :correo, :token)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nom', $_POST['nom']);
        $stmt->bindParam(':correo', $_POST['correo']);
        $stmt->bindParam(':password', $_POST['contraseña']);
        $stmt->bindParam(':token', $cod);
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
$nombre = $_POST['nom'];
// echo ($nombre);
// $nombre = 'Maria';


$destino = 'j.pablo.xyz@gmail.com';
$asunto = 'Correo de verificación';

$mensaje = '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Correo de Verificación</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            .container {
                width: 100%;
                padding: 20px;
                background-color: #f4f4f4;
                text-align: center;
            }

            .email-content {
                background-color: #fff;
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .email-header {
                background-color: #483eff;
                color: white;
                padding: 10px;
                border-radius: 8px 8px 0 0;
            }

            .email-body {
                padding: 20px;
                text-align: center;
            }

            .email-body h2 {
                color: #333;
            }

            .email-body p {
                color: #666;
                line-height: 1.6;
            }

            .verify-btn {
                display: inline-block;
                padding: 10px 20px;
                background-color: #31336f;
                color: white;
                text-decoration: none;
                border-radius: 4px;
                margin-top: 20px;
            }

            .email-footer {
                margin-top: 30px;
                font-size: 12px;
                color: #999;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="email-content">
                <div class="email-header">
                        <h1>' . $cod . '</h1>
                </div>
                <div class="email-body">
                    <h2>Hola, ' . $nombre . '</h2>
                    <p>Gracias por registrarte en nuestro sitio ampara Artes Bolivia. Por favor, haz clic en el botón de abajo para verificar tu dirección de correo electrónico.</p>
                    <a href="http://localhost/amArBo/verificar.php?correo='.$_POST['correo'].'" class="verify-btn">Verificar correo</a>
                    <form action="http://localhost/amArBo/verificar.php?correo='.$_POST['correo'].'" method="POST">
                        <input type="hidden" name="correo" value="'.$_POST['correo'].'">
                        <input type="hidden" name="cod" value="'.$cod.'">
                        <button style="display: none;" type="submit" class="btn btn-primary" >Verificar</button>
                        <a href="http://localhost/amArBo/verificar.php?correo='.$_POST['correo'].'" class="verify-btn">Verificar correo pos?</a>
                    </form>
                    <p>Si no solicitaste este correo, simplemente ignóralo.</p>
                </div>
                <div class="email-footer">
                        <p>&copy; 2024 Tu Sitio Web. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </body>
    </html>
';

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: amArBo <tu_correo@dominio.com>' . "\r\n";
$headers .= 'Return-path: <tu_correo@dominio.com>' . "\r\n";


if (mail($destino, $asunto, $mensaje, $headers)){
    echo 'Correo enviado';
    echo 'favor de verificar su correo';
}
else
    echo 'Error al enviar correo';
