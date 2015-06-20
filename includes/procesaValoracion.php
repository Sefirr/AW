<?php
	require_once __DIR__.'/valoracionDB.php';
	require_once __DIR__.'/usuariosDB.php';
	require_once __DIR__.'/config.php';

	if(isset($_GET['do'])) {
		if($_GET['do']=='rate'){
			// do rate
			insertRatingContenido();
		}else if($_GET['do']=='getrate'){
			// get rating
			echo getRatingContenido();
		} else if($_GET['do'] == 'numVotos') {
			echo getRowsRatingContent();
		}
	}

// function to retrieve
function getRatingContenido(){
	$title = isset($_GET['title']) ? $_GET['title'] : NULL;
	return getRatingContent($title);
}

// function to retrieve
function getRatingContenido2($title){
	return getRatingContent($title);
}

function getRowsRatingContent(){
	$nombreUsuario = $_SESSION['usuario'];
	$usuario = dameUsuarioByUsername($nombreUsuario);
	$id_user = $usuario['id_user'];

	$title = isset($_GET['title']) ? $_GET['title'] : NULL;
	return ($id_user == true) && dameFilasRatingContent($id_user,$title);
}

// function to retrieve
function insertRatingContenido(){
	$nombreUsuario = $_SESSION['usuario'];
	$usuario = dameUsuarioByUsername($nombreUsuario);
	$id_user = $usuario['id_user'];
	$rating = isset($_GET['rating']) ? $_GET['rating'] : NULL;
	$title = isset($_GET['title']) ? $_GET['title'] : NULL;
	insertRatingContent($id_user,$title, $rating);
}

?>