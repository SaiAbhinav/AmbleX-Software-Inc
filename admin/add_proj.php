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
	</style>	
	<style>
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
					<a class="navbar-brand" href="#">Add Project</a>
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
		<div>			
		<form method="post" action="../scripts/add_proj.php">		
			<div class="container card"  style="margin-top:1%;padding:20px;padding-bottom:0px;">
				<ul id="myTab" class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#form1" style="color:#000;">Project</a></li>
					<li><a data-toggle="tab" href="#form2" style="color:#000;">Requirements</a></li>						
					<li><a data-toggle="tab" href="#form3" style="color:#000;">Client</a></li>						
				</ul>			
				<div class="tab-content">			
					<div id="form1" class="tab-pane fade in active">					
						<div class="row">
							<div class="col-md-10">
								<div class="well">						
									<div class="content">
										<div class="row">
											<div class="header">
												<h4 class="title">Project Details</h4>
											</div>
											<div class="col-md-3" style="margin-top:2%;">
												<div class="form-group">
													<label>ID <span style="font-size:12px; color:red;">*</span></label>
													<input name="add_id" type="text" class="form-control" placeholder="Project ID" required>
												</div>
											</div>
											<div class="col-md-5" style="margin-top:2%;">
												<div class="form-group">
													<label>Name <span style="font-size:12px; color:red;">*</span></label>
													<input name="add_name" type="text" class="form-control" placeholder="Project Name" >
												</div>
											</div>
											<div class="col-md-3" style="margin-top:2%;">
												<div class="form-group">
													<label>Deadline <span style="font-size:12px; color:red;">*</span></label>
													<input name="add_dead" type="date" class="form-control" placeholder="Deadline" required>
												</div>
											</div>											
										</div>
										<div class="row">
											<div class="header">
												<h4 class="title">Head Details</h4>
											</div>
											<div class="col-md-4" style="margin-top:2%;">
												<div class="form-group">
													<label>Head <span style="font-size:12px; color:red;">*</span></label>
													<input name="add_head" type="text" class="form-control" placeholder="Employee ID/Name" >
												</div>
											</div>																					
										</div>
										<div class="row">
											<div class="header">
												<h4 class="title">Department Details</h4>
											</div>
											<div class="col-md-4" style="margin-top:2%;">
												<div class="form-group">
													<label>Department <span style="font-size:12px; color:red;">*</span></label>
													<input name="add_dept" type="text" class="form-control" placeholder="Department ID" >
												</div>
											</div>																					
										</div>
									</div>	
								</div>													
							</div>							
						</div>
					</div>		

					<div id="form2" class="tab-pane fade">
						<div class="row">
								<div class="col-md-4">
									<div class="well">
										<div class="header">
											<h4 class="title">Required Skills</h4>
										</div>
										<div class="form-group" style="padding: 15px; padding-bottom:0px;">									
											<input name="add_req1" type="text" class="form-control" placeholder="Skill 1" value="">
										</div>
										<div class="form-group" style="padding: 15px; padding-top:0px; padding-bottom:0px;">									
											<input name="add_req2" type="text" class="form-control" placeholder="Skill 2" value="">
										</div>
										<div class="form-group" style="padding: 15px; padding-top:0px; padding-bottom:0px;">									
											<input name="add_req3" type="text" class="form-control" placeholder="Skill 3" value="">
										</div>
										<div class="form-group" style="padding: 15px; padding-top:0px; padding-bottom:0px;">									
											<input name="add_req4" type="text" class="form-control" placeholder="Skill 4" value="">
										</div>
										<div class="form-group" style="padding: 15px; padding-top:0px;">									
											<input name="add_req5" type="text" class="form-control" placeholder="Skill 5" value="">
										</div>
									</div>
								</div>
							</div>						
					</div>
					
					<div id="form3" class="tab-pane fade">				
						<div class="row">
							<div class="col-md-4">
									<div class="well">
										<div class="header">
											<h4 class="title">Client Details</h4>
										</div>
										<div class="form-group" style="padding: 15px;padding-bottom:0px;margin-top:2%;">
											<label>ID <span style="font-size:12px; color:red;">*</span></label>
											<input name="add_cid" type="text" class="form-control" placeholder="Name">
										</div>
								
										<div class="form-group"  style="padding: 15px;padding-top:0px; padding-bottom:0px;">
										<label>Personal/Company <span style="font-size:12px; color:red;">*</span></label>
										  <select class="form-control" name="add_per">										  										   
											<option value="Personal">Personal</option>
											<option value="Company">Company</option>											
										  </select>
										</div>
										<div class="form-group" style="padding: 15px; padding-top:0px;">
											<label>Name <span style="font-size:12px; color:red;">*</span></label>
											<input name="add_cname" type="text" class="form-control" placeholder="Name">
										</div>
								
									</div>
								<div class="form-group" style="padding: 15px; padding-top:0px;">
									<button id="submit" type="submit" class="btn btn-success btn-fill pull-right">Submit <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>										
				</div>
			</div>	
</form>			
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
	
	$(document).ready(function() {
		$("#next1").click(function() {
			$('#myTab a[href="#form2"]').tab('show');
		});
		$("#pre1").click(function() {
			$('#myTab a[href="#form1"]').tab('show');
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