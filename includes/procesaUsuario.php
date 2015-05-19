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

?>