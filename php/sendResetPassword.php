<!doctype html>
<html lang="es">

<?php
    require_once("connecta_db_persistent.php");
    include_once('funciones.php');

    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])){
        $usuarioPost = $_POST['username'];
        $existe = verificarExistencia('',$usuarioPost);
        if($existe != 0){
            mailResetPassword($usuarioPost);
            header("Location:../index.php?redirected=7");
            exit;
        }else{
            header("Location:./sendResetPassword.php?redirected=1");
            exit;
        }
    }

?>

<head>

    <title>EduHaks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/cssPropio.css">

    <link rel="stylesheet" href="../css/style.css">

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
                        <h3 class="mb-4 text-center">Recuperación de la contraseña</h3>

                        <?php
							if(isset($_GET['redirected'])){
                                if($_GET['redirected']==1){
									echo '<p class="mb-4 text-center errorSuPrimo borderPerfe">El mail que has introducido no existe, puedes registrarte directamente con ese correo.</p>';
								}
                            }
                        ?>

                        <form method="POST" action="./sendResetPassword.php">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Usuario o email"
                                    required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Envia correo de
                                    recuperacion</button>
                            </div>
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