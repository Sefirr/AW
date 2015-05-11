<php 
define('BD_HOST', '@@BD_HOST@@');
define('BD_NAME', '@@BD_NAME@@');
define('BD_USER', '@@BD_USER@@');
define('BD_PASS', '@@BD_PASS@@');

define('RAIZ_APP', 'http://localhost/app');
define('INSTALADA', true );

register_shutdown_function('cierraConexion');

$BD = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
if ( $BD->connect_errno ) {
  echo "Error de conexión a la BD: (" . $BD->connect_errno . ") " . utf8_encode($BD->connect_error);
  exit();
}

if ( ! $BD->set_charset("utf8mb4")) {
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