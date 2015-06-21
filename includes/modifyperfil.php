<?php
 
	require_once __DIR__ .'/procesaUsuario.php';
	require_once __DIR__ .'/config.php';
	
	$nombreUsuario = $_SESSION['usuario'];
	$user = dameUsuarioByUsername($nombreUsuario);
	
?>
<!DOCTYPE html>

<html>
	<head>

		
	<!-- -----------------------------META REGION------------------------------ -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ESTABLECEMOS LA CODIFICACION A UTF-8-->
		<meta name="author" content="Watchandcoment Team"><!-- AUTORES DE LA PÁGINA -->

	<!-- ----------------------------- END META REGION------------------------------ -->

		<title>Modificar Perfil W&C</title>
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
			<?php gestionarFormularioModifyPerfil(); ?> <!-- Call to procesaUsuario -->
			</div>			
			<!-- INCLUDE FOOTER -->
			<?php include __DIR__ .'/footer.php'; ?>
		</div>
	</body>
</html>