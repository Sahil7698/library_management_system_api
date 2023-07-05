<?php
	header("Access-Control-Allow-Methods: POST");
	header("Content-TYpe: application/json");
	
	include("../config/config.php");
	
	$config = new Config();
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$contact_no = $_POST['contact_no'];
		$user_email = $_POST['user_email'];
		$user_pass = $_POST['user_pass'];
		
		$res = $config->insert_user($fname, $lname, $gender, $age, $contact_no, $user_email, $user_pass);
		
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