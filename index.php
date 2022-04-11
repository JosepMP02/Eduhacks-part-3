<!doctype html>
<html lang="es">

<head>
    <title>EduHaks</title>
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
                        <h3 class="mb-4 text-center">Login</h3>

                        <?php
							if(isset($_COOKIE[session_name()]) && isset($_COOKIE['nombre'])){
								header("Location: home.php");
                                exit;
							}
							$username = "";
							if(isset($_GET['redirected'])){
								if($_GET['redirected']==1){
									echo '<p class="mb-4 text-center errorSuPrimo borderPerfe">Te tienes que registrar para poder acceder al home.</p>';
								}elseif($_GET['redirected']==2){
									if(isset($_GET['username'])){
										$username = $_GET['username'];
									}
									echo '<p class="mb-4 text-center errorSuPrimo borderPerfe">Hay un error en el usuario o contraseña. Por favor vuelve a intentarlo.</p>';
								}elseif($_GET['redirected']==3){
									echo '<p class="mb-4 text-center correctoSuPrimo borderPerfe">Se ha cerrado tu session correctamente.</p>';
								}elseif($_GET['redirected']==0){
									echo '<p class="mb-4 text-center correctoSuPrimo borderPerfe">Revise su correo para continuar y poder iniciar session.</p>';
								}elseif($_GET['redirected']==4){
									echo '<p class="mb-4 text-center errorSuPrimo borderPerfe">Actualmente tu usuario no esta activo. Sentimos las molestias.</p>';
								}elseif($_GET['redirected']==5){
									echo '<p class="mb-4 text-center errorSuPrimo borderPerfe">Hay un problema con la activación, contacte con el administrador.</p>';
								}elseif($_GET['redirected']==6){
									echo '<p class="mb-4 text-center correctoSuPrimo borderPerfe">Tu usuario se ha activado correctamente, ya puede iniciar session.</p>';
								}elseif($_GET['redirected']==7){
									echo '<p class="mb-4 text-center correctoSuPrimo borderPerfe">Revise su correo para cambiar la contraseña.</p>';
								}elseif($_GET['redirected']==8){
									echo '<p class="mb-4 text-center errorSuPrimo borderPerfe">Hay un problema en el cambio de contraseña.</p>';
								}elseif($_GET['redirected']==9){
									echo '<p class="mb-4 text-center correctoSuPrimo borderPerfe">Su contraseña se ha cambiado correctamente.</p>';
								}elseif($_GET['redirected']==10){
									echo '<p class="mb-4 text-center errorSuPrimo borderPerfe">El tiempo para resetear la contraseña ha expirado o la contraseña ya ha sido cambiada.</p>';
								}
							}
						?>

                        <form method="POST" action="./php/login.php" class="signin-form">
                            <div class="form-group">

                                <?php 
						 			echo '<input type="text" name="username" class="form-control" placeholder="Usuario o email" value="'.$username.'" required>';
								?>

                            </div>
                            <div class="form-group">
                                <input id="password-field" name="password" type="password" class="form-control"
                                    placeholder="Contraseña" required>
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Inicia sessión</button>
                            </div>
                        </form>
                        <p class="w-100 text-center"><a href="./php/sendResetPassword.php" style="color: #fff">Forgot Password</a></p>
                        <p class="w-100 text-center">&mdash; ¿Aún no tienes cuenta? &mdash;</p>
                        <div class="social d-flex text-center">
                            <a href="register.php" class="px-2 py-2 mr-md-1 rounded"><span
                                    class="ion-logo-facebook mr-2"></span> Regístrate</a>
                        </div>
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