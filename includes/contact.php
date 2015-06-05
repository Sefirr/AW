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
		<script src="<?php echo RAIZ_APP; ?>includes/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="<?php echo RAIZ_APP; ?>js/sidebarIzq.js" type="text/javascript"></script>
		<script src="<?php echo RAIZ_APP; ?>includes/contact.js" type="text/javascript"></script>


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
			<img src= "../img/interrogacion.jpg" id="icono"/>
				<h2>¿Alguna sugerencia? ¡Ponte en contacto con nosotros!</h2>
				<form action="mailto:Watchandcoment@gmail.com" method="post">
					<fieldset>
					<legend>Información del contactante </legend>
							<!-- Introducción del nombre y sus apellidos -->
							<label>Introduce tu nombre: </label>
							<input type="text" class="contact1" name="firstname" value="Nombre" id="name"> <img src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgname"/>
							<input type="text" class="contact1" name="lastname" value="Apellidos" id="lastname"> <img src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imglastname"/>
							<br/>
							<!-- Caja de texto para su correo -->
							<label>E-mail de contacto:</label>
							<input type="text" class="contact2" name="email" value="E-mail" id="email"/> <img src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgemail"/>  
							<br/>
					</fieldset><!--FIN area de informacion del cliente -->
					<fieldset>
					<legend>Datos de la Consulta</legend>
							<!-- Motivo de la consulta mediante botones radio -->
						<label>Motivo de la consulta</label><br/>
						<input type="radio" name="motive" value="Evaluacion">Evaluación
						<br/>
						<input type="radio" name="motive" value="Suggestion">Sugerencias
						<br/>
						<input type="radio" name="motive" value="Review">Crítica
						<br/>
						<input type="radio" name="motive" value="Other">Otros
						<br/>
						<select name="PageZone"><!-- Seleccionable de la función -->
							<option value="General" selected >General</option>
							<option value="Films">Películas</option> 
							<option value="Series">Series</option>
							<option value="Games">Juegos</option> 

						</select>Marca la opción de la página de la que nos quieres contactar
						<br/>
						<!-- Enlace para el documento con los términos de uso -->
						<a href="info-privacy.php">Términos de uso</a>
						<!--Checkbox para los términos de uso-->
						<input type="checkbox" name="terms">Marque esta casilla para verificar que ha leído nuestros términos y condiciones del servicio
						<br/>
						<!--Area de texto para introducir la consulta-->
						<textarea class="contact" name="content" rows="6" cols="70">Introduce tu consulta</textarea>
						<br/>
						<!--Botones de enviar y reset-->
						<input type="submit" name="send" value="Enviar" />
						<input type="reset" name="reset" value="Borrar" />

				</form>
			</div>	
			<!-- INCLUDE FOOTER -->
			<?php include_once(__DIR__ .'/footer.php'); ?>
</div>
		</div>		
	</body>
</html>
	
	
	