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
			padding-left:10px;
			width:50%;
			
		}	
		tr {
			background-color: #fff;
			color:#000 !important;			
			font-size: 16px !important;
			border-bottom: 2px solid lightgrey;
			
		}
		.file {
			visibility: hidden;
			position: absolute;
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
                    <a class="navbar-brand" href="#">Update Employee</a>
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

		<div class="container">
			<div class="row">
				<form method="post" class="form-inline">
					<div class="form-group" style="margin-top:2%;">							
						<input type="text" size="20" style="border:1px solid grey" name="disp" class="form-control" placeholder="Enter Employee ID"  data-toggle="tooltip" data-placement="top" title="Enter Employee ID only">
						<input name="show" type="submit" class="btn" value="Search">
					</div>					
				</form>
			</div>
			<?php
			
				include "presets.php";
				
				if($_POST['show']) {
					$eid = $_POST['disp'];
					
					$sql = "SELECT * FROM emp_details WHERE emp_id='$eid'";
					$check = mysqli_query($connection,$sql);
					
					while($row = mysqli_fetch_array($check)) {
						$ename = $row['f_name'];
						$deptid1=$row['dept_id'];
						$deptdiv1=$row['dept_div'];
						$desig1=$row['desig'];
					}	

					$sql1 = "SELECT * FROM department WHERE dept_id='$deptid1'";
					$check1 = mysqli_query($connection,$sql1);
					
					while($row1 = mysqli_fetch_array($check1)) {
						$deptname1=$row1['dept_name'];
					}
					
					$sql2 = "SELECT * FROM salary WHERE emp_id='$eid'";
					$check2 = mysqli_query($connection,$sql2);
					
					while($row2 = mysqli_fetch_array($check2)) {
						$ebase = $row2['base'];
						$einc = $row2['increment'];
						$edec = $row2['decrement'];
						$ebonus = $row2['bonus'];
						$eover = $row2['overtime'];						
					}
					$etotal = $ebase + $einc + $bonus + $eover - $edec;
				}
			
			?>
		</div>
		
		<div>	
				<div class="container card"  style="margin-top:1%;padding:20px;padding-bottom:0px;">
					<h4 style='margin-top:0%;'><?php echo $eid; ?></h4>
					<ul id="myTab" class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#form1" style="color:#000;">Profession</a></li>
						<li><a data-toggle="tab" href="#form2" style="color:#000;">Salary</a></li>					
					</ul>			
					<div class="tab-content">			
						<div id="form1" class="tab-pane fade in active">					
							<div class="row">							
								<div class="col-md-4">
									<div class="well">
										<div class="header">
											<h4 class="title">Professional Details</h4>
										</div>
										<form method="post" action="../scripts/up_emp.php">
										<div class="form-group" style="padding: 15px; padding-bottom:0px;">
											<label>Employee ID</label>
											<input name="add_id" type="text" class="form-control" readonly placeholder="Employee ID" value="<?php echo $eid; ?>">
										</div>
										<div class="form-group" style="padding: 15px; padding-bottom:0px; padding-top:0px;">
											<label>Department</label>
											<input name="add_dept" type="text" class="form-control" readonly placeholder="Department" value="<?php echo $deptid1; ?>">
										</div>
										<div class="form-group" style="padding: 15px; padding-bottom:0px; padding-top:0px;">
											<label>Division</label>
											<input name="add_div" type="text" class="form-control" placeholder="Division" value="<?php echo $deptdiv1; ?>">
										</div>
										<div class="form-group" style="padding: 15px; padding-top:0px; padding-bottom:0px;">
											<label>Designation</label>
											<input name="add_desig" type="text" class="form-control" placeholder="Designation" value="<?php echo $desig1; ?>">
										</div>										
										<div class="form-group" style="padding: 15px; padding-top:0px;">
											<label>Project</label>
											<input name="add_proj" type="text" class="form-control" placeholder="Project">
										</div>
									</div>
									<div class="form-group" style="padding: 15px; padding-top:0px;">
										<button name="upemp" type="submit" class="btn btn-success btn-fill pull-right">Update</button>
										<div class="clearfix"></div>										
									</div>
									</form>
								</div>
								<div class="col-md-4">
									<div class="well">								
										<table>
											<tr><th style="width:25%;">ID</th><td style="width:2%">:</td><td><?php echo $deptid1; ?></td></tr>											
											<tr><th style="width:25%;">Name</th><td style="width:2%">:</td><td><?php echo $deptname1; ?></td></tr>
											<tr><th style="width:25%;">Division</th><td style="width:2%">:</td><td><?php echo $deptdiv1; ?></td></tr>																						
											<tr><th style="width:25%;">Designation</th><td style="width:2%">:</td><td><?php echo $desig1; ?></td></tr>											
										</table>
									</div>									
								</div>
								<div class="col-md-4">
									<div class="well">
										<label style="color:#000;font-weight:bold;font-size:15px;">Project</label>
										<?php								
											if($_POST['disp']) {
												$sql = "SELECT proj_id FROM work WHERE emp_id='$id'";
												$result = mysqli_query($connection,$sql);
								
												if (mysqli_num_rows($result) > 0) {
													echo "<table>
															<thead>									
																<th style='border-bottom:4px solid #DCDCDC;'>Project ID</th>										
															</thead>";
													while($row = $result->fetch_assoc()) {
														echo "<tbody>
																<tr>
																	<td>".$row["proj_id"]."</td>
																</tr>
															  </tbody> ";
													}
													echo "</table>";
												}
											}else {
												echo "<br>0 results found";
											}
										?>																				
									</div>									
								</div>
							</div>
						</div>                    				
						<div id="form2" class="tab-pane fade">				
							<div class="row">
								<div class="col-md-4">
									<div class="well">
										<div class="header">
											<h4 class="title">Salary Details</h4>
										</div>
								<form method="post" action="../scripts/up_sal.php">
								<div class="form-group" style="padding: 15px; padding-bottom:0px;">						
											<input name="sal_id" type="text" class="form-control" placeholder="Employee ID" readonly value="<?php echo $eid; ?>">
										</div>
										<div class="form-group"  style="padding: 15px; padding-bottom:0px; padding-top:0px;">
										  <select class="form-control" name="saltype">
										   <option>-- Select --</option>
											<option value="increment">Increment</option>
											<option value="decrement">Decrement</option>
											<option value="bonus">Bonus</option>
											<option value="overtime">Overtime</option>
										  </select>
										</div>
										<div class="form-group" style="padding: 15px; padding-top:0px;">						
											<input name="up_sal" type="text" class="form-control" placeholder="Amount">
										</div>
								
									</div>
									<div class="form-group" style="padding: 15px; padding-top:0px;">
										
										<button name="salup" type="submit" class="btn btn-success btn-fill pull-right">Update</button>
										<div class="clearfix"></div>
									</div>
									</form>
								</div>	
								<div class="col-md-6">
									<div class="well">
										<label style="color:#000;font-weight:bold;font-size:15px;">Salary</label>
										<table>
											<tr><th style="width:20%;">ID</th><td style="width:2%">:</td><td><?php echo $eid; ?></td></tr>											
											<tr><th style="width:20%;">Name</th><td style="width:2%">:</td><td><?php echo $ename; ?></td></tr>											
											<tr><th style="width:20%;">Base</th><td style="width:2%">:</td><td><?php echo $ebase; ?></td></tr>
											<tr><th style="width:20%;">Increment</th><td style="width:2%">:</td><td><?php echo $einc; ?></td></tr>
											<tr><th style="width:20%;">Decrement</th><td style="width:2%">:</td><td><?php echo $edec; ?></td></tr>
											<tr><th style="width:20%;">Bonus</th><td style="width:2%">:</td><td><?php echo $ebonus; ?></td></tr>
											<tr><th style="width:20%;">Overtime</th><td style="width:2%">:</td><td><?php echo $eover; ?></td></tr>
											<tr style='border-top:4px solid #DCDCDC;width:20%;'><th>Total</th><td style="width:2%">:</td><td><?php echo $etotal ?></td></tr>											
										</table>																				
									</div>									
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
	
	$(document).on('click', '.browse', function(){
		var file = $(this).parent().parent().parent().find('.file');
		file.trigger('click');
	});
	$(document).on('change', '.file', function(){
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	});
	
$(document).ready(function(){
	$("#man").click(function() {
		$("#manul").children().css({"display": ""});		
	});
});
	
		$('.tree-toggle').click(function () {
		$(this).parent().children('ul.tree').toggle(200);
	});
	$(function(){
		$('.tree-toggle').parent().children('ul.tree').toggle(200);
	})
	
	$(document).ready(function(){
	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if(activeTab){
		$('#myTab a[href="' + activeTab + '"]').tab('show');
	}
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