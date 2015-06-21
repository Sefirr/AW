<?php require_once __DIR__ .'/config.php';
	  require_once __DIR__ .'/carritoDB.php';
	?>
	<!DOCTYPE html>
<html>
	<head>		
	<!-- -----------------------------META REGION------------------------------ -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ESTABLECEMOS LA CODIFICACION A UTF-8-->
		<meta name="author" content="Watchandcoment Team"><!-- AUTORES DE LA PÁGINA -->

	<!-- ----------------------------- END META REGION------------------------------ -->
		<title>Compra W&C</title>

	<!-- -----------------------------LINKS REGION------------------------------ -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo RAIZ_APP; ?>img/favicon.ico"> <!-- ESTABLECIMIENTO DEL FAVICON -->

		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/login.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/header.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/style.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/menu.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/footer.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<script src="<?php echo RAIZ_APP; ?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="<?php echo RAIZ_APP; ?>js/sidebarIzq.js" type="text/javascript"></script>
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
			$totalcoste = 0;
			//Inicializamos el contador de productos seleccionados.
			$xTotal = 0;
			
			if(isset($_SESSION['carro'])){
				
				echo "<table border=0 cellspacing=5 cellpadding=3 width='100%'>";				
				echo "<tr>";
					echo "<td>Producto</td>";
					echo "<td>Cantidad</td>";
					echo "<td colspan=2 align=right>Total</td>";
				echo "</tr>";
				echo "<tr><td colspan=5><hr></td></tr>";
				foreach($_SESSION['carro'] as $id => $x){
					$mercha = getMerchaCart($id);
					$id = $mercha['id_merchandising'];
					$producto = $mercha['nombre'];
					//acortamos el nombre del producto a 40 caracteres
					$producto = substr($producto,0,40);
					$precio = $mercha['precio'];
					//Coste por artículo según la cantidad elegida
					$coste = $precio * $x;
					//Coste total del carro
					$totalcoste = $totalcoste + $coste;
					//Contador del total de productos añadidos al carro
					$xTotal = $xTotal + $x;
					
					echo "<tr>";
					echo "<td align='left'> $producto </td>";
					echo "<td align='center'>$x</td>";					
					echo "<td align='right'> = </td>";
					echo "<td align='right' style='margin-left:10px'>$coste €";
					echo "</tr>";
				}
				echo "<tr><td colspan='5'><hr></td></tr>";
				echo "<tr>";
				echo "<td align='right' colspan='4'><b><br>Total = </b></td>";
				echo "<td align='right'><b><br> $totalcoste </b> €</td>";
				echo "</tr>";
				//BOTON COMPRAR
				echo "<tr>";
				echo "<td align='right' colspan='5'>
						<a href='compra-finalizada.php'><input type='button' class='compra' value='finalizar compra' /></a>
				</td>";
				echo "</tr>";
				
				echo "</table>";
				
				
			} else
				echo "El carro está vacío";
	
			//Campos que nos serviran para informar la cesta de lo que llevamos comprados y que se mostrará en 
			//la página PRODUCTOS.
			$_SESSION["totalcoste"] = $totalcoste;
			$_SESSION["cantidadTotal"] = $xTotal;
			echo "<p>Volver al <a href='".RAIZ_APP."includes/shopping_cart.php?id=1&action=mostrar'>carrito</a></p>";
			?>	
			</div>
			<!-- INCLUDE FOOTER -->
			<?php include_once(__DIR__ .'/footer.php'); ?>
		</div>	
		
	</body>
</html>
