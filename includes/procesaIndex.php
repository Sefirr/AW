<?php
	
	require_once __DIR__.'/config.php';
	require_once __DIR__.'/procesaContenido.php'; 
	
	$rows_for_page= 10;
	
	$total_records = getRows();
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

			echo '<div style="background-color: #405656;">';		
			echo '<div id="titulo-serie">'.$content["titulo"].'</div>';
			echo '<div id="cartel"><img src="'.$imagen.'" id="caratula"> </div>';
			echo '<div id="descripcion-basica">'.substr($content["sinopsis"],0,20).'</div>';
			echo '<div style="clear:both;margin-left: 90%;padding-bottom:2%;"><a href="'.RAIZ_APP.'includes/descripcion.php?title='.$content["titulo"].'">Leer más</a></div>';
			echo '</div>';
		}
		echo '<p><hr/></p><div style="width:100%; text-align:center;">';
		
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

		echo '<div>';

		//echo $html;
	}


?>
