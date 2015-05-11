<?php
require_once __DIR__.'/config.php';

function dameUsuario($nombreUsuario) {
  // Usar global UNICAMENTE para esta variable
  global $BD;

  $query = "SELECT * FROM Usuarios WHERE nombreUsuario=".$BD->real_escape_string($nombreUsuario);
  $usuario = false;
  if ($resultado = $BD->query($query)) {
    $usuario = $resultado->fetch_assoc();
    $resultado->close();
  }
  
  return $usuario;
?>