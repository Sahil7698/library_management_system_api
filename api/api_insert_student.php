<?php
	header("Access-Control-Allow-Methods: POST");
	header("Content-Type: application/json");
	
	include("../config/config.php");
	
	$config = new Config();
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$contact_no = $_POST['contact_no'];
		$stud_email = $_POST['stud_email'];
		$stud_pass = $_POST['stud_pass'];
		
		$res = $config->insert_student($fname, $lname, $gender, $age, $contact_no, $stud_email, $stud_pass);
		
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