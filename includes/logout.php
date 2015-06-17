<?php

  // Tenemos que asegurarnos de participar en la sessión actual
  session_start();

  // Destruimos la sesión
  session_destroy();
  unset($_SESSION);

  // Redirigimos a la página principal del ejemplo
  header('Location: ../index.php');
?>
