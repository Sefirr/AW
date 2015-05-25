<?php
	require_once __DIR__.'/contenidoDB.php';
	require_once __DIR__.'/formlib.php';
	
function gestionarFormularioAddContent() {
	formulario('addContent', 'generaFormularioAddContent', 'addContent', null, null, 'multipart/form-data');
}

function generaFormularioAddContent($datos) { 
	$html = <<<EOS
				<input type="hidden" name="tipo" value="1" />
				<label>Título : </label>
				<input type="text" class="addcontent" placeholder="Título" name="titulo"><!--- AGREGAR TITULO PELICULA: agregar titulo de la pelicula.-->
				<br/>
				<label>Carátula : </label> 
				<input type="file" name="imagen"><!-- AGREGAR CARATULA: agregar imagen de la carátula de la pelicula. -->
				<br/>
				<label>Sinopsis : </label>
				<textarea class="addcontent" name="sinopsis" placeholder="Sinopsis de la serie..."></textarea> <!--AGREGAR SINOPSIS: agregar sinopsis de la película. -->
				<br/>
				<fieldset>
				<legend>Descripción básica </legend>
					<label>Descripción: </label>
					<textarea class="addcontent" name="descripcion" placeholder="Descripción"></textarea>
					<br/>
					<label>Fecha de estreno: </label>
					<input name="fecha" type="date">
					<br/>
					<label>Director: </label>
					<input class="addcontent" type="text" name="director">
					<br/>
					<label>Duración: </label>
					<input type="number" name="duracion" value="10"> 
					<br/>
					<label>Valoración de la página: </label>
					<input type="number" name="val_pagina" value="1" min="1" max="5" > 
					<br/>

				</fieldset>
				
				<!--Botones de enviar y reset-->
				<input type="submit" name="addContent" value="Enviar" />
				<input type="reset" name="reset" value="Borrar" />
EOS;


	return $html;
}

	
function addContent($params) {	
	$result = array();
	$okValidacionContenido = true;
	
	$tipo = isset($params['tipo']) ? $params['tipo'] : null ;
	$titulo = isset($params['titulo']) ? $params['titulo'] : null ;
	
	if(!$titulo || empty($titulo)) {
		 $result[] = 'El titulo de la serie no es válido.';
		 $okValidacionContenido = false;
	}
	
	$sinopsis = isset($params['sinopsis']) ? $params['titulo'] : null;
	
	if(!$sinopsis || empty($sinopsis)) {
		 $result[] = 'La sinopsis de la serie no es válida.';
		 $okValidacionContenido = false;
	}
	
	$descripcion = isset($params['descripcion']) ? $params['descripcion'] : null;
	
	if(!$descripcion || empty($descripcion)) {
		 $result[] = 'La descripción de la serie no es válida.';
		 $okValidacionContenido = false;
	}
	
	$fecha = isset($params['fecha']) ? $params['fecha'] : null;
	if(!$fecha || empty($fecha)) {
		$result[] = 'La fecha de estreno de la serie no es válida.';
		$okValidacionContenido = false;
	}
	$fecha =  date("Y-m-d", strtotime($params['fecha']));
	
	$director = isset($params['director']) ? $params['director'] : null;
	
	if(!$director || empty($director)) {
		 $result[] = 'El director de la serie no es válido.';
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
		$result[] = "Debes añadir una imagen al contenido";
		$okValidacionContenido = false;
	}
	
	if($okValidacionContenido) {
		addContentDB($tipo, $titulo, $rutaDestino, $sinopsis, $descripcion, $fecha, $director, $duracion, $val_pagina);
		$result = "${_SERVER['PHP_SELF']}";
	}
	
	return $result;
}

function gestionarFormularioEditContent() {
	formulario('editContent', 'generaFormularioEditContent', 'editContent', null, null, 'multipart/form-data');
}

function generaFormularioEditContent($datos) { 

	// Consulta de base datos para sacar los datos
	$titulo = isset($datos['titulo']) ? $datos['titulo'] : null ;
	$id_content = dameIDContent($titulo);
	$content = dameContent($id_content);

	$html = <<<EOS
				<input type="hidden" name="tipo" value="1" />
				<label>Título : </label>
				<input type="text" class="addcontent" placeholder="Título" name="titulo" value ="$titulo"><!--- AGREGAR TITULO PELICULA: agregar titulo de la pelicula.-->
				<br/>
				<label>Carátula : </label> 
				<input type="file" name="imagen"><!-- AGREGAR CARATULA: agregar imagen de la carátula de la pelicula. -->
				<br/>
				<label>Sinopsis : </label>
				<textarea class="addcontent" name="sinopsis" placeholder="Sinopsis de la serie..." value="$content['sinopsis']"></textarea> <!--AGREGAR SINOPSIS: agregar sinopsis de la película. -->
				<br/>
				<fieldset>
				<legend>Descripción básica </legend>
					<label>Descripción: </label>
					<textarea class="addcontent" name="descripcion" placeholder="Descripción" value="$content['descripcion']"></textarea>
					<br/>
					<label>Fecha de estreno: </label>
					<input name="fecha" type="date" value="$content['fechaestreno']">
					<br/>
					<label>Director: </label>
					<input class="addcontent" type="text" name="director" value value="$content['director']">
					<br/>
					<label>Duración: </label>
					<input type="number" name="duracion" value="$content['duracion']"> 
					<br/>
					<label>Valoración de la página: </label>
					<input type="number" name="val_pagina" value="$content['valoracionpagina']" min="1" max="5" > 
					<br/>

				</fieldset>
				
				<!--Botones de enviar y reset-->
				<input type="submit" name="addContent" value="Enviar" />
				<input type="reset" name="reset" value="Borrar" />
EOS;


	return $html;
}

	
function editContent($params) {	
	$result = array();
	$okValidacionContenido = true;
		
	$tipo = isset($params['tipo']) ? $params['tipo'] : null ;
	$titulo = isset($params['titulo']) ? $params['titulo'] : null ;
	
	if(!$titulo || empty($titulo)) {
		 $result[] = 'El titulo del contenido no es válido.';
		 $okValidacionContenido = false;
	}
	
	$sinopsis = isset($params['sinopsis']) ? $params['titulo'] : null;
	
	if(!$sinopsis || empty($sinopsis)) {
		 $result[] = 'La sinopsisdel contenido no es válida.';
		 $okValidacionContenido = false;
	}
	
	$descripcion = isset($params['descripcion']) ? $params['descripcion'] : null;
	
	if(!$descripcion || empty($descripcion)) {
		 $result[] = 'La descripción del contenido no es válida.';
		 $okValidacionContenido = false;
	}
	
	$fecha = isset($params['fecha']) ? $params['fecha'] : null;
	if(!$fecha || empty($fecha)) {
		$result[] = 'La fecha de estreno del contenido no es válida.';
		$okValidacionContenido = false;
	}
	$fecha =  date("Y-m-d", strtotime($params['fecha']));
	
	$director = isset($params['director']) ? $params['director'] : null;
	
	if(!$director || empty($director)) {
		 $result[] = 'El director del contenido no es válido.';
		 $okValidacionContenido = false;
	}
	
	$duracion = isset($params['duracion']) ? $params['duracion'] : null;
	
	if(!$duracion || empty($duracion) || $duracion < 0) {
		 $result[] = 'La duración del contenido no es válida';
		 $okValidacionContenido = false;
	}
	
	
	$val_pagina = isset($params['val_pagina']) ? $params['val_pagina'] : null;
	
	if(!$val_pagina || empty($val_pagina) || $val_pagina < 1 || $val_pagina > 5) {
		 $result[] = 'La valoración del contenido no es válida';
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
	}
	
	$id_content = dameIDContent($titulo);
	
	if($okValidacionContenido) {
		modifyContenttitulo($id_content, $titulo);
		modifyContentcaratula($id_content, $rutaDestino);
		modifyContentsinopsis($id_content, $sinopsis);
		modifyContentdescripcion($id_content, $descripcion);
		modifyContentfechaestreno($id_content, $fecha);
		modifyContentdirector($id_content, $director);
		//modifyContentduracion($id_content, $duracion);
		modifyContentvaloracion($id_content, $val_pagina);
		$result = "${_SERVER['PHP_SELF']}";
	}
	
	return $result;
}

function deleteContent($params) {
	$okValidacion = true;
	$titulo = isset($params['titulo']) ? $params['titulo'] : null;
	
	$id_content = dameIDContent($titulo);
	
	if(!$titulo || empty($titulo) || $id_content == false ) {
		$result[] = 'El contenido no existe.';
		$okValidacion = false;
	}
	
	if($okValidacion) {
		$result = deleteContentDB($id_content);
	}
	
	return $result;

}

function getContent($params) {
	$okValidacion = true;
	$titulo = isset($params['titulo']) ? $params['titulo'] : null;
	
	$id_content = dameIDContent($titulo);
	
	if(!$titulo || empty($titulo) || $id_content == false ) {
		$result[] = 'El contenido no existe.';
		$okValidacion = false;
	}
	
	if($okValidacion) {
		$result = dameContent($id_content);
	}
	
	return $result;

}

?>