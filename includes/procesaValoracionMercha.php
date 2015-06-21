<?php
	require_once __DIR__.'/valoracionDB.php';
	require_once __DIR__.'/usuariosDB.php';
	require_once __DIR__.'/config.php';

	if(isset($_GET['do'])) {
		if($_GET['do']=='rate'){
			// do rate
			insertRatingMercha();
		}else if($_GET['do']=='getrate'){
			// get rating
			echo getRatingMercha();
		} else if($_GET['do'] == 'numVotos') {
			echo getRowsRatingMercha();
		}
	}

// function to retrieve
function getRatingMercha(){
	$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : NULL;
	return getRatingMerchandising($nombre);
}

// function to retrieve
function getRatingMercha2($nombre){
	if(dameFilasRatingMerchandising2($nombre) == 0)
		return 0;
	else
		return getRatingMerchandising($nombre);
}

function getRowsRatingMercha(){
	$nombreUsuario = $_SESSION['usuario'];
	$usuario = dameUsuarioByUsername($nombreUsuario);
	$id_user = $usuario['id_user'];

	$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : NULL;
	if($id_user == false) {
		return 1;
	}else 
	return dameFilasRatingMerchandising($id_user,$nombre);
}

// function to retrieve
function insertRatingMercha(){
	$nombreUsuario = $_SESSION['usuario'];
	$usuario = dameUsuarioByUsername($nombreUsuario);
	$id_user = $usuario['id_user'];
	$rating = isset($_GET['rating']) ? $_GET['rating'] : NULL;
	$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : NULL;
	insertRatingMerchandising($id_user,$nombre, $rating);
}

?>
