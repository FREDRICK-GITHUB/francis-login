<?php
$db_name = "loginapp";
$mysql_username = "username";
$mysql_password = "password";
$server_name = "localhost";
$conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);
//$querry=mysqli_query($conn);

//COMMENTED
if($conn){
echo "Connection successful!";

}
else{
	echo "Connection failed!".mysqli_error($conn);
}
?>