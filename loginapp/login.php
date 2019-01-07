<?php
require('init.php');

$email =$_POST['email'];
$pass =$_POST['password'];

$query = "SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$pass';";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{
	$response = array();
	$code = "login_true";
	$row =mysqli_fetch_array($result);
	$name = $row[0];
	$message = "Login successful..Welcome  " .$name;
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode(array("server_response"=>$response));
}
else{
	$response = array();
	$code = "login_false";
	
	$message = "Login failed...Try again";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode(array("server_response"=>$response));
}


//mysqli_close($conn);
?>