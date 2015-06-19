<?php 
	require_once __DIR__.'/config.php';
	require_once __DIR__.'/procesaContenido.php'; 

	$rows_for_page= 10;
	
	$total_records = getRowsByType(1);
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
					<li><a href="'.RAIZ_APP.'series.php?page='.$page.'&ordenar=alfabeticamente">Alfabeticamente</a></li>
					<li><a href="'.RAIZ_APP.'series.php?page='.$page.'&ordenar=ultimas">&Uacute;ltimas</a></li>
					<li><a href="'.RAIZ_APP.'series.php?page='.$page.'&ordenar=valoradas">M&aacute;s valoradas</a></li>
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
		
		$contenido = getPaginationByType($start_with, $rows_for_page, $ordenar, 1);

		foreach($contenido as $content) {		
			$imagen = RAIZ_APP;
			if(empty($content["caratula"])) {
				$imagen .= "img/no_photo_available.png";
			} else {
				$imagen .= $content["caratula"];
			}		
			echo '<div id="detalle">';
			echo '<a href="includes/descripcion.php?title='.$content["titulo"].'"><div id="cartel"><img src="'.$imagen.'" id="caratula"> </div></a>';
			echo  '<a href="includes/descripcion.php?title='.$content["titulo"].'"><p><em>'.$content["titulo"].'</em></p></a>';
			echo  '</div>';
			
		}

		echo "</div>";
		echo '<p><hr></p><div style="width:100%; text-align:center;">';
		
		if($page >= 1) {
			if(empty($ordenado)) {
				echo '<a href="series.php?page=0">Primero</a>';
				echo '<a href="series.php?page='.($page-1).'">Anterior</a>';
			} else {
				echo '<a href="series.php?page=0&ordenar='.$ordenado.'">Primero</a>';
				echo '<a href="series.php?page='.($page-1).'&ordenar='.$ordenado.'"">Anterior</a>';
			}
		}
		
		for($i=0;$i<$pages;$i++) {
			if(empty($ordenado)) {
				echo '<a href="series.php?page='.$i.'">'.$i.'</a> |';
			} else {
				echo '<a href="series.php?page='.$i.'&ordenar='.$ordenado.'">'.$i.'</a> |';
			}
		}

		echo '<strong>'.($page+1).' de '.$pages.'</strong>';

		if($page < ($pages-1)) {
			if(empty($ordenado)) {
				echo '<a href="series.php?page='.($page+1).'">Siguiente</a>';
				echo '<a href="series.php?page='.($pages-1).'">Ultimo</a>';
			} else {
				echo '<a href="series.php?page='.($page+1).'&ordenar='.$ordenado.'">Siguiente</a>';
				echo '<a href="series.php?page='.($pages-1).'&ordenar='.$ordenado.'">Ultimo</a>';
			}
		}

		echo '</div>';	
	}


?>	
