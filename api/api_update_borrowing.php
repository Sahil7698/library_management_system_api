<?php

	header("Access-Control-Allow-Methods: PUT, PATCH");
	header("Content-Type: application/json");
	
	include("../config/config.php");
	
	$config = new Config();
	
	if($_SERVER['REQUEST_METHOD'] == 'PUT'){
		
		$input = file_get_contents("php://input");
		
		parse_str($input,$_UPDATE);
		
		$borrowed_date = $_POST['borrowed_date'];
		$return_date = $_POST['return_date'];
		$id = $_UPDATE['borrow_id'];
		
		$res = $config->update_borrowing($borrowed_date, $return_date,$id);
		
		if($res){
			$arr['data'] = "Record updated successfully...";
		}else{
			$arr['data'] = "Record updation failed...";
		}
	}else{
		$arr['msg'] = "Only PUT and PATCH HTTP request method is allowed...";
	}
	
	echo json_encode($arr);
?>