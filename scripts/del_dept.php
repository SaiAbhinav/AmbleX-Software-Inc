<?php
	
	error_reporting(0);
	include "presets.php";	
	
	$dept = $_POST['deptid'];		

	$dept_show = "DELETE FROM department WHERE dept_id = '$dept'";
	if(mysqli_query($connection, $dept_show)) {	

		$sql = "DELETE FROM division WHERE dept_id='$dept'";
		if(mysqli_query($connection,$sql)) {
			echo "<script>
				alert('Department is Deleted successfully...');
				window.history.go(-1);
			</script>";
		}					
	}				
	else {
		echo "error";
	}
?>