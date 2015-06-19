<?php 

	require_once __DIR__.'/config.php'; 
	require_once __DIR__.'/comentarios.php'; 
	$id_comment = $_GET['id'];
	
	deleteComentario($id_comment);
	header("Location:".$_SERVER['HTTP_REFERER']);

?>