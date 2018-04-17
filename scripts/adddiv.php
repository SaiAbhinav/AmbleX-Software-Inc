<?php
	session_start();
	include "presets.php";
	
	$new = $_POST['new_div'];
	$id = $_POST['depid'];
	
	$sql = "INSERT INTO division(dept_id, div_name) VALUES('$id','$new')";
	
	if(mysqli_query($connection, $sql)) {
		echo "<script>
				alert('Successfully Added');				
				window.history.go(-2);
				</script>";
	}else {
		echo "Error Occurred...!!!";
	}
	
?>