<?php 

	require_once __DIR__.'/config.php'; 
	require_once __DIR__.'/merchandising.php'; 
	$nombre = $_GET['nombre'];
	
	deleteMercha($nombre);
	header("Location:manage-content.php");

?>