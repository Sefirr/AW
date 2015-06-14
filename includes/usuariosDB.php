<?php
require_once __DIR__.'/config.php';

function dameUsuario($nombreUsuario) {
	// Usar global UNICAMENTE para esta variable
	global $BD;

	$query = "SELECT * FROM users WHERE email='".$BD->real_escape_string($nombreUsuario)."'";
	$usuario = false;
	if ($resultado = $BD->query($query)) {
		$usuario = $resultado->fetch_assoc();
		$resultado->close();
	}

	return $usuario;
}

function modificaRol($username, $rol){
	global $BD;	
	$query = "UPDATE users 
			set rol = $rol 
			where username =".$BD->real_escape_string($username);

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();
	}

	return $exito;

}

function modificarpassword($username, $newpass){
	global $BD;	
	$query = "UPDATE users 
			set password = $newpass 
			where username =".$BD->real_escape_string($username);

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();
	}

	return $exito;

}

function modificarfoto($username, $newfoto){
	global $BD;	
	$query = "UPDATE users 
			set foto = $newfoto 
			where username =".$BD->real_escape_string($username);

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();
	}

return $exito;

}

function modificardescripcion($username, $newdescription) {
	global $BD;
	
	$query = "UPDATE users 
			set descripcion = $newdescription 
			where username =".$BD->real_escape_string($username);
	$exito = false;
	
	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();
	}
	
	return $exito;
}

function modificaremail($username, $newemail){
	global $BD;	
	$query = "UPDATE users 
			set email = $newemail 
			where username =".$BD->real_escape_string($username);

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();
	}

return $exito;
}

function eliminausuario($username){
	global $BD;	
	$query="DELETE FROM users
			WHERE username=".$BD->real_escape_string($username);

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();
	}

return $exito;

}

function addusers($username, $password, $nombre, $apellidos, $email, $descripcion, $foto){
	global $BD;	
	$query = "INSERT INTO users (username, password, nombre, apellidos, email, descripcion, foto, rol) 
		VALUES  ('$username','$password','$nombre','$apellidos', '$email','$descripcion','$foto', '0')";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();
	}

	return $exito;

}

function dameID($username){
	global $BD;	
	$usuario =false;	
	$query = "SELECT id_user FROM users WHERE username='".$BD->real_escape_string($username)."'";	
	if ($resultado = $BD->query($query)) {
		if($resultado->num_rows ==0){
			$usuario =false;
		}else{
			$usuario = $resultado->fetch_assoc()['id_user'];
		}	
		$resultado->close();
	}
	return $usuario;
}



?>
