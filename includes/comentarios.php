<?php

	require_once __DIR__.'/comentarioDB.php';
	require_once __DIR__.'/usuariosDB.php';
	require_once __DIR__.'/formlib.php';
	require_once __DIR__.'/config.php';

	function addComentarioContenido($params) {
		$result = array();
		$okValidacionComentario = true;
		
		$id_user = dameID($_SESSION['usuario']);
		
		if(!$id_user || $id_user == false) {
			$result[] = "El usuario que va a escribir el comentario no existe.";
			$okValidacionComentario = false;
		}
		
		$message = isset($params['message']) ? $params['message'] : null;
		
		if(!$message || empty($message)) {
			$result[] = "El comentario no puede ser vacio.";
			$okValidacionComentario = false;
		}
		
		$id = isset($params['id']) ? $params['id'] : null;
		
		if(!$id || $id == false) {
			$result[] = "El contenido o merchandising donde se va a escribir el comentario no existe.";
			$okValidacionComentario = false;
		}
		
		if($okValidacionComentario) {
			addCommentContent($id_user, $message, $id);
			$result = "${_SERVER['PHP_SELF']}";
		}
		
		return $result;
	
	}
	
	function addComentarioMercha($params) {
		$result = array();
		$okValidacionComentario = true;
		
		$id_user = dameID($_SESSION['usuario']);
		
		if(!$id_user || $id_user == false) {
			$result[] = "El usuario que va a escribir el comentario no existe.";
			$okValidacionComentario = false;
		}
		
		$message = isset($params['message']) ? $params['message'] : null;
		
		if(!$message || empty($message)) {
			$result[] = "El comentario no puede ser vacio.";
			$okValidacionComentario = false;
		}
		
		$id = isset($params['id']) ? $params['id'] : null;
		
		if(!$id || $id == false) {
			$result[] = "El contenido o merchandising donde se va a escribir el comentario no existe.";
			$okValidacionComentario = false;
		}
		
		if($okValidacionComentario) {
			addCommentMercha($id_user, $message, $id);
			$result = "${_SERVER['PHP_SELF']}";
		}
		
		return $result;
	
	}
	
	function deleteComentario($params) {
		$result = array();
		$okValidacionComentario = true;
		
		$id_comment = isset($params) ? $params : null;
		
		if(!$id_comment || $id_comment == false) {
			$result[] = "El comentario no existe.";
			$okValidacionComentario = false;		
		}	
		
		if($okValidacionComentario) {
			$result = delComment($id_comment);
		}
		return $result;
	}
		
	function getComentario($params) {
		$result = array();
		$okValidacionComentario = true;	
		
		$id_comment = isset($params['id_comment']) ? $params['id_comment'] : null;
		
		if(!$id_comment || $id_comment == false) {
			$result[] = 'El comentario no existe.';
			$okValidacionComentario = false;
		}	
	
		if($okValidacionComentario) {
			$result = dameComment($id_comment);
		}
	}
	
	function getCommentsContent($id_content) {
		return dameComments($id_content);
	}

?>
