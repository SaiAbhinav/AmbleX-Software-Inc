<?php
	error_reporting(0);
	include "presets.php";
	
	$id = $_POST['add_id'];
	$user = $_POST['add_user'];
	$pass = $_POST['add_password'];
	$f_name = $_POST['add_f_name'];
	$l_name = $_POST['add_l_name'];
	$mob1 = $_POST['add_mobile1'];
	$mob2 = $_POST['add_mobile2'];
	$email = $_POST['add_email'];
	$gen = $_POST['add_gen'];
	$mar = $_POST['add_mar'];
	$dob = $_POST['add_dob'];
	$add = $_POST['add_add'];
	$city = $_POST['add_city'];
	$state = $_POST['add_state'];
	$zip = $_POST['add_zip'];
	
	$check=getimagesize($_FILES["emp_photo"]["tmp_name"]);
	$image = addslashes(file_get_contents($_FILES["emp_photo"]["tmp_name"]));
	
	$dept = $_POST['add_dept'];
	$div = $_POST['add_div'];
	$des = $_POST['add_des'];
	$sal = $_POST['add_sal'];
	$proj = $_POST['add_proj'];
	
	$skill = array($_POST['add_skill1'],$_POST['add_skill2'],$_POST['add_skill3'],$_POST['add_skill4'],$_POST['add_skill5']);
	
	$qual = array($_POST['add_qual1'],$_POST['add_qual2'],$_POST['add_qual3']);
	$qual1 = $_POST['add_qual1'];
	$qual2 = $_POST['add_qual2'];
	$qual3 = $_POST['add_qual3'];
	$grad1 = $_POST['add_grad1'];
	$grad2 = $_POST['add_grad2'];
	$grad3 = $_POST['add_grad3'];
	
	$auth = $_POST['add_auth'];
	$exp = $_POST['add_exp'];
	$doj = $_POST['add_doj'];
	
	$sql = "INSERT INTO emp_details(
				emp_id,username,password,f_name,l_name,gender,dob,
				mar_status,address,city,state,zip,email,mobile1,
				mobile2,doj,exp,desig,auth,dept_id,dept_div,photo
			) VALUES(
				'$id','$user','$pass','$f_name','$l_name','$gen','$dob',
				'$mar','$add','$city','$state','$zip','$email','$mob1',
				'$mob2','$doj','$exp','$des','$auth','$dept','$div','{$image}'
			)";
	if(mysqli_query($connection,$sql)) {
		
		$sql2 = "INSERT INTO salary(emp_id,base) VALUES('$id','$sal')";
		$res2 = mysqli_query($connection,$sql2);
		
		$sql3 = "INSERT INTO work(emp_id,proj_id) VALUES('$id','$proj')";
		$res3 = mysqli_query($connection,$sql3);
		
		foreach($qual as $val) {			
				$sql1 = "INSERT INTO education(emp_id,deg_name) VALUES('$id','".$val."')";
				mysqli_query($connection,$sql1);
		}
		
		$sql4 = "UPDATE education SET grad_year='$grad1' WHERE deg_name='$qual1'";
		$sql5 = "UPDATE education SET grad_year='$grad2' WHERE deg_name='$qual2'";
		$sql6 = "UPDATE education SET grad_year='$grad3' WHERE deg_name='$qual3'";
		$res4 = mysqli_query($connection,$sql4);
		$res5 = mysqli_query($connection,$sql5);
		$res6 = mysqli_query($connection,$sql6);
	
		foreach($skill as $val) {
			
				$sql1 = "INSERT INTO skills(emp_id,skill_name) VALUES('$id','".$val."')";
				mysqli_query($connection,$sql1);
				echo "<script>
						alert('Employee is successfully added...');
						window.location.href='../admin/add_emp.php';
					  </script>";
			
		}
		
	}else {
		echo "There is an error";
	}		
?>