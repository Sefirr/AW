<?php	
	require_once __DIR__.'/config.php'; 
	require_once __DIR__.'/procesaContenido.php';
	require_once __DIR__.'/merchandising.php';
	require_once __DIR__.'/comentarios.php'; 
	require_once __DIR__.'/procesaUsuario.php';  

	$titulo = $_GET['title'];
	$id_content = dameIDContent($titulo);
	
	$content = getContent($titulo);

?>
<!DOCTYPE html>
<html>
	<head>		
	<!-- -----------------------------META REGION------------------------------ -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ESTABLECEMOS LA CODIFICACION A UTF-8-->
		<meta name="author" content="Watchandcoment Team"><!-- AUTORES DE LA PÁGINA -->

	<!-- ----------------------------- END META REGION------------------------------ -->
		<title>Contenido W&C</title>

	<!-- -----------------------------LINKS REGION------------------------------ -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo RAIZ_APP; ?>img/favicon.ico"> <!-- ESTABLECIMIENTO DEL FAVICON -->

		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/login.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/header.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/style.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/menu.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/footer.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<script src="<?php echo RAIZ_APP; ?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="<?php echo RAIZ_APP; ?>js/sidebarIzq.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/starrating.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<script src="<?php echo RAIZ_APP; ?>js/starrating-content.js" type="text/javascript"></script>
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
				<?php if($id_content == false) {
						echo "<div class='error'><ul><li>El contenido qué está buscando no existe.</li></ul></div>";
					  } else {
				?>
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
				<div id="val-pagina">
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
					<?php 
						if(isset($_SESSION['usuario'])) {
						$user = $_SESSION['usuario'];
						$usuario = getUserByName($user);
						}
						

	$html = '<ul class="star-rating" id="star-rating">
										<span id="ratelinks">
											<li><a href="javascript:void(0)" title="1 star out of 10" class="one-star">1</a></li>
											<li><a href="javascript:void(0)" title="2 stars out of 10" class="two-stars">2</a></li>
											<li><a href="javascript:void(0)" title="3 stars out of 10" class="three-stars">3</a></li>
											<li><a href="javascript:void(0)" title="4 stars out of 10" class="four-stars">4</a></li>
											<li><a href="javascript:void(0)" title="5 stars out of 10" class="five-stars">5</a></li>
										</span>
									</ul><img src="'.RAIZ_APP.'img/0estrellas.png" id="imgvaloracion"/>';
							echo $html;
					?>
				</div>
				<div id="titulo"> SINOPSIS</div>
				<div id="texto"><?php echo $content["sinopsis"]; ?></div>
				<div id="titulo"> MERCHANDISING</div>
				<?php 
						$merchas = dameAllMerchaById_contents($id_content); 
					
						if($merchas != NULL) {
							foreach($merchas as $mercha) {		
								$imagen = RAIZ_APP;
							if(empty($mercha["foto1"])) {
								$imagen .= "img/no_photo_available.png";
							} else {
								$imagen .= $mercha["foto1"];
							}		
								echo '<div id = "detalle-merchandising">';		
								echo '<a href="descripcion-merchandising.php?nombre='.$mercha["nombre"].'"><div id="cartel"><img src="'.$imagen.'" id="foto-merchandising"/></div></a>';
								echo '<a href="descripcion-merchandising.php?nombre='.$mercha["nombre"].'"><p><em>'.$mercha["nombre"].'</em></p></a>';
								echo  '</div>';
							}
						} else {
							echo '<div class="info"><ul><li>No hay merchandising asociado a este contenido.</li></ul></div>';
						}
				?>
				<div id="comentarios">
					<h1> Comentarios</h1>
					<?php $comments = dameCommentsContent($content["id_content"]);
				foreach($comments as $comment) {
				?>
				<div id = "detalle-comentario">
					<a href="#"><?php echo getUser($comment["id_user"])["username"]; ?></a> el <?php echo $comment["fecha"]; ?>
					<a class="options-comment" href="delete-comment.php?id=<?php echo $comment["id_comment"]; ?>"> Eliminar </a>
					<p><?php echo $comment["texto"]; ?></p>
				</div>
				
				<?php
				} ?>
					<form action="add-comment-content.php" method="post">
						<input type="hidden" name="id" value="<?php echo $content['id_content']; ?>">
						</br>
						<div id="textarea"><textarea id="textarea" rows="7" name="message" placeholder="Deja tu comentario.." ></textarea></div>
						<input type="submit" class="button" name="send-comment" value="Enviar comentario"> </input>
					</form>
					
				</div>
				<?php 	} ?>
			</div>
			<!-- INCLUDE FOOTER -->
			<?php include_once(__DIR__ .'/footer.php'); ?>
		</div>	
		
	</body>
</html>
