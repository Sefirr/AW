<?php

	require_once __DIR__.'/config.php';
	require_once __DIR__.'/usuariosdb.php';
	require_once __DIR__.'/friendsdb.php';
	
	function addFriend($params) {
		$result = array();
		$okValidacionFriend = true;
		
		$user = isset($params['user']) ? $params['user'] : null ;
		$user_id = dameID($user);
		
		$friend = isset($params['friend']) ? $params['friend'] : null ;
		$user_id2 = dameID($friend);
		
		if($user_id == false || $user_id2 == false) {
			$result[] = "El usuario no existe";
			$okValidacionFriend = false;
		}
		
		if($okValidacionFriend) {
			$result =  addfriend($user, $friend);
		}
	
	}
	
	function deleteFriend($param) {
		$result = array();
		$okValidacionFriend = true;
		
		$user = isset($params['user']) ? $params['user'] : null ;
		$user_id = dameID($user);
		
		$friend = isset($params['friend']) ? $params['friend'] : null ;
		$user_id2 = dameID($friend);
		
		if($user_id == false || $user_id2 == false) {
			$result[] = "El usuario no existe";
			$okValidacionFriend = false;
		}
		
		if($okValidacionFriend) {
			$result =  deletefriend($user, $friend);
		}
	
		return $result;
	
	}

?>