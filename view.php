<?php
require('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Healthix</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

</head>

<body ng-app="myApp">
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
        
     <div ng-controller="side_bar_menu">
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <br /><br /><br />
        <ul class="nav menu">
            <li  ng-model="home"><a><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
            
            <li ng-model="users"><a> <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Users</a></li>
            <br />

             <button class="btn btn-primary"  ng-click="register()" style="margin-left:20px;"> <span class="glyphicon glyphicon-plus" aria-hidden="true" class="btn btn-info btn-lg" >Add Patient</span></button>
            
            <br /><br />
            <button class="btn btn-primary" "   ng-click="attend()" style="margin-left:20px;"> <span class="glyphicon glyphicon" aria-hidden="true" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal" >Attend Patient</span></button>
            <br />
            <br />
            <button class="btn btn-primary"   ng-click="view()" style="margin-left:20px;"> <span class="glyphicon glyphicon" aria-hidden="true" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal" >View Submited Tests</span></button>
                <li role="presentation" class="divider"></li>
            <li><a><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout Page</a></li>
        </ul>
        
    </div><!--/.sidebar-->

</div>
<script type="text/javascript" src="js/angular.js"></script>
<script>
        var app=angular.module("myApp",[]);
        
        app.controller("side_bar_menu",function($scope,$window){

            $scope.register=function(){
                $window.location.href="register.html";
            };
            $scope.attend=function(){
                $window.location.href="attend.html";
            };

            $scope.view=function(){
                $window.location.href="view.php";
            };


        });


</script>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="panel panel-default">
    

        <div class="panel-heading">Submitted Tests</div>
        <div class="panel-body">
            
        <table width="100%" >
                <tr>
                    <th style="font-family:courier">Id</th>
                    <th style="font-family:courier">Firstname</th>
                    <th style="font-family:courier">Lastname</th>
                    <th style="font-family:courier">type</th>
                    <th style="font-family:courier">Diagnosis</th>
                    <th style="font-family:courier">Tests</th>
                    <th style="font-family:courier">lab</th>
                    <th style="font-family:courier">agency</th>
                    
                </tr>
            
            
             

        
            </div>
        </div>
    </div>      
        
        
    </div><!--/.main-->  




 <?php

if($con)
{

$result=mysqli_query($con,"SELECT *FROM patients");
while($row=mysqli_fetch_array($result)){

$id=$row['id'];
 $fname=$row['fname'];
 $lname=$row['lname'];
 $type=$row['type'];
 $lab=$row['lab'];
 $test=$row['test'];
 $diagnosis=$row['diagnosis'];
 $agency=$row['agency'];

 ?>
 <tr>
    <td><?php echo $id; ?></td>
    <td><?php echo $fname; ?></td>
   
    <td><?php echo $lname; ?></td>
    <td><?php echo $type; ?></td>
    <td><?php echo $lab; ?></td>
    <td><?php echo $test; ?></td>
    <td><?php echo $diagnosis; ?></td>
     <td><?php echo $agency; ?></td>
  
   
   
    
</tr>

<?php

}
}
?>

</table>
    <div id="result"></div>
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
