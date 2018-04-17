<?php
	include "presets.php";
	
	$deptid = $_POST['add_id'];
	$deptname = $_POST['add_name'];
	$depthead = $_POST['add_head'];
	$deptbuild = $_POST['add_build'];
	$div = array($_POST['add_div1'],$_POST['add_div2'],$_POST['add_div3']);
	
	$sql = "INSERT INTO department(dept_id,dept_name,dept_head,building) VALUES('$deptid','$deptname','$depthead','$deptbuild')";
	
	if(mysqli_query($connection,$sql)) {
		
		foreach($div as $val) {
			$sql1 = "INSERT INTO division(dept_id,div_name) VALUES('$deptid','".$val."')";
			if(mysqli_query($connection,$sql1)) {
				echo "<script>
						alert('Department is Successfully added...');
						window.history.back();
					  </script>";
			}
		}
		
	}
?>