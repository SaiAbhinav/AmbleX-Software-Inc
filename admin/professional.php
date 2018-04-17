<?php 
	session_start();
	if(!$_SESSION['auth']) {
		header('location:index.html');
	}

	include "../scripts/profile_queries.php";
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
		.nav-tabs > li > a:hover {
			background-color: #5bc0de !important;
			color: #fff !important;
			border-radius: 5;
		}		
		.well {
			border-radius:0px;
		}		
		.form-group > label {
			color: #000 !important;
		}
		table {
			width: 100%;
		}
		th, td {
			padding: 10px;
			padding-left:20px;
		}	
		tr {
			background-color: #fff;
			color:#000 !important;			
			font-size: 16px !important;
			border-bottom: 2px solid lightgrey;
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
				<li class="active">
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
						<li style="display:none;"><a class="tree-toggle" id="manman" style="cursor:pointer;visibility:none;"><i class="fa fa-building-o"></i><p>Manage Department</p></a>
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
                    <a class="navbar-brand" href="#">Professional Details</a>
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
		
		<div class="container card"  style="margin-top:1%;padding:20px;padding-bottom:0px;">
			<ul id="myTab" class="nav nav-tabs">
				<li><a data-toggle="tab" href="#form1" style="color:#000;">Current</a></li>				
				<li><a data-toggle="tab" href="#form2" style="color:#000;">Project</a></li>
				<li><a data-toggle="tab" href="#form3" style="color:#000;">Skills</a></li>
				<li><a data-toggle="tab" href="#form4" style="color:#000;">Education</a></li>
				<li><a data-toggle="tab" href="#form5" style="color:#000;">Salary</a></li>
			</ul>			
			<div class="tab-content">			
				<div id="form1" class="tab-pane fade in active">					
					<div class="row">
						<div class="col-md-12">
							<div class="well">
								<?php
								echo "<table>
									<tr><th style='width:340px;'>Employee ID</th><td>:</td><td>".$id."</td></tr>
									<tr><th>Name</th><td>:</td><td>".$f_name." ".$l_name."</td></tr>
									<tr><th>Designation</th><td>:</td><td>".$desig."</td></tr>
									<tr><th>Department</th><td>:</td><td>".$dept."</td></tr>
									<tr><th>Division</th><td>:</td><td>".$div."</td></tr>									
									<tr><th>Salary</th><td>:</td><td>".$total."</td></tr>
								</table>"
								?>
							</div>
							<div class="form-group" style="padding: 15px; padding-top:0px;">
								<button id="next1" class="btn btn-primary btn-fill pull-right">Next <i class="fa fa-arrow-right"></i></button>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>				
				<div id="form2" class="tab-pane fade">				
					<div class="row">
						<div class="col-md-12">
							<div class="well">
								<?php
									$sql3 = "SELECT projects.proj_id AS pid,projects.proj_name AS pname,projects.status AS pstatus,client_details.client_name AS cname FROM emp_details INNER JOIN work ON emp_details.emp_id=work.emp_id INNER JOIN projects ON work.proj_id=projects.proj_id INNER JOIN client_details ON projects.client_id=client_details.client_id WHERE emp_details.username='$user'";
									$res2 = mysqli_query($connection, $sql3);

									if (mysqli_num_rows($res2) > 0) {										
										echo "<table>
												<thead  style='border-bottom:4px solid #DCDCDC;'>
													<th>Project ID</th>
													<th>Project Name</th>                                      
													<th>Status</th>
													<th>Client</th>                                    	                                    	
												</thead>";
										while($row = mysqli_fetch_array($res2)) {
										echo"<tbody>
												<tr>
													<td>".$row["pid"]."</td>
													<td>".$row["pname"]."</td>
													<td>".$row["pstatus"]."</td>
													<td>".$row["cname"]."</td>
												</tr>
											 </tbody> ";
										}
									echo "</table>";
									}
									else{
										echo "0 results";
									}
								?>
							</div>
							<div class="form-group" style="padding: 15px; padding-top:0px;">
								<button id="pre2" class="btn btn-primary btn-fill pull-left"><i class="fa fa-arrow-left"></i> Previous</button>
								<button id="next3" class="btn btn-primary btn-fill pull-right">Next <i class="fa fa-arrow-right"></i></button>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>					
				</div>				
				<div id="form3" class="tab-pane fade">				
					<div class="row">
						<div class="col-md-6">
							<div class="well">							
								<?php
									$sql = "SELECT skill_name FROM skills WHERE emp_id='$id'";
									$result = mysqli_query($connection, $sql);

									if (mysqli_num_rows($result) > 0) {										
										echo "<table>
												<thead>									
													<th style='border-bottom:4px solid #DCDCDC;'>Skill Name</th>							                                    
												</thead>";
										while($row = $result->fetch_assoc()) {
											echo"<tbody>
													<tr>
														<td>".$row["skill_name"]."</td>										
													</tr>
												 </tbody> ";
										}
										echo "</table>";
									}
									else {
										echo "0 results";
									}
								?>
							</div>															
							<div class="form-group" style="padding: 15px; padding-top:0px;">
								<button id="pre3" class="btn btn-primary btn-fill pull-left"><i class="fa fa-arrow-left"></i> Previous</button>
								<button id="next4" class="btn btn-primary btn-fill pull-right">Next <i class="fa fa-arrow-right"></i></button>
								<div class="clearfix"></div>
							</div>							
						</div>	
						<div class="col-md-4" style="margin-left:5%;">
							<div class="well">
							<form method="post" action="../scripts/addskill.php">
								<div class="form-group">
									<label>Add Skill</label>
									<input type="text" name="new_skill" class="form-control" style="border:1px solid grey;" placeholder="Add Skill">								
								</div>							
							</div>
							<div class="form-group" style="padding: 15px; padding-top:0px;">
								<button class="btn btn-success btn-fill pull-right" style="width:100px;" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
								<div class="clearfix"></div>
							</div>
							</form>
						</div>
					</div>					
				</div>			
				<div id="form4" class="tab-pane fade">				
					<div class="row">
						<div class="col-md-12">
							<div class="well">								
								<?php						
									$sql = "SELECT * FROM education WHERE emp_id='$id'";
									$result = mysqli_query($connection, $sql);
								
									if (mysqli_num_rows($result) > 0) {										
										echo "<table>
												<thead style='border-bottom:4px solid #DCDCDC;'>									
													<th>Qualification</th>
													<th>Graduation Year</th>											
												</thead>";
										while($row = $result->fetch_assoc()) {
											echo"<tbody>
													<tr>
														<td>".$row["deg_name"]."</td>
														<td>".$row["grad_year"]."</td>
													</tr>
												</tbody> ";
										}
										echo "</table>";
									}
									else {
										echo "0 results";
									}
								?>							
							</div>															
							<div class="form-group" style="padding: 15px; padding-top:0px;">
								<button id="pre4" class="btn btn-primary btn-fill pull-left"><i class="fa fa-arrow-left"></i> Previous</button>
								<button id="next5" class="btn btn-primary btn-fill pull-right">Next <i class="fa fa-arrow-right"></i></button>
								<div class="clearfix"></div>
							</div>							
						</div>	
					</div>									
				</div>
				<div id="form5" class="tab-pane fade">				
					<div class="row">
						<div class="col-md-6">
							<div class="well">								
								<label style="color:#000;font-weight:bold;font-size:15px;">Salary</label>
								<table>																																
									<tr><th style="width:200px;">Base</th><td>:</td><td><?php echo $base; ?></td></tr>
									<tr><th>Increment</th><td>:</td><td><?php echo $increment; ?></td></tr>
									<tr><th>Decrement</th><td>:</td><td><?php echo $decrement; ?></td></tr>
									<tr><th>Bonus</th><td>:</td><td><?php echo $bonus; ?></td></tr>
									<tr><th>Overtime</th><td>:</td><td><?php echo $overtime; ?></td></tr>
									<tr style='border-top:4px solid #DCDCDC;'><th>Total</th><td>:</td><td><?php echo $total; ?></td></tr>											
								</table>																									
							</div>															
							<div class="form-group" style="padding: 15px; padding-top:0px;">
								<button id="pre5" class="btn btn-primary btn-fill pull-left"><i class="fa fa-arrow-left"></i> Previous</button>									
								<div class="clearfix"></div>
							</div>							
						</div>	
					</div>									
				</div>				
			</div>
		</div>		
    </div>
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
	
	$(document).ready(function() {
		$("#next1").click(function() {
			$('#myTab a[href="#form2"]').tab('show');
		});
		$("#pre1").click(function() {
			$('#myTab a[href="#form1"]').tab('show');
		});
		$("#next2").click(function() {
			$('#myTab a[href="#form3"]').tab('show');
		});
		$("#pre2").click(function() {
			$('#myTab a[href="#form2"]').tab('show');
		});
		$("#next3").click(function() {
			$('#myTab a[href="#form4"]').tab('show');
		});
		$("#pre3").click(function() {
			$('#myTab a[href="#form3"]').tab('show');
		});
		$("#next4").click(function() {
			$('#myTab a[href="#form5"]').tab('show');
		});
		$("#pre4").click(function() {
			$('#myTab a[href="#form4"]').tab('show');
		});
	});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if(activeTab){
		$('#myTab a[href="' + activeTab + '"]').tab('show');
	}
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