<?php
    require_once('connecta_db_persistent.php');
    require_once('funciones.php');
    $url = '';
    $passWdNoIguales = False;

    if(($_SERVER["REQUEST_METHOD"] == "GET") && (isset($_GET['code'])) && (isset($_GET['mail']))){
        $code = $_GET['code'];
        $userMail = $_GET['mail'];
        $url = '?code='.$code.'&mail='.$userMail;
        $existe = verificarExistencia('',$userMail);
        if($existe == 0){
            header("Location:../index.php?redirected=5");   
        }
    }elseif(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_GET['code'])) && (isset($_GET['mail'])) && (isset($_POST['newPassword'])) && (isset($_POST['newPasswordRepeat']))){
        $code = $_GET['code'];
        $userMail = $_GET['mail'];
        $password = $_POST['newPassword'];
        $passwordRep = $_POST['newPasswordRepeat'];
        $existe = verificarExistencia('',$userMail);
        $tiempoExpirado = verificarExpiracion($userMail);
        if($existe != 0){
            if($tiempoExpirado != 0){
                if($password == $passwordRep){
                    $passHash = password_hash($password,PASSWORD_DEFAULT);
                    camviarContraseña($userMail,$code,$passHash);
                    eliminarUserCode(2,$userMail,$code);
                    resetPasswordNotify($userMail);
                    header("Location:../index.php?redirected=9");
                    exit;
                }else{
                    $passWdNoIguales = True;
                }
            }else{
                eliminarUserCode(2,$userMail,$code);
                header("Location:../index.php?redirected=10");
                exit;
            }
        }else{
            header("Location:../index.php?redirected=8");
            exit;
        }
    }else{
        header("Location:../index.php?redirected=8");
        exit;
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
                        if($passWdNoIguales == True){
							echo '<p class="mb-4 text-center errorSuPrimo borderPerfe">La verificacion de la contraseña no coincide.</p>';
						}
                        ?>
                        <form method="POST" action=<?php echo "./resetPassword.php".$url ?>>
                            <div class="form-group">
                                <input type="password" name="newPassword" class="form-control" placeholder="Nueva contraseña"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="newPasswordRepeat" class="form-control" placeholder="Verifica la nueva contraseña"
                                    required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Cambia la contraseña</button>
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
