<?php
	include "presets.php";
				
	$upid = $_POST['add_id'];
	$uphead = $_POST['add_head'];
	$updead = $_POST['add_dead'];
	$upstatus = $_POST['add_status'];
	$upremark = $_POST['add_remark'];

	$sql = "UPDATE projects SET proj_head='$uphead',deadline='$updead',status='$upstatus',remarks='$upremark' WHERE proj_id='$upid'";

	if(mysqli_query($connection,$sql)) {
		echo "<script>
				alert('Successfully updated...');
				window.location.href='../admin/update_proj.php';
			  </script>";
	}								
?>