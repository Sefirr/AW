<?php

	function addContentDB($tipo, $titulo, $rutaDestino, $sinopsis, $descripcion, $fecha, $director, $duracion, $val_pagina ) {
	global $BD;	
		$exito = false;
		$query = "INSERT INTO content (tipo, titulo, caratula, sinopsis, descripcion, fechaestreno, director, duracion, valoracionpagina) 
		VALUES  ('$tipo','$titulo','$rutaDestino','$sinopsis','$descripcion', '$fecha','$director','$duracion', '$val_pagina')";
		
		if ($resultado = $BD->query($query)) {
			$exito = true;
			$resultado->close();
		}
		
		return $exito;
	}

	function deleteContent($id_content){
	global $BD;	
	$query = "DELETE FROM content
				WHERE id_content = $id_content";

	
	$exito = false;


	if ($resultado = $BD->query($query)) {
			$exito = true;
			$resultado->close();
		}
		
		return $exito;


	}

	function dameIDContent($titulo){
	global $BD;	
	$query = "SELECT id_content
				FROM content
				WHERE titulo =".$BD->real_escape_string($titulo);

	$exito = false;


		if ($resultado = $BD->query($query)) {
		
		
			 if($resultado->num_rows ==0)
	  			$exito =false;

	  		else
	  			$exito = $resultado->fetch_assoc()['id_user'];

	  			
	  		$resultado->close();
		}
		
		return $exito;

	
	return $usuario;

	}


	function modifyContenttitulo($id_content, $newtitulo){
	global $BD;	

	$query = "UPDATE content 
			set titulo = $newtitulo 
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();}

	return $exito;

	}

	function modifyContentcaratula($id_content, $newcaratula){
	global $BD;	
	$query = "UPDATE content 
	set caratula = $newcaratula 
	where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();}

	return $exito;

	}

	function modifyContentsinopsis($id_content, $newsinopsis){
	global $BD;	
	$query = "UPDATE content 
			set sinopsis = $newsinopsis 
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();}

	return $exito;



	}

	function modifyContentdescripcion($id_content, $newdescripcion){
	global $BD;	
	$query = "UPDATE content 
			set descripcion = $newdescripcion 
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();}

	return $exito;


	}

	function modifyContentfechaestreno($id_content, $newfecha){
	global $BD;	
	$query = "UPDATE content 
			set fechaestreno = $newfecha
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();}

	return $exito;



	}

	function modifyContentdirector($id_content, $newdirector){
	global $BD;	
	$query = "UPDATE content 
			set director = $newdirector 
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();}

	return $exito;


	}

	function modifyContentvaloracion($id_content, $newvaloracion){
	global $BD;	
	$query = "UPDATE content 
			set valoracionpagina = $newvaloracion 
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();}

	return $exito;



	}

	function modifyContentpublicado($id_content, $newstatus){
	global $BD;	
	$query = "UPDATE content 
			set publicado = $newstatus 
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();}

	return $exito;



	}

?>