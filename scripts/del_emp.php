<?php
	
	error_reporting(0);
	include "presets.php";	
	
	$emp = $_POST['empid'];		

	$emp_show = "DELETE FROM emp_details WHERE emp_id = '$emp'";
	if(mysqli_query($connection, $emp_show)) {

		$sql1 = "DELETE FROM education WHERE emp_id='$emp'";
		mysqli_query($connection,$sql1);
		
		$sql2 = "DELETE FROM salary WHERE emp_id='$emp'";
		mysqli_query($connection,$sql2);
		
		$sql3 = "DELETE FROM skills WHERE emp_id='$emp'";
		mysqli_query($connection,$sql3);
		
		$sql4 = "DELETE FROM work WHERE emp_id='$emp'";
		mysqli_query($connection,$sql4);
		
		echo "<script>
				alert('Employee is Deleted successfully...');
				window.history.go(-1);
			</script>";										
	}				
	else {
		echo "error";
	}
?>