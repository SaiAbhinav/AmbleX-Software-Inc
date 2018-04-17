<?php
	session_start();

	include "presets.php";
	
	$usr = $_POST['usr'];
	$opsw = $_POST['opsw']; 
	$npsw = $_POST['npsw'];
	$rpsw = $_POST['rpsw'];
	
	$check = "SELECT password FROM emp_details WHERE username='$usr'";
	$res = mysqli_query($connection,$check);
	while($row = mysqli_fetch_array($res)){
		$pass = $row['password'];
	}
	
	if($usr == $_SESSION['user'] && $opsw == $pass) {
		if($npsw == $rpsw) {
			$change = "UPDATE emp_details SET password='$npsw' WHERE username='$usr' AND password='$opsw'";
			if(mysqli_query($connection,$change)) {
			echo "<script>
					alert('Successfully Changed...!!!');
					window.history.back();
				</script>";
			}else {
				echo "<script>
					alert('There is an Error in Changing...!!!');
					window.history.back();
				</script>";
			}
		}else {
			echo "<script>
					alert('Passwords are not matching...!!!');
					window.history.back();
				</script>";
		}
	}else {
		echo "<script>
					alert('Username or Old Password is Incorrect...!!!');
					window.history.back();
				</script>";
	}
?>