<?php

	require_once __DIR__.'/comentarioDB.php';
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
		
		if(!$message || empty(message)) {
			$result[] = "El comentario no puede ser vacio.";
			$okValidacionComentario = false;
		}
		
		$id_content = isset($params['id_content']) ? $params['id_content'] : null;
		
		if(!$id_content || $id_content == false) {
			$result[] = "El contenido donde se va a escribir el comentario no existe.";
			$okValidacionComentario = false;
		}
		
		if($okValidacionComentario) {
			addCommentContent($id_user, $message, $id_content);
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
		
		if(!$message || empty(message)) {
			$result[] = "El comentario no puede ser vacio.";
			$okValidacionComentario = false;
		}
		
		$id_mercha = isset($params['id_mercha']) ? $params['id_mercha'] : null;
		
		if(!$id_mercha || $id_mercha == false) {
			$result[] = "El merchandising donde se va a escribir el comentario no existe.";
			$okValidacionComentario = false;
		}
		
		if($okValidacionComentario) {
			addCommentMercha($id_user, $message, $id_mercha);
			$result = "${_SERVER['PHP_SELF']}";
		}
		
		return $result;
	}
	
	function deleteComentario($params) {
		$result = array();
		$okValidacionComentario = true;
		
		$id_comment = isset($params['id_comment'] ? $params['id_comment'] : null;
		
		if(!$id_comment || $id_comment = false) {
			$result[] = 'El comentario no existe.';
			$okValidacionComentario = false;
		}	
	
		if($okValidacionComentario) {
			$result = delComment($id_comment);
		}
		
	}
	function editComentario($params) {
		$result = array();
		$okValidacionComentario = true;
		
		$id_comment = isset($params['id_comment'] ? $params['id_comment'] : null;
		
		if(!$id_comment || $id_comment = false) {
			$result[] = 'El comentario no existe.';
			$okValidacionComentario = false;
		}	
		
		$message = isset($params['message']) : $params['message'] : null;
		
		if(!$message || empty($message)) {
			$result[] = 'El comentario está vacio';
			$okValidacionComentario = false;
		}
	
		if($okValidacionComentario) {
			$result = editComment($id_comment, $message);
		}
		
		
	}
	
	function getComentario($params) {
		$result = array();
		$okValidacionComentario = true;	
		
		$id_comment = isset($params['id_comment'] ? $params['id_comment'] : null;
		
		if(!$id_comment || $id_comment == false) {
			$result[] = 'El comentario no existe.';
			$okValidacionComentario = false;
		}	
	
		if($okValidacionComentario) {
			$result = dameComment($id_comment);
		}
	}

?>

