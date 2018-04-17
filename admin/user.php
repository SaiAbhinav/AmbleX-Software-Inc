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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/dashboard.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<link href="../styles/tree_menu.css" rel="stylesheet" />
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
                <li class="active">
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
                    <a class="navbar-brand" href="#">Hello <?php echo $f_name ?></a>
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
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 id="prof_title" class="title">Profile</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="../scripts/update_prof.php">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Employee ID</label>
                                                <input name="emp_id" type="text" class="form-control" readonly placeholder="Employee ID" value="<?php echo $id; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input name="emp_name" type="text" class="form-control" readonly placeholder="Username" value="<?php echo $username; ?>">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input name="emp_psd" type="text" class="form-control" disabled placeholder="Password" value="<?php echo $password; ?>">
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input name="emp_f_name" type="text" class="form-control" readonly placeholder="First Name" value="<?php echo $f_name; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input name="emp_l_name" type="text" class="form-control" readonly placeholder="Last Name" value="<?php echo $l_name; ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Mobile 1</label>
                                                <input name="emp_mob1" type="text" class="form-control" readonly placeholder="Mobile 1" value="<?php echo $mob1; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Mobile 2</label>
                                                <input name="emp_mob2" type="text" class="form-control" readonly placeholder="Mobile 2" value="<?php echo $mob2; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email address</label>
                                                <input name="emp_email" type="email" class="form-control" readonly placeholder="Email" value="<?php echo $email; ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gender</label>
												<input type="text" name="emp_gender" class="form-control" readonly placeholder="Gender" value="<?php echo $gender;?>">
                                            </div>
                                        </div>   
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Marital Status</label>
                                                <input name="emp_ms" type="text" class="form-control" readonly placeholder="Marital Status" value="<?php echo $mar_status; ?>">
                                            </div>
                                        </div> 
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input name="emp_dob" type="date" class="form-control" readonly value="<?php echo $dob; ?>">
                                            </div>
                                        </div>  										
									</div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="emp_add" rows="2" class="form-control" readonly placeholder="Home Address"><?php echo $address; ?></textarea>
                                            </div>
                                        </div>										
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input name="emp_city" type="text" class="form-control" readonly placeholder="City" value="<?php echo $city; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input name="emp_state" type="text" class="form-control" readonly placeholder="State" value="<?php echo $state; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input name="emp_zip" type="text" class="form-control" readonly placeholder="ZIP Code" value="<?php echo $zip; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <input type="text" name="emp_about" rows="3" class="form-control" readonly placeholder="Your Discription" value="<?php echo $about; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <button name="emp_update" type="submit" class="btn btn-warning btn-fill pull-right" style="display:none;">Update Profile</button>
								</form>
								<button name="emp_btn_edit" id="btnEdit" class="btn btn-info btn-fill pull-right" style="display:block;">Edit Profile</button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image" style="height:200px;">
                                <img src="../images/back.jpg" height="100%">
                            </div>
                            <div class="content">
                                <div class="author">	
									<div class="dropdown">
										<a href="#" id="upimage" class="dropdown-toggle" data-toggle="dropdown" style="pointer-events: none;">
											<img class="avatar border-gray" src="data:image/jpeg;base64,<?php echo base64_encode($photo); ?>" name="emp_photo" />
										</a>
										<ul class="dropdown-menu" style="padding: 10px;">
											<form method="post" action="../scripts/prof_image.php" enctype="multipart/form-data">
												<li>													
													<input type="file" name="emp_photo" class="file">
													<div class="input-group col-xs-12">
														<span class="input-group-addon"><i class="fa fa-user"></i></span>
														<input type="text" class="form-control input-xs" placeholder="Upload Image">
														<span class="input-group-btn">
															<button class="browse btn btn-primary btn-fill input-xs" type="button"><i class="fa fa-search"></i> Browse</button>
														</span>
													</div>															
												</li>
												<li>
													<button style="margin-right:5%" class="btn btn-success btn-fill pull-right" type="submit" name="submit">Update</button>
												</li>
											</form>
										</ul>
									</div>
                                    <h4 class="title"><?php echo $f_name . " " . $l_name ?><br /><small><?php echo $username ?></small></h4>
                                </div>
                                <p class="description text-center"><?php echo $about ?></p>
							</div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square" style="color: #3B5998; font-size: 20px;"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter" style="color: #00ACED; font-size: 20px;"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square" style="color: #D34836; font-size: 20px;"></i></button>
								<button href="#" class="btn btn-simple"><i class="fa fa-linkedin-square" style="color: #0077B5; font-size: 20px;"></i></button>
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
	
	$(document).ready(function(){
		$('#btnEdit').click(function(){
			$("input[name='emp_f_name'],input[name='emp_l_name'],input[name='emp_mob1'],input[name='emp_mob2'],input[name='emp_email'],input[name='emp_dob'],textarea[name='emp_add'],input[name='emp_city'],input[name='emp_state'],input[name='emp_zip'],input[name='emp_gender'],input[name='emp_ms'],input[name='emp_about']").removeAttr( "readonly" );
			$("button[name='emp_update']").css("display","block");
			$("button[name='emp_btn_edit']").css("display","none");
			$("#upimage").css("pointer-events","");
			$("#prof_title").text("Edit Profile");
		});
	});
	
	$(document).on('click', '.browse', function(){
		var file = $(this).parent().parent().parent().find('.file');
		file.trigger('click');
	});
	$(document).on('change', '.file', function(){
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
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