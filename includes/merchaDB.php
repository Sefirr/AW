<?php

function dameIDMercha($nombre){
	global $BD;	
	$mercha = false;

	$query="SELECT id_merchandising
			FROM merchandising
			WHERE nombre='".$BD->real_escape_string($nombre)."'";

	if ($resultado = $BD->query($query)) {

		   	if($resultado->num_rows ==0)
	  			$mercha =false;
	  		else
	  			$mercha = $resultado->fetch_assoc()['id_merchandising'];

	    //$resultado->close();
	  }

	  return $mercha;
}


function addMercha($nombre, $foto1, $foto2, $descripcion, $unidades, $proveedor, $precio, $valoracion){
	global $BD;


	$query="INSERT INTO merchandising (nombre, foto1, foto2, descripcion, unidades, proveedor, precio, valoracion)
			VALUES ('$nombre','$foto1','$foto2','$descripcion','$unidades','$proveedor','$precio','$valoracion')";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;

}

function deleteMercha($id_merchandising){
	global $BD;

	$query="DELETE FROM merchandising
			WHERE id_merchandising ='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;
}


function dameMercha($id_merchandising){

  global $BD;	
  $query = "SELECT * FROM merchandising WHERE id_merchandising=$id_merchandising";
  $mercha = false;
  if ($resultado = $BD->query($query)) {
    $mercha = $resultado->fetch_assoc();
    //$resultado->close();
  }
  
  return $mercha;
}



function dameMerchas(){

global $BD;	
		
		$query = "SELECT * from merchandising";

		$content = false;
		$i = 0;
		if ($resultado = $BD->query($query)) {
			while($array = $resultado->fetch_assoc()) {
				$content[$i++] = $array;
			}
			//$resultado->close();
		}
		  
		return $content;


}




function modifyMerchanombre($id_merchandising, $newname){
	global $BD;

	$query="UPDATE merchandising
			set nombre ='$newname'
			WHERE id_merchandising='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;

}

function modifyMerchafoto($id_merchandising, $newfoto, $foto){
	global $BD;

	$query="UPDATE merchandising
			set $foto='$newfoto'
			WHERE id_merchandising='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;
}

function modifyMerchadescripcion($id_merchandising, $newdescripcion){
	global $BD;

	$query="UPDATE merchandising
			set descripcion='$newdescripcion'
			WHERE id_merchandising='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;
}

function modifyMerchaunidades($id_merchandising, $newunidades){
	global $BD;

	$query="UPDATE merchandising
			set unidades='$newunidades'
			WHERE id_merchandising='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;

}

function modifyMerchaproveedor($id_merchandising, $newproveedor){
	global $BD;

	$query="UPDATE merchandising
			set proveedor='$newproveedor'
			WHERE id_merchandising='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;


}

function modifyMerchaprecio($id_merchandising, $newprecio){

	global $BD;

	$query="UPDATE merchandising
			set precio='$newprecio'
			WHERE id_merchandising='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;

}

function modifyMerchavaloracion($id_merchandising, $newvaloracion){
	global $BD;

	$query="UPDATE merchandising
			set valoracion='$newvaloracion'
			WHERE id_merchandising='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;

}



?>