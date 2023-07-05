<?php

	header("Access-Control-Allow-Methods: DELETE");
	header("Content-Type: application/json");
	
	include("../config/config.php");
	
	$config = new Config();
	
	if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
		
		$input = file_get_contents("php://input");
		
		parse_str($input,$_DELETE);
		
		$id = $_DELETE['book_id'];
		
		$res = $config->delete_book$id);
		
		if($res){
			$arr['data'] = "Record deleted successfully...";
		}else{
			$arr['data'] = "Record deletion failed...";
		}
	}else{
		$arr['msg'] = "Only DELETE HTTP request method is allowed...";
	}
	
	echo json_encode($arr);
?>