<?php
	
	//error_reporting(0);
	include "presets.php";	
	
	$id1 = $_POST['calproj'];
		$remark = $_POST['remark'];

	$sql = "UPDATE projects SET status='cancelled' AND remarks='$remark' WHERE proj_id = '$id1'";
	if(mysqli_query($connection, $sql)) {				
		echo "<script>
				alert('Project is Cancelled successfully...');
				window.history.go(-2);
			</script>";										
	}				
	else {
		echo "error";
	}
?>