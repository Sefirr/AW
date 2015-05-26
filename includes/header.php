<?php
	require_once __DIR__.'/config.php';
	require_once __DIR__.'/procesaUsuario.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ESTABLECEMOS LA CODIFICACION A UTF-8-->
	<meta name="author" content="Watchandcoment Team"><!-- AUTORES DE LA PÁGINA -->
	<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/login.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
	<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/header.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
	<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/style.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->

</head>
<body>
<div id="cabecera">
	<a href ="<?php echo RAIZ_APP; ?>index.php"><img src= "<?php echo RAIZ_APP; ?>/img/logo.png" id="logo"/></a>
	<div id="LoginAndRegister">
	<?php  if(isset($_SESSION['usuario'])) {
	?>
		<a href="<?php echo RAIZ_APP; ?>includes/logout.php" id="logoutButton" class ="boton">Logout</a>
	<?php
		} else {
	?>
		<a id="loginButton" class ="boton">Login</a>
	<?php } ?>
		<div id="loginButton">
		<a class="boton" href="<?php echo RAIZ_APP; ?>includes/register.php">Registro</a></div>
	</div>
	<?php 
		if(!isset($_SESSION['usuario'])) {
			require_once 'login.php';
		}			
	?>
	<nav class="menu-cabecera">
		<ul>
			<li><a href="<?php echo RAIZ_APP; ?>index.php">Home</a></li>
			<li><a href="<?php echo RAIZ_APP; ?>includes/peliculas.php">Películas</li>
			<li><a href="<?php echo RAIZ_APP; ?>includes/series.php">Series</a></li>
			<li><a href="<?php echo RAIZ_APP; ?>includes/videojuegos.php">Videojuegos</a></li>
			<li><a href="<?php echo RAIZ_APP; ?>includes/contact.php">Contacto</a></li>
		</ul>
	</nav>

</div> 
</body>
</html>