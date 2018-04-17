<?php
	session_start();
	include "presets.php";
	$user = $_SESSION['user'];
	
	$check=getimagesize($_FILES["emp_photo"]["tmp_name"]);
	
	if($check == false){
		echo "There is an Error...!!!";
	}
	else{
		$image = addslashes(file_get_contents($_FILES["emp_photo"]["tmp_name"]));
		$sql2=$connection->prepare("UPDATE emp_details SET photo='{$image}' WHERE username='".$user."'");
		$sql2->execute();
		$sql2->close();
		echo "<script>window.history.back()</script>";
	}
?>