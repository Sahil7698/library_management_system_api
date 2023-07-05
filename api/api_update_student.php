<?php

	header("Access-Control-Allow-Methods: PUT, PATCH");
	header("Content-Type: application/json");
	
	include("../config/config.php");
	
	$config = new Config();
	
	if($_SERVER['REQUEST_METHOD'] == 'PUT'){
		
		$input = file_get_contents("php://input");
		
		parse_str($input,$_UPDATE);
		
		$fname = $_UPDATE['fname'];
		$lname = $_UPDATE['lname'];
		$gender = $_UPDATE['gender'];
		$age = $_UPDATE['age'];
		$contact_no = $_UPDATE['contact_no'];
		$stud_email = $_UPDATE['stud_email'];
		$stud_pass = $_UPDATE['stud_pass'];
		$id = $_UPDATE['stud_id'];
		
		$res = $config->update_student($fname, $lname, $gender, $age, $contact_no, $stud_email, $stud_pass,$id);
		
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