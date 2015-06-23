<?php 

	require_once __DIR__.'/config.php'; 
	require_once __DIR__.'/procesaContenido.php'; 
	$titulo = $_GET['title'];
	
	if(!isset($_SESSION["rol"]) ||(isset($_SESSION["rol"]) && $_SESSION["rol"] < 2)) {
		header('Location:permissions.php');
	} else {	
		deleteContent($titulo);
		header("Location:manage-content.php");
	}

?>