<?php
	error_reporting(0);

	include "presets.php";

	$empid = $_POST['eid'];
	$user = $_POST['usr'];
	$email = $_POST['email'];

	$sql = "SELECT emp_id,username,password FROM emp_details WHERE emp_id='$empid' AND username='$user' AND email='$email'";
		
	if($res = mysqli_query($connection,$sql)) {
		while($chk = mysqli_fetch_array($res)) {
			$eid = $chk['emp_id'];
			$usr = $chk['username'];
			$pass = $chk['password'];
		}
		
		require 'PHPMailer/PHPMailerAutoload.php';
		$mail = new PHPMailer();

		$mail ->IsSmtp();
		//$mail ->SMTPDebug = 4;
		$mail ->SMTPAuth = true;
		$mail ->SMTPSecure = 'ssl';
		$mail ->Host = 'smtp.gmail.com';
		$mail ->Port = 465;  // use if 465 doesn't work :587
		$mail ->IsHTML(true);
		$mail ->Username = 'saiabhinavvasepalli@gmail.com';
		$mail ->Password = 'Abhinav@28997';
		$mail ->setFrom('saiabhinavvasepalli@gmail.com','Amblex Software Inc.');
		$mail ->Subject = 'Employee Password Recovery';
		$mail ->Body = '<h3>Amblex Software Inc.</h3><h4>Employee Password Recover</h4>Emp Id: <b>'.$eid.'</b><br>Username: <b>'.$usr.'</b><br>Password: <b>'.$pass.'</b><br><br>Please don\'t share your password with anyone<br><br><br><p style="color:red;">This is a system generated mail...<br>so please don\'t reply to this mail</p>';
		$mail ->addReplyTo('no-reply@gmail.com','No Reply');
		$mail ->AddAddress($email);
		
		if($mail ->Send()) {
			echo "<script>
				alert('Successfully Recovered...Please Check your mail');
				window.location.href='../index.html';
				</script>";
			
		}
		else {
			echo "<script>
				alert('Please check your details and try again/later');
				window.history.back();
				</script>";
		}
	}
	else {
		echo "<script>
				alert('Employee Id or Username or Email is not valid');
				window.history.back();
				</script>";
	}
?>