<?php	
require_once __DIR__.'/contenidoDB.php';
require_once __DIR__.'/formlib.php';
require_once __DIR__.'/config.php';
	
function gestionarFormularioAddContent() {
   formulario('addContent', 'generaFormularioAddContent', 'addContent', null, null, 'multipart/form-data');
}

function generaFormularioAddContent($datos) { 
	$html = <<<EOS
			<label> Tipo : </label>	
			<select name="tipo"> 
				<option value="1" selected="selected">Serie</option>
				<option value="2">Película</option>
				<option value="3">Videojuego</option>   
			</select>
			<br/>
			<label>Título : </label>
			<input type="text" class="addcontent" placeholder="Título" name="titulo" id="tittle" /><img class="hide" src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgtittle"/><!--- AGREGAR TITULO PELICULA: agregar titulo de la pelicula.-->
			<br/>
			<label>Carátula : </label> 
			<input type="file" name="imagen"/><!-- AGREGAR CARATULA: agregar imagen de la carátula de la pelicula. -->
			<br/>
			<label>Sinopsis : </label>
			<textarea class="addcontent" name="sinopsis" placeholder="Sinopsis" id="sinopsis"></textarea><img class="hide" src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgsinopsis"/> <!--AGREGAR SINOPSIS: agregar sinopsis de la película. -->
			<br/>
			<fieldset>
			<legend>Descripción básica </legend>
				<label>Descripción: </label>
				<textarea class="addcontent" name="descripcion" placeholder="Descripción" id="descripciones"></textarea><img class="hide" src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgdescripcion"/>
				<br/>
				<label>Fecha de estreno: </label>
				<input name="fecha" type="date" placeholder="DD-MM-YY" id="fecha" /><img class="hide" src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgfecha"/>
				<br/>
				<label>Director: </label>
				<input class="addcontent" type="text" name="director" id="director" /><img class="hide" src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgdirect"/>
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
	
	$id_content = dameIDContent($titulo);
	
	if($id_content == true) {
		$result[] = 'Ya existe contenido asociado a ese nombre.';
		 $okValidacionContenido = false;
	}
	
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
	
	$rutaDestino= "img/";
	
	if(!empty($_FILES["imagen"]["name"])) {
		$rutaTemporal=$_FILES["imagen"]["tmp_name"];
		$nombreImagen=$_FILES["imagen"]["name"];
		if($tipo == 1) {
			if (!file_exists("../img/series/")) 
				mkdir("../img/series/", 0777, true);
			$rutaDestino.="series/".$titulo.".".end(explode(".", $nombreImagen));
		}else if($tipo == 2) {
			if (!file_exists("../img/peliculas/")) 
				mkdir("../img/peliculas/", 0777, true);
			$rutaDestino.="peliculas/".$titulo.".".end(explode(".", $nombreImagen));
		}else {
			if (!file_exists("../img/videojuegos/")) 
				mkdir("../img/videojuegos/", 0777, true);
			$rutaDestino.="videojuegos/".$titulo.".".end(explode(".", $nombreImagen));
		}
		
		$rutaUpload = '../'.$rutaDestino;
		move_uploaded_file($rutaTemporal,$rutaUpload);
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
	$id_content = dameIDContent($_GET['title']);
	
	$content = dameContent($id_content);
	$titulo = isset($content['titulo']) ? $content['titulo'] : null ;
	$tipo = isset($content['tipo']) ? $content['tipo'] : null ;
	$sinopsis = isset($content['sinopsis']) ? $content['sinopsis'] : null ;
	$descripcion = isset($content['descripcion']) ? $content['descripcion'] : null ;
	$fechaestreno = isset($content['fechaestreno']) ? $content['fechaestreno'] : null ;
	$director = isset($content['director']) ? $content['director'] : null ;
	$duracion = isset($content['duracion']) ? $content['duracion'] : null ;
	$valoracionpagina = isset($content['valoracionpagina']) ? $content['valoracionpagina'] : null ;

	
	if($id_content == false) {
		$html = "<div class='error'><ul><li>El contenido qué está buscando no existe.</li></ul></div>";
	} else {
		$html = <<<EOS
			<input type="hidden" name="old-titulo" value="$titulo">
			<input type="hidden" name="tipo" value="$tipo">
			<label>Título : </label>
			<input type="text" class="addcontent" placeholder="Título" name="titulo" value ="$titulo"><!--- AGREGAR TITULO PELICULA: agregar titulo de la pelicula.-->
			<br/>
			<label>Carátula : </label> 
			<input type="file" name="imagen"><!-- AGREGAR CARATULA: agregar imagen de la carátula de la pelicula. -->
			<br/>
			<label>Sinopsis : </label>
			<textarea class="addcontent" name="sinopsis" placeholder="Sinopsis de la serie...">$sinopsis</textarea> <!--AGREGAR SINOPSIS: agregar sinopsis de la película. -->
			<br/>
			<fieldset>
			<legend>Descripción básica </legend>
				<label>Descripción: </label>
				<textarea class="addcontent" name="descripcion" placeholder="Descripción">$descripcion</textarea>
				<br/>
				<label>Fecha de estreno: </label>
				<input name="fecha" type="date" value="$fechaestreno">
				<br/>
				<label>Director: </label>
				<input class="addcontent" type="text" name="director" value="$director">
				<br/>
				<label>Duración: </label>
				<input type="number" name="duracion" value="$duracion"> 
				<br/>
				<label>Valoración de la página: </label>
				<input type="number" name="val_pagina" value="$valoracionpagina" min="1" max="5" > 
				<br/>

			</fieldset>

			<!--Botones de enviar y reset-->
			<input type="submit" name="editContent" value="Enviar" />
			<input type="reset" name="reset" value="Borrar" />
EOS;

	}


	return $html;
}
	
function editContent($params) {	
	$result = array();
	$okValidacionContenido = true;
		
	$tipo = isset($params['tipo']) ? $params['tipo'] : null ;
	$titulo = isset($params['titulo']) ? rtrim($params['titulo']) : null ;
	
	if(!$titulo || empty($titulo)) {
		 $result[] = 'El titulo del contenido no es válido.';
		 $okValidacionContenido = false;
	}
	
	$sinopsis = isset($params['sinopsis']) ? $params['sinopsis'] : null;
	
	if(!$sinopsis || empty($sinopsis)) {
		 $result[] = 'La sinopsis del contenido no es válida.';
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
	
	$rutaDestino= "img/";
	
	if(!empty($_FILES["imagen"]["name"])) {
		$rutaTemporal=$_FILES["imagen"]["tmp_name"];
		$nombreImagen=$_FILES["imagen"]["name"];
		if($tipo == 1) {
			if (!file_exists("../img/series/")) 
				mkdir("../img/series/", 0777, true);
			$rutaDestino.="series/".$titulo.".".end(explode(".", $nombreImagen));
		}else if($tipo == 2) {
			if (!file_exists("../img/peliculas/")) 
				mkdir("../img/peliculas/", 0777, true);
			$rutaDestino.="peliculas/".$titulo.".".end(explode(".", $nombreImagen));
		}else {
			if (!file_exists("../img/videojuegos/")) 
				mkdir("../img/videojuegos/", 0777, true);
			$rutaDestino.="videojuegos/".$titulo.".".end(explode(".", $nombreImagen));
		}
		
		$rutaUpload = '../'.$rutaDestino;
		move_uploaded_file($rutaTemporal,$rutaUpload);
	}
	$old_titulo = isset($params['old-titulo']) ? $params['old-titulo'] : null ;
	$id_content = dameIDContent($old_titulo);
	
	if($okValidacionContenido) {
		if($old_titulo != $titulo) {
			modifyContenttitulo($id_content, $titulo);
		}
		modifyContentcaratula($id_content, $rutaDestino);
		modifyContentsinopsis($id_content, $sinopsis);
		modifyContentdescripcion($id_content, $descripcion);
		modifyContentfechaestreno($id_content, $fecha);
		modifyContentdirector($id_content, $director);
		modifyContentvaloracion($id_content, $val_pagina);
		$result = "edit-content.php?title=".$titulo;

	}
	
	return $result;
}

function deleteContent($params) {
	$result = array();
	$okValidacion = true;

	$titulo = isset($params) ? $params : null;
	
	$id_content = dameIDContent($titulo);
	
	if(!$titulo || empty($titulo) || $id_content == false ) {
		$result[] = 'El contenido no existe.';
		$okValidacion = false;
	}
	
	if($okValidacion) {
		deleteContentDB($id_content);
		$result = "${_SERVER['PHP_SELF']}";
	}
	
	return $result;

}

function getContent($params) {
	$okValidacion = true;
	$titulo = isset($params) ? $params : null;

	$id_content = dameIDContent($titulo);
	
	if(!$titulo || empty($titulo) || $id_content == false ) {
		$result[] = 'El contenido no existe.';
		$result[] = $titulo;
		$okValidacion = false;
	}
	
	if($okValidacion) {
		$result = dameContent($id_content);
	}
	
	return $result;

}

function dameAllContent() {
	return dameContents();
}

function getRows() {
    return dameFilas();
}

function getRowsByType($tipo) {
    return dameFilasByType($tipo);
}

function getPagination($start_with, $rows_for_page, $ordenado) {
    return damePaginacion($start_with, $rows_for_page, $ordenado);
}

function getPaginationByType($start_with, $rows_for_page, $ordenado, $tipo){
    return damePaginacionByType($start_with, $rows_for_page, $ordenado, $tipo);
}
function getrecomendacion(){

	return damerecomendacion();

}

?>
