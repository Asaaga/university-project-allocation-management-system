<?php
include("head.php");
include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Register</title>
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
						<h4 class="text-center text-primary">Student Sign Up</h4>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">

						<?php
						if (isset($_POST['submit'])) {
							$fname = $_POST['fname'];
							$uname = $_POST['uname'];
							$depart = $_POST['dep'];
							$fac = $_POST['fac'];
							$course = $_POST['course'];
							$level = $_POST['level'];
							$matric = $_POST['matric'];
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
								$sql = "INSERT INTO student(name,department,course,level, matric,username) VALUES('$fname','$depart','$course','$level','$matric','$uname')";
								$query = mysqli_query($conn,$sql);

								if ($query) {
									
								
									$sql2 = "INSERT INTO user(username,password,matric,role,status,image) VALUES('$uname','$password','$matric',3,0,'$image')";
									$query2 = mysqli_query($conn,$sql2);

									if($sql2){
										$send = "INSERT INTO propose_project(username,student,mat_no,course_of_studies,department,faculty,final_copy,first_proposal,second_proposal,third_proposal) VALUES('$uname','$fname','$matric','$course','$depart','$fac',0,0,0,0)";
										$come = mysqli_query($conn,$send);
									}
								
								}
							if ($query && $query2 && $come) {
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
									<label>Full Name</label>
									<input type="text" name="fname" class="form-control" placeholder="Enter Surname first" autocomplete="off" required="required">
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
									<input type="text" name="fac" class="form-control" placeholder="Enter Username" autocomplete="off" required="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<label>Course of Studies</label>
									<input type="text" name="course" class="form-control" placeholder="Enter Course" autocomplete="off" required="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<label>Matric Number</label>
									<input type="text" name="matric" class="form-control" placeholder="Enter Matric Number" autocomplete="off" required="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<label>Current Level</label>
									<input type="text" name="level" class="form-control" placeholder="Enter Level" autocomplete="off" required="required">
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