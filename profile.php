<?php
  session_start();
  require_once('php/funciones.php');
  if(!isset($_SESSION['username']) && !isset($_COOKIE['nombre'])){
    header("Location: index.php?redirected=1");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Eduhacks | Profile</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">
	<!-- footermio -->
	<link rel="stylesheet" href="css/cssPropio.css">

</head>
<body>
	
	<!-- header -->
	<div class="top-header-area blue-bg" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="home.php">
								<p class="subtitle, orange-text"><b>Eduhacks</b></p>
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li><a href="home.php">Home</a></li>
								<li><a href="#">Categorias</a>
									<ul class="sub-menu">
										<?php
											$categorias = obtenerCategorias();
											foreach($categorias as $cat){
												echo '<li><a href="busquedaCategoria.php?cat='.$cat.'">'.$cat.'</a></li>';
											}
										?>
									</ul>
								</li>
								<li><a href="myprofile.php">Mi perfil</a></li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="crearReto.php"><i class="fas fa-plus"></i></a>
										<a class="shopping-cart" href="php/logout.php"><i class="fas fa-sign-out-alt"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- perfil section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<?php 
							if(isset($_GET['user'])){
								$user = $_GET['user'];
								$userDat = datosUsuario($user); 
								echo '
								<h3><span class="orange-text">'.$userDat['userFirstName'].' </span> '.$userDat['userLastName'].'.</h3>
								<table class="col-lg-9 offset-lg-1">
									<tr>
										<th>Nombre de usuario:</th>
										<td>'.$userDat['username'].'</td>
									</tr>
									<tr>
										<th>Miembro desde:</th>
										<td>'.$userDat['fecha'].'</td>
									</tr>
								</table>
								';
							}
						?>
					</div>
				</div>
			</div>

			<div class="row">
				<!-- For each de los retos -->
				<?php
				if(isset($_GET['user'])){
					$retos = obtenerRetos(3,$user);
					if (!empty($retos)){
						foreach($retos as $reto){
							$reto_dat = datosReto($reto);
							$hastagsReto = obtenerCategoriaReto($reto_dat['id']);
							echo '<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
								<div class="single-product-item">
									<div class="product-image">
										<!-- <a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a> -->
									</div>
									<h3>'.$reto_dat['nombre'].'</h3>
									<p class="product-price"><span>'.$hastagsReto.'</span></p>
									<p class="product-price"><span>'.$reto_dat['dataPub'].'</span></p>
									<a href="reto.php?id='.$reto_dat['id'].'" class="cart-btn"> Ver reto</a>
								</div>
							</div>';
						}
					}else{
						echo '
						<div class="col-lg-8 offset-lg-2 text-center">
							<div class="section-title">	
								<p>Este usuario aún no ha subido nungún reto.</p>
							</div>
						</div>';
					}
				}else{
					echo '
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="section-title">	
							<h3><span class="orange-text">404 </span> Error </h3>
							<p>El usuario solicitado no existe.</p>
						</div>
					</div>';
				}
				?>
			</div>
		</div>
	</div>
	<!-- end perfil section -->

	<!-- copyright -->
	<div class="copyright footerCopy">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<p>Copyrights &copy; 2022 - Todos los derechos reservados para <b>EDUHACKS & COMP</b>.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->

	<!-- footer para mobiles -->
	<div class="footerMio">
		<div class="imgsFoot">
			<a href="home.php"><img class="imgFooterMob" alt="home" src="/assets/img/home.png"></a>
			<a href="crearReto.php"><img class="imgFooterMob" alt="home" src="/assets/img/plus.png"></a>
			<a href="myprofile.php"><img class="imgFooterMob" alt="home" src="/assets/img/profile.png"></a>
		</div>
	</div>
	<!-- footer para mobiles -->
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>