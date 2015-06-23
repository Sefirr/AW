<?php 

	include_once __DIR__.'/contenidoDB.php';
	include_once __DIR__.'/usuariosDB.php';
	include_once __DIR__.'/merchaDB.php';
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
			//if($rows != 0) {
				$rating = $suma / $rows; 
			//}
		}
		cierraConsultas();
		return floor($rating);
	}
	
	function getRatingMerchandising($nombre){
		global $BD;
		
		$id_mercha = dameIDMercha($nombre);
		$sql= "select * from merchandising_ratings where id_merchandising = '".$id_mercha."'";
		
		$suma = 0;
		$rating = 0;
		if($resultado = $BD->query($sql)) {
			while($rs = $resultado->fetch_assoc()) {
				$suma += $rs["rating"];
			}
			$rows= $resultado->num_rows;		
			$rating = $suma / $rows; 
		}
		cierraConsultas();
		return floor($rating);
	}
	
	function dameFilasRatingContent($id_user,$title){
		global $BD;
		
		$id_content = dameIDContent($title);
		$sql= "select * from content_ratings where id_content = '".$id_content."' and id_user='".$id_user."'";
	
		if($resultado = $BD->query($sql)) {
			$rows= $resultado->num_rows;
		}
		cierraConsultas();
		return $rows;
	}
	
	function dameFilasRatingMerchandising($id_user,$nombre){
		global $BD;
		
		$id_mercha = dameIDMercha($nombre);
		$sql= "select * from merchandising_ratings where id_merchandising = '".$id_mercha."' and id_user='".$id_user."'";
	
		if($resultado = $BD->query($sql)) {
			$rows= $resultado->num_rows;
		}
		cierraConsultas();
		return $rows;
	}

	function dameFilasRatingContent2($title){
		global $BD;
		
		$id_content = dameIDContent($title);
		$sql= "select * from content_ratings where id_content = '".$id_content."'";
	
		if($resultado = $BD->query($sql)) {
			$rows= $resultado->num_rows;
		}
		cierraConsultas();
		return $rows;
	}
	
	function dameFilasRatingMerchandising2($nombre){
		global $BD;
		
		$id_mercha = dameIDMercha($nombre);
		$sql= "select * from merchandising_ratings where id_merchandising = '".$id_mercha."'";
	
		if($resultado = $BD->query($sql)) {
			$rows= $resultado->num_rows;
		}
		cierraConsultas();
		return $rows;
	}
	
	function insertRatingContent($id_user,$title, $rating){
		global $BD;
		$id_content = dameIDContent($title);
		$sql= "insert into content_ratings (id_user,id_content,rating) values ($id_user,$id_content,$rating) ";
		$result= $BD->query($sql);

		echo $sql;
		cierraConsultas();
	}
	
	function insertRatingMerchandising($id_user,$nombre, $rating){
		global $BD;
		$id_mercha = dameIDMercha($nombre);
		$sql= "insert into merchandising_ratings (id_user,id_merchandising,rating) values ($id_user,$id_mercha,$rating) ";
		$result= $BD->query($sql);
		echo $sql;
		cierraConsultas();
	}


?>
