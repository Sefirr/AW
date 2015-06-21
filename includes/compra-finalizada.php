<?php 

	require_once __DIR__.'/config.php';
	require_once __DIR__.'/carritoDB.php';

	finalizar_Compra();
	
	header('Location:'.RAIZ_APP.'index.php');

?>