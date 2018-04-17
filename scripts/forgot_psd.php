<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../styles/tst_style.css">
		
		<style>
			.fade-scale {
				transform: scale(0);
				opacity: 0;
				-webkit-transition: all .25s linear;
				-o-transition: all .25s linear;
				transition: all .25s linear;
			}
			.fade-scale.in {
			    opacity: 1;
				transform: scale(1);
			}
		</style>
	</head>
	<body>
	
		<div class="modal fade-scale" id="myModal1" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">				
				<div class="modal-body" style="padding:40px 50px;">
					<form role="form" method="post" action="../scripts/recover_psd.php">
						<div class="form-group">
							<label for="empid"> Employee Id</label>
							<input type="text" class="form-control" name="eid" placeholder="Enter Your Employee ID" required>
						</div>
						<div class="form-group">
							<label for="usrname"> Username</label>
							<input type="text" class="form-control" name="usr" placeholder="Enter Your Username" required>
						</div>
						<div class="form-group">
							<label for="email"> Email Address</label>
							<input type="email" class="form-control" name="email" placeholder="Enter Valid Email Address" required>
						</div>
						<br />
						<button type="submit" class="btn btn-warning btn-block"><i class="fa fa-envelope " style="color: #fff; font-size: 15px;"></i>  Recover</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal" onclick="back()"> Cancel</button>					
				</div>
			</div>      
		</div>
	</div>
	
	</body>
	
	<script>
		$("document").ready(function() {			
			$("#myModal1").modal();		
		});	
		function back() {
			window.history.back();
		}
	</script>
</html>