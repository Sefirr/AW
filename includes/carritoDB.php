<?php 

	require_once __DIR__ .'/config.php';
	require_once __DIR__ .'/merchaDB.php';
	require_once __DIR__ .'/usuariosDB.php';

	function getMerchaCart($id) {
		return dameMercha($id);
	}
	
	/*Recuperamos los productos del carro de la compra*/
	function recuperar_productos(){
		global $BD;
		
		$i = 0;
		$mercha = array();
		//recorremos el array de SESSION	hasta el final
		foreach($_SESSION['carro'] as $id => $x){ 
			$mercha[$i] = getMerchaCart($id);
			$mercha[$i++]['unidades'] = $x;
		}
		
		return $mercha;
	}
	
	function finalizar_Compra() {
		global $BD;
		
		$mercha = recuperar_productos(); 
		$user = $_SESSION['usuario'];
		$id_user = dameID($user);
		$sql = "INSERT INTO orders (id_user) VALUES ('$id_user')";
		if($resultado = $BD->query($sql)) {
			$id_pedido = $BD->insert_id;
			foreach($mercha as $producto){ 
				$id_merchandising = $producto['id_merchandising'];
				$cantidad = $producto['unidades'];
				$sql2= "INSERT INTO details_order (id_order, id_merchandising, cantidad) VALUES('$id_pedido','$id_merchandising','$cantidad')";
				$resultado = $BD->query($sql2);
			}
			$precio = $_SESSION["totalcoste"];
			$query = "UPDATE orders set precio = '".$precio."' where id_order ='".$id_pedido."'";
			$resultado = $BD->query($query);
		}
		
		unset($_SESSION['carro']);
	}
?>