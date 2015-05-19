<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/usuariosBD.php';

define('HTML5_EMAIL_REGEXP', '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/');

function procesaFormularioLogin($params) {
  $result = array();
  $okValidacion = TRUE;

  $user = isset($params['email']) ? $params['email'] : null ;
  if ( !$user || ! preg_match(HTML5_EMAIL_REGEXP, $user) ) {
    $result[] = 'El nombre de usuario no es válido';
    $okValidacion = FALSE;
  }

  $pass = isset($params['password']) ? $params['password'] : null ;
  if ( ! $pass ||  strlen($pass) < 4 ) {
    $result[] = 'La contraseña no es válida';
    $okValidacion = FALSE;
  }

  // Validamos que los datos del formulario tienen el "aspecto" que queremos
  if ( $okValidacion ) {
    $result = login($params['email'], $params['password']);
  }
  return $result;
}

function login($nombreUsuario, $password) {
  $ok = false;
  $result = false;
  $usuario = dameUsuario($nombreUsuario);
  // Si existe el usuario
  if ( $usuario ) {
    $ok = $usuario['password'] === $password;
    if ($ok) {
      // El usuario existe y la contraseña coincide ... lo guardamos en la sesión
      $_SESSION['usuario'] = $nombreUsuario;
      // También podemos guardar en la sesión si el usuario es ADMIN, un usuario registrado, etc.
      $_SESSION['rol'] = $usuario['rol'];
    } else {
      $result[] = "Usuario o contraseña no válidos";
    }
  } else {
    $result[] = "Usuario o contraseña no válidos";
  }
  return $result;
}

function modifyRol($params) {
	$result = array();
	$okValidacion = true;
	$user = isset($params['user']) ? $params['user'] : null;
	
	if(!$user || empty($user)) {
		$result[] = 'El usuario no es válido.';
		$okValidacion = false;
	}
	
	$rol = isset($params['rol']) ? $params['rol'] : null;
	
	if(!$rol || empty($rol) || $rol < 0 || $rol > 3) {
		$result[] = 'El rol no es válida.';
		$okValidacion = false;
	}
	
	if($okValidacion) {
		modificaRol($user, $rol);
	}
	
	return $result;
}

function modifyEmail($params) {
	$result = array();
	$okValidacion = true;
	$user = isset($params['user']) ? $params['user'] : null;
	
	if(!$user || empty($user)) {
		$result[] = 'El usuario no es válido.';
		$okValidacion = false;
	}
	
	$email = isset($params['email']) ? $params['email'] : null;
	
	 if (!$email || !preg_match(HTML5_EMAIL_REGEXP, $email)) {
		$result[] = 'El e-mail no es válido';
		$okValidacion = false;
	}
	if($okValidacion) {
		 modificaremail($user, $email);
	}
	
	return $result;
}

function modifyPassword($params) {
	$result = array();
	$okValidacion = true;
	$user = isset($params['user']) ? $params['user'] : null;
	
	if(!$user || empty($user)) {
		$result[] = 'El usuario no es válido.';
		$okValidacion = false;
	}
	
	$pass = isset($params['password']) ? $params['password'] : null ;
	  if ( ! $pass ||  strlen($pass) < 4 ) {
		$result[] = 'La contraseña no es válida';
		$okValidacion = FALSE;
	 
	 }
	if($okValidacion) {
		$result = modificarpassword($user, $pass);
	}
	
	return $result;
}

function modifyDescription($params) {
	$result = array();
	$okValidacion = true;
	$user = isset($params['user']) ? $params['user'] : null;
	
	if(!$user || empty($user)) {
		$result[] = 'El usuario no es válido.';
		$okValidacion = false;
	}
	
	$descripcion = isset($params['descripcion']) ? $params['descripcion'] : null ;
	if (!$descripcion || empty($descripcion)) {
		$result[] = 'La descripción no es válida';
		$okValidacion = false;
	}
	
	if($okValidacion) {
		$result = modificardescripcion($user, $email);
	}
	
	return $result;
}

function modifyImage($params) {
	$result = array();
	$okValidacion = true;
	$user = isset($params['user']) ? $params['user'] : null;
	
	if(!$user || empty($user)) {
		$result[] = 'El usuario no es válido.';
		$okValidacion = false;
	}
	
	$imagen = isset($params['imagen']) ? $params['imagen'] : null;
	
	$rutaDestino="../img/";
	if(!empty($_FILES["imagen"]["name"])) {
			$rutaTemporal=$_FILES["imagen"]["tmp_name"];
			$nombreImagen=$_FILES["imagen"]["name"];
			
			$rutaDestino.= $user."/".$nombreImagen;
			if (!file_exists("../img/"$user."/")) 
				mkdir("../img/"$user."/", 0777, true);
			
			move_uploaded_file($rutaTemporal,$rutaDestino);
	} 
	
	if($okValidacion) {
		$result = modificarfoto($user, $rutaDestino);
	}
	
	return $result;
}

function addUser($params) {
	$result = array();
	$okValidacion = true;
	
	$user = isset($params['user']) ? strtolower($params['user']) : null;
	$id_user = dameID($user);
	if(!$user || empty($user) || $id_user == false ) {
		$result[] = 'El usuario no es válido.';
		$okValidacion = false;
	}
	
	$pass = isset($params['password']) ? $params['password'] : null ;
	if ( ! $pass ||  strlen($pass) < 4 ) {
		$result[] = 'La contraseña no es válida';
		$okValidacion = false;
	}
	
	$nombre = isset($params['nombre']) ? $params['nombre'] : null ;
	if(!$nombre || empty($nombre)) {
		$result[] = 'El nombre no es válido.';
		$okValidacion = false;
	}
	
	$apellidos = isset($params['apellidos']) ? $params['apellidos'] : null ;
	if(!$apellidos || empty($apellidos)) {
		$result[] = 'Los apellidos no son válidos.';
		$okValidacion = false;
	}
	
	$email = isset($params['email']) ? $params['email'] : null ;
	if ( !$email || ! preg_match(HTML5_EMAIL_REGEXP, $email) ) {
		$result[] = 'El e-mail no es válido';
		$okValidacion = FALSE;
	}
	
	$descripcion = isset($params['descripcion']) ? $params['descripcion'] : null ;
	if(!$descripcion || empty($descripcion)) {
		$result[] = 'La descripción no es válida.';
		$okValidacion = false;
	}
	
	$imagen = isset($params['imagen']) ? $params['imagen'] : null;
	
	$rutaDestino="../img/";
	if(!empty($_FILES["imagen"]["name"])) {
		$rutaTemporal=$_FILES["imagen"]["tmp_name"];
		$nombreImagen=$_FILES["imagen"]["name"];
		
		$rutaDestino.= $user."/".$nombreImagen;
		if (!file_exists("../img/"$user."/")) 
			mkdir("../img/"$user."/", 0777, true);
		
		move_uploaded_file($rutaTemporal,$rutaDestino);
	} 
	
	if($okValidacion) {
		$result = addusers($user, $pass, $nombre, $apellidos, $email, $descripcion, $rutaDestino);
	}
	
	return $result;
}

function deleteUser($params) {
	$user = isset($params['user']) ? strtolower($params['user']) : null;
	
	$id_user = dameID($user);
	if(!$user || empty($user) || $id_user == false ) {
		$result[] = 'El usuario no existe.';
		$okValidacion = false;
	}
	
	if($okValidacion) {
		$result = eliminausuario($username);
	}
	
	return $result;

}

?>