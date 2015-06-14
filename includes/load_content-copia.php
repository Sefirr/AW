<?php require_once __DIR__.'/config.php'; ?>		
	<!-- -----------------------------META REGION------------------------------ -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ESTABLECEMOS LA CODIFICACION A UTF-8-->
		<meta name="author" content="Watchandcoment Team"><!-- AUTORES DE LA PÁGINA -->

	<!-- ----------------------------- END META REGION------------------------------ -->


	<!-- -----------------------------LINKS REGION------------------------------ -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo RAIZ_APP; ?>img/favicon.ico"> <!-- ESTABLECIMIENTO DEL FAVICON -->

		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/login.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/header.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/style.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/menu.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/footer.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<script src="<?php echo RAIZ_APP; ?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="<?php echo RAIZ_APP; ?>js/sidebarIzq.js" type="text/javascript"></script>
		<script src="<?php echo RAIZ_APP; ?>js/contact.js" type="text/javascript"></script>


	<!-- -----------------------------END LINKS REGION------------------------------ -->
	</head>
	<body>
		<div id = "contenedor">
<!-- INCLUDE CABECERA -->
			<?php include_once(__DIR__ .'/header.php'); ?>					
	
			<!-- Menu izq -->
			<?php include_once(__DIR__ .'/sidebarIzq.php'); ?>
			<!-- CONTENIDO -->
			<div id = "contenido">
<?php

	global $BD;
	
	$rows_for_page= 10;
	$sql = "SELECT * FROM content";
	$result = $BD->query($sql);
	
	$total_records = $result->num_rows;
	$pages= ceil($total_records/$rows_for_page);

	if(isset($_GET['page']))
		$page = (int)$_GET['page'];
	else
		$page = 0;

	$start_with = $page * $rows_for_page;
	$sql= "SELECT * from content ORDER BY id_content ASC LIMIT ".$start_with.",".$rows_for_page;
	$result = $BD->query($sql);
	
	while($content = $result->fetch_assoc()) {	
		$imagen = substr($content["caratula"],31);		
		echo '<div id="detalle">';
		echo '<a href=descripcion-serie.php?id=1><img src="'.RAIZ_APP.$imagen.'"/></a>';
		echo  '<a href=descripcion-serie.php?id=1><p><em>'.$content["titulo"].'</em></p></a>';
		echo  '</div>';
	}

	$html .= '<p><hr></p><div style="width:100%; text-align:center;">';
	
	if($page >= 1) {
		$html .= '<a href="load_content.php?page=0">Primero</a>';
		$html .= '<a href="load_content.php?page='.($page-1).'">Anterior</a>';
	}
	
	for($i=0;$i<$pages;$i++) {
		$html .= '| <a href="load_content.php?page='.$i.'">'.$i.'</a> |';
	}

	$html .= '<strong>'.($page+1).' de '.$pages.'</strong>';

	if($page < ($pages-1)) {
		$html .= '<a href="load_content.php?page='.($page+1).'">Siguiente</a>';
		$html .= '<a href="load_content.php?page='.($pages-1).'">Ultimo</a>';
	}

	$html .= '<div>';

	echo $html;	


?>	
</div>	</div>
		</div>	
<!-- INCLUDE FOOTER -->
			<?php include __DIR__.'/footer.php'; ?>	
	</body>
</html>
