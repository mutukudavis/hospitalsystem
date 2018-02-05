
<?php
session_start();
require('connection.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-www-form-urlencoded;charset=utf-8");  
    // $_POST = json_decode(file_get_contents('php://input'), true);


$query="SELECT * FROM agents";

$result = $con->query($query);
if($result){
$data = "";
while($row=$result->fetch_array(MYSQLI_ASSOC)){
if ($data != "") {$data.= ",";}
$id=$row['id'];
$fname=$row['fname'];
$mname=$row['mname'];
$lname=$row['lname'];
$email=$row['email'];
 $dob=$row['dob'];
$contact=$row['contact'];
$date=$row['date'];

$data.='{"id":"'.$id.'","fname":"'.$fname.'","mname":"'.$mname.'","lname":"'.$lname.'","email":"'.$email.'","contact":"'.$contact.'","date":"'.$date.'","dob":"'.$dob.'"}';
}
$data ='{"attends":['.$data.']}';

echo($data);


}else{
}
?>