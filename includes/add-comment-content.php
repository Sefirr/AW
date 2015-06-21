<?php

	include_once 'comentarios.php';
	
	addComentarioContenido($_POST);
	
	header('Location:' .$_SERVER['HTTP_REFERER']);
	
?>
