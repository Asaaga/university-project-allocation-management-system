<?php
include("../db.php");

if (isset($_GET['id'])) {

	$id = $_GET['id'];

	$sql = "UPDATE user SET status=1 WHERE id='$id'";
	mysqli_query($conn,$sql);
	header("Location:confirm_reg.php");
	exit();
}