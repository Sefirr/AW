<?php	
	require_once __DIR__.'/config.php'; 
	require_once __DIR__.'/procesaContenido.php'; 
	require_once __DIR__.'/comentarios.php';
	require_once __DIR__.'/comentarioDB.php'; 

	$titulo = $_GET['title'];
	$content = getContent($titulo);

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
		<script src="<?php echo RAIZ_APP; ?>js/contact.js" type="text/javascript"></script>


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
				<div id="titulo-serie"> <?php echo $content["titulo"]; ?> </div>
				<?php 	$imagen = RAIZ_APP;
						if(empty($content["caratula"])) {
							$imagen .= "img/no_photo_available.png";
						} else {
							$imagen .= $content["caratula"];
						}
				?>
				<div id="cartel"><img src="<?php echo $imagen ?>" id="caratula"> </div>
				<div id="descripcion-basica"><?php echo $content["descripcion"]; ?></div>
				<div id="val-pagina">Valoración de la página:</div>
				<div id="val-usuario">Valoración de los usuarios:</div>
				<div id="val-pagina"><!--<img src="./img/5estrellas.png" id="estrellas"/>-->
					<?php $valoracion = $content["valoracionpagina"]; 
							$html = "";
						if($valoracion == 0) {
							$html = '<img src="'.RAIZ_APP.'img/0estrellas.png" id="estrellas" />';
						}
						else if($valoracion == 1) {
							$html = '<img src="'.RAIZ_APP.'img/1estrellas.png" id="estrellas" />';
						} else if($valoracion == 2) {
							$html = '<img src="'.RAIZ_APP.'img/2estrellas.png" id="estrellas" />';
						} else if($valoracion == 3) {
							$html = '<img src="'.RAIZ_APP.'img/3estrellas.png" id="estrellas" />';
						} else if($valoracion == 4) {
							$html = '<img src="'.RAIZ_APP.'img/4estrellas.png" id="estrellas" />';
						} else {
							$html = '<img src="'.RAIZ_APP.'img/5estrellas.png" id="estrellas" />';
						}
						echo $html;
					?>
				</div>
				<div id="val-usuario">
					<?php	$html = '<img src="'.RAIZ_APP.'img/0estrellas.png" id="estrellas" /></div>';
							echo $html;
					?>
				<div id="titulo"> SINOPSIS</div>
				<div id="texto"><?php echo $content["sinopsis"]; ?></div>
				<div id="titulo"> MERCHANDISING</div>
				<div id="merchandising">
					<div id = "detalle-merchandising">		
					<a href="mercha.html"><img src="./img/mercha/cabezontrue1.jpg" id="foto-merchandising"/></a>
					<p><em>Cabezón Eric Northman</em></p>
					</div>
					<div id = "detalle-merchandising">		
					<img src="./img/caratula_buho.png" id="foto-merchandising"/>
					<p><em>Merchandising 2</em></p>
					</div>
					<div id = "detalle-merchandising">		
					<img src="./img/caratula_buho.png" id="foto-merchandising"/>
					<p><em>Merchandising 3</em></p>
					</div>
					<div id = "detalle-merchandising">		
					<img src="./img/caratula_buho.png" id="foto-merchandising"/>
					<p><em>Merchandising 4</em></p>
					</div>
					<div id = "detalle-merchandising">		
					<img src="./img/caratula_buho.png" id="foto-merchandising"/>
					<p><em>Merchandising 5</em></p>
					</div>
					<div id = "detalle-merchandising">		
					<img src="./img/caratula_buho.png" id="foto-merchandising"/>
					<p><em>Merchandising 6</em></p>
					</div>
					<div id = "detalle-merchandising">		
					<img src="./img/caratula_buho.png" id="foto-merchandising"/>
					<p><em>Merchandising 7</em></p>
					</div>
					<div id = "detalle-merchandising">		
					<img src="./img/caratula_buho.png" id="foto-merchandising"/>
					<p><em>Merchandising 8</em></p>
					</div>
				</div>
				<div id="comentarios">
					<h2> Comentarios</h2>
					<?php $comments = dameComments($content['id_content']);
				foreach($comments as $comment) {
					echo $comment['texto'].'</br>';
				} ?>
					<form action="add-comment.php" method="post">
						<input type="hidden" name="id_content" value="<?php echo $content['id_content']; ?>">
						<div id="textarea"><textarea id="textarea" rows="7" name="message" placeholder="Deja tu comentario.." ></textarea></div>
						<input type="submit" class="button" name="send-comment" value="Enviar comentario"> </input>
					</form>
					
				</div>
			</div>
			<!-- INCLUDE FOOTER -->
			<?php include_once(__DIR__ .'/footer.php'); ?>
		</div>	
		
	</body>
</html>
