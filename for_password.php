<?php
include("db.php");


	if (isset($_POST['submit'])) {
		$username = $_POST['user'];

		$query = "SELECT * FROM user WHERE username='$username'";
		$sql = mysqli_query($conn,$query);
		echo "<h6 style='color:white; margin-left:20px;'>If Name Appear Reset password below else Register again</h6>";
		while ( $row = mysqli_fetch_assoc($sql)) {
			$user = $row['username'];
			$see = "SELECT * FROM propose_project WHERE username='$user'";
			$do = mysqli_query($conn,$see);
			$cou = mysqli_fetch_assoc($do);

			if ($cou) {
			echo "
				<div class='container-fluid'>
				<div class='col-md-12'>
					<div class='row'>
						<table class='table table-bordered'>
							<tr><td style='color:white'>".$cou['student']."</td></tr>
						</table>
					</div>
				</div>
				</div>";
		}else{
			$staf = "SELECT * FROM supervisor WHERE username='$user'";
			$wod = mysqli_query($conn,$staf);
			$stil = mysqli_fetch_assoc($wod);
			if ($stil) {
				echo "
				<div class='container-fluid'>
				<div class='col-md-12'>
					<div class='row'>
						<table class='table table-bordered'>
							<tr><td style='color:white'>".$stil['firstname']." ".$stil['lastname']."</td></tr>
						</table>
					</div>
				</div>
				</div>";
			}

		}

		}

		

	}
	
?>


<div class="container-fluid jumbotron">
	<div class="col-md-12">
		<div class="row">
			<form class="form-group" method="POST">
				<lable style="font-size:20px;">User Name</lable>
				<input type="text" name="user" class="form-control" placeholder="Enter Username">
				<input type="submit" name="submit" value="SEARCH" class="btn btn-info " style="margin-top:20px;">
				<h5 class="text-center">SEARCH ACCOUNT ABOVE</h5>
			</form>
			<?php
			if (isset($_POST['reset'])) {
				$pass = $_POST['pass'];
				$name = $_POST['name'];
				
					$let = "SELECT * FROM user WHERE username='$name'"; 
					$perm = mysqli_query($conn,$let);
					$land = mysqli_fetch_assoc($perm);
					$paw = $land['username'];

					if ($perm) {
						$renew = "UPDATE user SET password='$pass' WHERE username='$paw'";
						$fresh = mysqli_query($conn,$renew);
						if ($fresh) {
							echo "<span style='color:green;'><h5>Your password is reset You can Now login.</h5></span>";
						}
						else{
							echo "<span style='color:red;'><h5>Action Failed.</h5></span>";
						}
					}
			}
			 ?>
			<form class="form-group" method="POST">
				<input type="none" value="RESET PASSWORD BELOW" name="" class="form-control"><br>
				<input type="text" name="name" class="form-control" required placeholder="Enter Your Username"><br>
				<input type="password" name="pass" class="form-control" placeholder="Enter the New Password" required>
				<input type="submit" name="reset" value="RESET" class="btn btn-info " style="margin-top:20px;">
			</form>
			<a href="index.php"><button style="margin-left: 150px;">Home</button></a>
		</div>
	</div>
</div> 