<?php
	include ('usuariosDB.php');

	$nombre = $_POST['nombre'];
	
	echo (bool)dameID($nombre);

?>
