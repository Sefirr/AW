<?php

	function addContentDB($tipo, $titulo, $rutaDestino, $sinopsis, $descripcion, $fecha, $director, $duracion, $val_pagina ) {
		global $BD;
		$exito = false;
		$query = "INSERT INTO content (tipo, titulo, caratula, sinopsis, descripcion, fechaestreno, director, duracion, valoracionpagina) VALUES  ('$tipo','$titulo','$rutaDestino','$sinopsis','$descripcion', '$fecha','$director','$duracion', '$val_pagina')";
		
		if ($resultado = $BD->query($query)) {
			$exito = true;
			$BD->close();
		}
		
		return $exito;
	}


?>