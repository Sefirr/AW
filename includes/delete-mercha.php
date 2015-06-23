<?php 

	require_once __DIR__.'/config.php'; 
	require_once __DIR__.'/merchandising.php'; 
	
	if(!isset($_SESSION["rol"]) ||(isset($_SESSION["rol"]) && $_SESSION["rol"] < 2)) {
		header('Location:permissions.php');
	} else {	
		$nombre = $_GET['nombre'];
		
		deleteMerchan($nombre);
		header("Location:manage-mercha.php");
	}

?>