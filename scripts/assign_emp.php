<?php
	include "presets.php";
	
	$asemp = $_POST['proj_emp'];
	$pid = $_POST['add_id'];
	
	$sql="INSERT INTO work(emp_id,proj_id) VALUES('$asemp','$pid')";
	if(mysqli_query($connection,$sql)) {
		echo "<script>
				window.location.href='../admin/update_proj.php';
				</script>";
	}
	
?>