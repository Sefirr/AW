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

function findFriendsDB($username) {

	// Usar global UNICAMENTE para esta variable
	global $BD;

	$query = "SELECT * FROM friends WHERE id_amigo1='".$BD->real_escape_string($username)."'
			or id_amigo2='".$BD->real_escape_string($username)."'";
	$usuario = false;
	$friends = array();
	$h = 0;
	if ($resultado = $BD->query($query)) {
		while($usuario = $resultado->fetch_assoc()) {
			if($usuario['id_amigo1'] == $username) {
				$user = dameUsuarioById($usuario['id_amigo2']);
				$friends[$h++] = $user;
			} else if($usuario['id_amigo2'] == $username) {
				$user = dameUsuarioById($usuario['id_amigo1']);
				$friends[$h++] = $user;
			}
			//$resultado->close();
		}
	}

	return $friends;

}

?>
