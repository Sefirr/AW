<div id="menus-izq">
	<form action="" method="POST">
		<input type="text" class="search">
		<input type="submit" class="search" value="Buscar">
		</form>
	<div id="menu-user">
		<ul>
			<li>Menú de usuario</li>
			<li><a>Contenido</a>
				<ul>
					<li><a href="<?php echo RAIZ_APP; ?>includes/viewcontent.php">Lista de contenido</a></li>
					<li><a href="<?php echo RAIZ_APP; ?>includes/add-content.php">Añadir contenido</a></li>
					<li><a href="<?php echo RAIZ_APP; ?>includes/manage-content.php">Gestionar contenido</a></li>

				</ul>
			</li>
			<li><a>Merchandising</a>
				<ul>
					<li><a href="<?php echo RAIZ_APP; ?>includes/viewmerchalist.php">Lista de merchandising</a></li>
					<li><a href="<?php echo RAIZ_APP; ?>includes/add-merchandising.php">Añadir merchandising</a></li>
					<li><a href="<?php echo RAIZ_APP; ?>includes/manage-mercha.php">Gestionar nerchandising</a></li>
				</ul>
			</li>
			<li>
				<a href="<?php echo RAIZ_APP; ?>includes/carrito.php">Mi carrito</a>
			</li>
			<li><a>Mi Perfil</a>
				<ul>
					<li><a href="<?php echo RAIZ_APP; ?>includes/perfil.php">Ver mi perfil</a></li>
					<li><a href="<?php echo RAIZ_APP; ?>includes/modifyperfil.php">Modificar perfil</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	<div id="recomendaciones">
		<ul>
			<li><em>Recomendaciones</em></li>
			<li><h3>
<em>Titulo recomendación</em></h3></li>
			<li> <div id="descripcion">
				<a href="descripcion.php?title=0"><img src="<?php echo RAIZ_APP; ?>img/videojuegos/dragonAge3.jpg" id="caratula-recomendaciones"/></a>
				<a href="descripcion.php?title=0"><p><em>Dragon Age Inquisition</em></p></a>
				<img src="<?php echo RAIZ_APP; ?>img/5estrellas.png" id="estrellas" />
			</div></li></ul>
		</div>
</div>


			
