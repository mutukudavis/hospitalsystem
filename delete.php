<?php
$id=$_GET['i'];
$con=mysqli_connect('localhost','root','','maskan');
$query1="DELETE FROM patients WHERE id=$id";
$delete=mysqli_query($con,$query1);
if($delete){
	header('location:deleted.php');
}



?>