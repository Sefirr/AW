<?php 

	require_once __DIR__.'/config.php'; 
	require_once __DIR__.'/procesaContenido.php';
	require_once __DIR__.'/procesaValoracionContent.php';
	
	$rows_for_page= 12;
	
	$total_records = getRowsByType(2);
	$pages= ceil($total_records/$rows_for_page);

	if($total_records == 0) {
		echo "No hay contenido.";
	} else {
		if(isset($_GET['page']))
			$page = (int)$_GET['page'];
		else
			$page = 0;

		$start_with = $page * $rows_for_page;
			echo '<div id="menu-ordenar">
					<ul>
						<li><a href="'.RAIZ_APP.'peliculas.php?page='.$page.'&ordenar=alfabeticamente">Alfabeticamente</a></li>
						<li><a href="'.RAIZ_APP.'peliculas.php?page='.$page.'&ordenar=ultimas">&Uacute;ltimas</a></li>
						<li><a href="'.RAIZ_APP.'peliculas.php?page='.$page.'&ordenar=valoradas">M&aacute;s valoradas</a></li>
					</ul>
				</div>';
		$ordenado = isset($_GET['ordenar']) ? $_GET['ordenar'] : NULL;
		if(strcmp($ordenado,"alfabeticamente") == 0) {
			$ordenar = "titulo";
		} else if(strcmp($ordenado,"valoradas") == 0) {
			$ordenar = "valoracionpagina";
		} else if(strcmp($ordenado,"ultimas") == 0){
			$ordenar = "fechaestreno";	
		} else {
			$ordenar = "id_content";		
		}
		
		$contenido = getPaginationByType($start_with, $rows_for_page, $ordenar, 2);

		foreach($contenido as $content) {		
			$imagen = RAIZ_APP;
			if(empty($content["caratula"])) {
				$imagen .= "img/no_photo_available.png";
			} else {
				$imagen .= $content["caratula"];
			}		
			echo '<div id="detalle">';
			echo '<a href="includes/descripcion.php?title='.$content["titulo"].'"><div id="cartel"><img src="'.$imagen.'" id="caratula"> </div></a>';
			echo  '<a href="includes/descripcion.php?title='.$content["titulo"].'"><p><em>'.substr($content["titulo"],0,13).'</em></p></a>';
			$val_user = getRatingContenido2($content["titulo"]);
			$val_pagina = $content["valoracionpagina"];
			$valoracion = floor(($val_user + $val_pagina)/2);
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
			echo  '</div>';
		}

		echo "</div>";
		echo '<div style="paginacion"><br/>';
		
		if($page >= 1) {
			if(empty($ordenado)) {
				echo '<a href="peliculas.php?page=0">Primero</a>';
				echo '<a href="peliculas.php?page='.($page-1).'">Anterior</a>';
			} else {
				echo '<a href="peliculas.php?page=0&ordenar='.$ordenado.'">Primero</a>';
				echo '<a href="peliculas.php?page='.($page-1).'&ordenar='.$ordenado.'"">Anterior</a>';
			}
		}
		
		for($i=0;$i<$pages;$i++) {
			if(empty($ordenado)) {
				echo '<a href="peliculas.php?page='.$i.'">'.$i.'</a> |';
			} else {
				echo '<a href="peliculas.php?page='.$i.'&ordenar='.$ordenado.'">'.$i.'</a> |';
			}
		}

		echo '<strong>'.($page+1).' de '.$pages.'</strong>';

		if($page < ($pages-1)) {
			if(empty($ordenado)) {
				echo '<a href="peliculas.php?page='.($page+1).'">Siguiente</a>';
				echo '<a href="peliculas.php?page='.($pages-1).'">Ultimo</a>';
			} else {
				echo '<a href="peliculas.php?page='.($page+1).'&ordenar='.$ordenado.'">    Siguiente     </a>';
				echo '<a href="peliculas.php?page='.($pages-1).'&ordenar='.$ordenado.'">    Ultimo   </a>';
			}
		}

		echo '</div>';		
	}


?>	
