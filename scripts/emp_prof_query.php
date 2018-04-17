<?php
	error_reporting(0);

	include "presets.php";
	$id = $_SESSION['eid'];
	
	$sql = "SELECT * FROM emp_details WHERE emp_id='$id'";
	$result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_array($result)) {
		$id = $row['emp_id'];
		$username = $row['username'];
		$password = $row['password'];
		$f_name = $row['f_name'];
		$l_name = $row['l_name'];
		$email = $row['email'];
		$address = $row['address'];
		$city = $row['city'];
		$state = $row['state'];
		$zip = $row['zip'];
		$about = $row['about'];
		$img_path = $row['img_path'];
    }
?>