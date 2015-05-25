<?php
	require_once __DIR__ .'/config.php';
	require_once __DIR__ .'/procesaUsuario.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="<?php echo RAIZ_APP; ?>css/style.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo RAIZ_APP; ?>css/header.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo RAIZ_APP; ?>css/menu.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo RAIZ_APP; ?>css/footer.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo RAIZ_APP; ?>css/contenido.css" rel="stylesheet" type="text/css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ESTABLECEMOS LA CODIFICACION A UTF-8-->
		<title>Registrarse</title>
	</head>

	<body>
		<div id="contenedor">
		<?php include_once __DIR__ .'/header.php'; ?>
				
		<!-- Menu izq -->
		<?php include_once __DIR__ .'/sidebarIzq.php'; ?>
		<!-- CONTENIDO -->
		<div id = "contenido">
		<div id = "titulo">
			¿Eres nuevo? Regístrate y pertenece a la comunidad Whatch & Comment 
			</br>
		</div>
		<?php gestionarFormularioRegistro(); ?>
		</div>
		<!-- INCLUDE FOOTER -->
		<?php include_once __DIR__ .'/footer.php'; ?>

		</div>
		
	</body>
</html>