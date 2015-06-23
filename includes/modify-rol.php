<?php

	require_once __DIR__.'/procesaUsuario.php';
	
	if(!isset($_SESSION["rol"]) ||(isset($_SESSION["rol"]) && $_SESSION["rol"] < 2)) {
		header('Location:permissions.php');
	} else {
		$id_user = $_GET['id'];

		echo modifyRol($id_user,2);

		header('Location:'.$_SERVER['HTTP_REFERER']);
	}

?>