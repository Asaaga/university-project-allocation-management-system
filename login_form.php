<?php
session_start();
include("db.php");

if (isset($_POST['sign'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];



	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";

	$sql = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($sql);

	if ($row) {
		if($row['role'] == 1){
			$_SESSION['id'] = $row['username'];
			$_SESSION['check'] = 1;
			header("location:admin/dashboard.php");
			exit(); 
		}
		else if ($row['role'] == 2 && $row['status'] == 1) {
			$_SESSION['id'] = $row['username'];
			$_SESSION['check'] = 1;
			header("Location:supervisor/dashboard.php");
			exit();
		}
		else if ($row['role'] == 3 && $row['status'] == 1) {
			$_SESSION['id'] = $row['username'];
			$_SESSION['check'] = 1;
			header("Location:student/dashboard.php");
			exit();
		}
	}
	else{
			echo "<span style='color:red;'><h3>Login Failed</h3></span>";;
		}
}
?>

<div class="well">
    <h3>User Login</h3>
	<form method="POST" class="form-group">
		<div class="form-group">
			<label class="control-label">Username:</label>
			<input type="text" name="username" class="form-control" required>
		</div>

		<div class="form-group">
			<label class="control-label">Password:</label>
			<input type="password" name="password" class="form-control" required>
		</div>

		<input type="submit" class="btn btn-sm btn-primary" name="sign" value="Log in">
	</form>
</div>

<div class="well">
	<div class="text-center"><h4 style="color:green;">I don't Have Account!</h4></div>
	<label><a style="color:brown;" href="supervisor.php">SignUp as supervisor!</a><a style="color:orange;" href="student.php">SignUp as Student!</a></label>
</div>
<div class="well">
	<a href="newpass.php"><button>Forget Password ?</button></a>
</div>

<!-- <script>
$(document).ready(function(){
$("#login_form1").submit(function(e){
		e.preventDefault();
		var formData = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "login.php",
			data: formData,
			success: function(html){
			if(html=='true')
			{

				$.jGrowl("Loading Project Files Please Wait......", { sticky: true });
				$.jGrowl("Welcome to Student's Project Management System", { header: 'Access Granted' });
				var delay = 5000;
					setTimeout(function(){ window.location = 'admin/dashboard.php'  }, delay);  
			}else
			{
			    $.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
			}
			}
		});
		return false;
	});
});
</script> -->