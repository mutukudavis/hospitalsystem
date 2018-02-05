<?php

require('connection.php');
 $filename = "users/data.json";
$f = fopen( $filename, "w" );

if( $f == false )
{
  echo ( "Error in opening new file" );
exit();
}else{
fwrite( $f,"");
fclose( $f );
$file = fopen( $filename, "a" );
if( $file == false )
{
  echo ( "Error in opening new file" );
exit();
}else{
  fwrite( $file,"[" );
if($con){

$query="SELECT * FROM agents";
$result=mysqli_query($con,$query);
if($result){
while($row=mysqli_fetch_array($result)){

$id=$row['id'];
$fname=$row['fname'];
$mname=$row['mname'];
$lname=$row['lname'];
$email=$row['email'];
$contact=$row['contact'];
$dob=$row['dob'];

fwrite( $file,'
      {
         "id": '.$id.',
         "fname": "'.$fname.'",
         "mname": "'.$mname.'",
         "lname": "'.$lname.'",
         "email": "'.$email.'",
         "contact": "'.$contact.'",
         "date": "'.$dob.'"
        
       },');  
}
}else{
echo"Erro::::::: ".mysqli_error($con);
}
}else{
echo"Erro::::::: ".mysqli_error($con);
}
fwrite( $file,'
     { 
      "id":0 ,
        "username": "----",
        "category": "----"
       }
       ]   ');
fclose( $file );
}
}
?>