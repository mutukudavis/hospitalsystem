<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-www-form-urlencoded;charset=utf-8");	
$_POST = json_decode(file_get_contents('php://input'), true);

 
 $fname=$_POST['fname'];
 $mname=$_POST['mname'];
 $lname=$_POST['lname'];
 $email=$_POST['email'];
 $contact=$_POST['contact'];
 $dob=$_POST['dob'];
 
 
 
    
$conn=mysqli_connect('localhost','root','','maskan');

$sq=mysqli_query($conn,"SELECT email FROM agents WHERE email='$email'");
$e_check=mysqli_num_rows($sq);
if($e_check==0){
$query="INSERT  into agents(fname,mname,lname,email,contact,dob)
values('$fname','$mname','$lname','$email','contact','$dob')";
$insert=mysqli_query($conn,$query);
if(!$insert){
//echo"no insertion".mysql_error(); 
}else{
	
 }
}else{
  //  echo "<div class='alert alert-warning' role='alert'> The mail already exist</div>";
}
 ;


echo '{"registration":"success"}';



?>