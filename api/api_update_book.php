<?php

	header("Access-Control-Allow-Methods: PUT, PATCH");
	header("Content-Type: application/json");
	
	include("../config/config.php");
	
	$config = new Config();
	
	if($_SERVER['REQUEST_METHOD'] == 'PUT'){
		
		$input = file_get_contents("php://input");
		
		parse_str($input,$_UPDATE);
		
		$bk_title = $_POST['bk_title'];
		$bk_name = $_POST['bk_name'];
		$publisher = $_POST['publisher'];
		$author = $_POST['author'];
		$bk_num = $_POST['bk_num'];
		$pub_date = $_POST['pub_date'];
		$id = $_UPDATE['book_id'];
		
		$res = $config->update_book($bk_title, $bk_name, $publisher, $author, $bk_num, $pub_date,$id);
		
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