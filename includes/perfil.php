<?php
 
	require_once __DIR__ .'/procesaUsuario.php';
	require_once __DIR__ .'/social.php';
	require_once __DIR__ .'/config.php';
	
	$id_user = $_GET['id'];
	$user = dameUsuarioById($id_user);
	
?>
<!DOCTYPE html>

<html>
	<head>
	
	<!-- -----------------------------META REGION------------------------------ -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ESTABLECEMOS LA CODIFICACION A UTF-8-->
		<meta name="author" content="Watchandcoment Team"><!-- AUTORES DE LA PÁGINA -->

	<!-- ----------------------------- END META REGION------------------------------ -->

		<tittle> Mi Perfil W&C </tittle>
	<!-- -----------------------------LINKS REGION------------------------------ -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo RAIZ_APP; ?>img/favicon.ico"> <!-- ESTABLECIMIENTO DEL FAVICON -->

		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/login.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/header.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/style.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/menu.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/footer.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<script src="<?php echo RAIZ_APP; ?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="<?php echo RAIZ_APP; ?>js/sidebarIzq.js" type="text/javascript"></script>
		
	<!-- -----------------------------END LINKS REGION------------------------------ -->
	
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
										$rol = "Administrador";
									}
									echo $rol;
							?>
							</h3>
							<h3>Descripcion: <?php echo $user['descripcion'] ?></h3>
					<div id="friends">				
						<h1>Amigos</h1>
						<?php 
						$friends = findFriends($user['id_user']);
						foreach($friends as $friend) {	
			$imagen = RAIZ_APP;
			if(empty($friend["foto"])) {
				$imagen .= "img/no_photo_available.png";
			} else {
				$imagen .= $friend["foto"];
			}		
			echo '<div id="detalle">';
			echo '<a href="perfil.php?id='.$friend["id_user"].'"><div id="cartel"><img src="'.$imagen.'" id="caratula"> </div></a>';
			echo  '<a href="perfil.php?id='.$friend["id_user"].'">
			<p><em>'.$friend["username"].'</em></p></a>';
			echo '</div>';
			}
						?>
					</div>
			</div>
		</div>			
			<!-- INCLUDE FOOTER -->
			<?php include __DIR__ .'/footer.php'; ?>
			
	</body>
</html>
