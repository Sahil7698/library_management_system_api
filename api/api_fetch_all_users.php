<?php

	header("Access-Control-Allow-Methods: GET");
	header("Content-Type: application/json");
	
	include("../config/config.php");
	
	$config = new Config();
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$res = $config->fetch_all_users();
		
		$all_users = [];
		
		while($record = mysqli_fetch_assoc($res)){
			array_push($all_users, $record);
		}
		
		$arr['data'] = $all_users;
	}else{
		$arr['msg'] = "Only GET HTTP request method is allowed...";
	}
	
	echo json_encode($arr);
?>