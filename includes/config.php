<?php
// Varios defines para los parámetros de configuración de acceso a la BD y la URL desde la que se sirve la aplicación
define('BD_HOST', 'localhost');
define('BD_NAME', 'aw_bd');
define('BD_USER', 'aw_root');
define('BD_PASS', 'aplicacionesweb');
define('RAIZ_APP', 'http://localhost/app/');
define('RAIZ_APP_IMAGES', 'http://localhost/AW/app/img/');
define('INSTALADA', true );

register_shutdown_function('cierraConexion');

$BD = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
if ( $BD->connect_errno ) {
  echo "Error de conexión a la BD: (" . $BD->connect_errno . ") " . utf8_encode($BD->connect_error);
  exit();
}

if ( ! $BD->set_charset("utf8")) {
  echo "Error al configurar la codificación de la BD: (" . $BD->errno . ") " . utf8_encode($BD->error);
  exit();
}

function cierraConexion() {
  // Sólo hacer uso de global para cerrar la conexion !!
  global $BD;
  if ( isset($BD) && ! $BD->connect_errno ) {
    $BD->close();
  }
}

session_start();

?>