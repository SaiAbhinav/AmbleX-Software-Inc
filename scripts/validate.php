<?php
	error_reporting(0);
	
	session_start();
	include "presets.php";
	
	$username = $_POST['usrname'];
	$password = $_POST['psw'];
	
	$query = "SELECT * FROM emp_details WHERE username='$username' AND password='$password'";
	$result = mysqli_query($connection,$query);
	$check = mysqli_fetch_array($result);
	
	if(isset($check)) {		
		$sql = "SELECT auth FROM emp_details WHERE username='$username'";
		$res = mysqli_query($connection,$sql);
		if(isset($res)) {
			while($row = mysqli_fetch_array($res)) {
				$auth = $row['auth'];
			}
			if($auth == "admin" || $auth == "Admin") {
				$_SESSION['desig'] = $auth;				
			}else if($auth == "manager" || $auth == "Manager") {
				$_SESSION['desig'] = $auth;
			}else if($auth == "employee" || $auth == "Employee") {
				$_SESSION['desig'] = $auth;
			}
		}
		
		$_SESSION['auth'] = 'true';
		$_SESSION['user'] = $username;
		$_SESSION['pass'] = $password;
		header("location:../admin/dashboard.php");
		exit;
	}
	else {
		echo "<script>
					alert('login failed');
					window.history.back();
				</script>";
		exit;
	}
	
	mysqli_close($connection);
?>