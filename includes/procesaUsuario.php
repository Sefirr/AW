<?php

require_once __DIR__.'/config.php';
require_once __DIR__.'/usuariosDB.php';
require_once __DIR__.'/formlib.php';

function gestionarFormularioLogin() {
  formulario('loginForm', 'generaFormularioLogin', 'procesaFormularioLogin');
}

function generaFormularioLogin($datos) { 
  $html = <<<EOS
	<fieldset id="body">
		<fieldset>
			<label for="email">Usuario</label>
			<input type="text" name="email" id="email" />
		</fieldset>
		<fieldset>
			<label for="password">Contraseña</label>
			<input type="password" name="password" id="password" />
		</fieldset>
		<input type="submit" id="login" name ="loginForm" value="Enviar" />
		<label for="checkbox"><input type="checkbox" id="checkbox" />Recuérdame</label>
	</fieldset>
	<span><a href="#">¿Has olvidado tu contraseña?</a></span>
EOS;

  return $html;
}

define('HTML5_EMAIL_REGEXP', '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/');

function procesaFormularioLogin($params) {
  $result = array();
  $okValidacion = TRUE;

  $email = isset($params['email']) ? $params['email'] : null ;
  if ( !$email || ! preg_match(HTML5_EMAIL_REGEXP, $email) ) {
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
    $result = login($email, $pass);
  }
  return $result;
}

function login($nombreUsuario, $password) {
  $ok = false;
  $result = false;
  $usuario = dameUsuario($nombreUsuario);

  // Si existe el usuario
  if ( $usuario ) {
    $ok = password_verify($password,$usuario['password']);
    if ($ok) {
      // El usuario existe y la contraseña coincide ... lo guardamos en la sesión
      $_SESSION['usuario'] = $usuario['username'];
      // También podemos guardar en la sesión el rol del usuario 
	  $_SESSION['rol'] = $usuario['rol'];
	  $result = "${_SERVER['PHP_SELF']}";
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
	$user2 = dameID($user);
	
	if(!$user || empty($user)) {
		$result[] = 'El usuario no es válido.';
		$okValidacion = false;
	}
	
	$imagen = isset($params['imagen']) ? $params['imagen'] : null;
	
	$rutaDestino="../img/users/";
	if(!empty($_FILES["imagen"]["name"])) {
			$rutaTemporal=$_FILES["imagen"]["tmp_name"];
			$nombreImagen= $_FILES["imagen"]["name"];
			
			$rutaDestino.= $nombreImagen;
			if (!file_exists("../img/users/")) 
				mkdir("../img/users/", 0777, true);
			
			move_uploaded_file($rutaTemporal,$rutaDestino);
	} 
	
	if($okValidacion) {
		$result = modificarfoto($user, $rutaDestino);
	}
	
	return $result;
}

function gestionarFormularioRegistro() {
  formulario('registro', 'generaFormularioRegistro', 'addUser', null, null, 'multipart/form-data');
}

function generaFormularioRegistro($datos) {

	$html = <<<EOS
			<input type="file" name="imagen" />
			<br/>
			<label>Username</label>
			<input type="text" class="register1" name="user" placeholder="Username" id="nick"/><img class="hide" src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgnick"/>
			<br/>
			<label>Nombre y apellidos:</label>
			<br/>
			<input type="text" class="register1" name="nombre" placeholder="Nombre" id="name"> <img class="hide" src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgname"/> 
			<br/>
			<input type="text" class="register1" name="apellidos" placeholder="Apellidos" id="lastname"> <img class="hide" src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imglastname"/> 
			</br>
			<label> Contraseña </label>
			<input type="password" class="register1" name="password" placeholder="Contraseña" id="password"> <img class="hide" src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgpassword"/> 
			<br/> 
			<label>E-mail:</label>
			<input type="text" class="register1" name="email" placeholder="E-mail" id="email2"> <img class="hide" src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgemail"/>  
			<br/>
			<label>Descripcion:</label>
			<br/>
			<textarea class="register" name="descripcion" rows="6" cols="70" placeholder="Descripción del usuario" id="descripcion2"></textarea><img class="hide" src="<?php echo RAIZ_APP; ?>img/form/no.png" alt="no" id="imgdescripcion2"/> 
			<br/>
			<!--Checkbox para los términos de uso-->
			<input type="checkbox" name="terms" value="1">Marque esta casilla para verificar que ha leído nuestros <a href="includes/info-privacy.php">términos y condiciones del servicio</a>
			<br/>

			<input type="submit" name="registro" value="Enviar" /><!-- boton de enviar -->
			<input type="reset" name="reset" value="Cancelar" /><!-- boton reset -->
EOS;

  return $html;


}

function addUser($params) {
	$result = array();
	$okValidacion = true;
	
	$user = isset($params['user']) ? strtolower($params['user']) : null;
	$user2 = dameID($user);
	if(!$user || empty($user) || $user2 == true ) {
		$result[] = 'El usuario no es válido.';
		$okValidacion = false;
	}
	
	$pass = isset($params['password']) ? $params['password'] : null ;
	if ( ! $pass ||  strlen($pass) < 4 ) {
		$result[] = 'La contraseña no es válida, debe contener numeros, y letras mayusculas y minusculas';
		$okValidacion = false;
	}
	$hash = password_hash($pass, PASSWORD_BCRYPT); 
	
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
	
	$rutaDestino="img/";
	if(!empty($_FILES["imagen"]["name"])) {
		$rutaTemporal=$_FILES["imagen"]["tmp_name"];
		$nombreImagen=$_FILES["imagen"]["name"];
		
		$rutaDestino.= "users/".$user.".".end(explode(".", $nombreImagen));
		if (!file_exists("../img/users/")) 
			mkdir("../img/users/", 0777, true);
		$rutaUpload = "../".$rutaDestino;
		move_uploaded_file($rutaTemporal,$rutaUpload);
	} else {
		$result[] = 'Debe subirse una imagen.';
		$okValidacion = false;
	}
	
	$terms = isset($params['terms']) ?  $params['terms']  : null ;
	
	if(!$terms || $terms != "1") {
		$result[] = 'Deben cumplirse los términos y condiciones de uso para registrarse.';
		$okValidacion = false;
	}
	
	
	if($okValidacion) {
		addusers($user, $hash, $nombre, $apellidos, $email, $descripcion, $rutaDestino);
		$result="${_SERVER['PHP_SELF']}";
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

function getUser($id) {
	return dameUsuarioById($id);
}

?>
