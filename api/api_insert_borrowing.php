<?php
	header("Access-Control-Allow-Methods: POST");
	header("Content-TYpe: application/json");
	
	include("../config/config.php");
	
	$config = new Config();
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$borrowed_date = $_POST['borrowed_date'];
		$return_date = $_POST['return_date'];
		
		$res = $config->insert_borrowing($borrowed_date, $return_date);
		
		if($res){
			$arr['data'] = "Record inserted successfully...";
			http_response_code(201);
		} else{
			$arr['data'] = "Record insertion failed...";
		}
	} else{
		$arr['msg'] = "Only POST HTTP request method is allowed...";
	}
	
	echo json_encode($arr);
?>