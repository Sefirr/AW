<?php 
	require_once __DIR__.'/procesaContenido.php';
	$contentRecomendacion = getrecomendacion();

	$menu = false;
	if($contentRecomendacion == NULL) {
		$menu = false;
	} else {
		$menu = true;
	}

	if(isset($_SESSION['usuario']))  {
		$usuario_logueado = dameUsuarioByUsername($_SESSION['usuario']);
	}
?>

<div id="menus-izq">
	<div id="menu-user">
		<ul>
			<li>Menú de usuario</li>
			<li><a>Contenido</a>
				<ul>
					<li><a href="<?php echo RAIZ_APP; ?>includes/viewcontent.php">Lista de contenido</a></li>
<?php if(isset($_SESSION["rol"]) && ($_SESSION["rol"] > 1)) { ?>
					<li><a href="<?php echo RAIZ_APP; ?>includes/add-content.php">Añadir contenido</a></li>
					<li><a href="<?php echo RAIZ_APP; ?>includes/manage-content.php">Gestionar contenido</a></li>
<?php } ?>

				</ul>
			</li>
			<li><a>Merchandising</a>
				<ul>
					<li><a href="<?php echo RAIZ_APP; ?>includes/viewmerchalist.php">Lista de merchandising</a></li>
<?php if(isset($_SESSION["rol"]) && ($_SESSION["rol"] > 1)) { ?>
					<li><a href="<?php echo RAIZ_APP; ?>includes/add-merchandising.php">Añadir merchandising</a></li>
					<li><a href="<?php echo RAIZ_APP; ?>includes/manage-mercha.php">Gestionar merchandising</a></li>
<?php } ?>
				</ul>
			</li>
<?php if(isset($_SESSION["rol"]) && ($_SESSION["rol"] > 0)) { ?>
			<li>
				<a href="<?php echo RAIZ_APP; ?>includes/usuarios.php">Usuarios</a>
			</li>
			<li><a>Mi Perfil</a>
				<ul>
					<li><a href="<?php echo RAIZ_APP; ?>includes/perfil.php?id=<?php echo $usuario_logueado['id_user'];?>">Ver mi perfil</a></li>
					<li><a href="<?php echo RAIZ_APP; ?>includes/modifyperfil.php">Modificar perfil</a></li>
				</ul>
			</li>
			<li><a href="<?php echo RAIZ_APP; ?>includes/shopping_cart.php?id=1&action=mostrar"> Ver carrito</a></li>
		</ul>
<?php } ?>
	</div>
	<?php if($menu) { ?>
	<div id="recomendaciones">
		<ul>
			<li><em>Recomendaciones</em></li>
			<li><h3><em><?php echo $contentRecomendacion["titulo"]; ?></em></h3></li>
			<li> <div id="descripcion">
				<a href="<?php echo RAIZ_APP;?>includes/descripcion.php?title=<?php echo $contentRecomendacion["titulo"]; ?>"><img src="<?php echo RAIZ_APP; ?><?php echo $contentRecomendacion["caratula"]; ?>" id="caratula-recomendaciones"/></a>
				<?php 
					$valoracion = $contentRecomendacion["valoracionpagina"];
					if($valoracion == 0) {
						$html = '<img src="'.RAIZ_APP.'img/0estrellas.png" id="estrellas" />';
					} else if($valoracion == 1) {
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
			</div></li>
			</ul>
	</div>
	<?php } ?>
</div>
