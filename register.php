<!doctype html>
<html lang="en"> 
  <head>
  	<title>EduHaks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/cssPropio.css">

	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
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
		      	<h3 class="mb-4 text-center">Create your account</h3>

				<?php
					$username = "";
					$mail = "";
					$fname = "";
					$lname = "";
					if(isset($_GET['redirected'])){
						if($_GET['redirected']==1){
							echo '<p class="mb-4 text-center errorSuPrimo borderPerfe">Tienes que rellenar el fonrmulario.</p>';
						}elseif($_GET['redirected']==2){

							if(isset($_GET['username']) && isset($_GET['mail']) && isset($_GET['fname']) && isset($_GET['lname'])){
								$username = $_GET['username'];
								$mail = $_GET['mail'];
								$fname = $_GET['fname'];
								$lname = $_GET['lname'];
							}
							echo '<p class="mb-4 text-center errorSuPrimo borderPerfe">El usuario y la contraseña introducidas no coinciden. Por favor intentalo de nuevo.</p>';
						}elseif($_GET['redirected']==3){
							echo '<p class="mb-4 text-center errorSuPrimo borderPerfe">El nombre de usuario o correo electronico el cual estas registrando ya existe. Por favor registrese con otras credenciales.</p>';
						}
					}
				?>


		      	<form method="POST" action="./php/register_checker.php" class="signin-form">
		      		<div class="form-group">
						<?php  
		      				echo '<input type="text" name="username" class="form-control" placeholder="Username" value="'.$username.'" required>';
						?>
					</div>
                    <div class="form-group">
						<?php
                        	echo '<input type="text" name="email" class="form-control" placeholder="Email" value="'.$mail.'" required>';
						?>
					</div>
                    <div class="form-group">
						<?php
                        	echo '<input type="text" name="fname" class="form-control" placeholder="First Name" value="'.$fname.'" required>';
						?>
                    </div>
                    <div class="form-group">
						<?php
                        	echo '<input type="text" name="lname" class="form-control" placeholder="Last Name" value="'.$lname.'" required>';
						?>
					</div>
	            <div class="form-group">
	              <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
                <div class="form-group">
                    <input id="veryfyPassword" name="password2" type="password" class="form-control" placeholder="Verify Password" required>
                    <span toggle="#veryfyPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
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

