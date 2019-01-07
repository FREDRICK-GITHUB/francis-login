<?php
require("init.php");

$name =$_POST['name'];
$email =$_POST['email'];
$pass =$_POST['password'];

$query = "SELECT * FROM users WHERE email like '$email';";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0)
	{
	$response = array();
	$code = "reg_false";
	$message = "User Already Exist";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode(array("server_response"=>$response));
	}

else{
	$query = "INSERT INTO users VALUES('$name','$email','$pass');";
	$result = mysqli_query($conn,$query);
	if(! $result){
	$response = array();
	$code = "reg_false";
	$message = "Some server error occurred. Try again!";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode(array("server_response"=>$response));
		}

	else{
		$response = array();
	$code = "reg_true";
	$message = "Registration successful. Thank you...";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode(array("server_response"=>$response));
	}
	}		
	//mysqli_close($conn);
?>