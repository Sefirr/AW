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
				
				<div id ="centrado">
					<nav class="menu-desplegable">
					<ul>
						<li><a href="#">ÚLTIMAS</a></li>
						<li><a href="#">MÁS VALORADAS</a></li>
						<li><a href="#">ALFABETICAMENTE</a></li>
					</ul>
					</nav>
					<div id = "detalle">		
						<a href="peliculas.php"><img src="../img/peliculas/laIslaMinima.png" id="caratula"/></a>
						<a href="peliculas.php"><p><em>La isla mínima</em></p></a>
						<img src="../img/3estrellas.png" id="estrellas"/>
					</div>
					
					<div id = "detalle">		
						<a href="peliculas.php"><img src="../img/peliculas/boyhood.png" id="caratula"/></a>
						<a href="peliculas.php"><p><em>Boyhood</em></p></a>
						<img src="../img/2estrellas.png" id="estrellas"/>
					</div>

					<div id = "detalle">		
						<a href="peliculas.php"><img src="../img/peliculas/malefica.png" id="caratula"/></a>
						<a href="peliculas.php"><p><em>Maléfica</em></p></a>
						<img src="../img/5estrellas.png" id="estrellas"/>
					</div>
				
					<div id = "detalle">		
						<a href="peliculas.php"><img src="../img/peliculas/laTeoriaDelTodo.png" id="caratula"/></a>
						<a href="peliculas.php"><p><em>La teoría del todo</em></p></a>
						<img src="../img/4estrellas.png" id="estrellas"/>
					</div>
			
					<div id = "detalle">		
						<a href="peliculas.php"><img src="../img/peliculas/musarañas.png" id="caratula"/></a>
						<a href="peliculas.php"><p><em>Musarañas</em></p></a>
						<img src="../img/2estrellas.png" id="estrellas"/>
					</div>
				
					<div id = "detalle">		
						<a href="peliculas.php"><img src="../img/peliculas/dejameEntrar.png" id="caratula"/></a>
						<a href="peliculas.php"><p><em>Déjame entrar</em></p></a>
						<img src="../img/5estrellas.png" id="estrellas"/>
					</div>
				
					<div id = "detalle">		
						<a href="peliculas.php"><img src="../img/peliculas/noe.png" id="caratula"/></a>
						<a href="peliculas.php"><p><em>Noe</em></p></a>
						<img src="../img/2estrellas.png" id="estrellas"/>
					</div>
					
					<div id = "detalle">		
						<a href="peliculas.php"><img src="../img/peliculas/rec4.png" id="caratula"/></a>
						<a href="peliculas.php"><p><em>Rec 4</em></p></a>
						<img src="../img/4estrellas.png" id="estrellas"/>
					</div>
					<div id = "detalle">		
						<a href="peliculas.php"><img src="../img/peliculas/rec4.png" id="caratula"/></a>
						<a href="peliculas.php"><p><em>Rec 4</em></p></a>
						<img src="../img/4estrellas.png" id="estrellas"/>
					</div>
				</div>		
			</div>	
			<!-- INCLUDE FOOTER -->
			<?php include __DIR__ .'/footer.php'; ?>
		</div>		
	</body>
</html>