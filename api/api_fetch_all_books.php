<?php

	header("Access-Control-Allow-Methods: GET");
	header("Content-Type: application/json");
	
	include("../config/config.php");
	
	$config = new Config();
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$res = $config->fetch_all_books();
		
		$all_books = [];
		
		while($record = mysqli_fetch_assoc($res)){
			array_push($all_books, $record);
		}
		
		$arr['data'] = $all_books;
	}else{
		$arr['msg'] = "Only GET HTTP request method is allowed...";
	}
	
	echo json_encode($arr);
?>