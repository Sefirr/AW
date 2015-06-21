<?php 
	require_once __DIR__.'/procesaContenido.php';
	$contentRecomendacion = getrecomendacion();

	$menu = false;
	if($contentRecomendacion == NULL) {
		$menu = false;
	} else {
		$menu = true;
	}

	$user = dameUsuarioByUsername($_SESSION['usuario']);

?>

<div id="menus-izq">
	<form action="" method="POST">
		<input type="text" class="search">
		<input type="submit" class="search" value="Buscar">
		</form>
	<div id="menu-user">
<?php if(isset($_SESSION["rol"]) && ($_SESSION["rol"] > 0)) { ?>
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
			<li>
				<a href="<?php echo RAIZ_APP; ?>includes/usuarios.php">Usuarios</a>
			</li>
			<li><a>Mi Perfil</a>
				<ul>
					<li><a href="<?php echo RAIZ_APP; ?>includes/perfil.php?id=<?php echo $user['id_user'];?>">Ver mi perfil</a></li>
					<li><a href="<?php echo RAIZ_APP; ?>includes/modifyperfil.php">Modificar perfil</a></li>
				</ul>
			</li>
			<li><a href="<?php echo RAIZ_APP; ?>includes/shopping_cart.php?id=1&action=mostrar"> Ver carrito</a></li>
		</ul>
<?php } ?>
	</div>
	<div id="recomendaciones">
		<ul>
			<li><em>Recomendaciones</em></li>
			<?php if($menu) { ?>
			<li><h3><em><?php echo $contentRecomendacion["titulo"]; ?></em></h3></li>
			<li> <div id="descripcion">
				<a href="<?php echo RAIZ_APP;?>includes/descripcion.php?title=<?php echo $contentRecomendacion["titulo"]; ?>"><img src="<?php echo RAIZ_APP; ?><?php echo $contentRecomendacion["caratula"]; ?>" id="caratula-recomendaciones"/></a>
				<img src="<?php echo RAIZ_APP; ?>img/5estrellas.png" id="estrellas" />
			</div></li>
			<?php } else { ?>
				<li><h3><em><?php echo "EXAMPLE"; ?></em></h3></li>
				<li> <div id="descripcion">
				<a href="#"><img src="<?php echo RAIZ_APP; ?>img/no_photo_available.png" id="caratula-recomendaciones"/></a>
				<img src="<?php echo RAIZ_APP; ?>img/5estrellas.png" id="estrellas" />
			</div></li>
			<?php } ?>
			</ul>
	</div>
</div>
