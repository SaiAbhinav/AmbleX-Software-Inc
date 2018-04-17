<?php 
	session_start();
	if(!$_SESSION['auth']) {
		header('location:index.html');
	}
?>

<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<link href="../styles/tree_menu.css" rel="stylesheet" />
	<style>
		th {
			color: #000 !important;
		}
		table {
			margin-top:1%;
		}
	</style>
</head>

<body>

<div class="wrapper">
    <div class="sidebar" data-color="grey" data-image="../images/back.jpg">
    	<div class="sidebar-wrapper">
			<div class="logo">
                <a href="#" class="simple-text">Amblex Software Inc.</a>
            </div>
            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-note2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <i class="pe-7s-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
				<li>
					<a href="professional.php">
						<i class="pe-7s-id"></i>
						<p>Professional</p>
					</a>
				</li>		
                <li>
					<a href="emp_list.php">
						<i class="pe-7s-note2"></i>
						<p>Details List</p>
					</a>
				</li>
				<li id="empman" style="display:none;"><a id="man" class="tree-toggle" style="cursor:pointer;"><i class="pe-7s-edit"></i><p>Manage</p></a>
                    <ul id="manul" class="nav nav-list tree bullets" style="margin-top:-8px;">
						<li style="display:none;"><a class="tree-toggle" style="cursor:pointer;"><i class="pe-7s-users"></i><p>Manage Employee</p></a>
							<ul class="nav nav-list tree bullets" style="margin-top:-8px;">
								<li><a href="add_emp.php"><p>Add Employee</p></a></li>
								<li><a href="remove_emp.php"><p>Remove Employee</p></a></li>
								<li><a href="update_emp.php"><p>Update Employee</p></a></li>	                        
							</ul>
						</li>
						<li style="display:none;"><a class="tree-toggle" style="cursor:pointer;"><i class="pe-7s-albums"></i><p>Manage Project</p></a>
							<ul class="nav nav-list tree bullets" style="margin-top:-8px;">
								<li><a href="add_proj.php"><p>Add Project</p></a></li>
								<li><a href="remove_proj.php"><p>Remove Project</p></a></li>
								<li><a href="update_proj.php"><p>Update Project</p></a></li>	                        
							</ul>
						</li>	
						<li style="display:none;"><a class="tree-toggle"  id="manman" style="cursor:pointer;visibility:none;"><i class="fa fa-building-o"></i><p>Manage Department</p></a>
							<ul class="nav nav-list tree bullets" style="margin-top:-8px;">
								<li><a href="add_dept.php"><p>Add Department</p></a></li>
								<li><a href="remove_dept.php"><p>Remove Department</p></a></li>
								<li><a href="update_dept.php"></i><p>Update Department</p></a></li>	                        
							</ul>
						</li>															                   
					</ul>
				</li>						
            </ul>
    	</div>
    </div>
    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Remove Department</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" type="button" class="dropdown-toggle btn" data-toggle="dropdown"><p>Account <b class="caret"></b></p></a>
                              <ul class="dropdown-menu" style="padding: 10px;">
                                <li><a id="myBtn" href="#myModal">Change Password</a></li>
                                <li><a href="../index.html">Logout</a></li>
                              </ul>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
		<div class="container-fluid" style="margin-top:3%;">
		<?php
			include "../scripts/presets.php";						
			error_reporting(0);		
					
			$dept_show = "SELECT * FROM department";
			$dept_count = "SELECT COUNT(dept_id) AS num FROM department";
			$dept_count_res = mysqli_query($connection, $dept_count);
			$list = mysqli_fetch_assoc($dept_count_res);
			$dept_res = mysqli_query($connection, $dept_show);						
			if(mysqli_num_rows($dept_res) > 0) {
				echo "<div class='col-md-12' style='padding: 20px;'><div class='card'>";
				echo "<div class='header'>
						<h4 class='title'><b>Departments List</b> | <small>no. of departments:</small> ".$list['num']."
							<div class='col-xs-3 pull-right'>
								<input class='form-control' id='myInput' type='text' class='fa fa-search' placeholder=' Search..' style='border:1px solid #000;'>
							</div>
						</h4>
					  </div>";
				echo "<div class='content table-responsive table-full-width'><table class='table table-hover table-striped'>";
				echo "<thead>
						<tr style='border-top: 1px solid lightgrey;'>
							<th style='padding-left: 14px;'><h5><b>Department ID</h5></b></th>
							<th><h5><b>Name</h5></b></th>
							<th><h5><b>Head</h5></b></th>
							<th><h5><b>Building</h5></b></th>
							<th><h5><b>Remove</h5></b></th>
						</tr>
					  </thead>
					  <tbody id='myTable'>";
				while($row = mysqli_fetch_assoc($dept_res)) {
					echo "<form method='post' action='../scripts/del_dept.php'>
							<tr>
								<td>".$row['dept_id']."<input type='text' style='visibility:hidden;' size='1' name='deptid' value='".$row['dept_id']."'></td>
								<td>".$row['dept_name']."</td>
								<td>".$row['dept_head']."</td>							
								<td>".$row['building']."</td>
								<td><button id='del' class='btn btn-danger btn-fill btn-sm'><i class='fa fa-times'></i></button></td>
							</tr>
						  </form>";								
				}
				echo "</tbody></table></div>";
				echo "</div></div>";
				echo "<script>
						$(document).ready(function(){
							$('#myInput').on('keyup', function() {
								var value = $(this).val().toLowerCase();
								$('#myTable tr').filter(function() {
									$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
								});
							});
						});
				      </script>";
			}
		?>
	</div>	

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body" style="padding:40px 50px;">
				<form role="form" method="post" action="../scripts/chg_psd.php">
					<div class="form-group">
						<label for="usrname"> Username</label>
						<input type="text" class="form-control" name="usr" placeholder="Enter username" required>
					</div>
					<div class="form-group">
						<label for="psw"> Old Password</label>
						<input type="password" class="form-control" name="opsw" placeholder="Enter password" required>
					</div>
					<div class="form-group">
						<label for="psw"> New Password</label>
						<input type="password" class="form-control" name="npsw" placeholder="Enter password" required>
					</div>
					<div class="form-group">
						<label for="psw"> Retype Password</label>
						<input type="password" class="form-control" name="rpsw" placeholder="Enter password" required>
					</div>
					<br>
					<button type="submit" class="btn btn-warning btn-block" style="color:#fff;background-color:#f0ad4e;border-color:#eea236"><i class="fa fa-pencil-square-o"></i> Change</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal" style="color:#fff;background-color:#d9534f;border-color:#d43f3a"><i class="fa fa-times"></i>Cancel</button>
			</div>
		</div>      
	</div>
</div>

</body>	
	
<script>
	$(document).ready(function(){
		$("#myBtn").click(function(){
			$("#myModal").modal();
		});
	});
	$('.tree-toggle').click(function () {
		$(this).parent().children('ul.tree').toggle(200);
	});
	$(function(){
		$('.tree-toggle').parent().children('ul.tree').toggle(200);
	})
	$(document).ready(function(){
	$("#man").click(function() {
		$("#manul").children().css({"display": ""});		
	});
});
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script>
$(document).ready(function(){
	var $xyz="<?php echo $_SESSION['desig']; ?>";
	if($xyz == "Admin" || $xyz == "Manager") {
		$("#empman").css({"display": "block"});
		if($xyz == "Manager") {
			$("#manman").css({"visibility": "hidden"});
		}else {
			
		}
	}
});
</script>
<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>
<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>