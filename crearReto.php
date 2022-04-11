<?php
  session_start();
  if(!isset($_SESSION['username']) && !isset($_COOKIE['nombre'])){
    header("Location: index.php?redirected=1");
    exit;
  }
?>

<!doctype html>
<html lang="es">

<head>
    <title>Añadir Reto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/cssPropio.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body class="img js-fullheight">
    <section class="ftco-section parallax">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h1 class="heading-section">EduHaks</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Crear Reto</h3>

                        <form method="POST" action="./php/añadirReto.php" class="signin-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <input id="password-field" name="titulo" type="text" class="form-control" placeholder="Escribir titulo..." required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" name="descripcion" type="text" class="form-control" placeholder="Escribir descripcion..." required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" name="flag" type="text" class="form-control" placeholder="Escribir flag..." required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" name="puntuacion" type="text" class="form-control" placeholder="Escribir puntuacion maxima..." required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" name="hashtags" type="text" class="form-control" placeholder="Añadir Hashtags..." required>
                            </div>
                            <div class="form-group">
                            <div class="form-group">
                                <input id="password-field" name="fichero" type="file" class="form-control" placeholder="Poner fichero">
                            </div>
                                <button type="submit" class="form-control btn btn-primary submit px-3">Enviar</button>
                            </div>
                        </form>
                        <form method="get" action="home.php">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Volver</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>