<?php 

	require_once 'procesaContenido.php';
	if(isset($_POST['submit1'])) {
		$errores = addContent($_POST);
		$html= '';
		$numErrores = count($errores);
		if (  $numErrores == 1 ) {
			$html .= "<ul><li>".$errores[0]."</li></ul>";
		} else if ( $numErrores > 1 ) {
			$html .= "<ul><li>";
			$html .= implode("</li><li>", $errores);
			$html .= "</li></ul>";
		}
		echo $html;
		//header('Location:'.$_SERVER['PHP_SELF']);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ESTABLECEMOS LA CODIFICACION A UTF-8-->
	<meta name="author" content="Watchandcoment Team"><!-- AUTORES DE LA PÁGINA -->
	<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/style.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->

	<title>Página añadir contenido</title>
</head>

<body>
	<div id="contenedor">
		<?php include 'header.php'; ?>
		<?php include 'sidebarIzq.php'; ?>
		<div id="contenido">
			<form action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="tipo" value="1" />
				<label>Título : </label>
				<input type="text" placeholder="Título" name="titulo"><!--- AGREGAR TITULO PELICULA: agregar titulo de la pelicula.-->
				<br/>
				<label>Carátula : </label> 
				<input type="file" name="imagen"><!-- AGREGAR CARATULA: agregar imagen de la carátula de la pelicula. -->
				<br/>
				<label>Sinopsis : </label>
				<textarea name="sinopsis" placeholder="Sinopsis de la serie..."></textarea> <!--AGREGAR SINOPSIS: agregar sinopsis de la película. -->
				<br/>
				<fieldset>
				<legend>Descripción básica </legend>
					<label>Descripción: </label>
					<textarea name="descripcion" placeholder="Descripción"></textarea>
					<br/>
					<label>Fecha de estreno: </label>
					<input name="fecha" type="date">
					<br/>
					<label>Director: </label>
					<input type="text" name="director">
					<br/>
					<label>Duración: </label>
					<input type="number" name="duracion" value="10"> 
					<br/>
					<label>Valoración de la página: </label>
					<input type="number" name="val_pagina" value="1" min="1" max="5" > 
					<br/>

				</fieldset>
				
				<!--Botones de enviar y reset-->
				<input type="submit" name="submit1" value="Enviar" />
				<input type="reset" name="reset" value="Borrar" />

			</form>
		</div>
		<?php include 'footer.php'; ?>
	</div>
	
</body>

</html>