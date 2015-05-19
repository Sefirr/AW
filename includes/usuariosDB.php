<?php
require_once __DIR__.'/config.php';

global $BD;
function dameUsuario($username) {
  // Usar global UNICAMENTE para esta variable
  

  $query = "SELECT * FROM users WHERE username=".$BD->real_escape_string($username);
  $usuario = false;
  if ($resultado = $BD->query($query)) {
    $usuario = $resultado->fetch_assoc();
    $resultado->close();
  }
  
  return $usuario;
}


function modificaRol($username, $rol){

$query = "UPDATE users 
		set rol = $rol 
		where username =".$BD->real_escape_string($username);

$exito = false;

if ($resultado = $BD->query($query)) {
	$exito = true;
	$BD->close();}

return exito;

}

function modificarpassword($username, $newpass){

$query = "UPDATE users 
		set password = $newpass 
		where username =".$BD->real_escape_string($username);

$exito = false;

if ($resultado = $BD->query($query)) {
	$exito = true;
	$BD->close();}

return exito;

}

function modificarfoto($username, $newfoto){

$query = "UPDATE users 
		set foto = $newfoto 
		where username =".$BD->real_escape_string($username);

$exito = false;

if ($resultado = $BD->query($query)) {
	$exito = true;
	$BD->close();}

return exito;

}

function modificardescripcion($username, $newdescription)
$query = "UPDATE users 
		set descripcion = $newdescription 
		where username =".$BD->real_escape_string($username);

$exito = false;

if ($resultado = $BD->query($query)) {
	$exito = true;
	$BD->close();}

return exito;
}

function modificaremail($username, $newemail){
$query = "UPDATE users 
		set email = $newemail 
		where username =".$BD->real_escape_string($username);

$exito = false;

if ($resultado = $BD->query($query)) {
	$exito = true;
	$BD->close();}

return exito;
}

function eliminausuario($username){
$query="DELETE FROM users
		WHERE username=".$BD->real_escape_string($username);

$exito = false;

if ($resultado = $BD->query($query)) {
	$exito = true;
	$BD->close();}

return exito;

}

function addusers($username, $password, $nombre, $apellidos, $email, $descripcion, $foto){

$query = "INSERT INTO users (username, password, nombre, apellidos, email, descripcion, foto, rol) 
	VALUES  ('$username','$password','$nombre','$apellidos', '$email','$descripcion','$foto', '0')";

$exito = false;

if ($resultado = $BD->query($query)) {
	$exito = true;
	$BD->close();}

return exito;

}

function dameID($username){
  
  $query = "SELECT id_user FROM users WHERE username=".$BD->real_escape_string($username);
  $id = false;
  if ($resultado = $BD->query($query)) {
    $id = $resultado->fetch_assoc();
    $resultado->close();
  }
  
  return $id;


}

?>