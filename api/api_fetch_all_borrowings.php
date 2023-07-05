<?php

	header("Access-Control-Allow-Methods: GET");
	header("Content-Type: application/json");
	
	include("../config/config.php");
	
	$config = new Config();
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$res = $config->fetch_all_borrowing();
		
		$all_borrowings = [];
		
		while($record = mysqli_fetch_assoc($res)){
			array_push($all_borrowings, $record);
		}
		
		$arr['data'] = $all_borrowings;
	}else{
		$arr['msg'] = "Only GET HTTP request method is allowed...";
	}
	
	echo json_encode($arr);
?>