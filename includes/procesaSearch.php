<?php

require_once __DIR__.'/config.php';
require_once __DIR__.'/usuariosDB.php';
require_once __DIR__.'/merchaDB.php';
require_once __DIR__.'/contenidoDB.php';


function search($busqueda){

$usuario = searchUsers($busqueda);

$mercha = searchMercha($busqueda);

$contenido = searchContenido($busqueda);

$resultado_consulta = array();
$resultado_consulta[0] = $usuario;
$resultado_consulta[1] = $mercha;
$resultado_consulta[2] = $contenido;

return $resultado_consulta;

}



?>