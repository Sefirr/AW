<?php 

	include_once __DIR__.'/contenidoDB.php';
	include_once __DIR__.'/usuariosDB.php';
	require_once __DIR__.'/config.php';
	
	function getRatingContent($title){
		global $BD;
		
		$id_content = dameIDContent($title);
		$sql= "select * from content_ratings where id_content = '".$id_content."'";
		
		$suma = 0;
		$rating = 0;
		if($resultado = $BD->query($sql)) {
			while($rs = $resultado->fetch_assoc()) {
				$suma += $rs["rating"];
			}
			$rows= $resultado->num_rows;
			if($rows != 0) {
				$rating = $suma / $rows; 
			}
		}
		
		return floor($rating);
	}
	
	function dameFilasRatingContent($id_user,$title){
		global $BD;
		
		$id_content = dameIDContent($title);
		$sql= "select * from content_ratings where id_content = '".$id_content."' and id_user='".$id_user."'";
	
		if($resultado = $BD->query($sql)) {
			$rows= $resultado->num_rows;
		}
		
		return $rows;
	}
	
	// function to retrieve
	function insertRatingContent($id_user,$title, $rating){
		global $BD;
		$id_content = dameIDContent($title);
		$sql= "insert into content_ratings (id_user,id_content,rating) values ($id_user,$id_content,$rating) ";
		$result= $BD->query($sql);
		echo $sql;
	}


?>