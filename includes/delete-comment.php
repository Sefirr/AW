<?php 

	require_once __DIR__.'/config.php'; 
	require_once __DIR__.'/comentarios.php'; 
	
	if(!isset($_SESSION["rol"]) ||(isset($_SESSION["rol"]) && $_SESSION["rol"] < 1)) {
		header('Location:permissions.php');
	} else {
		$id_comment = $_GET['id'];
		
		deleteComentario($id_comment);
		header("Location:".$_SERVER['HTTP_REFERER']);
	}

?>