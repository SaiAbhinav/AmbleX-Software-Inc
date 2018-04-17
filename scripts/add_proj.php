<?php
	include "presets.php";
	
	$pid = $_POST['add_id'];
	$pname = $_POST['add_name'];
	$pdead = $_POST['add_dead'];
	$phead = $_POST['add_head'];
	$pdept = $_POST['add_dept'];
	
	$preq = array($_POST['add_req1'],$_POST['add_req2'],$_POST['add_req3'],$_POST['add_req4'],$_POST['add_req5']);
	
	$cid= $_POST['add_cid'];
	$cper = $_POST['add_per'];
	$cname = $_POST['add_cname'];
	
	$sql = "INSERT INTO projects(proj_id,proj_name,proj_head,deadline,client_id,dept_id) VALUES('$pid','$pname','$phead','$pdead','$cid','$pdept')";
	
	if(mysqli_query($connection,$sql)) {
		
		$sql2 = "INSERT INTO client_details(client_id,client_name,client_type) VALUES('$cid','$cname','$cper')";
		if(mysqli_query($connection,$sql2)) {		
			foreach($preq as $val) {
				if($val != NULL) {	
					$sql1 = "INSERT INTO requirements(proj_id,requirement) VALUES('$pid','".$val."')";
					mysqli_query($connection,$sql1);}
				}	
				echo "<script>
						alert('Project is successfully added...');
						window.history.go(-1);
					  </script>";
			}else {
				echo "error";
			}		
		}else {
			echo "There is an error";
		}

?>