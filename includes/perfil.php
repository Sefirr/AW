<?php
 
	require_once __DIR__ .'/procesaUsuario.php';
	require_once __DIR__ .'/config.php';
	
	$nombreUsuario = $_SESSION['usuario'];
	$user = dameUsuarioByUsername($nombreUsuario);
	
?>
<!DOCTYPE html>

<html>
		<head>
		<?php	require_once __DIR__.'/config.php'; ?>
		
	<!-- -----------------------------META REGION------------------------------ -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ESTABLECEMOS LA CODIFICACION A UTF-8-->
		<meta name="author" content="Watchandcoment Team"><!-- AUTORES DE LA PÁGINA -->

	<!-- ----------------------------- END META REGION------------------------------ -->


	<!-- -----------------------------LINKS REGION------------------------------ -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo RAIZ_APP; ?>img/favicon.ico"> <!-- ESTABLECIMIENTO DEL FAVICON -->

		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/login.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/header.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/style.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/menu.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/footer.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<script src="<?php echo RAIZ_APP; ?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="<?php echo RAIZ_APP; ?>js/sidebarIzq.js" type="text/javascript"></script>
		<script src="<?php echo RAIZ_APP; ?>js/contact.js" type="text/javascript"></script>


	<!-- -----------------------------END LINKS REGION------------------------------ -->
	<title> Mi perfil </title>
	</head>
	<body>
		<div id = "contenedor">
			<!-- INCLUDE CABECERA -->
			<?php include __DIR__ .'/header.php'; ?>
			
			<!-- Menu izq -->
			<?php include __DIR__ .'/sidebarIzq.php'; ?>
			<!-- CONTENIDO -->
			<div id = "contenido">
							<?php 	$imagen = RAIZ_APP;
									$imagen .= $user['foto'];
							?>
							<img src="<?php echo $imagen ?>" id="foto-perfil">
							<h3>Username: <?php echo $user['username']; ?>  </h3>
							<h3>Nombre completo: <?php echo $user['nombre']." ".$user['apellidos']; ?></h3>
							<h3>E-mail: <?php echo $user['email'] ?></h3>
							<h3>Rol:
							<?php 	$rol = "";
									if($user['rol'] == 1) {
										$rol = "Usuario registrado";
									} else if($user['rol'] == 2) {
										$rol = "Moderador";
									} else {
										$rol = "Administrador";
									}
									echo $rol;
							?>
							</h3>
							<h3>Descripcion: <?php echo $user['descripcion'] ?></h3>
					<div id="friends">				
						<h1>Amigos</h1>
						<img src="../img/perfil.jpg" alt="imagen de perfil" id="detalle-amigos"/>
						<img src="../img/perfil.jpg" alt="imagen de perfil" id="detalle-amigos"/>
						<img src="../img/perfil.jpg" alt="imagen de perfil" id="detalle-amigos"/>
						<img src="../img/perfil.jpg" alt="imagen de perfil" id="detalle-amigos"/>
						<img src="../img/perfil.jpg" alt="imagen de perfil" id="detalle-amigos"/>
						<img src="../img/perfil.jpg" alt="imagen de perfil" id="detalle-amigos"/>
						<img src="../img/perfil.jpg" alt="imagen de perfil" id="detalle-amigos"/>
						<img src="../img/perfil.jpg" alt="imagen de perfil" id="detalle-amigos"/>
						<img src="../img/perfil.jpg" alt="imagen de perfil" id="detalle-amigos"/>
						<img src="../img/perfil.jpg" alt="imagen de perfil" id="detalle-amigos"/>
						<img src="../img/perfil.jpg" alt="imagen de perfil" id="detalle-amigos"/>
						<img src="../img/perfil.jpg" alt="imagen de perfil" id="detalle-amigos"/>
					</div>
			</div>
		</div>			
			<!-- INCLUDE FOOTER -->
			<?php include __DIR__ .'/footer.php'; ?>
			
	</body>
</html>