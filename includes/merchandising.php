<?php 
	require_once __DIR__.'/merchaDB.php';
	require_once __DIR__.'/formlib.php';
	require_once __DIR__.'/procesaContenido.php';

    function gestionarFormularioAddMercha() {
        formulario('addMerchandising', 'generaFormularioaddMercha', 'addMerchandising', null, null, 'multipart/form-data');
    }
    function generaFormularioaddMercha($datos) {
	
		$contents = dameAllContent();
	
	if ($contents != NULL){
		
			$html = <<<EOS
					<label>Nombre : </label>
					<input type="text" class="addmerchandising" placeholder="Nombre" name="nombre" id="nombre" /><img class="hide" src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgname"/>
					<br/>
					<label>Foto 1 : </label> 
					<input type="file" name="foto1"/>
					<br/>
					<label>Foto 2 : </label> 
					<input type="file" name="foto2"/>
					<br/>
					<legend>Descripción básica </legend>
						<label>Descripción: </label>
						<textarea class="addmerchandising" name="descripcion" placeholder="Descripción" id="descripciones"></textarea><img class="hide" src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgdescripcion"/>
						<br/>
						<label>Unidades: </label>
						<input type="number" name="unidades" value="1"> 
						<br/>
						<label>Proveedor: </label>
						<input class="addmerchandising" type="text" name="proveedor" id="proveedor" /><img class="hide" src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgproveedor"/>
						<br/>
						<label>Precio: </label>
						<input type="number" name="precio" value="4.95"> 
						<br/>
						<label>Valoración de la página: </label>
						<input type="number" name="val_pagina" value="1" min="1" max="5" > 
						<br/>
		 
					</fieldset>            
EOS;

	$html .= '<label> Contenido asociado : </label>	<select name="id_content">';
	foreach($contents as $content) {
		$id_content = $content['id_content'];
		$html .= '<option value="'.$id_content.'" selected="selected">'.$content["titulo"].'</option>';			
	}
	$html .= '</select><br/> <!--Botones de enviar y reset-->
            <input type="submit" name="addMerchandising" value="Enviar" />
            <input type="reset" name="reset" value="Borrar" />';
	} else {
		$html = "<div class='error'><ul><li>No puedes añadir merchandising porque no hay productos a los que asociarlo.</li></ul></div>";
	}
 
    return $html;
}

	function addMerchandising($params) {
		$result = array();
		$okValidacionMercha = true;
		$nombre = isset($params['nombre']) ? $params['nombre'] : null;
		
		$id_mercha = dameIDMercha($nombre);
		
		if($id_mercha == true) {
			$result[] = 'Ya existe merchandising asociado a ese nombre.';
			$okValidacionMercha = false;
		}

		
		if(!$nombre || empty($nombre)) {
		 $result[] = 'El título del merchandising no es válido.';
		 $okValidacionMercha = false;
		}
		
		$foto1 = isset($params['foto1']) ? $params['foto1'] : null;
		
		$rutaDestino="../img/mercha/";
	
		if(!empty($_FILES["foto1"]["name"][0])) {
			$rutaTemporal=$_FILES["foto1"]["tmp_name"][0];
			$nombreImagen=$_FILES["foto1"]["name"][0];
			
			$rutaDestino.= $nombreImagen;
			if (!file_exists("../img/mercha/")) 
				mkdir("../img/mercha/", 0777, true);
			move_uploaded_file($rutaTemporal,$rutaDestino);
		} else {
			$result[] = "Debes añadir dos imagenes al merchandising";
			$okValidacionMercha = false;
		}
		
		$foto2 = isset($params['foto2']) ? $params['foto2'] : null;
		
		$rutaDestino2="../img/mercha/";
	
		if(!empty($_FILES["foto2"]["name"][1])) {
			$rutaTemporal=$_FILES["foto2"]["tmp_name"][1];
			$nombreImagen=$_FILES["foto2"]["name"][1];
			
			$rutaDestino2 .= $nombreImagen;
			if (!file_exists("../img/mercha/")) 
				mkdir("../img/mercha/", 0777, true);
			move_uploaded_file($rutaTemporal,$rutaDestino);
		} else {
			$result[] = "Debes añadir dos imagenes al merchandising";
			$okValidacionMercha = false;
		}
		
		$descripcion = isset($params['descripcion']) ? $params['descripcion'] : null;
		
		if(!$descripcion || empty($descripcion)) {
			$result[] = 'La descripción del merchansing no es válida.';
			$okValidacionMercha = false;
		}
		
		$unidades = isset($params['unidades']) ? $params['unidades'] : null;
		
		if(!$unidades || empty($unidades) || $unidades < 0) {
			$result[] = 'Las unidades del merchansing no son válidas.';
			$okValidacionMercha = false;
		}
		
		$proveedor = isset($params['proveedor']) ? $params['proveedor'] : null;
		
		if(!$proveedor || empty($proveedor)) {
			$result[] = 'El proveedor del merchandising no es válido.';
			$okValidacionMercha = false;
		}
		
		$precio = isset($params['precio']) ? $params['precio'] : null;
		
		if(!$precio || empty($unidades) || $precio < 0) {
			$result[] = 'El precio del merchansing no es válido';
			$okValidacionMercha = false;
		}
		
		$val_pagina = isset($params['val_pagina']) ? $params['val_pagina'] : null;
		
		if(!$val_pagina || empty($val_pagina) || $val_pagina < 1 || $val_pagina > 5) {
			$result[] = 'La valoración del merchansing no es válida';
			$okValidacionMercha = false;
		}
		
		$id_content = isset($params['id_content']) ? $params['id_content'] : null;
		
		if($okValidacionMercha) {
			addMercha($nombre, $rutaDestino, $rutaDestino2, $descripcion, $unidades, $proveedor, $precio, $val_pagina,$id_content);
			$result = "viewmerchalist.php";
		}
		return $result;
	}

	function gestionarFormularioEditMercha() {
	formulario('editMerchandising', 'generaFormularioEditMercha', 'editMerchandising', null, null, 'multipart/form-data');
}
	
	function generaFormularioEditMercha($datos) { 

	// Consulta de base datos para sacar los datos
	$id_mercha = dameIDMercha($_GET['nombre']);
	$content = dameMercha($id_mercha);
	$nombre = isset($content['nombre']) ? $content['nombre'] : null ;
	$unidades = isset($content['unidades']) ? $content['unidades'] : null ;
	$descripcion = isset($content['descripcion']) ? $content['descripcion'] : null ;
	$proveedor = isset($content['proveedor']) ? $content['proveedor'] : null ;
	$precio = isset($content['precio']) ? $content['precio'] : null ;
	$valoracion = isset($content['valoracion']) ? $content['valoracion'] : null ;

	if($id_mercha == false) {
		$html = "<div class='error'><ul><li>El merchandising qué está buscando no existe.</li></ul></div>";
	} else {
		$html = <<<EOS
			<input type="hidden" name="old-nombre" value="$nombre">
			<input type="hidden" name="unidades" value="$unidades">
			<label>Título : </label>
			<input type="text" class="addmercha" placeholder="Nombre" name="nombre" value ="$nombre"><!--- AGREGAR TITULO PELICULA: agregar titulo de la pelicula.-->
			<br/>
			<label>Foto 1 : </label> 
			<input type="file" name="foto1"><!-- AGREGAR CARATULA: agregar imagen de la carátula de la pelicula. -->
			<br/>
			<label>Foto 2 : </label> 
			<input type="file" name="foto2"><!-- AGREGAR CARATULA: agregar imagen de la carátula de la pelicula. -->
			<br/>
			<fieldset>
			<legend>Descripción básica </legend>
				<label>Descripción: </label>
				<textarea class="addmercha" name="descripcion" placeholder="Descripción">$descripcion</textarea>
				<br/>
				<label>Unidades</label>
				<input type="number" placeholder="unidades" name="unidades" value ="$unidades">
				<br/>
				<label>Precio</label>
				<input type="number" placeholder="precio" name="precio" value ="$precio">
				<br/>
				<label>Proveedor</label>
				<input type="text" placeholder="proveedor" name="proveedor" value ="$proveedor">
				<br/>				
				<label>Valoración de la página: </label>
				<input type="number" name="val_pagina" value="$valoracion" min="1" max="5" > 
				<br/>

			</fieldset>

			<!--Botones de enviar y reset-->
			<input type="submit" name="editMerchandising" value="Enviar" />
			<input type="reset" name="reset" value="Borrar" />
EOS;
	}
	
	return $html;
}
	
	function editMerchandising($params) {
		$result = array();
		$okValidacionMercha = true;
		$nombre = isset($params['nombre']) ? $params['nombre'] : null;
		
		if(!$nombre || empty($nombre)) {
		 $result[] = 'El título del merchandising no es válido.';
		 $okValidacionMercha = false;
		}
		
		$foto1 = isset($params['foto1']) ? $params['foto1'] : null;
		
		$rutaDestino="../img/mercha/";
	
		if(!empty($_FILES["imagen"]["name"][0])) {
			$rutaTemporal=$_FILES["imagen"]["tmp_name"][0];
			$nombreImagen=$_FILES["imagen"]["name"][0];
			
			$rutaDestino.= $nombreImagen;
			if (!file_exists("../img/mercha/")) 
				mkdir("../img/mercha/", 0777, true);
			move_uploaded_file($rutaTemporal,$rutaDestino);
		}
		$foto2 = isset($params['foto2']) ? $params['foto2'] : null;
		
		$rutaDestino2="../img/mercha/";
	
		if(!empty($_FILES["imagen"]["name"][1])) {
			$rutaTemporal=$_FILES["imagen"]["tmp_name"][1];
			$nombreImagen=$_FILES["imagen"]["name"][1];
			
			$rutaDestino2 .= $nombreImagen;
			if (!file_exists("../img/mercha/")) 
				mkdir("../img/mercha/", 0777, true);
			move_uploaded_file($rutaTemporal,$rutaDestino);
		}
		
		$descripcion = isset($params['descripcion']) ? $params['descripcion'] : null;
		
		if(!$descripcion || empty($descripcion)) {
			$result[] = 'La descripción del merchansing no es válida.';
			$okValidacionMercha = false;
		}
		
		$unidades = isset($params['unidades']) ? $params['unidades'] : null;
		
		if(!$unidades || empty($unidades) || $unidades < 0) {
			$result[] = 'Las unidades del merchansing no son válidas.';
			$okValidacionMercha = false;
		}
		
		$proveedor = isset($params['proveedor']) ? $params['proveedor'] : null;
		
		if(!$proveedor || empty($proveedor)) {
			$result[] = 'El proveedor del merchandising no es válido.';
			$okValidacionMercha = false;
		}
		
		$precio = isset($params['precio']) ? $params['precio'] : null;
		
		if(!$precio || empty($unidades) || $precio < 0) {
			$result[] = 'El precio del merchansing no es válido';
			$okValidacionMercha = false;
		}
		
		$val_pagina = isset($params['val_pagina']) ? $params['val_pagina'] : null;
	
		if(!$val_pagina || empty($val_pagina) || $val_pagina < 1 || $val_pagina > 5) {
			$result[] = 'La valoración del contenido no es válida';
			$okValidacionMercha = false;
		}
		
		$old_nombre = isset($params['old-nombre']) ? $params['old-nombre'] : null ;
		$id_mercha = dameIDMercha($old_nombre);
		
		if($okValidacionMercha) {
			if($old_nombre != $nombre) {
				modifyMerchanombre($id_mercha, $nombre);
			}
			modifyMerchafoto($id_mercha, $rutaDestino, "foto1");
			modifyMerchafoto($id_mercha, $rutaDestino2, "foto2");
			modifyMerchadescripcion($id_mercha, $descripcion);
			modifyMerchaunidades($id_mercha, $unidades);
			modifyMerchaproveedor($id_mercha, $proveedor);
			modifyMerchaprecio($id_mercha, $precio);
			modifyMerchavaloracion($id_mercha, $val_pagina);
			$result = "edit-mercha.php?nombre=".$nombre;
		}
		
		return $result;
	
	}
	
	function deleteMerchan($params) {
		
		$okValidacionMercha = true;
		$nombre = isset($params) ? $params : null;
		$id_mercha = dameIDMercha($nombre);

		if(!$nombre || empty($nombre) || $id_mercha == false ) {
			$result[] = 'El merchandising no existe.';
			$okValidacionMercha = false;
		}
		
		if($okValidacionMercha) {
			$result = deleteMercha($id_mercha);
		}
		return $result;
	}
	
function getMerchandising($params) {
		$okValidacionMercha = true;
		$nombre = isset($params) ? $params : null;
	
		$id_mercha = dameIDMercha($nombre);
		
		if(!$nombre || empty($nombre) || $id_mercha == false ) {
			$result[] = 'El merchanising no existe.';
			$okValidacionMercha = false;
		}
		
		if($okValidacionMercha) {
			$result = dameMercha($id_mercha);
		}
		
		return $result;
}

function dameAllMercha() {
	return dameMerchas();
}

function dameAllMerchaById_contents($id_content) {
	return dameMerchasById_content($id_content);
}

?>