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
		$contenido = getPaginationByType($start_with, $rows_for_page,1);
		
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

		$html="</div>";
		$html .= '<p><hr></p><div style="width:100%; text-align:center;">';
		
		if($page >= 1) {
			$html .= '<a href="series.php?page=0">Primero</a>';
			$html .= '<a href="series.php?page='.($page-1).'">Anterior</a>';
		}
		
		for($i=0;$i<$pages;$i++) {
			$html .= '| <a href="series.php?page='.$i.'">'.$i.'</a> |';
		}

		$html .= '<strong>'.($page+1).' de '.$pages.'</strong>';

		if($page < ($pages-1)) {
			$html .= '<a href="series.php?page='.($page+1).'">Siguiente</a>';
			$html .= '<a href="series.php?page='.($pages-1).'">Ultimo</a>';
		}
		
		echo $html;	
	}


?>	
