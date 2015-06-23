<?php
	
	require_once __DIR__.'/config.php';
	require_once __DIR__.'/contenidoDB.php'; 
	require_once __DIR__.'/procesaContenido.php'; 
	require_once __DIR__.'/merchandising.php'; 
	require_once __DIR__.'/procesaUsuario.php'; 
	require_once __DIR__.'/procesaSearch.php'; 
	
	$rows_for_page= 10;
	
	if(isset($_POST['search'])) {
			$search = strtolower($_POST['search']);
	} else {
		if(isset($_GET['search'])) {
			$search = strtolower($_GET['search']);
		} else {
			$search = "";
		}
	}
	
	if(empty($search)) {
		$total_records = getRowsContent();
		
		$pages= ceil($total_records/$rows_for_page);
		
		if($total_records == 0) {
			echo "No hay contenido.";
		} else {
			if(isset($_GET['page']))
				$page = (int)$_GET['page'];
			else
				$page = 0;

			$start_with = $page * $rows_for_page;
			
			$contenido = getPagination($start_with, $rows_for_page);
			
			foreach($contenido as $content) {		
				$imagen = RAIZ_APP;
				if(empty($content["caratula"])) {
					$imagen .= "img/no_photo_available.png";
				} else {
					$imagen .= $content["caratula"];
				}

				echo '<div id="indexstyle">';		
				echo '<div id="titulo-serie">'.$content["titulo"].'</div>';
				echo '<div id="cartel"><img src="'.$imagen.'" id="caratula"> </div>';
				echo '<div id="descripcion-basica">'.substr($content["sinopsis"],0,400)."...".'</div>';
				echo '<div style="clear:both;margin-left: 90%;padding-bottom:2%;"><a href="'.RAIZ_APP.'includes/descripcion.php?title='.$content["titulo"].'">Leer más</a></div>';
				echo '</div>';
			}
			
				echo '<div id="paginacion"><br/>';
			
			if($page >= 1) {
					echo '<a href="index.php?page=0">Primero</a>';
					echo '<a href="index.php?page='.($page-1).'">Anterior</a>';
			}
			
			for($i=0;$i<$pages;$i++) {
					echo '<a href="index.php?page='.$i.'">'.$i.'</a> |';
			}
			
				echo '<strong>'.($page+1).' de '.$pages.'</strong>';
				
			if($page < ($pages-1)) {
					echo '<a href="index.php?page='.($page+1).'">Siguiente</a>';
					echo '<a href="index.php?page='.($pages-1).'">Ultimo</a>';
			}

			echo '</div>';
		}
	} else {
		$total_records = getRowsContent2($search) + getRowsMercha($search) + getRowsUser($search);
		
		$pages= ceil($total_records/$rows_for_page);
		
		if($total_records == 0) {
		echo "No hay contenido.";
		} else {
			if(isset($_GET['page']))
				$page = (int)$_GET['page'];
			else
				$page = 0;

			$start_with = $page * $rows_for_page;
			
			$contenido = search($search);
			echo '<h2>Resultados de la búsqueda</h2>';
			foreach($contenido[0] as $usuarios) {		
				$imagen = RAIZ_APP;
				if(empty($usuarios["foto"])) {
					$imagen .= "img/no_photo_available.png";
				} else {
					$imagen .= $usuarios["foto"];
				}

				echo '<div style="background-color: #405656;">';		
				echo '<div id="titulo-serie"> '.$usuarios["username"].'</div>';
				echo '<div id="cartel"><img src="'.$imagen.'" id="caratula"> </div>';
				echo '<div id="descripcion-basica"> Nombre: '.$usuarios["nombre"]." ".$usuarios["apellidos"].'</div>';
				echo '<div id="descripcion-basica"> Email: '.$usuarios["email"]." ".$usuarios["email"].'</div>';
				if($usuarios["rol"] == 1) {
					echo '<div id="descripcion-basica"> Rol: Usuario registrado</div>';
				} else if($usuarios["rol"] == 2) {
					echo '<div id="descripcion-basica"> Rol: Administrador</div>';
				}
				echo '<div id="descripcion-basica">Descripcion: '.substr($usuarios["descripcion"],0,400)."...".'</div>';
				echo '<div style="clear:both;margin-left: 90%;padding-bottom:2%;"><a href="'.RAIZ_APP.'includes/perfil.php?id='.$usuarios["id_user"].'">Leer más</a></div>';
				echo '</div>';
			}
			
			foreach($contenido[1] as $merchas) {		
				$imagen = RAIZ_APP;
				if(empty($merchas["foto1"])) {
					$imagen .= "img/no_photo_available.png";
				} else {
					$imagen .= $merchas["foto1"];
				}

				echo '<div style="background-color: #405656;">';		
				echo '<div id="titulo-serie">'.$merchas["nombre"].'</div>';
				echo '<div id="cartel"><img src="'.$imagen.'" id="caratula"> </div>';
				echo '<div id="descripcion-basica">'.substr($merchas["descripcion"],0,400)."...".'</div>';
				echo '<div style="clear:both;margin-left: 90%;padding-bottom:2%;"><a href="'.RAIZ_APP.'includes/descripcion-merchandising.php?nombre='.$merchas["nombre"].'">Leer más</a></div>';
				echo '</div>';
			}
			
			foreach($contenido[2] as $content) {		
				$imagen = RAIZ_APP;
				if(empty($content["caratula"])) {
					$imagen .= "img/no_photo_available.png";
				} else {
					$imagen .= $content["caratula"];
				}

				echo '<div style="background-color: #405656;">';		
				echo '<div id="titulo-serie">'.$content["titulo"].'</div>';
				echo '<div id="cartel"><img src="'.$imagen.'" id="caratula"> </div>';
				echo '<div id="descripcion-basica">'.substr($content["sinopsis"],0,400)."...".'</div>';
				echo '<div style="clear:both;margin-left: 90%;padding-bottom:2%;"><a href="'.RAIZ_APP.'includes/descripcion.php?title='.$content["titulo"].'">Leer más</a></div>';
				echo '</div>';
			}

			echo '</div>';
		}
	}


?>