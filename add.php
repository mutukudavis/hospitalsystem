<?php
require('connection.php');
session_start();
 $id=$_GET['i'];
$_SESSION['id']=$id;

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>healthix</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
                            <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                            <li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
                            
        </div><!-- /.container-fluid -->
    </nav>
        
         <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <br /><br /><br />
        <ul class="nav menu">
            <li ><a href="index2.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
            
            <li><a href="index2.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>All Patients</a></li>
            <br />
<a href="register.php">
            <button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()" style="margin-left:20px;"> <span class="glyphicon glyphicon-plus" aria-hidden="true" class="btn btn-info btn-lg" >Add Patient</span></button>
            </a>
            <br /><br />
            <a href="attend.php"><button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()" style="margin-left:20px;"> <span class="glyphicon glyphicon" aria-hidden="true" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal" >Attend Patient</span></button></a>
            <br />
            <br />
            <a href="view.php"><button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()" style="margin-left:20px;"> <span class="glyphicon glyphicon" aria-hidden="true" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal" >View Submited Tests</span></button></a>
                <li role="presentation" class="divider"></li>
            <li><a href="logout.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout Page</a></li>
        </ul>
        
    </div><!--/.sidebar-->
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="panel panel-default">
    <br />
        <ul class="nav nav-tabs nav-justified"> 
   <li class="active"><a href="attend.php">LABORATORY TEST</a></li> 
   
  
   
</ul> 
<?php
    $query="SELECT *FROM agents WHERE id=$id";
    $result=mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result)){
 $fname=$row['fname'];
 $mname=$row['mname'];
 $lname=$row['lname'];
 $email=$row['email'];
 $contact=$row['contact'];
 $dob=$row['dob'];
 $date=$row['date'];
    }
   

?>

    <div id="result"></div>
    <form method="POST" action="">
    <?php
if(isset($_POST['Save'])){
 
 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $type=$_POST['type'];
 $lab=$_POST['lab'];
 $diagnosis=$_POST['diagnosis'];
 $agency=$_POST['agency'];
// $test=$_POST['test'];
 $_SESSION['fname']=$fname;
 $_SESSION['lname']=$lname;
 $_SESSION['type']=$type;
 $_SESSION['lab']=$lab;
 $_SESSION['diagnosis']=$diagnosis;
 $_SESSION['agency']=$agency;
$f=$_POST['test'];
$test=implode(',',$f);


 
    
$conn=mysqli_connect('localhost','root','','maskan');


$query="INSERT INTO patients(id, fname,lname, type, diagnosis,test, lab, agency) VALUES ('$id','$fname','$lname', '$type', '$diagnosis','$test','$lab','$agency')";

$insert=mysqli_query($con,$query);
if(!$insert){
echo"no insertion".mysqli_error($con); 
}
else
{

//     $result=mysqli_query($con,"SELECT *FROM patients WHERE id='28'");
// while($row=mysqli_fetch_array($result)){


// $test=$row['test'];
// $t=explode(',',$test);


// foreach ($t as  $value) {
               
//                echo "<input type='text' name='$value' value='$value' class='form-control'>";
//               }}
   
   header('location:sucess.php');
 }

 




}

?>
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="form-group">
        <label >Firstname</label>
        <input  class="form-control"  type="text" name="fname" placeholder="firstname" required  value="<?php echo "$fname"; ?>">
        </div>
        <div class="form-group">
        <label >Lastname</label>
        <input  class="form-control"  type="text" name="lname" placeholder="firstname"  value="<?php echo "$lname"; ?>"required>
        </div>
        <div class="form-group">
        <label >Patient Type</label>
        <select  name="type" class="form-control">
                        <option value="Lab2">Outpatient</option>
                        <option value="Lab1">Inpatient</option>
                       
                    </select>
        </div>
        <div class="form-group">
        <label >Diagnosis</label>
       <textarea name="diagnosis" class="form-control" placeholder="Diagnosis" required=""  cols="5" rows="5"></textarea>

        </div>
        <div class="form-group">
        <label >Laboratory Test</label>
        <select  name="test[]" class="form-control" multiple="" required="">

                        <option value="A1at">A1AT</option>
                        <option value="A1c">A1c</option>
                        <option value="AAt">AAT</option>
                        <option value="ACA">ACA</option>
                        <option value="25-hydroxyvitamin D">25-hydroxyvitamin D</option>
                    </select>
        </div>
        <div class="form-group">
        <label > Specify Laboratory</label>
        <select  name="lab" class="form-control">

                    <option required>Specify Lab</option>
                        <option value="Lab1">Lab1</option>
                        <option value="Lab2">Lab2</option>
                        <option value="Lab3">Lab3</option>
                        <option value="Lab4">Lab4</option>
                    </select>
        </div>
        <div class="form-group">
        <label >Agency</label>
        <select  name="agency" class="form-control">
                                    <option>Agency in Hours</option>
                                    <option value="6 hours">6 hours</option>
                                    <option value="12 hours">12 hours</option>
                                    <option value="1 days">1 days</option>
                                    <option value="2 days">2 days</option>
                                    <option value="3 days">3 days</option>
                                    <option value="4 days">4 days</option>
                                    <option value="5 days">5 days</option>
                                    <option value="7 days">7 days</option>
                                    <option value="2 weeks">2 weeks</option>
                                </select>
        </div>
        <input type="submit" name="Save" class="btn btn-info">
        <br>
        <br />
        </div>
        
        </div>
        </div>
        </div>


    </form>
</body>
<script type="text/javascript" src="../jquery/jquery.js"></script>
<!-- <script type="text/javascript">
    
    function allow(id,payment){
        var URL="allow_payment.php?id=";
        var id2=id.toString();
            URL=URL.concat(id2); 
            URL=URL.concat("&payment=");
            URL=URL.concat(payment);  
      $.ajax({
      url:URL,
      success:(function (result){
$('#result').html(result);
    
      })
    });

    }
</script> -->
</html>
