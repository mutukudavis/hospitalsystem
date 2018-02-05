<?php
require('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>2letin Properties</title>

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
				<a class="navbar-brand" href="#" style="font-family:cursive"><span>2letin Properties</span>Admin Panel</a>
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
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="index2.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="users.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Users</a></li>
			<li ><a href="images.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Images</a></li>
			<li class="active"><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Payments</a></li>
			<li ><a href="contact.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg>Contact</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="logout.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout Page</a></li>
		</ul>
		<div class="attribution">Created  by <a href="#">2letin property developer</a><br/></div>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		
		<div class="row"><div class="col-lg-12">
			
				<h1 class="page-header">Payments</h1>
				<div class="panel-body">
			</div>
		</div><!--/.row-->
				<div class="row" border="5px">
			<div class="col-sm-2">
				<h3 class="page-header">House Id</h3>
			</div>
			<div class="col-sm-2">
				<h3 class="page-header">Agent</h3>
			</div>
			<div class="col-sm-4">
				<h3 class="page-header">Transaction</h3>
			</div>
			<div class="col-sm-2">
				<h3 class="page-header">permission</h3>
			</div>
		</div>
		</div>
		<!--/.row-->
						<?php

if($con)
{
$query1="SELECT * FROM houses";
$result1=mysqli_query($con,$query1);
while($row1=mysqli_fetch_array($result1)){
$transaction=$row1['transaction'];
$id=$row1['id'];
$agent=$row1['agent'];
$payment=$row1['payment'];
?>
<div class="row">
			<div class="col-sm-2">
				<h4 class="page-header"><?php echo $id; ?></h4>
			</div>
			<div class="col-sm-2">
				<h4 class="page-header"><?php echo $agent; ?></h4>
			</div>
			<div class="col-sm-4">
				<h4 class="page-header"><?php echo $transaction; ?></h4>
			</div>
			 <div class="col-lg-2">
<?php if($payment=="Allowed"){?>
<h5 class="page-header"><input type="button" onclick="allow(<?php echo $id; ?>,'<?php echo $payment; ?>');" class="btn btn-primary" value="reverse" style="float:left; margin-left:5px; margin-bottom: 1px; "/></h5>
<?php }else{ ?>
	<h5 class="page-header"><input type="button" onclick="allow(<?php echo $id; ?>,'<?php echo $payment; ?>');" class="btn btn-primary" value="allow" style="float:left; margin-left:5px; margin-bottom: 1px; "/></h5>
	<?php } ?>
			</div>
		</div>
<?php

}



mysqli_close($con);
unset($con);
}


?>
							
</div>				
		
		
	</div><!--/.main-->
	<div id="result"></div>
</body>
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript">
	
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
</script>
</html>
