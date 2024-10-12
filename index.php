<?php
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>amArBo</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
     <link rel="stylesheet" href="/loginPHP/asset/css/estilos.css">
     <script src="https://kit.fontawesome.com/6125bfb80e.js" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous" defer></script>
</head>

<body>
     <div class="fondo_menu">
          <div class="container-fluid">
               <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                         <a href="#"><img src="image/logoA.png" alt="logo" width="39px" height="39px"></a>
                         <a class="navbar-brand" href="#">Ampara Artes Bolivia </a>
                         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                         </button>
                         <?php if (empty($_SESSION['usuario'])): ?>
                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                   <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                             <a class="nav-link active" aria-current="page" href="#">Productos</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" href="#" >Comunidades</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" href="#">Contactanos</a>
                                        </li>
                                   </ul>

                                   <a href="#"><i class="fa-duotone fa-solid fa-cart-shopping" style="--fa-secondary-color: #2a75bb; font-size: 25px;"></i></a>
                                   <a href="login.php" class="boton">Inicia Session</a>
                                   <a href="signup.php" class="boton">Registrate</a>
                              </div>
                         <?php else: ?>
                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                   <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                             <a class="nav-link active" aria-current="page" href="#">Agregar informacion</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" href="#">Editar perfil</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" href="#">Session de recursos</a>
                                        </li>
                                   </ul>
                                   <a href="/loginPHP/view/home/logout.php" class="boton">Cerrar Sesion</a>
                              </div>
                         <?php endif ?>

                    </div>
               </nav>
          </div>
     </div>
     <div class="bg-primary">
          <h3 style="padding: 21px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias repellat officia nostrum nobis perspiciatis non impedit sit, quas molestiae praesentium beatae facilis optio possimus expedita neque minus? Nostrum, esse natus.
               Itaque ex et sed dicta quaerat laboriosam autem amet aliquid mollitia! Id, aspernatur accusamus harum excepturi corrupti libero commodi totam odio sequi perspiciatis eligendi maxime repudiandae hic. Necessitatibus, labore libero.
               Debitis magni tempore autem quis? Id voluptates ullam dolorum, quam sit, sapiente delectus soluta ex accusamus, eligendi laborum magni similique consequuntur repudiandae voluptatem expedita beatae perferendis iste error debitis veritatis?
               Adipisci, veritatis ratione cupiditate, aliquid ex suscipit non perferendis incidunt eaque repudiandae modi nostrum totam laudantium veniam accusamus animi iusto quaerat sed reiciendis architecto sint a facilis quae expedita! Facere!
               Assumenda odio, impedit neque dolorem facilis in quas doloremque id minima ipsa quo nemo saepe debitis eligendi culpa, praesentium sequi quod quam, quisquam laudantium dicta hic quaerat earum! Iusto, architecto.
               Magni, quis praesentium, architecto corporis aut sint placeat adipisci illum enim itaque ex ad totam ipsam rerum animi quia mollitia saepe. Veritatis voluptates earum impedit quidem nostrum quibusdam inventore at.
               Assumenda modi voluptas quibusdam quas est perspiciatis ex veniam cupiditate consectetur ratione. Perspiciatis pariatur aliquid dicta sed tenetur architecto alias quaerat voluptatem distinctio tempore, repudiandae ea necessitatibus omnis doloremque molestiae!
               autem quis? Id voluptates ullam dolorum, quam sit, sapiente delectus soluta ex accusamus, eligendi laborum magni similique consequuntur repudiandae voluptatem expedita beatae perferendis iste error debitis veritatis?
               Adipisci, veritatis ratione cupiditate, aliquid ex suscipit non perferendis incidunt eaque repudiandae modi nostrum totam laudantium veniam accusamus animi iusto quaerat sed reiciendis architecto sint a facilis quae expedita! Facere!
               Assumenda odio, impedit neque dolorem facilis in quas doloremque id minima ipsa quo nemo saepe debitis eligendi culpa, praesentium sequi quod quam, quisquam laudantium dicta hic quaerat earum! Iusto, architecto.
               Magni, quis praesentium, architecto corporis aut sint placeat adipisci illum enim itaque ex ad totam ipsam rerum animi quia mollitia saepe. Veritatis voluptates earum impedit quidem nostrum quibusdam inventore at.
               Assumenda modi voluptas quibusdam quas est perspiciatis ex veniam cupiditate consectetur ratione. Perspiciatis pariatur aliquid dicta sed tenetur architecto alias quaerat voluptatem distinctio tempore, repudiandae ea necessitatibus omnis doloremque molestiae!</h3>
     </div>

</body>

</html>