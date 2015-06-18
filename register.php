<?php
	require_once __DIR__ .'/includes/config.php';
	require_once __DIR__ .'/includes/procesaUsuario.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/login.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/header.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/style.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/menu.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/footer.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<script src="<?php echo RAIZ_APP; ?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="<?php echo RAIZ_APP; ?>js/sidebarIzq.js" type="text/javascript"></script>css" />
		<script src="<?php echo RAIZ_APP; ?>js/registro.js" type="text/javascript"></script>css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ESTABLECEMOS LA CODIFICACION A UTF-8-->
		<title>Registrarse</title>
	</head>

	<body>
		<div id="contenedor">
		<?php include_once __DIR__ .'/includes/header.php'; ?>
				
		<!-- Menu izq -->
		<?php include_once __DIR__ .'/includes/sidebarIzq.php'; ?>
		<!-- CONTENIDO -->
		<div id = "contenido">
			<h2>
				¿Eres nuevo? Regístrate y pertenece a la comunidad Watch & Comment 
			</h2>
		<?php gestionarFormularioRegistro(); ?>
		</div>
		<!-- INCLUDE FOOTER -->
		<?php include_once __DIR__ .'/includes/footer.php'; ?>

		</div>
		
	</body>
</html>
