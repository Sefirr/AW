<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/usuariosDB.php';
global $BD;

function addfriend($username,$friend){

$idusu = dameID($username);

$idusu2 = dameID($friend);

$query ="INSERT INTO friends(id_amigo1, id_amigo2) 
		VALUES ('$idusu','$idusu2')";

$exito = false;

if ($resultado = $BD->query($query)) {
	$exito = true;
	$BD->close();}

return $exito;

}

function deletefriend($username, $friend){

$idusu = dameID($username);

$idusu2 = dameID($friend);

$query = "DELETE FROM friends
			WHERE id_amigo2=$idusu2";


$exito = false;

if ($resultado = $BD->query($query)) {
	$exito = true;
	$BD->close();}

return $exito;

}

?>