<?php
	require_once __DIR__.'/config.php';
	require_once __DIR__.'/contenidoDB.php';
	
	function addContent($params) {	
		$result = array();
		$okValidacionContenido = true;
		
		$tipo = isset($params['tipo']) ? $params['tipo'] : null ;
		$titulo = isset($params['titulo']) ? $params['titulo'] : null ;
		
		if(!$titulo || empty($titulo)) {
			 $result[] = 'El titulo de la serie está vacio.';
			 $okValidacionContenido = false;
		}
		
		$sinopsis = isset($params['sinopsis']) ? $params['titulo'] : null;
		
		if(!$sinopsis || empty($sinopsis)) {
			 $result[] = 'La sinopsis de la serie está vacia.';
			 $okValidacionContenido = false;
		}
		
		$descripcion = isset($params['descripcion']) ? $params['descripcion'] : null;
		
		if(!$descripcion || empty($descripcion)) {
			 $result[] = 'La descripción de la serie está vacia.';
			 $okValidacionContenido = false;
		}
		
		$fecha = isset($params['fecha']) ? $params['fecha'] : null;
		if(!$fecha || empty($fecha)) {
			$result[] = 'El campo de la fecha de estreno está vacio o la fecha no es válida.';
			$okValidacionContenido = false;
		}
		$fecha =  date("Y-m-d", strtotime($params['fecha']));
		
		$director = isset($params['director']) ? $params['director'] : null;
		
		if(!$director || empty($director)) {
			 $result[] = 'El director de la serie está vacio.';
			 $okValidacionContenido = false;
		}
		
		$duracion = isset($params['duracion']) ? $params['duracion'] : null;
		
		if(!$duracion || empty($duracion) || $duracion < 0) {
			 $result[] = 'La duración de la serie no es válida';
			 $okValidacionContenido = false;
		}
		
		
		$val_pagina = isset($params['val_pagina']) ? $params['val_pagina'] : null;
		
		if(!$val_pagina || empty($val_pagina) || $val_pagina < 1 || $val_pagina > 5) {
			 $result[] = 'La valoración de la página no es válida';
			 $okValidacionContenido = false;
		}
		
		$rutaDestino="../img/";
		
		if(!empty($_FILES["imagen"]["name"])) {
			$rutaTemporal=$_FILES["imagen"]["tmp_name"];
			$nombreImagen=$_FILES["imagen"]["name"];
			if($tipo == 1) {
				$rutaDestino.="series/".$nombreImagen;
				if (!file_exists("../img/series/")) 
					mkdir("../img/series/", 0777, true);
			}else if($tipo == 2) {
				$rutaDestino.="peliculas/".$nombreImagen;
				if (!file_exists("../img/peliculas/")) 
					mkdir("../img/peliculas/", 0777, true);
			}else {
				$rutaDestino.="videojuegos/".$nombreImagen;
				if (!file_exists("../img/videojuegos/")) 
					mkdir("../img/videojuegos/", 0777, true);
			}
			move_uploaded_file($rutaTemporal,$rutaDestino);
		} else {
			$result[] = 'Debes introducir una imagen a la serie.';
			$okValidacionContenido = false;
		}
		
		if($okValidacionContenido) {
			$result = addContentDB($tipo, $titulo, $rutaDestino, $sinopsis, $descripcion, $fecha, $director, $duracion, $val_pagina);
		}
		
		return $result;
	}
?>