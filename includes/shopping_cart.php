<?php require_once __DIR__ .'/config.php'; 
	  require_once __DIR__ .'/carritoDB.php';
	  
	if(!isset($_SESSION["rol"]) ||(isset($_SESSION["rol"]) && $_SESSION["rol"] < 1)) {
		header('Location:permissions.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<!-- -----------------------------META REGION------------------------------ -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ESTABLECEMOS LA CODIFICACION A UTF-8-->
		<meta name="author" content="Watchandcoment Team"><!-- AUTORES DE LA PÁGINA -->

	<!-- ----------------------------- END META REGION------------------------------ -->

	<title> Carrito W&C </title>

	<!-- -----------------------------LINKS REGION------------------------------ -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo RAIZ_APP; ?>img/favicon.ico"> <!-- ESTABLECIMIENTO DEL FAVICON -->
	<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/login.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
	<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/header.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
	<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/style.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
	<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/shopping_cart.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
	<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/menu.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
	<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/footer.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
	<script src="<?php echo RAIZ_APP; ?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="<?php echo RAIZ_APP; ?>js/sidebarIzq.js" type="text/javascript"></script>
	
	<!-- -----------------------------END LINKS REGION------------------------------ -->

</head>

<body>
	<div id="contenedor">
		<?php include_once __DIR__.'/header.php'; ?>
		<?php include_once __DIR__.'/sidebarIzq.php'; ?>
		<div id="contenido">
<?php

	global $BD;
	
	if (isset($_GET['id']))
				$id = $_GET['id'];
			else
				$id = 1;
			
			if (isset($_GET['action']))
				$action = $_GET['action'];
			else
				$action = "empty";
	
	
			switch($action){
			
				case "add":
					if(isset($_SESSION['carro'][$id]))
						$_SESSION['carro'][$id]++;
					else {
						$_SESSION['carro'][$id]=1;
					}
				break;
				
				case "remove":
					if(isset($_SESSION['carro'][$id]))
					{
						$_SESSION['carro'][$id]--;
						if($_SESSION['carro'][$id]==0)
							unset($_SESSION['carro'][$id]);
					}
					
				break;
				case "removeProd":
					if(isset($_SESSION['carro'][$id])){
						unset($_SESSION['carro'][$id]);
					}
				break;
				
				case "mostrar":
					if(isset($_SESSION['carro'][$id])){
						continue;
					}
				break;
				
				case "empty":
					unset($_SESSION['carro']);
				
				break;
						
				
			}

			$totalcoste = 0;
			//Inicializamos el contador de productos seleccionados.
			$xTotal = 0;
			
			if(isset($_SESSION['carro'])){
				
				echo "<table border=0 cellspacing=5 cellpadding=3 width='100%'>";				
				echo "<tr>";
					echo "<td>Producto</td>";
					echo "<td>Cantidad</td>";
					echo "<td>Acción</td>";
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
					
					echo "<td align='left'>";
					echo "<a href='shopping_cart.php?id=". $id ."&action=add'><img src='".RAIZ_APP."img/carrito/aumentar.png' style='padding:0 0px 0 5px;' alt='Aumentar cantidad' /></a>";
					//Controlamos el display para cuando se vaya a eliminar el producto del carro o bien
					//se vaya a reducir la cantidad.
					//if ($x > 1)
						echo "<a href='shopping_cart.php?id=". $id ."&action=remove'><img src='".RAIZ_APP."img/carrito/restar.png' alt='Reducir cantidad' /></a>";
					//else
						echo "<a href='shopping_cart.php?id=". $id ."&action=removeProd'><img src='".RAIZ_APP."img/carrito/eliminar.png' alt='Reducir cantidad' /></a></td>";
					
					echo "<td align='right'>  </td>";
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
						<a href='buy.php'><input type='button' class='compra' value='Comprobar detalles y finalizar compra' /></a>
				</td>";
				echo "</tr>";
				
				echo "</table>";
				
				
			} else
				echo "El carro está vacío";
	
			//Campos que nos serviran para informar la cesta de lo que llevamos comprados y que se mostrará en 
			//la página PRODUCTOS.
			$_SESSION["totalcoste"] = $totalcoste;
			$_SESSION["cantidadTotal"] = $xTotal;
			echo "<p>Volver a la <a href='".RAIZ_APP."index.php'>página principal</a></p>";
?>
</div>
		<?php include_once __DIR__.'/footer.php'; ?>
	</div>
	
</body>

</html>