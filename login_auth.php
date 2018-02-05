<?php
session_start();
require('connection.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-www-form-urlencoded;charset=utf-8");	
 $_POST = json_decode(file_get_contents('php://input'), true);
 $username=$_POST['username'];
 $password=$_POST['password'];

$query="SELECT * FROM users WHERE username='$username' AND password='$password' AND category='admin'";

$result=mysqli_query($con,$query);
if($result){
while($row=mysqli_fetch_row($result)){
	$_SESSION['username']=$username;
echo '{"login":"success"}';
	break;

}
}else{
}

?>