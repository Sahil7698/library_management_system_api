<?php
	header("Access-Control-Allow-Methods: POST");
	header("Content-Type: application/json");
	
	include("../config/config.php");
	
	$config = new Config();
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$report_date = $_POST['report_date'];
	
		$res = $config->insert_report($report_date);
		
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