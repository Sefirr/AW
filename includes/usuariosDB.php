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
	cierraConsultas();
	return $usuario;
}

function dameUsuarioByUsername($nombreUsuario) {
	// Usar global UNICAMENTE para esta variable
	global $BD;

	$query = "SELECT * FROM users WHERE username='".$BD->real_escape_string($nombreUsuario)."'";
	$usuario = false;
	if ($resultado = $BD->query($query)) {
		$usuario = $resultado->fetch_assoc();
		$resultado->close();
	}
	cierraConsultas();
	return $usuario;
}

function dameUsuarioById($id) {
	// Usar global UNICAMENTE para esta variable
	global $BD;

	$query = "SELECT * FROM users WHERE id_user='".$BD->real_escape_string($id)."'";
	$usuario = false;
	if ($resultado = $BD->query($query)) {
		$usuario = $resultado->fetch_assoc();
		$resultado->close();
	}
	cierraConsultas();
	return $usuario;
}

function modificaRol($username, $rol){
	global $BD;	
	$query = "UPDATE users 
			set rol = '".$rol.
			"' where username ='".$BD->real_escape_string($username)."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		
	}
	cierraConsultas();
	return $exito;

}

function modificarpassword($username, $newpass){
	global $BD;	
	$query = "UPDATE users 
			set password = '".$newpass.
			"' where username ='".$BD->real_escape_string($username)."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		
	}
	cierraConsultas();
	return $exito;

}

function modificarfoto($username, $newfoto){
	global $BD;	
	$query = "UPDATE users 
			set foto = '".$newfoto.
			"' where username ='".$BD->real_escape_string($username)."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		
	}
	cierraConsultas();
	return $exito;

}

function modificardescripcion($username, $newdescription) {
	global $BD;
	
	$query = "UPDATE users 
			set descripcion = '".$newdescription.
			"' where username ='".$BD->real_escape_string($username)."'";
	$exito = false;
	
	if ($resultado = $BD->query($query)) {
		$exito = true;
		
	}
	cierraConsultas();
	return $exito;
}

function modificaremail($username, $newemail){
	global $BD;	
	$query = "UPDATE users 
			set email = '".$newemail.
			"' where username ='".$BD->real_escape_string($username)."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		
	}
	cierraConsultas();
	return $exito;
}

function eliminausuario($username){
	global $BD;	
	$query="DELETE FROM users
			WHERE username=".$BD->real_escape_string($username);

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		
	}
	cierraConsultas();
	return $exito;

}

function addusers($username, $password, $nombre, $apellidos, $email, $descripcion, $foto){
	global $BD;	
	$query = "INSERT INTO users (username, password, nombre, apellidos, email, descripcion, foto, rol) 
		VALUES  ('$username','$password','$nombre','$apellidos', '$email','$descripcion','$foto', '1')";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		
	}
	cierraConsultas();
	return $exito;

}

function buscarUsuario($user) {
	global $BD;
	$query = "SELECT *  FROM users WHERE username LIKE '%$user%'";
	if($resultado = $BD->query($query)) {
		$h = 0;
		$array = array();
		while ($usuario=$resultado->fetch_assoc()){
			$array[$h++] = $usuario;
		}						
	}
	cierraConsultas();
	return $array;
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
	cierraConsultas();
	return $usuario;
}

function emailExiste($email){
	global $BD;	
	$usuario =false;
	$exito = true;
	$query = "SELECT email FROM users";	
	if ($resultado = $BD->query($query)) {
		while($usuario = $resultado->fetch_assoc()) {
			if($usuario["email"] == $email) {
				$exito &= false;
			} else {
				$exito &= true;
			}			
		}
		$resultado->close();
	}
	cierraConsultas();
	return $exito;
}


function searchUsers($busqueda){

		global $BD;	
		
		$query = "SELECT * 
				FROM users 
				WHERE username LIKE '%".$busqueda."%'
					OR nombre LIKE '%".$busqueda."%'
					OR apellidos LIKE '%".$busqueda."%'
					OR email LIKE '%".$busqueda."%'
					OR descripcion LIKE '%".$busqueda."%'";

		$exito = false;

		$contenido = array();
		$i = 0;
		if($resultado = $BD->query($query)) {
			while($content = $resultado->fetch_assoc()) {
				$contenido[$i] = array();
				$contenido[$i++]= $content;
					
			}
		}
		cierraConsultas();
		return $contenido;




}

function dameFilasUsuarios($search){

	global $BD;	

	$query = "SELECT * 
				FROM users 
				WHERE username LIKE '%".$search."%'
					OR nombre LIKE '%".$search."%'
					OR apellidos LIKE '%".$search."%'
					OR email LIKE '%".$search."%'
					OR descripcion LIKE '%".$search."%'";

	$exito = false;

	$exito = $BD->query($query);
	cierraConsultas();
	return $exito->num_rows;
	}

?>