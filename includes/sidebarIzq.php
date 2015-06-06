<div id = "menus-izq">
	<form action="" method="POST">
		<input type="text" class="search"> <input type="submit" class="search" value="Buscar">
	</form>
	<div id ="menu-user">
		<ul>
			<li>Menú de usuario</li>
			<li><a>Series</a>
				<ul>
					<li><a href="add-content.html">Añadir serie</a></li>
					<li><a href="list-content.html"> Editar serie</a></li>
					<li><a href="list-content.html"> Eliminar serie</a></li> 
					<li><a href="list-content.html"> Listar series </a></li>
				</ul>
			</li>
			<li><a>Peliculas</a>
				<ul>
					<li><a href="add-content.html">Añadir película</a></li>
					<li><a href="list-content.html"> Editar película</a></li> 
					<li><a href="list-content.html"> Eliminar pelicula</a></li>
					<li><a href="list-content.html"> Listar películas </a></li> 
				</ul>
			</li>
			<li><a>Videojuegos</a>
				<ul>
					<li><a href="add-content.html">Añadir videojuego</a></li> 
					<li><a href="list-content.html"> Editar videojuego</a></li> 
					<li><a href="list-content.html"> Eliminar videojuego</a></li>
					<li><a href="list-content.html"> Listar videojuego </a></li> 
				</ul>
			</li>
			<li><a>Merchandising</a>
				<ul>
					<li><a href="addmecha.html"> Añadir merchandising </a></li> 
					<li><a href="list-content.html"> Editar merchandising</a></li>
					<li><a href="list-content.html"> Eliminar merchandising</a></li> 
					<li><a href="list-content.html"> Listar merchandising </a></li> 
				</ul>
			</li>
			<li><a href="perfil.php"> Perfil de usuario </a> </li>
			<li><a href="modifyperfil.php"> Modificar perfil </a> </li>
		</ul>
	</div>
	<div id ="recomendaciones">
	<ul> <li><em>Recomendaciones</em></li>
		<li><h3><em>Título recomendación</em></h3></li>
		<li><div id = "descripcion">
			<a href="descripcion-videojuego.html"><img src="<?php echo RAIZ_APP; ?>img/videojuegos/dragonAge3.jpg" id="caratula-recomendaciones"/></a>
			<a href="descripcion-videojuego.html"><p><em>Dragon Age Inquisition</em></p></a>
			<img src="./img/5estrellas.png" id="estrellas"/>
		</div></li></ul>
	</div>
</div>
