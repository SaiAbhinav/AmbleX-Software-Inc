<?php session_start(); ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/login_fail.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="document.getElementById('myModal').style.display='block'">
<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header" style="background-color:#FF6F6F">
		<i class="fa fa-times" style="font-size:60px;color:red"></i>
    </div>
    <div class="modal-body">
      <center><h2>Login failed</h2></center>
    </div>
  </div>
</div>
</body>
</html>
<?php 

	header("Refresh:2;url=../index.html");

	session_unset();
	session_destroy();
?>