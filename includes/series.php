<?php 
	include(__DIR__ .'/config.php');
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

		<title>Watch & Comment</title>
	</head>
	<body>
		<div id = "contenedor">
			<!-- INCLUDE CABECERA -->
			<?php include __DIR__ .'/header.php'; ?>
			
			<!-- Menu izq -->
			<?php include __DIR__ .'/sidebarIzq.php'; ?>
			<!-- CONTENIDO -->
			<div id = "contenido">
				<?php
					if(isset($_SESSION['usuario'])) {
						echo "Bienvenido, ".$_SESSION['usuario'];
					}
				
				?>
			</div>	
			<!-- INCLUDE FOOTER -->
			<?php include __DIR__ .'/footer.php'; ?>
		</div>		
	</body>
</html>