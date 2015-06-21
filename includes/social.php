<?php

	require_once __DIR__.'/config.php';
	require_once __DIR__.'/usuariosDB.php';
	require_once __DIR__.'/friendsDB.php';
	
	function addFriend($params) {
		$result = array();
		$okValidacionFriend = true;
		$user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null ;
		$user_id = dameID($user);
		
		$user_id2 = isset($params) ? $params : null ;

		if($user_id == false || $user_id2 == false) {
			$result[] = "El usuario no existe";
			$okValidacionFriend = false;
		}

		if($okValidacionFriend) {
			$result =  addfriendDB($user_id, $user_id2);
		}
		return $result;
	}
	
	function deleteFriend($params) {
		$result = array();
		$okValidacionFriend = true;
		
		$user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null ;
		$user_id = dameID($user);

		$user_id2 = isset($params) ? $params : null ;
		
		if($user_id == false || $user_id2 == false) {
			$result[] = "El usuario no existe";
			$okValidacionFriend = false;
		}

		if($okValidacionFriend) {
			$result =  deletefriendDB($user_id, $user_id2);
		}
	
		return $result;
	
	}

?>