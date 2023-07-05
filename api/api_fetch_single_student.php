<?php

	header("Access-Control-Allow-Methods: POST");
	header("Content-Type: application/json");
	
	include("../config/config.php");
	
	$config = new Config();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
		$id = $_POST['stud_id'];
	
		$res = $config->fetch_single_student($id);
		
		$record = mysqli_fetch_assoc($res);
		
		$arr['data'] = $record;
		
	}else{
		$arr['msg'] = "Only POST HTTP request method is allowed...";
	}
	
	echo json_encode($arr);
?>