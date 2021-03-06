<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>healthix</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
 <script type="text/javascript">
                function user_data(){
                         $.ajax({
                            url:"data.php",
                        success:(function (result){
                           
                            })
                           })
                      };
                       user_data();
                       //setInterval(user_data,(10*1000));
           </script>
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
		app.controller("registered_patients",function($scope,$http){
		$scope.title="Registered Patients";

		$http({
          method  : 'GET',
          url     : 'registered_patients.php',
          headers : { 'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8' } 
         }).then(function mySuccess(response) {
				$scope.title=response.data.patients;			
          },function myError(response){});});
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
		<div class="row">
			<div class="col-lg-12">
				<h4>Healthix Hospital  Management </h4>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">

					<div class="panel-heading">Registered Patients</div>
					<div class="panel-body">
						<table data-toggle="table"  data-url="users/data.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" data-row-style="rowStyle">
						    <thead>
						  <a href="in.html"> <tr>
						        <th data-field="state" data-checkbox="true" >Item ID</th>
						        <th data-field="id" data-sortable="true">Id</th>
						        <th data-field="fname"  data-sortable="true">Firstname</th>
						        <th data-field="mname" data-sortable="true"> middlename</th>
						        <th data-field="lname"  data-sortable="true">lastname</th>
						        <th data-field="email" data-sortable="true">Email</th>
						        <th data-field="contact"  data-sortable="true">Phone Number</th>
						        <th data-field="date" data-sortable="true">Date of Birth</th>
						        


						    </tr>
						    </a>

						    </thead>
						    
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	


		<div class="modal fade" id="myModal" role="form">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Patient Registration</h4>
        </div>
        <div class="modal-body">
        <form method="POST" action="<?php $_PHP_SELF ?>" role="form">
        <div class="form-group">
          <label>Firstname</label>
          <input type="text" name="fname" class="form-control" required="">
          </div>
          <div class="form-group">
          <label>Middlename</label>
          <input type="text" name="mname" class="form-control" required="">
          </div>
          <div class="form-group">
          <label>Lastname</label>
          <input type="text" name="lname" class="form-control" required="">
          </div>
          <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" required="">
          </div>
          <div class="form-group">
          <label>Phone Number</label>
          <input type="text" name="contact" class="form-control" required="">
          </div>
          <div class="form-group">
          <label>Date of Birth</label>
          <input type="text" name="contact" class="form-control" required="">
          </div>
          <input type="submit" class="btn btn-primary" name="save" value="save">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	
						<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>
			
		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
