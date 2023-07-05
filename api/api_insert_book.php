<?php
	header("Access-Control-Allow-Methods: POST");
	header("Content-TYpe: application/json");
	
	include("../config/config.php");
	
	$config = new Config();
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$bk_title = $_POST['bk_title'];
		$bk_name = $_POST['bk_name'];
		$publisher = $_POST['publisher'];
		$author = $_POST['author'];
		$bk_num = $_POST['bk_num'];
		$pub_date = $_POST['pub_date'];
		
		$res = $config->insert_book($bk_title, $bk_name, $publisher, $author, $bk_num, $pub_date);
		
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