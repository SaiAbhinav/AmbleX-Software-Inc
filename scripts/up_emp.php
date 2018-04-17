<?php
		include "presets.php";
		
		$upeid=$_POST['add_id'];
		$upedept=$_POST['add_dept'];
		$upediv=$_POST['add_div'];
		$upedesig=$_POST['add_desig'];
		$upeproj=$_POST['add_proj'];
									
		if($upeproj == NULL) {
			$sql = "UPDATE emp_details SET dept_div='$upediv',desig='$upedesig' WHERE emp_id='$upeid'";
			if(mysqli_query($connection,$sql)) {
				echo "<script>
						alert('Successfully Updated...');
						window.history.go(-3);
					</script>";
			}else {
				echo "error";
			}
		}else if($upeproj != NULL){
			$sql1 = "INSERT INTO work(emp_id,proj_id) VALUES('$upeid','$upeproj')";
			$sql = "UPDATE emp_details SET dept_div='$upediv',desig='$upedesig' WHERE emp_id='$upeid'";
			$res = mysqli_query($connection,$sql);
			if(mysqli_query($connection,$sql1)) {
				echo "<script>
						alert('Successfully Updated...And Project is Added');
						window.location.href='../admin/update_emp.php';
					</script>";
			}else {
				echo "error...!";
			}
		}else {
			echo "There is an error";
		}

?>