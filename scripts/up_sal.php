<?php
	include "presets.php";
	
	$salid = $_POST['sal_id'];
	$saltype = $_POST['saltype'];
	$salup = $_POST['up_sal'];
	
	if($saltype == 'increment') {
		$sql = "UPDATE salary SET increment=increment+'$salup' WHERE emp_id='$salid'";
		if(mysqli_query($connection,$sql)) {
			echo "<script>
						alert('Successful Increment');
						window.location.href='../admin/update_emp.php';
					</script>";
		}
	}
	if($saltype == 'decrement') {
			
	$sql = "UPDATE salary SET decrement=decrement+'$salup' WHERE emp_id='$salid'";
		if(mysqli_query($connection,$sql)) {
			echo "<script>
						alert('Successful Decrement');
						window.location.href='../admin/update_emp.php';
					</script>";
		}
	}
	if($saltype == 'bonus') {
			
	$sql = "UPDATE salary SET bonus=bonus+'$salup' WHERE emp_id='$salid'";
		if(mysqli_query($connection,$sql)) {
			echo "<script>
						alert('Successful Bonus');
						window.location.href='../admin/update_emp.php';
					</script>";
		}
	}
	if($saltype == 'overtime') {
			
	$sql = "UPDATE salary SET overtime='$salup' WHERE emp_id='$salid'";
		if(mysqli_query($connection,$sql)) {
			echo "<script>
						alert('Successful Overtime');
						window.location.href='../admin/update_emp.php';
					</script>";
		}
	}
?>