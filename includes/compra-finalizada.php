<?php 

	require_once __DIR__.'/config.php';
	require_once __DIR__.'/carritoDB.php';
	
	if(!isset($_SESSION["rol"]) ||(isset($_SESSION["rol"]) && $_SESSION["rol"] < 1)) {
		header('Location:permissions.php');
	} else {
		finalizar_Compra();
		
		header('Location:'.RAIZ_APP.'index.php');
	}

?>