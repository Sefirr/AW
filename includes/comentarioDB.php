<?php 

function addCommentContent($id_user, $mensaje, $id_content){
	global $BD;


	$query="INSERT INTO comments (id_user, texto)VALUES ('$id_user','$mensaje')";
	$id_comment = $BD->insert_id();
	$query2="INSERT INTO comments_content (id_content, id_comment)VALUES ('$id_content','$id_comment')";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$resultado->close();
		if($resultado = $BD->query($query2)) {
			$exito = true;
			$resultado->close();			
		}
	}

	return $exito;

}

function addCommentMercha($id_user, $mensaje, $id_merchansing){
	global $BD;


	$query="INSERT INTO comments (id_user, texto)VALUES ('$id_user','$mensaje')";
	$id_comment = $BD->insert_id();
	$query2="INSERT INTO comments_merchandising (id_merchansing, id_comment)VALUES ('$id_merchansing','$id_comment')";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$resultado->close();
		if($resultado = $BD->query($query2)) {
			$exito = true;
			$resultado->close();			
		}
	}

	return $exito;

}

function delComment($id_comment){
	global $BD;


	$query="DELETE FROM comments WHERE id='$id_comment'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();
	}

	return $exito;

}

function editComment($id_comment, $mensaje){
	global $BD;


	$query="UPDATE comments set texto = '$mensaje' WHERE comment='$id_comment'";
	
	$exito = false;

	if ($resultado = $BD->query($query)) {
		$resultado->close();
	}

	return $exito;

}

function dameComment($id_comment){

  global $BD;	
  $query = "SELECT * FROM comments WHERE id_comment=$id_comment";
  $mercha = false;
  if ($resultado = $BD->query($query)) {
    $mercha = $resultado->fetch_assoc();
    $resultado->close();
  }
  
  return $mercha;
}



}



?>