<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
     <link rel="stylesheet" href="/loginPHP/asset/css/estilos.css">
     <script src="https://kit.fontawesome.com/6125bfb80e.js" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous" defer></script>
</head>

<body>
    <div class="fondo-login">
        <div class="icon">
            <a href="index.php">
                <!-- <i class="fa-solid fa-shield-dog dog-icon"></i> -->
                <img src="image/logoA.png" style="width: 150; height:150px;" alt="logo">
            </a>
        </div>
        <div class="titulo">
            Inicia sesion en amArBo
        </div>
        <form action="verificar.php" method="POST" class="col-3 login" autocomplete="off">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <div class="box-eye">
                    <button type="button" onclick="mostrarContraseña('password','eyepassword')">
                        <i id="eyepassword" class="fa-solid fa-eye changePassword"></i>
                    </button>
                </div>
                <input type="password" name="contraseña" class="form-control" id="password">
            </div>
            <?php if (!empty($_GET['error'])): ?>
                <div id="alertError" style="margin: auto;" class="alert alert-danger mb-2" role="alert">
                    <?= !empty($_GET['error']) ? $_GET['error'] : "" ?>
                </div>
            <?php endif; ?>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <div class="login col-3 mt-3">
            Nuevo en DogCom? <a href="signup.php" style="text-decoration: none;">Create una cuenta</a>
        </div>
    </div>
</body>

</html>