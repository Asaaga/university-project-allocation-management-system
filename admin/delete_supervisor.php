<?php

include("../db.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "DELETE FROM supervisor WHERE id='$id'";
  
  $sql2 = "DELETE FROM user WHERE id='$id'";
  mysqli_query($conn,$sql2);

  mysqli_query($conn,$sql);

  header("Location:view_supervisors.php");
  exit();
}