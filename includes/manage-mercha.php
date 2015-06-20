<?php
	require_once __DIR__.'/config.php'; 
	require_once __DIR__.'/merchandising.php';
?>

<!DOCTYPE html>
<html>
	<head>		
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
		<script src="<?php echo RAIZ_APP; ?>js/merchandising.js" type="text/javascript"></script>


	<!-- -----------------------------END LINKS REGION------------------------------ -->
	</head>
	<body>
		<div id = "contenedor">
			<!-- INCLUDE CABECERA -->
			<?php include_once(__DIR__ .'/header.php'); ?>					
	
			<!-- Menu izq -->
			<?php include_once(__DIR__ .'/sidebarIzq.php'); ?>
			<!-- CONTENIDO -->
			<div id = "contenido">
				<table id="tabla-contenido">
				
					<tr>
							<th> ID </th>
							<th> Nombre </th>
							<th> Unidades </th>
							<th> Precio </th>
							<th> Proveedor </th>
 							<th> Opciones </th>
					</tr>
				
			<?php
			
				$html = "";
				$contents = dameAllMercha();
				if ($contents != NULL){
				foreach($contents as $content) {	
					$html = '	<tr>
								<td>'.$content["id_merchandising"].'</td>
								<td>'.$content["nombre"].'</td>
								<td>'.$content["unidades"].'</td>
								<td>'.$content["precio"].'</td>
								<td>'.$content["proveedor"].'</td>
								<td><a href="mechandising.php?nombre='.$content["nombre"].'">Ver</a> | <a href="edit-mercha.php?nombre='.$content["nombre"].'">Editar</a> | <a href="delete-mercha.php?nombre='.$content["nombre"].'">Eliminar</a></td>
							</tr>';
					echo $html;
				}
				echo '</table>';
				}
				else{
					echo '</table>';
					$html = '<h1> No hay datos para mostrar </h1> ';
					echo $html;
				}

			?>
			</div>
			<!-- INCLUDE FOOTER -->
			<?php include_once(__DIR__ .'/footer.php'); ?>
		</div>	
		
	</body>
</html>
