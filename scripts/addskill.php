<?php
	session_start();
	include "profile_queries.php";
	
	$new = $_POST['new_skill'];
	
	$sql = "INSERT INTO skills(emp_id, skill_name) VALUES('$id','$new')";
	
	if(mysqli_query($connection, $sql)) {
		echo "<script>
				alert('Successfully Added');				
				window.history.back();
				</script>";
	}else {
		echo "Error Occurred...!!!";
	}
	
?>