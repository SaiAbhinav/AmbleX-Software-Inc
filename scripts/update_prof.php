<?php
	error_reporting(0);

	include "presets.php";
	
	$emp_id = $_POST['emp_id'];
	$emp_f_name = $_POST['emp_f_name'];
	$emp_l_name = $_POST['emp_l_name'];
	$emp_email = $_POST['emp_email'];
	$emp_add = $_POST['emp_add'];
	$emp_city = $_POST['emp_city'];
	$emp_state = $_POST['emp_state'];
	$emp_zip = $_POST['emp_zip'];
	$emp_about = $_POST['emp_about'];
	$emp_mob1 = $_POST['emp_mob1'];
	$emp_mob2 = $_POST['emp_mob2'];
	$emp_gen = $_POST['emp_gender'];
	$emp_mar = $_POST['emp_ms'];
	$emp_dob = $_POST['emp_dob'];
	
	$update = "UPDATE emp_details SET email='$emp_email',dob='$emp_dob',mobile1='$emp_mob1',mobile2='$emp_mob2',f_name='$emp_f_name',l_name='$emp_l_name',address='$emp_add',city='$emp_city',state='$emp_state',zip='$emp_zip',about='$emp_about',gender='$emp_gen',mar_status='$emp_mar' WHERE emp_id='$emp_id'";
	
	if(mysqli_query($connection,$update)) {
		echo "<script>
					alert('Successfully Updated!!!');
					window.history.back();
			  </script>";
	}else {
		echo "<script>
					alert('There is an Error!!!');
					window.history.back();
			  </script>";
	}
?>