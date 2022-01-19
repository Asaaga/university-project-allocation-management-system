<?php
include("../db.php");

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = "DELETE  FROM propose_project WHERE id='$id'";
	$query = mysqli_query($conn,$sql);
	header("Location:view_project.php");
}

?>