<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/usuariosBD.php';
// Si se utiliza la librería que os pasé como ejemplo
require_once __DIR__.'/formlib.php';

function gestionarFormularioLogin() {
  gestionaFormulario(..., 'procesaFormularioLogin', ...);
}

function procesaFormularioLogin($params) {
  // Validamos que los datos del formulario tienen el "aspecto" que queremos
  if ( $okValidacion ) {
    $result = login($params['usuario'], $params['contraseña']);
  }
  return $result;
}

function login($nombreUsuario, $password) {
  $ok = false;
  $usuario = dameUsuario($nombreUsuario);
  // Si existe el usuario
  if ( $usuario ) {
    $ok = $usuario['password'] === $password;
    if ($ok) {
      // El usuario existe y la contraseña coincide ... lo guardamos en la sesión
      $_SESSION['usuario'] = $nombreUsuario;
      // También podemos guardar en la sesión si el usuario es ADMIN, un usuario registrado, etc.
      $_SESSION['rol'] = $usuario['rol'];
      $ok=true;
    } else {
      $ok = []
      $ok[] = "Usuario o contraseña no válidos";
    }
  } else {
    $ok = []
    $ok[] = "Usuario o contraseña no válidos";
  }
  return $ok;
}
?>