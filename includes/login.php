<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ESTABLECEMOS LA CODIFICACION A UTF-8-->
		<meta name="author" content="Watchandcoment Team"><!-- AUTORES DE LA PÁGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/style.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="<?php echo RAIZ_APP; ?>js/login.js"></script> 
	</head>
	<body>
		<div id="loginBox">           
			<?php 
				require_once __DIR__ .'/config.php';
				require_once __DIR__ .'/procesaUsuario.php'; 
			
				gestionarFormularioLogin(); 
			?>
		</div>
	</body>
</html>