<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/usuariosDB.php';

function addfriendDB($username,$friend){

global $BD;

$query ="INSERT INTO friends (id_amigo1, id_amigo2)  VALUES ('$username','$friend')";

$exito = false;

if ($resultado = $BD->query($query)) {
	$exito = true;
	//$BD->close();
}

return $exito;

}

function deletefriendDB($username, $friend){

global $BD;


$query = "DELETE FROM friends WHERE (id_amigo1='$username' or id_amigo2='$username') and (id_amigo1='$friend' or id_amigo2='$friend')";

$exito = false;

if ($resultado = $BD->query($query)) {
	$exito = true;
	//$BD->close();
}

return $exito;

}

?>