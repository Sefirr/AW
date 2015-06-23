<?php

	include_once 'comentarios.php';
	
	if(!isset($_SESSION["rol"]) ||(isset($_SESSION["rol"]) && $_SESSION["rol"] < 1)) {
		header('Location:permissions.php');
	} else {
	
		addComentarioContenido($_POST);
		
		header('Location:' .$_SERVER['HTTP_REFERER']);
	}
	
?>
