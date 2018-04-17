<?php
	error_reporting(0);

	include "presets.php";
	
	$id = $_POST['emp_id'];
	
	$show = "SELECT emp_id,f_name,city,dept_id,doj FROM emp_details WHERE emp_id='$id'";
	$result = mysqli_query($connection, $show);
	
	if(mysqli_num_rows($result) > 0) {
		echo "<table>";
		echo	"<tr>
					<th>Emp ID</th>
					<th>Username</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>City</th>
				</tr>";
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr>
					<td>".$row['emp_id']."</td>
					<td>".$row['username']."</td>
					<td>".$row['f_name']."</td>
					<td>".$row['l_name']."</td>
					<td>".$row['city']."</td>
				</tr>";
		}
		echo "</table>";
	}
	else {
		echo "Not found!!!";
	}
	
	
	
?>