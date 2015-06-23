<?php 
	
	require_once __DIR__ .'/social.php';
	
	if(!isset($_SESSION["rol"]) ||(isset($_SESSION["rol"]) && $_SESSION["rol"] < 1)) {
		header('Location:permissions.php');
	} else {	
		$id_friend = $_GET['id'];
		
		deleteFriend($id_friend);
		
		header('Location:'.$_SERVER['HTTP_REFERER']);
	}

?>