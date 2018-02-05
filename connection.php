<?php
$con=mysqli_connect('localhost','root','','maskan');
if(!$con){
$Error=mysqli_error($con);
echo "<script type='text/javascript'>alert('Error:: '+$Error);</script>";
}

?>