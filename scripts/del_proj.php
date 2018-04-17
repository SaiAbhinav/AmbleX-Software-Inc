<?php
	
	error_reporting(0);
	include "presets.php";	
	
	$proj = $_POST['projid'];		
	$remark = $_POST['remark'];
	$cancel = "cancelled";
	
	$proj_show = "UPDATE projects SET status='cancelled',remarks='$remark' WHERE proj_id='$proj'";
	if(mysqli_query($connection, $proj_show)) {
			
		$sql = "DELETE FROM requirements WHERE proj_id='$proj'";
		if(mysqli_query($connection,$sql)) {			
			echo "<script>
					alert('Project is Cancelled successfully...');
					window.history.go(-1);
				  </script>";
	    }else {
			echo "error";
		}
	}				
	else {
		echo "There is an error";
	}
?>