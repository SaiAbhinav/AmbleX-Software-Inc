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
	
	<style>
		.manage {
			margin-top:20%;
			margin-left:25%;
		}
	</style>
	
</head>

<body>

<div class="wrapper">
    <div class="sidebar" data-color="grey" data-image="assets/img/sidebar-5.jpg">
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
				<li class="active">
                    <a href="manage_emp.php">
                        <i class="pe-7s-tools"></i>
                        <p>Manage Employee</p>
                    </a>
                </li>
                <li>
                    <a href="emp_list.php">
                        <i class="pe-7s-users"></i>
                        <p>Details List</p>
                    </a>
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
                    <a class="navbar-brand" href="#">Manage Employee</a>
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
		<div class="manage col-md-12">
			<button class="btn btn-success btn-fill btn-responsive btn-lg" id="add">Add Employee</button>
			<button class="btn btn-danger btn-fill btn-responsive btn-lg" id="remove">Remove Employee</button>
			<button class="btn btn-info btn-fill btn-responsive btn-lg" id="update">Update Employee</button>
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
	
<script type="text/javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#pic').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
	
    $("#img").change(function(){
        readURL(this);
    });
</script>
	
<script>
	$(document).ready(function(){
		$("#myBtn").click(function(){
			$("#myModal").modal();
		});
	});
	
	$(document).ready(function() {
		$("#add").click(function() {
			window.location.href='add_emp.php';
		});
		$("#remove").click(function() {
			window.location.href='remove_emp.php';
		});
		$("#update").click(function() {
			window.location.href='update_emp.php';
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