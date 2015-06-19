<?php 

	require_once __DIR__.'/config.php'; 
	require_once __DIR__.'/merchandising.php'; 
	
	$nombre = $_GET['nombre'];
	
	deleteMerchan($nombre);
	header("Location:manage-mercha.php");

?>