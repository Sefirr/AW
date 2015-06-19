<?php 

	require_once __DIR__.'/config.php'; 
	require_once __DIR__.'/procesaContenido.php'; 
	$titulo = $_GET['title'];
	
	deleteContent($titulo);
	header("Location:manage-content.php");

?>