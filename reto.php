<?php
  session_start();
  require_once('php/funciones.php');
  if(!isset($_SESSION['username']) && !isset($_COOKIE['nombre'])){
    header("Location: index.php?redirected=1");
    exit;
  }else{
    require_once('php/funciones.php');
    $user = $_SESSION['username'];
    $userDat = datosUsuario($user);
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
	<title>Eduhacks | Reto</title>

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

	<!-- retos section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
					<?php $idReto = $_GET['id'];
						if(is_numeric($idReto)){
							$reto_dat = datosReto($idReto);
							$hastagsReto = obtenerCategoriaReto($reto_dat['id']);
							$rutaFile = buscarFichero($reto_dat['id']);
							if($reto_dat['existencia'] != 0){
								echo '
								<h3><span class="orange-text">'.$reto_dat['nombre'].'</h3>
								<table class="col-lg-8 offset-lg-1">';
									if(isset($_GET['checked'])){
										if($_GET['checked']==1){
											echo '<p class="correctoSuPrimo borderPerfe">Buena flag piratilla!</p>';
										}elseif($_GET['checked']==0){
											echo '<p class="errorSuPrimo borderPerfe">Esa flag no esta bien, vuelve a intentarlo!</p>';
										}else{
											echo '<p class="errorSuPrimo borderPerfe">No me cambies los GETs que los acabo de fregar</p>';
										}
									}
									echo '
									<tr>
										<th>Categorias: </th>
										<td>'.$hastagsReto.'</td>
									</tr>
									<tr>
										<th>Puntuacion maxima: </th>
										<td>'.$reto_dat['punt'].'</td>
									</tr>
								</table>
								<p>'.$reto_dat['desc'].'</p><br>
								<table class="col-lg-8 offset-lg-2">
									<tr>
										<th>Archivos adjuntos: </th>
										';if(strlen($rutaFile)>0){
											echo '<td>Si</td>';	
											echo '<td><a href="/'.$rutaFile.'" class="cart-btn"> Descargar</a></td>';
										}else{
											echo '<td>No</td>';	
										}
										echo '
									</tr>
									<tr>
										<th>Flag: </th>
										<td>
											<form action="php/checkReto.php?id='.$reto_dat['id'].'" method="post">
											<input type="text" id="flag" name="flag" placeholder="'.taparTexto($reto_dat['flag'],0).'"><br>
										</td>
										<td>
											<input type="submit" value="Enviar" class="cart-btn">
											</form>
										</td>
									</tr>
								</table>
								';
							}else{
								echo '
								<h3><span class="orange-text">404</span> Error</h3>
								<p>El reto que estas buscando no existe en la plataforma. X_x</p><br>';
							}
						}else{
							echo '
							<h3><span class="orange-text">404</span> Error</h3>
							<p>El reto que estas buscando no existe en la plataforma. X_x</p><br>';
						}
					?>				
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end retos section -->

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