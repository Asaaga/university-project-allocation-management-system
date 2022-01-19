<?php
 include("head.php");
 include("db.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Supervisor Register</title>
</head>
<body background="image/blue.bmp">
	<div class="container-fluid" style="margin-top: 50px; width: 50%;">
		<div class="row">
				<div class="col-md-2" >
					<div class="row" style="margin-left:-280px;">
						  <div class="container start-container">
     <div class="col-md-6 title-text">
         <img src="image/bsu.gif" class="img-rounded img-responsive" width="100" height="100">
     	<h4>BENUE STATE UNIVERSITY,<br> MAKURDI</h4>
     	<h1>UNIVERSITY PROJECT MANAGEMENT SYSTEM</h1>
     </div>
   </div>
					</div>
				</div>
		<div class="col-md-9 jumbotron " style="margin-left: 250px; width:500px; margin-top: -400px;">
			
				<div class="col-md-12">
					<div class="row">
						<h4 class="text-center text-primary">Supervisor Sign Up</h4>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">


						<?php
						if (isset($_POST['submit'])) {
							$title = $_POST['title'];
							$fname = $_POST['fname'];
							$lname = $_POST['lname'];
							$uname = $_POST['uname'];
							$depart = $_POST['dep'];
							$fac = $_POST['fac'];
							$email = $_POST['email'];
							$password = $_POST['pass'];
							$conpassword = $_POST['conpass'];

							$image = $_FILES['image']['name'];
							$tmp = $_FILES['image']['tmp_name'];
							$folder = "image/".$image;

							move_uploaded_file($tmp, $folder);

							if($password != $conpassword){
								echo "<span style='color:red;'>Password do no match.</span>";
							}
							else{
								$sql = "INSERT INTO supervisor(title, firstname, lastname, username, department, faculty, email, password, stud_assigned, status) VALUES('$title','$fname','$lname','$uname','$depart','$fac','$email','$password','0','0')";
								$query = mysqli_query($conn,$sql);

								if ($query) {
									
								
									$sql2 = "INSERT INTO user(username,password,matric,role,status,image) VALUES('$uname','$password','staff',2,0,'$image')";
									$query2 = mysqli_query($conn,$sql2);
								
								}
							if ($query && $query2) {
								echo "<span style='color:green;'><h3>You have Registered</h3></span>";
							}
							else{
								echo "<span style='red;'><h3>Not Registered</h3></span>";
							}
						}
						
						}
						?>


						<form class="form-group" method="POST" enctype="multipart/form-data">
							<div class="col-md-12">
								<div class="row">
									<label>Title</label>
									<input type="text" name="title" class="form-control" placeholder="Enter Title" autocomplete="off" required="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<label>First Name</label>
									<input type="text" name="fname" class="form-control" placeholder="Enter First Name" autocomplete="off" required="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<label>Last Name</label>
									<input type="text" name="lname" class="form-control" placeholder="Enter Last Name" autocomplete="off" required="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<label>Username</label>
									<input type="text" name="uname" class="form-control" placeholder="Enter Username" autocomplete="off" required="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<label>Department</label>
									<input type="text" name="dep" class="form-control" placeholder="Enter Department" autocomplete="off" required="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<label>Faculty</label>
									<input type="text" name="fac" class="form-control" placeholder="Enter Faculty" autocomplete="off" required="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="Enter email" autocomplete="off" required="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<label>Passpost</label>
									<input type="file" name="image" class="form-control" placeholder="Enter email" autocomplete="off" required="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<label>Password</label>
									<input type="password" name="pass" class="form-control" placeholder="*****" autocomplete="off" required="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<label>Confirm Password</label>
									<input type="password" name="conpass" class="form-control" placeholder="*****" autocomplete="off" required="required">
								</div>
							</div>
							<input type="submit" name="submit" class="btn btn-info" style="margin-top: 20px;">
							<a href="index.php"><h4>click to login</h4></a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
include("footer.php");
?>
</body>
</html>