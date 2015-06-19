<?php 
	require_once __DIR__.'/merchaDB.php';
	require_once __DIR__.'/formlib.php';

	function addMerchandising($params) {
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
		} else {
			$result[] = "Debes añadir dos imagenes al merchandising";
			$okValidacionMercha = false;
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
		
		$val_pagina = isset($params['valoracionpagina']) ? $params['valoracionpagina'] : null;
		
		if(!$val_pagina || empty($val_pagina) || $val_pagina < 1 || $val_pagina > 5) {
			$result[] = 'La valoración del merchansing no es válida';
			$okValidacionMercha = false;
		}
		
		if($okValidacionMercha) {
			$result = addMercha($nombre, $rutaDestino, $rutaDestino2, $descripcion, $unidades, $proveedor, $precio, $valoracion);
		}
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
		
		$val_pagina = isset($params['valoracionpagina']) ? $params['valoracionpagina'] : null;
		
		if(!$val_pagina || empty($val_pagina) || $val_pagina < 1 || $val_pagina > 5) {
			$result[] = 'La valoración del merchansing no es válida';
			$okValidacionMercha = false;
		}
		
		$id_mercha = dameIDMercha($titulo);
		
		if($okValidacionMercha) {
			modifyMerchanombre($id_mercha, $titulo);
			modifyMerchafoto($id_mercha, $rutaDestino, "foto1");
			modifyMerchafoto($id_mercha, $rutaDestino2, "foto2");
			modifyMerchadescripcion($id_mercha, $descripcion);
			modifyMerchaunidades($id_mercha, $unidades);
			modifyMerchaproveedor($id_mercha, $proveedor);
			modifyMerchaprecio($id_mercha, $precio);
			modifyMerchavaloracion($id_mercha, $valoracion);
			$result = "${_SERVER['PHP_SELF']}";
		}
		
		return $result;
	
	}
	function deleteMerchan($params) {
		$okValidacionMercha = true;
		$nombre = isset($params['nombre']) ? $params['nombre'] : null;
	
		$id_mercha = dameIDMercha($nombre);
		
		if(!$nombre || empty($nombre) || $id_nombre == false ) {
			$result[] = 'El merchandising no existe.';
			$okValidacionMercha = false;
		}
		
		if($okValidacionMercha) {
			$result = deleteMercha($id_mercha);
		}
	}
	
	function getMerchandising($params) {
		$okValidacionMercha = true;
		$nombre = isset($params['nombre']) ? $params['nombre'] : null;
	
		$id_mercha = dameMercha($nombre);
		
		if(!$nombre || empty($nombre) || $id_mercha == false ) {
			$result[] = 'El merchanising no existe.';
			$okValidacionMercha = false;
		}
		
		if($okValidacionMercha) {
			$result = dameContent($id_content);
		}
		
		return $result;
	}

function dameAllMercha() {
	return dameMerchas();
}
?>