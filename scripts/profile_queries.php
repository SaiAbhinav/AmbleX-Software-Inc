<?php
	error_reporting(0);

	include "presets.php";
	$user = $_SESSION['user'];
	
	$sql = "SELECT * FROM emp_details WHERE username='$user'";
	$sql1 = "SELECT * FROM department INNER JOIN emp_details ON department.dept_id = emp_details.dept_id WHERE emp_details.username = '$user'";
	$sql2 = "SELECT base+increment+bonus+overtime-decrement AS total,base,increment,decrement,bonus,overtime FROM salary WHERE emp_id = (SELECT emp_id FROM emp_details WHERE username = '$user')";
	
	$result = mysqli_query($connection, $sql);
	$res = mysqli_query($connection, $sql1);
	$res1 = mysqli_query($connection, $sql2);

    while($row = mysqli_fetch_array($result)) {
		$id = $row['emp_id'];
		$username = $row['username'];
		$password = $row['password'];
		$f_name = $row['f_name'];
		$l_name = $row['l_name'];
		$email = $row['email'];
		$mob1 = $row['mobile1'];
		$mob2 = $row['mobile2'];
		$gender = $row['gender'];
		$mar_status = $row['mar_status'];
		$address = $row['address'];
		$city = $row['city'];
		$state = $row['state'];
		$zip = $row['zip'];
		$about = $row['about'];
		$photo = $row['photo'];
		$dob = $row['dob'];
		$desig = $row['desig'];
		$dept = $row['dept_id'];
		$div = $row['dept_div'];
    }
	while($row1 = mysqli_fetch_array($res)) {
		$did = $row1['dept_id'];
		$dname = $row1['dept_name'];
		$dhead = $row1['dept_head'];
	}
	while($row2 = mysqli_fetch_array($res1)) {
		$total = $row2['total'];
		$base = $row2['base'];
		$increment = $row2['increment'];
		$decrement = $row2['decrement'];
		$bonus = $row2['bonus'];
		$overtime = $row2['overtime'];
	}
	while($row3 = mysqli_fetch_array($res2)) {
		$pid = $row3['pid'];
		$pname = $row3['pname'];
		$pstatus = $row3['pstatus'];		
	}
?>