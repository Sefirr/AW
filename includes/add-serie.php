<?php 
	require_once __DIR__.'/config.php';
	require_once __DIR__.'/procesaContenido.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> <!--ESTABLECEMOS LA CODIFICACION A UTF-8-->
	<meta name="author" content="Watchandcoment Team"><!-- AUTORES DE LA PÁGINA -->
	<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/style.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->

	<title>Página añadir contenido</title>
</head>

<body>
	<div id="contenedor">
		<?php include 'header.php'; ?>
		<?php include 'sidebarIzq.php'; ?>
		<div id="contenido">
		<?php gestionarFormularioAddContent() ?>
		</div>
		<?php include 'footer.php'; ?>
	</div>
	
</body>

</html>