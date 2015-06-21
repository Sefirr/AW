<?php

	include_once 'comentarios.php';
	
	addComentarioMercha($_POST);
	
	header('Location:' .$_SERVER['HTTP_REFERER']);
	
?>
